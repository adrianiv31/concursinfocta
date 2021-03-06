@extends('layouts.test')


@section('content')



    {!! Form::open(['method'=>'POST','action'=>'AdminStudentAnswerController@storeV','files'=>true]) !!}
    <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
    @foreach($questions as $question)
        <div class="panel panel-default">
            <div class="panel-heading"{!! $question->intrebare !!}

                @if ($question->getOriginal('path'))
                    <br> <img src="{{htmlspecialchars($question->path)}}" alt="Responsive image" class="img-fluid">;
                @endif
                <?php
//                    echo $p[$i];
//                    $i++;
                ?>
            </div>
            <div class="panel-body">


                <input type="hidden" name="question_ids[]" value="{{$question->id}}">

                <div class="form-group">
                    {!! Form::label('files','Fișierul:') !!}
                    {!! Form::file('files['.$question->id.']', ['class'=>'form-control','id'=>'i_file']) !!}
                </div>
            </div>
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::submit('Încarcă', ['class'=>'btn btn-primary','id'=>'but']) !!}
    </div>

    {!! Form::close() !!}

    @if(count($errors)>0)
        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach

            </ul>


        </div>

    @endif



@endsection
@section('scripts')
    <script>
        // $('#but').hide();

        $('#i_file').on('change', function (e) {
            if (this.value != "") $('#but').show();
        });

        // // Set the date we're counting down to
        // var countDownDate = new Date("Jan 20, 2018 12:00:00").getTime();
        //
        // // Update the count down every 1 second
        // var x = setInterval(function() {
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
        //     if(minutes<11)
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

    </script>
@endsection