@extends('layouts.admin')



@section('content')
    <div class="row">
        <div class="col-sm-12">

            <h1>Editare intrebari pentru {{$test->name}}</h1>
            @if (Session::has('intreb'))
                <div class="alert alert-info">{{ Session::get('test') }}</div>
            @endif


            {!! Form::open(['method'=>'GET','action'=>['AdminTesteController@updateintrebari',$test->id]]) !!}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Inrebare</th>
                    <th scope="col">Poza</th>
                    <th scope="col">

                        {!! Form::checkbox('select_all', 'sel', false) !!}
                    </th>


                </tr>
                </thead>
                <tbody>
                @if($intrebari)
                    @php
                        $i = 0;
                    @endphp
                    @foreach($intrebari as $intrebare)
                        <tr>
                            <th scope="row">{{$intrebare->id}} - {{$i+1}}</th>
                            <td>{!! $intrebare->intrebare !!}</td>
                            <td> @if($intrebare->getOriginal('path'))
                                    <img src="{{$intrebare->path}}" alt="Responsive image" class="img-fluid"
                                         height="50">
                                @else
                                    Nu are
                                @endif
                            </td>
                            <td>
                                <div class="form-group">
                                    @if($test->questions->contains($intrebare))
                                    {!! Form::checkbox('selectate[]', $intrebare->id, true,['class'=>'intreb']) !!}
                                        @else
                                        {!! Form::checkbox('selectate[]', $intrebare->id, false,['class'=>'intreb']) !!}
                                        @endif
                                </div>
                            </td>


                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                @endif
                </tbody>
            </table>

            {{--<div class="form-group">--}}
            {{--{!! Form::label('name','Test:') !!}--}}
            {{--{!! Form::text('name', null, ['class'=>'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--{!! Form::label('section_id','Sectiunea:') !!}--}}
            {{--{!! Form::select('section_id', [''=>'Alegeți secțiunea']+$sections,null, ['class'=>'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--{!! Form::label('grade_id','Clasa:') !!}--}}
            {{--{!! Form::select('grade_id',[''=>'Alegeți clasa']+$grades, null, ['class'=>'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--{!! Form::label('time','Timp(min):') !!}--}}
            {{--{!! Form::number('time', 120, ['class'=>'form-control']) !!}--}}
            {{--</div>--}}
            {{--Alegere intrebari--}}



            {{--terminare alegere intrebari--}}

            <div class="form-group">
                {!! Form::submit('Adauga Intrebari', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}


            @include('admin.includes.form_errors')
        </div>


    </div>
@endsection

@section('scripts')

    <script>

        $('input[name=select_all]').on('change', function (e) {
if($('input[name=select_all]').is(":checked")) {
    $('.intreb').each(function(i){
       this.checked=1;
    });

}
else {
    $('.intreb').each(function(i){
        this.checked=0;
    });
}
        });
//        $('#i_file').change(function (event) {
//            var tmppath = URL.createObjectURL(event.target.files[0]);
//            $('#poza').show(100);
//            $("#poza").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
//
//            //$("#disp_tmp_path").html("Temporary Path(Copy it and try pasting it in browser address bar) --> <strong>["+tmppath+"]</strong>");
//        });
    </script>

@endsection
