@extends('layouts.admin')


@section('content')

    <h1>Rezultate elevi</h1>

    <table class="table table-striped">
        <thead>
        <tr>

            <th scope="col">Nume</th>
            <th scope="col">Scoala</th>
            <th scope="col">Indrumator</th>
            <th scope="col">Rezultat Proba I</th>
            <th scope="col">Rezultat Proba II</th>
            <th scope="col">Total</th>

        </tr>
        </thead>
        <tbody>
        @if($rezults)
            @foreach($rezults as $rezult)
                <tr>

                    <th scope="row">{{$rezult['nume']}}</th>
                    <th scope="row">{{$rezult['scoala']}}</th>
                    <th scope="row">{{$rezult['indrumator']}}</th>
                    <th scope="row">{{$rezult['scorI']}}</th>
                    <th scope="row">{{$rezult['scorII']}}</th>
                    <th scope="row">{{$rezult['total']}}</th>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>



@endsection

@section('footer')
    {{--<script>--}}
        {{--$('select[name=section_id]').on('change', function (e) {--}}
            {{--//console.log(e);--}}
            {{--var section_id = e.target.value;--}}
            {{--if (section_id == 0) {--}}
                {{--$('select[name=grade_id]').empty();--}}
                {{--$('select[name=grade_id]').append('<option value="">Mai întâi alegeți secțiunea</option>');--}}
            {{--}--}}
            {{--else {--}}

                {{--$.get('/ajax-grades?section_id=' + section_id, function (data) {--}}

                    {{--$('select[name=grade_id]').empty();--}}
                    {{--$('select[name=grade_id]').append('<option value="">Alegeți clasa</option>');--}}
                    {{--$.each(data, function (index, locObj) {--}}

                        {{--$('select[name=grade_id]').append('<option value="' + locObj.id + '">' + locObj.name + '</option>');--}}

                    {{--});--}}

                {{--});--}}
            {{--}--}}


        {{--});--}}

        {{--$('select[name=grade_id]').on('change', function (e) {--}}
            {{--//console.log(e);--}}
            {{--var grade_id = e.target.value;--}}
            {{--var section_id =  $('select[name=section_id]').val();--}}
            {{--if (section_id == 0) {--}}
                {{--$('.rezultate').empty();--}}
                {{--$('.rezultate').append('E gol');--}}
            {{--}--}}
            {{--else {--}}
{{--//alert('/ajax-rezultate?section_id=' + section_id+'&grade_id=' +grade_id);--}}
                {{--$.get('/ajax-rezultate?section_id=' + section_id+'&grade_id=' +grade_id, function (data) {--}}

                    {{--$('.rezultate').empty();--}}
                    {{--$str='<table><thead><tr><td>Nume</td><td>Școala</td><td>Profesor Indrumător</td><td>Rezultat proba I</td><td>Rezultat proba II</td><td>Punctaj Total</td></tr></thead><tbody>';--}}
                    {{--$.each(data, function (index, locObj) {--}}

                        {{--$str+='<tr><td>'+locObj.nume + '</td><td>' + locObj.scoala+ '</td><td>' + locObj.indrumator+ '</td><td>' + locObj.scorI+ '</td><td>' + locObj.scorII+ '</td><td>' + locObj.total + '</td></tr>';--}}

                    {{--});--}}
                    {{--$str += '</tbody></table>';--}}
                    {{--$('.rezultate').append($str);--}}
                    {{--$('textarea[name=rezultateHTML]').val($str);--}}
                {{--});--}}
            {{--}--}}


        {{--});--}}
    {{--</script>--}}

@endsection