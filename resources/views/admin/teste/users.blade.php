
@extends('layouts.admin')


@section('content')

    <h1>Elevi clasa a {{$grade->name}} - a</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nume</th>
            <th scope="col">Email</th>
            <th scope="col">Clasa</th>
            <th scope="col">Unitate de invatamant</th>
            <th scope="col">Profesor indrumator</th>

            <th scope="col">Punctaj Proba</th>
            <th scope="col">Corectează</th>

        </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
                @if($user->isElev())
                    <?php
                    $nr_ras=0;
                            $score=0;
                    //  $quiz = $user->quizzes()->first();


//                    $quizzes = $user->quizzes()->get();
//                    $quiz = null;
//                    foreach ($quizzes as $q) {
//                        if ($q->activeeval == 1) $quiz = $q;
//                    }
//                    $id=0;

                    //$quiz=\App\Quiz::findOrFail(26);
                    $score = 0;
                    $quiz = App\Quiz::where([
                        ['activeeval','=','1'],
                        ['grade_id','=',$user->grade_id],
                    ])->first();
                    $activeval = 0;
                    if ($quiz) {

                        //        foreach ($questions as $question){
                        //            echo $question->intrebare."<br>";
                        //        }
                        $studentanswers = App\StudentAnswer::where([
                            ['quiz_id', '=', $quiz->id],
                            ['user_id', '=', $user->id],


                        ])->get();
                        $nr_ras=0;
                        foreach ($studentanswers as $studentanswer) {
                            $score += $studentanswer->points;
                            $nr_ras++;
                        }
                        $activeval=1;
                    }


                    //////////
                    $teste = App\Quiz::where([

                            ['section_id', '=', $user->section_id],
                            ['grade_id', '=', $user->grade_id],
                            ['activeeval', '=', 0],
                        ]
                    )->get();


//                    foreach($teste as $test){
//
//                        $ras_date = App\StudentAnswer::where([
//                            ['quiz_id', '=', $test->id],
//                            ['user_id', '=', $user->id],
//
//
//                        ])->get();
//
//                        $scoreI = 0;
//
//                            foreach ($ras_date as $ras_dat) {
//
//
//                                $ans = App\Answer::findOrFail($ras_dat->answer_id);
//                                 if($ans)
//                                if ($ans->corect)
//                                    $scoreI += 5;
//
//                            }
//
//                        }
                    ?>
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <th scope="row">{{$user->name}}</th>
                        <th scope="row">{{$user->email}}</th>
                        <th scope="row">{{$user->grade->name}}</th>
                        <th scope="row">{{(!empty($user->school))?$user->school->name:""}}</th>
                        <th scope="row">{{(!empty($user->prof))?$user->prof->name:""}}</th>
                        {{--<th scope="col">{{$scoreI}}</th>--}}
                        <th scope="row">{{$score}}</th>

                        <th scope="row">
                            @if($nr_ras>0)<a href="{{route('admin.teste.corecteaza', $user->id)}}"
                                           style="text-decoration: none">
                                Corectează</a>
                                @elseif($activeval != 0)
                            Neprezentat
                                @else
                                Niciun test activ pentru corectat
                                @endif
                        </th>


                    </tr>
                @endif
            @endforeach
        @endif
        </tbody>
    </table>

@endsection

@section('footer')
    <script>

        function ConfirmDialog(message) {
            var x = confirm(message);
            if (x)
                return true;
            else
                return false;
        };

    </script>
@endsection