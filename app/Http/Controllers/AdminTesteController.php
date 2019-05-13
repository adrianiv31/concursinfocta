<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Question;
use App\Quiz;
use App\Section;
use App\StudentAnswer;
use App\User;
use PDF;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminTesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teste = Quiz::all();
        return view('admin.teste.index', compact('teste'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sections = Section::pluck('name', 'id')->all();
        $grades = Grade::pluck('name', 'id')->all();

        return view('admin.teste.create', compact('sections', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $test = Quiz::create($input);

        return redirect(route("admin.teste.show", $test->id));
    }

    public function storeintrebari(Request $request, $id)
    {
        $test = Quiz::findOrFail($id);
        $selectate =  $request->selectate;

        foreach($selectate as $selectat)
        {
            $question = Question::findOrFail($selectat);
            $test->questions()->save($question);
        }

        return redirect(route('admin.teste.index'));
    }
    public function updateintrebari(Request $request, $id)
    {
        $test = Quiz::findOrFail($id);
        $selectate =  $request->selectate;

        $test->questions()->sync($selectate);

        return redirect(route('admin.teste.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $test = Quiz::findOrFail($id);

        $intrebari = Question::where([

            ['section_id', '=', $test->section_id],
            ['grade_id', '=', $test->grade_id],
        ]
    )->get();

        return view('admin.teste.showcreate', compact('test','intrebari'));

    }
    public function editquestions($id)
    {
        //
        $test = Quiz::findOrFail($id);

        $intrebari = Question::where([

                ['section_id', '=', $test->section_id],
                ['grade_id', '=', $test->grade_id],
            ]
        )->get();

        return view('admin.teste.editquestions', compact('test','intrebari'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $quiz = Quiz::findOrFail($id);

        $sections = Section::pluck('name', 'id')->all();
        $grades = Grade::pluck('name', 'id')->all();
        $questions = $quiz->questions;




            return view('admin.teste.edit', compact('questions', 'quiz', 'sections', 'grades'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();

        $test = Quiz::findOrfail($id);

        if($request->has('active')) {
            $input['active']=1;
        }
        else{
            $input['active']=0;
        }
        $test->update($input);

        return redirect(route("admin.teste.editquestions", $test->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $quiz = Quiz::findOrFail($id);
        $quiz->questions()->detach();

        $quiz->delete();
        return redirect(route('admin.teste.index'));
    }

    public function corecteaza($id){
        $user = User::findOrFail($id);

        $quiz = Quiz::where([
            ['activeeval','=','1'],
            ['grade_id','=',$user->grade_id],
        ])->first();

        $questions = $quiz->questions;

        $studentanswers = $user->studentanswers->where('quiz_id',$quiz->id);
//        foreach ($studentanswers as $studentanswer){
//            echo $studentanswer->answer.'<br>';
//        }

        return view('admin.teste.corecteaza', compact('quiz', 'user', 'questions', 'studentanswers'));
    }

    public function storeScore(){
        return redirect(url('/teste/evalueaza'));
    }

    public function downloadPDF($id){
//        $user = UserDetail::find($id);
//
//        $pdf = PDF::loadView('pdf', compact('user'));
//        return $pdf->download('invoice.pdf');

        $quiz = Quiz::findOrFail($id);


        $questions = $quiz->questions;

        $pdf = PDF::loadView('admin.teste.pdf', compact('questions','quiz'));


        return $pdf->download($quiz->section->name.'-'.$quiz->grade->name.'.pdf');

    }
}
