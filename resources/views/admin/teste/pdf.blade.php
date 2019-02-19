@extends('layouts.test')


@section('content')


    {{--<div id="timer"></div>--}}
    @foreach($questions as $quest)
        <div class="panel panel-default">
            <div class="panel-heading"><b>{{$quest->intrebare}}</b>
                @if ($quest->getOriginal('path'))
                    <br> <img src="{{url($quest->path)}}" alt="Responsive image" class="img-fluid">
                @endif
            </div>
            <div class="panel-body">

                {!! Form::open(['method'=>'POST','action'=>'AdminStudentAnswerController@store']) !!}

                <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                <input type="hidden" name="question_id" value="{{$quest->id}}">

                @foreach($quest->answers as $answer)
                    <div class="form-group" style="background-color: #eeeeee;margin:10px;padding: 10px;">

                        <h3>{{ Form::radio('answer_id',$answer->id) }}</h3>
                        @if($answer->raspuns){{$answer->raspuns}}
                        @endif
                        @if ($answer->getOriginal('path'))
                            <img src="{{url($answer->path)}}" alt="Responsive image" class="img-fluid">
                        @endif
                    </div>

                @endforeach


                {!! Form::close() !!}



            </div>
        </div>
    @endforeach

@endsection
@section('scripts')

@endsection