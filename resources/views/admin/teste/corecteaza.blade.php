@extends('layouts.test')


@section('content')
    <div class="container">
        <h2 class="text-center">
            @if($user->isElev())CLASA a {{$user->grade->name}}-a @endif</h2>
        <h4>Elev: {{$user->name}}</h4>
        {{--@include('admin.includes.form_test_errors')--}}

        {!! Form::open(['method'=>'POST','action'=>'AdminTesteController@storeScore']) !!}
        <input type="hidden"
               name="quiz_id"
               value="{{$quiz->id}}"/>
        <input type="hidden"
               name="user_id"
               value="{{$user->id}}"/>




                @php
                    $i = 1;
                    $pct2 = 0;
                @endphp

                @foreach($questions as $question)
                    @if($question->type == 5)
                        <div class="well well-sm">
                            <h4 class="text-primary">{{$i}}. {!! $question->intrebare !!}
                                <input type="hidden"
                                       name="s2[]"
                                       value="{{$question->id}}"/>
                                <?php
                                // $studentanswer = $studentanswers->where('question_id', $question->id)->first();
                                $ans = "";
                                $points = 0;
                                foreach ($studentanswers as $studentanswer) {
                                    if ($studentanswer->question_id == $question->id) {
                                        $ans = $studentanswer->answer;
                                        $points = $studentanswer->points;
                                        $pct2 += $points;
                                    }
                                }
                                if($ans != ""){
                                //  $pct2 += $question->pivot->points;
                                $string = str_replace(' ', '', $user->email); // Replaces all spaces with hyphens.
                                $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
                                $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                                $pathE = '/userprojects/'.$string . "/" . $ans;
                                ?>
                                <h4><span class="text-danger"><a class="text-danger" href="{{$pathE}}">{{$ans}}</a></span></h4>

                                <input type="text" class="form-control" id="ii<?=$i?>"
                                       name="rasII[{{$question->id}}]"
                                       style="width:150px; display:inline" value="{{$points}}"
                                       onkeyup="salveaza(2,{{$quiz->id}},{{$question->id}},this,{{$user->id}})">

                                {{--<span class="text-warning">{{$question->pivot->points}} puncte</span>--}}
                            </h4>
                            <?php
                            }else echo '<span class="text-warning">Nu a răspuns</span>';
                            ?>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach
                <div class="well well-sm">
                    <h4 class="text-primary">
                        <span class="text-warning">Total {{$pct2}} puncte</span></h4>

                </div>



        {!! Form::submit('Finalizează test', ['class'=>'btn btn-primary','id'=>'but']) !!}
        {!! Form::close() !!}

    </div>

@endsection
@section('scripts')
    <script>
        //   $('#but').hide();
        //
        // $('input[name=answer_id]').on('change', function (e) {
        //     $('input:radio:checked').each(function () {
        //         $('#but').show(100);
        //     });
        // });

        // Set the date we're counting down to
        // var countDownDate = new Date("Jan 20, 2018 12:00:00").getTime();
        //
        // // Update the count down every 1 second
        // var x = setInterval(function () {
        //
        //     // Get todays date and time
        //     var now = new Date().getTime();
        //
        //     // Find the distance between now an the count down date
        //     var distance = countDownDate - now;
        //
        //     // Time calculations for days, hours, minutes and seconds
        //     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        //
        //     // Display the result in the element with id="demo"
        //     if (minutes < 11)
        //         document.getElementById("timer").innerHTML = "<h5 style='color:red'>Timp ramas: " + hours + "h "
        //             + minutes + "m " + seconds + "s </h5>";
        //     else
        //         document.getElementById("timer").innerHTML = "<h5>Timp ramas: " + hours + "h "
        //             + minutes + "m " + seconds + "s </h5>";
        //     // If the count down is finished, write some text
        //     if (distance < 0) {
        //         clearInterval(x);
        //         window.location.replace('/elev-test');
        //         //document.getElementById("timer").innerHTML = "EXpired";
        //     }
        // }, 1000);

        function salveaza(tip, v1, v2, v3, v4, v5) {

            if (tip == 2) {
                quiz_id = v1;
                question_id = v2;
                answer = v3.value;
                user_id = v4;
                $.get('/ajax-saveE2?quiz_id=' + quiz_id + '&question_id=' + question_id + '&answer=' + answer + '&user_id=' + user_id, function (data) {
                    //alert(data);
                    // if (data == 0)
                    //     window.location.replace('/elev-test');
                    location.reload();
                });
            }
            // else if (tip == 3) {
            //     quiz_id = v1;
            //     question_id = v2;
            //     subQ_id = v3;
            //     answer = v4.value;
            //     user_id = v5;
            //     $.get('/ajax-saveE3?quiz_id=' + quiz_id + '&question_id=' + question_id + '&subQ_id=' + subQ_id + '&answer=' + answer + '&user_id=' + user_id, function (data) {
            //         // if (data == 0)
            //         //     window.location.replace('/elev-test');
            //     });
            // }

        }
    </script>
@endsection