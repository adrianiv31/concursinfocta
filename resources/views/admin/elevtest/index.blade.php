@extends('layouts.admin')


@section('content')

    <h1>Concurs</h1>
    <h2 style="color:red">
        {{--pentru teste grila--}}
        {{--ATENTIE!!!<br>--}}
        {{--Intrebările vor aparea cate una pe pagina<br>--}}
        {{--Dupa ce ati raspuns la o intrebare si ati trecut la alta, nu veți mai putea să vă întorceți la întrebarea anterioară.<br>--}}
        {{--Cronometrul de pe pagină are caracter informativ. La ora 12:00 se va încheia concursul.<br/>--}}
        {{--Data si ora calculatorului dumneavoastra trebuie sa fie setată corect.--}}
        {{--pentru proiect--}}
        ATENTIE!!! <br>
        Fișierele încărcate vor fi sub formă de arhivă (.zip sau .rar)
    </h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Test</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @if($quiz)
            @foreach($quiz as $test)
                <tr>
                    <th scope="row">{{$test->id}}</th>
                    <td>{{$test->name}}</td>
                    <td>
                        @if($test->grade_id == 1 || $test->grade_id == 2)
                            <a href="/incepe-test-proiectV/{{$test->id}}">Incepe testul</a>
                        @else
                            <a href="/incepe-test-proiect/{{$test->id}}">Incepe testul</a>
                        @endif
                    </td>

                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
