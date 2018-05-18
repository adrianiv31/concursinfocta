<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\StudentAnswer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminStudentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(TestRequest $request)
    {
        //
        if ($request->file('file')) {
            if ($file = $request->file('file')) {

                $name = time() . $file->getClientOriginalName();

                $user = Auth::user();

                $studentanswer = StudentAnswer::where([
                    ['quiz_id', '=', $request->quiz_id],
                    ['user_id', '=', $user->id],
                    ['question_id', '=', $request->question_id],

                ])->first();

                $string = str_replace(' ', '', $user->email); // Replaces all spaces with hyphens.
                $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
                $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

                $path = $name;


                if ($studentanswer) {
                    $pathE = $string . "/" . $studentanswer->answer;

                    unlink('userprojects/'.$pathE);

                    $file->move('userprojects/'.$string, $path);
                    $studentanswer->answer = $name;
                    $studentanswer->save();

                } else {
                    Storage::makeDirectory($string);
                    $file->move('userprojects/'.$string, $path);

                    $input = $request->all();
                    $input['answer'] = $name;
                    $input['user_id'] = Auth::user()->id;
                    StudentAnswer::create($input);
                }
                return redirect('/elev-test/');

            } else {
                $input['answer'] = '';
            }
        } else {
            exit;
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            StudentAnswer::create($input);
            return redirect('/incepe-test/' . $input['quiz_id']);
        }
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
    }
}
