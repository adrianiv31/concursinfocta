<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Question;
use App\Quiz;
use App\Section;
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
        $sections = Section::lists('name', 'id')->all();
        $grades = Grade::lists('name', 'id')->all();

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
