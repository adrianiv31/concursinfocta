@extends('layouts.test')


@section('content')

    <?php
    $p = array(3);
    $p[0] = '<p><strong><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">Codul secret</span></strong></p>
<p style="text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">Prinţesa Illia este &icirc;nchisă &icirc;n palatul zmeului. Prinţul din poveste vrea să o elibereze dar nu ştie codul uşii &icirc;n care este &icirc;nchisă printesa. Codul se determină astfel: Zmeul &icirc;i spune un număr N de 2 cifre. Dacă numarul este impar se pune la sf&acirc;rşitul numărului cifra precedentă ultimei cifre a numărului. Dacă numărul este par se pune la &icirc;nceputul numărului cifra succesoare ultimei cifre a numărului. Se obţine astfel un număr de 3 cifre. La acest număr se adună suma primelor N numere naturale. Ajutaţi-l pe prinţ să determine codul secret.</span></p>
<p style="text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">De exemplu, pentru N=47, codul secret este 1604.</span></p>
<p style="text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">Explicaţie: numărul este impar, deci se pune la sf&acirc;rşitul lui cifra precedentă ultimei cifre a numărului, adică 6. Rezultă numărul de 3 cifre 476. Se adună suma primelor 47 de numere naturale(adică 1128) şi rezultă codul secret.</span></p>';
    $p[1] = '<p><strong><span style="font-size: 14.0pt; line-height: 115%; font-family: \'Times New Roman\';">&Icirc;n tabără</span></strong></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">&Icirc;n tabăra de la castel sunt disponibile 20 de locuri &icirc;n 4 căsuțe. Copii sunt repartizați &icirc;n căsuțe &icirc;n funcție de numărul numărul de ordine de la sosire (primul copil sosit primește numărul 1, al doilea copil sosit primește numărul 2, ș.a.m.d.)</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">Avery, personajul nostru, sosește &icirc;n sunetul pașilor pe poteca din pădure. C&acirc;nd ajunge &icirc;n fața noastră salută şi solicită numărul de sosire. &Icirc;n funcție de valoarea lui calculează &icirc;n minte la ce căsuță trebuie să ajungă și se &icirc;ndreaptă către aceasta iar c&acirc;nd ajunge la aceasta se aud aplauze. &Icirc;n caz că numărul primit nu permite cazarea &icirc;n niciuna din căsuțe emite un sunet trist și spune &rdquo;Cred că este greșit numărul!!!&rdquo;.</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">Creați o scenă animată care să permită realizarea acestui scenariu &icirc;n care veți ține cont de următoarele aspecte:</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">- Alegerea și inserarea unui decor corespunzător;</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">- Inserarea și aranjarea celor 4 căsuțe;</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">- Alegerea și inserarea sunetelor solicitate;</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">- Inserarea personajului și deplasarea lui &icirc;n perspectivă;</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.4pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">- Afişarea mesajelor corespunzătoare. </span></p>';
    $p[2] = '<p><strong><span style="font-size: 14.0pt; line-height: 115%; font-family: \'Times New Roman\';">Fluturaș &icirc;n zbor</span></strong></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">Un fluturaș zboară &icirc;ntr-o poieniță, unde găsește patru flori colorate diferit. &Icirc;nainte de a zbura spre prima floare se g&acirc;ndește timp de două secunde ce are de făcut. C&acirc;nd se așează pe prima floare, se declanșează un sunet. Fluturașul &icirc;ntreabă printr-un mesaj scris &bdquo;C&acirc;te petale are floarea?&rdquo;.</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">&nbsp;Dacă numărul de petale introdus de la tastatură este par, atunci fluturașul &icirc;și schimbă culoarea cu 10 și zboară la floarea următoare; dacă numărul de petale introdus de la tastatură este impar, atunci fluturașul &icirc;și schimbă culoarea cu -15 și zboară la floarea următoare.</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">De c&acirc;te ori fluturașul se așează pe o floare se declanșează un sunet, apoi apare &icirc;ntrebarea &bdquo;C&acirc;te petale are floarea?&rdquo;.</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">După ultima floare, fluturașul pleacă spre altă poeniță, lu&icirc;ndu-și rămas bun prin mesajul &bdquo;La revedere!&rdquo; și revine la culoarea lui inițială.</span></p>
<p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\';">Utiliz&acirc;nd mediul de programare Scratch rezolvați această poveste interactivă.</span></p>';
    $i = 0;
    ?>


    {!! Form::open(['method'=>'POST','action'=>'AdminStudentAnswerController@storeV','files'=>true]) !!}
    <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
    @foreach($questions as $question)
        <div class="panel panel-default">
            <div class="panel-heading"><h2>{{htmlspecialchars($question->intrebare)}}
                </h2>
                @if ($question->getOriginal('path'))
                    <br> <img src="{{htmlspecialchars($question->path)}}" alt="Responsive image" class="img-fluid">;
                @endif
                <?php
                    echo $p[$i];
                    $i++;
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