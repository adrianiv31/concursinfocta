<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Grade;
use App\Localitati;
use App\Question;
use App\Quiz;
use App\Section;
use App\StudentAnswer;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::get('/register1', function(){
//
//    return view('auth.register');
//
//});


Route::group(['middleware' => 'admin'], function () {

    Route::get('admin', function () {

        return view('admin.index');

    });

    Route::group(['middleware' => 'adminadmin'], function () {


        Route::resource('admin/users', 'AdminUsersController', ['names' => [

            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',


        ]]);

        Route::get('/assignroles', function () {

            $users = User::all();
            foreach ($users as $user) {

                $user->roles()->sync([$user->role_id]);

            }


        });
        Route::get('/ajax-rezultate', function () {

            $section_id = Input::get('section_id');
            $grade_id = Input::get('grade_id');

            $users = User::where([
                ['section_id', '=', $section_id],
                ['grade_id', '=', $grade_id],
            ])->get();
            $rezults = null;
            foreach ($users as $user) {
                if ($user->isElev()) {


                    $score = 0;
                    $quiz = App\Quiz::where([
                        ['activeeval', '=', '1'],
                        ['grade_id', '=', $user->grade_id],
                    ])->first();
                    if ($quiz) {


                        $studentanswers = App\StudentAnswer::where([
                            ['quiz_id', '=', $quiz->id],
                            ['user_id', '=', $user->id],


                        ])->get();
                        $nr_ras = 0;
                        foreach ($studentanswers as $studentanswer) {
                            $score += $studentanswer->points;
                            $nr_ras++;
                        }
                    }


                    //////////
                    $teste = App\Quiz::where([

                            ['section_id', '=', $user->section_id],
                            ['grade_id', '=', $user->grade_id],
                            ['activeeval', '=', 0],
                        ]
                    )->get();

                    $scoreI = 0;
                    foreach ($teste as $test) {

                        $ras_date = App\StudentAnswer::where([
                            ['quiz_id', '=', $test->id],
                            ['user_id', '=', $user->id],


                        ])->get();

                        $scoreI = 0;

                        foreach ($ras_date as $ras_dat) {


                            $ans = App\Answer::findOrFail($ras_dat->answer_id);
                            if ($ans)
                                if ($ans->corect)
                                    $scoreI += 5;

                        }

                    }
                    $total = $score + $scoreI;
                    $rezults[$user->id] = array('nume' => $user->name, 'scoala' => $user->school->name, 'indrumator' => $user->prof->name, 'scorI' => $scoreI, 'scorII' => $score, 'total' => $total);
                }
            }
            function sortByOrder($a, $b)
            {
                return -($a['total'] - $b['total']);
            }

            usort($rezults, 'sortByOrder');
            return Response::json($rezults);

        });

        Route::resource('admin/teste', 'AdminTesteController', ['names' => [

            'index' => 'admin.teste.index',
            'create' => 'admin.teste.create',
            'store' => 'admin.teste.store',
            'edit' => 'admin.teste.edit',
            'show' => 'admin.teste.show',


        ]]);
        Route::get('/downloadPDF/{id}', 'AdminTesteController@downloadPDF');
        Route::get('admin/teste/creareintrebari/{id}', ['as' => 'admin.teste.creareintrebari', 'uses' => 'AdminTesteController@storeintrebari']);
        Route::get('admin/teste/updateintrebari/{id}', ['as' => 'admin.teste.updateintrebari', 'uses' => 'AdminTesteController@updateintrebari']);
        Route::get('admin/teste/editquestions/{id}', ['as' => 'admin.teste.editquestions', 'uses' => 'AdminTesteController@editquestions']);
        Route::get('admin/rezultate', 'AdminUsersController@rezultate')->name('admin.users.rezultate');

    });

    Route::group(['middleware' => 'adminindrumator'], function () {


        Route::get('admin/indrumatori/rezultate/{id}', ['uses' => 'AdminIndrumatoriController@rezultate', 'as' => 'admin.intrumatori.rezultate']);

        Route::resource('admin/indrumatori', 'AdminIndrumatoriController', ['names' => [

            'index' => 'admin.indrumatori.index',
            'create' => 'admin.indrumatori.create',
            'store' => 'admin.indrumatori.store',
            'edit' => 'admin.indrumatori.edit',


        ]]);
        Route::get('admin/rezultate/indrumator/{id}', 'AdminUsersController@rezultateIndrumator')->name('admin.users.rezultate.indrumator');


    });

    Route::group(['middleware' => 'admineditor'], function () {

        Route::get('admin/intrebari/detaliu', 'AdminIntrebariController@detaliu')->name('admin.intrebari.detaliu');
        Route::resource('admin/intrebari', 'AdminIntrebariController', ['names' => [

            'index' => 'admin.intrebari.index',
            'create' => 'admin.intrebari.create',
            'store' => 'admin.intrebari.store',
            'edit' => 'admin.intrebari.edit',


        ]]);

        Route::resource('admin/raspunsuri', 'AdminRaspunsuriController', ['names' => [

            'index' => 'admin.raspunsuri.index',
            'store' => 'admin.raspunsuri.store',
            'edit' => 'admin.raspunsuri.edit',


        ]], ['except' => ['create']]);
        Route::get('admin/raspunsuri/creare/{id}/{nr_raspunsuri}', ['as' => 'admin.raspunsuri.creare', 'uses' => 'AdminRaspunsuriController@create']);

        Route::get('/ajax-detaliu', function () {

            $section_id = Input::get('section_id');
            $grade_id = Input::get('grade_id');
            $intrebari = Question::where([

                ['section_id', '=', $section_id],
                ['grade_id', '=', $grade_id],
            ])->get();
            $html = '';
            $i = 1;
            foreach ($intrebari as $intrebare) {
                $html .= '<div class="panel panel-default">
  <div class="panel-heading"><h3>' . $i . '.</h3> ' . $intrebare->intrebare;
                if ($intrebare->getOriginal('path'))
                    $html .= '<br> <img src="' . htmlspecialchars($intrebare->path) . '" alt="Responsive image" class="img-fluid">';

                $html .= '</div>
  <div class="panel-body">';

                $raspunsuri = $intrebare->answers;
                $html .= '<ol style="list-style-type: lower-alpha; font-size:20px">';
                foreach ($raspunsuri as $raspuns) {
                    if ($raspuns->corect)
                        $html .= '<li style="margin: 30px;color:#ff0000;">';
                    else
                        $html .= '<li style="margin: 30px;">';
                    if ($raspuns->raspuns)
                        $html .= htmlspecialchars($raspuns->raspuns);
                    if ($raspuns->getOriginal('path'))
                        $html .= ' <img src="' . htmlspecialchars($raspuns->path) . '" alt="Responsive image" class="img-fluid">';

                    $html .= '</li>';
                }
                $html .= '</ol>';

                $html .= '</div>
</div>';
                $i++;
            }

            return $html;
//            $section = Section::where('id', '=', $section_id)->take(1)->get();
//
//
//            if ($section[0]->name == 'Gimnaziu') $grades = Grade::where('name', '=', 'V')->get();
//            else $grades = Grade::where('name', 'like', '%X%')->get();
//
//            return Response::json($grades);

        });
    });


/////////AJAX
    Route::get('/ajax-localitatis', function () {

        $judete_id = Input::get('judete_id');

        $localitatis = Localitati::where('judete_id', '=', $judete_id)->orderBy('nume')->get();

        return Response::json($localitatis);

    });

    Route::get('/ajax-grades', function () {

        $section_id = Input::get('section_id');

        $section = Section::where('id', '=', $section_id)->take(1)->get();


        if ($section[0]->name == 'Gimnaziu') $grades = Grade::where('name', '=', 'V')->get();
        else $grades = Grade::where('name', 'like', '%X%')->get();

        return Response::json($grades);

    });

    Route::get('/ajax-prof', function () {

        $school_id = Input::get('school_id');

        $profesori = User::whereHas('roles', function ($query) {
            $query->where('name', 'administrator')->orWhere('name', 'profesor îndrumător');
        })->where('school_id', '=', $school_id)->get();

//        $profesori = User::where([
//            ['school_id', '=', $school_id],
//            ['role_id', '=', 5],
//
//        ])->orderBy('name')->get();

        return Response::json($profesori);

    });

    Route::get('/ajax-sections', function () {


        $sectiuni = Section::all();

        return Response::json($sectiuni);

    });
    Route::get('/ajax-test-check', function () {

        $id = Input::get('id');

        $quiz = Quiz::findOrFail($id);

        if ($quiz->active == 0) {
            $input['active'] = 1;
        } else {
            $input['active'] = 0;
        }
        $quiz->update($input);


        return $input['active'];

    });


});


////elev
Route::group(['middleware' => 'adminelev'], function () {

    Route::get('/elev-test', function () {

        $user = Auth::user();

        if ($user->isElev()) {
            $quiz = Quiz::where([

                ['section_id', '=', $user->section_id],
                ['grade_id', '=', $user->grade_id],
                ['active', '=', '1'],
            ])->get();

        } else if ($user->isAdmin()) {
            $quiz = Quiz::all();
        }

        return view('admin.elevtest.index', compact('user', 'quiz'));


    });

    Route::get('/incepe-test/{id}', function ($id) {

        $quiz = Quiz::findOrFail($id);

        $user = Auth::user();
        $studentanswer = StudentAnswer::where([
            ['quiz_id', '=', $quiz->id],
            ['user_id', '=', $user->id],

        ])->get();

        $raspunsuri_date = [];
        $i = 0;
        foreach ($studentanswer as $raspuns) {
            $raspunsuri_date[$i] = $raspuns->question_id;
            $i++;
        }
        $questions = $quiz->questions;


        $raspunsuri_ramase = [];
        $i = 0;
        foreach ($questions as $question) {

            if (!in_array($question->id, $raspunsuri_date)) {
                $raspunsuri_ramase[$i] = $question;

                $i++;

            }
        }

        if ($i != 0 && $quiz->active == 1) {
            shuffle($raspunsuri_ramase);
            $quest = $raspunsuri_ramase[0];

            $answers = $quest->answers;


            return view('admin.elevtest.test', compact('quest', 'answers', 'quiz'));
        } else {
            $ras_date = StudentAnswer::where([
                ['quiz_id', '=', $quiz->id],
                ['user_id', '=', $user->id],

            ])->get();

            $scor = 0;
            foreach ($ras_date as $ras_dat) {


                if ($ras_dat->answer->corect)
                    $scor += 5;

            }


            return view('admin.elevtest.score', compact('scor'));
        }

    });
    Route::get('/incepe-test-proiect/{id}', function ($id) {

        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions;

        $quest = null;
        foreach ($questions as $question) {


            $quest = $question;

        }


        $user = Auth::user();
        $studentanswer = StudentAnswer::where([
            ['quiz_id', '=', $quiz->id],
            ['user_id', '=', $user->id],
            ['question_id', '=', $quest->id],

        ])->get()->first();
        if ($studentanswer) {
            $string = str_replace(' ', '', $user->email); // Replaces all spaces with hyphens.
            $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
            $pathE = '/userprojects/' . $string . "/" . $studentanswer->answer;
            $ans = $studentanswer->answer;
        } else {
            $pathE = "";
            $ans = "";
        }

        return view('admin.elevtest.testproiect', compact('quest', 'quiz', 'pathE' ,'ans'));

    });

    Route::get('/incepe-test-proiectV/{id}', function ($id) {

        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions;

        $quest = null;
//        foreach ($questions as $question) {
//
//
//            $quest = $question;
//
//        }


        $user = Auth::user();
//        $studentanswer = StudentAnswer::where([
//            ['quiz_id', '=', $quiz->id],
//            ['user_id', '=', $user->id],
//            ['question_id', '=', $question_id],
//
//        ])->get();


////introdus nou
//        $quest = null;
//        $i=1;
//        foreach ($questions as $question) {
//
//
//            $quest = $question;
//
//
//            $studentanswer = StudentAnswer::where([
//                ['quiz_id', '=', $quiz->id],
//                ['user_id', '=', $user->id],
//                ['question_id', '=', $quest->id],
//
//            ])->get()->first();
//            if ($studentanswer) {
//                $string = str_replace(' ', '', $user->email); // Replaces all spaces with hyphens.
//                $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
//                $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
//                $pathE[$i] = '/userprojects/' . $string . "/" . $studentanswer->answer;
//                $ans[$i] = $studentanswer->answer;
//            } else {
//                $pathE[$i] = "";
//                $ans[$i] = "";
//            }
//            $i++;
//        }
//
////pana aici

        return view('admin.elevtest.testproiectV', compact('questions', 'quiz'));

    });

    Route::get('/termina-test/{id}', function ($id) {

        $quiz = Quiz::findOrFail($id);
        // $activ = ['active' => '0'];
        // $quiz->update($activ);
        return redirect('/incepe-test/' . $quiz->id);

    });

    Route::post('admin/elevtest/store/V', ['as' => 'admin.elevtest.storeV', 'uses' => 'AdminStudentAnswerController@storeV']);
    Route::resource('admin/elevtest', 'AdminStudentAnswerController', ['names' => [

        'index' => 'admin.elevtest.index',
        'create' => 'admin.elevtest.create',
        'store' => 'admin.elevtest.store',
        'edit' => 'admin.elevtest.edit',


    ]]);


});

Route::group(['middleware' => 'adminevaluator'], function () {

    Route::get('/teste/evalueaza', function () {


        $user = Auth::user();


        if ($user->grade_id == 1 || $user->grade_id == 2) {
            $users = User::where([
                ['grade_id', '=', $user->grade_id],
            ])->get();
        } else {

            $users = User::where([
                ['grade_id', '<>', 1],
                ['grade_id', '<>', 2],
            ])->get();
        }

        $grade = Grade::findorfail($user->grade_id);


        return view('admin.teste.users', compact('users', 'grade'));

    });
    Route::get('/ajax-saveE2', function () {
        $quiz_id = Input::get('quiz_id');
        $question_id = Input::get('question_id');
        $answer = Input::get('answer');
        $user_id = Input::get('user_id');
        // $active = Auth::user()->quizzes()->where('quiz_id', $quiz_id)->first()->pivot->active;


        $studentanswer = StudentAnswer::where([
            ['quiz_id', '=', $quiz_id],
            ['user_id', '=', $user_id],
            ['question_id', '=', $question_id],

        ])->first();

        $studentanswer->points = $answer;
        $studentanswer->save();

//            $input['user_id'] = Auth::user()->id;
//            $input['quiz_id'] = $quiz_id;
//            $input['question_id'] = $question_id;
//            $input['answer_id'] = 0;
//            $input['answer'] = $answer;
//
//            if (!$studentanswer)
//                StudentAnswer::create($input);
//            else {
//                $studentanswer->answer = $answer;
//                $studentanswer->save();
//            }

        return $answer;

    });
    Route::post('admin/teste/storeScore', 'AdminTesteController@storeScore')->name('admin.teste.storescore');
    Route::get('admin/teste/corecteaza/{id}', 'AdminTesteController@corecteaza')->name('admin.teste.corecteaza');
});
/////////////////////////AJAX
Route::get('/ajax-localitatis', function () {

    $judete_id = Input::get('judete_id');

    $localitatis = Localitati::where('judete_id', '=', $judete_id)->orderBy('nume')->get();

    return Response::json($localitatis);

});

Route::get('/ajax-grades', function () {

    $section_id = Input::get('section_id');

    $section = Section::where('id', '=', $section_id)->take(1)->get();


    if ($section[0]->name == 'Gimnaziu') $grades = Grade::where('name', 'like', '%V%')->get();
    else $grades = Grade::where('name', 'like', '%X%')->get();

    return Response::json($grades);

});

Route::get('/ajax-prof', function () {

    $school_id = Input::get('school_id');


    $profesori = User::whereHas('roles', function ($query) {
        $query->where('name', 'administrator')->orWhere('name', 'profesor îndrumător');
    })->where('school_id', '=', $school_id)->get();

//    $profesori = User::where([
//        ['school_id', '=', $school_id],
//        ['role_id', '=', 5],
//    ])->orderBy('name')->get();

    return Response::json($profesori);

});

Route::get('/ajax-sections', function () {


    $sectiuni = Section::all();

    return Response::json($sectiuni);

});