@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bine ați venit</div>

                    <div class="panel-body">
                        @if (Auth::guest())
                            <span style="text-align: center;">

                                <h4>Regulament privind organizarea şi desfăşurarea</h4>

                                <h4>CONCURSULUI DE INFORMATICĂ</h4>
                                <h4>CALCULATORUL JOC ȘI JOACĂ</h4>

                                <h4>An şcolar 2018-2019</h4>

                            </span>
                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">Argument</h5>
                            </p>
                            <p>Orice societate informatizată are nevoie de tot mai mulţi specialişti în domeniul
                                informaticii şi al tehnologiei informaţiei.
                            </p>
                            <p>Pentru educaţia din România pregătirea de performanţă a elevilor în domeniul informaticii
                                este o necesitate imperioasă. Această pregătire trebuie dublată de stimularea spiritului
                                competitiv, a activității creatoare a elevilor, de promovarea elevilor cu aptitudini
                                deosebite în domeniul tehnico-aplicativ.
                            </p>
                            <p>Deoarece utilizarea calculatorului este vitală în societatea de azi, iar mulți copiii își
                                petrec timpul în fața calculatorului, ar trebui ca aceștia să fie îndrumați spre
                                 activități ce reprezintă un stimulent educativ pentru ei.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">Prezentare generală</h5>
                            </p>
                            <p>Concursul de informatică <span
                                        style="font-weight: bold">“Calculatorul joc și joacă”</span> este o competiție
                                şcolară care se desfăşoară în conformitate cu prevederile Metodologiei-cadru de
                                organizare şi desfăşurare a competiţiilor şcolare, aprobată cu O.M. Nr. 3035/10.01.2012.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">1. Obiectivele Concursului</h5>
                            </p>
                            <p>Concursul îşi propune:
                            <ul>
                                <li>cultivarea și promovarea spiritului de competiție în domeniul tehnico-aplicativ;
                                </li>
                                <li>exersarea deprinderilor de a utiliza eficient calculatorul și diverse soft-uri;</li>
                                <li>creșterea interesului pentru crearea de aplicații informatice;</li>
                                <li>dezvoltarea competenţelor de programare ale elevilor prin crearea unei gândiri
                                    algoritmice şi prin utilizarea eficientă a tehnicii de calcul şi a mijloacelor
                                    moderne
                                    de comunicare;
                                </li>
                                <li>realizarea unor orientări școlare și profesionale a copiilor, în strânsă corelare cu
                                    cerințele actuale și de perspectivă ale economiei de piață.
                                </li>
                            </ul>
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">2. Organizarea Concursului</h5>
                            </p>
                            <p>Concursul se desfășoară pe platformă online și se organizează pe următoarele secţiuni:
                            <ol>
                                <li>Gimnaziu, care constă într-o probă practică de Programare;</li>
                                <li>Liceu–toate filierele și toate profilurile, care constă în realizarea unui proiect
                                    pe o temă dată.
                                </li>

                            </ol>
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">3. Înscrierea</h5>
                            </p>
                            <p>Înscrierea se realizează o singură dată pe platformă în perioada menționată în calendar.
                                Ulterior datei limită de înscriere nu se vor accepta nici un fel de modificări la lista
                                cu participanţi. Absența la una dintre probe atrage după sine descalificarea
                                concurentului.
                            </p>
                            <p>
                                În urma înscrierii, fiecare participant va primi un user și o parolă cu care se va loga
                                pe platformă.

                            </p>
                            <p>
                                La secțiunea gimnaziu elevii se vor putea loga în zilele de concurs în intervalul orar
                                10.00-12.00.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">4. Desfășurarea concursului</h5>
                            </p>
                            <p>La secțiunea <span style="font-weight: bold">Gimnaziu</span> proba practică constă în
                                rezolvarea a două probleme de natură algoritmică folosind aplicația Scratch.
                            </p>
                            <p>
                                Proba se va desfășura în unitatea de învățământ la o dată stabilită conform calendarului
                                concursului cu durata de 2 ore.
                            </p>
                            <p>
                                La secțiunea <span style="font-weight: bold">Liceu</span> proba constă în realizarea
                                unui proiect cu tema <span style="font-weight: bold">Promovarea concursului Calculatorul Joc și Joacă</span>.
                                Proiectul va fi trimis conform calendarului concursului.

                            </p>


                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">5. Evaluarea</h5>
                            </p>

                            <p>
                                La secțiunea Gimnaziu, fiecare problemă va fi evaluată cu câte 45 de puncte,
                                acordându-se 10 puncte din oficiu. La secțiunea <span
                                        style="font-weight: bold">Liceu</span> evaluarea se va face în funcție de
                                următoarele criterii:

                            <table>
                                <tr>
                                    <td>Creativitate și simț artistic</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Elemente de design și cromatică</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Mesaj</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Încadrarea în temă</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Complexitate</td>
                                    <td>- 20 puncte.</td>
                                </tr>
                            </table>
                            </p>


                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">6. Premierea</h5>
                            </p>
                            <p>Premierea se realizează pe fiecare secțiune în ordinea descrescătoare a punctajelor
                                obținute de participanți.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">7. Programa</h5>
                            </p>
                            <p>La secțiunea <span style="font-weight: bold">Gimnaziu</span>, rezolvările se vor realiza
                                în Scratch, iar programa este următoarea:</p>
                            <ul>
                                <li>clasa a V-a – Structura liniară și structura alternativă</li>
                                <li>clasa VI-a – Structura liniară, structura alternativă și structuri repetitive</li>
                            </ul>
                            <p>La secțiunea <span style="font-weight: bold">Liceu</span>, proiectele se vor încadra în
                                următoarea structură:</p>
                            <ul>
                                <li>clasa a IX-a – realizarea unei sigle și a unui afiș sau realizarea unei sigle și a
                                    unui pliant;
                                </li>
                                <li>clasa a X-a – realizarea unei prezentări multimedia și a unei diplome;</li>
                                <li>clasa a XI-a și a XII- a – realizarea unui site.</li>
                            </ul>
                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">8. Dispoziții finale</h5>
                            </p>
                            <p>Pe site-ul concursului, pentru fiecare secţiune, vor fi afişate: clasamentul și lista
                                premianţilor.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">9. Calendar</h5>
                            </p>
                            <ul>
                                <li>15 – 25 aprilie 2019 – selectarea elevilor participanți la nivelul fiecărei unități
                                    de învățământ
                                </li>
                                <li>06 – 10 mai 2019 – înscrierea pe platforma online și depunerea cererilor de
                                    înscriere la Inspectoratul Școlar Județean Constanța
                                </li>
                                <li>11 – 14 mai 2019 – validarea înscrierilor pe platforma online</li>
                                <li>17 – 18 mai 2019 – transmiterea proiectelor la secțiunea Liceu</li>
                                <li>18 mai 2019, între orele 10.00 – 12.00 – proba de concurs pentru secțiunea
                                    Gimnaziu
                                </li>
                                <li>27 mai 2019 – afișarea rezultatelor</li>
                            </ul>




                        @else

                            Sunteți autentificat ca {{ Auth::user()->name }}!
                            <span style="text-align: center;">

                                <h4>Regulament privind organizarea şi desfăşurarea</h4>

                                <h4>CONCURSULUI DE INFORMATICĂ</h4>
                                <h4>CALCULATORUL JOC ȘI JOACĂ</h4>

                                <h4>An şcolar 2018-2019</h4>

                            </span>
                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">Argument</h5>
                            </p>
                            <p>Orice societate informatizată are nevoie de tot mai mulţi specialişti în domeniul
                                informaticii şi al tehnologiei informaţiei.
                            </p>
                            <p>Pentru educaţia din România pregătirea de performanţă a elevilor în domeniul informaticii
                                este o necesitate imperioasă. Această pregătire trebuie dublată de stimularea spiritului
                                competitiv, a activității creatoare a elevilor, de promovarea elevilor cu aptitudini
                                deosebite în domeniul tehnico-aplicativ.
                            </p>
                            <p>Deoarece utilizarea calculatorului este vitală în societatea de azi, iar mulți copiii își
                                petrec timpul în fața calculatorului, ar trebui ca aceștia să fie îndrumați spre
                                 activități ce reprezintă un stimulent educativ pentru ei.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">Prezentare generală</h5>
                            </p>
                            <p>Concursul de informatică <span
                                        style="font-weight: bold">“Calculatorul joc și joacă”</span> este o competiție
                                şcolară care se desfăşoară în conformitate cu prevederile Metodologiei-cadru de
                                organizare şi desfăşurare a competiţiilor şcolare, aprobată cu O.M. Nr. 3035/10.01.2012.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">1. Obiectivele Concursului</h5>
                            </p>
                            <p>Concursul îşi propune:
                            <ul>
                                <li>cultivarea și promovarea spiritului de competiție în domeniul tehnico-aplicativ;
                                </li>
                                <li>exersarea deprinderilor de a utiliza eficient calculatorul și diverse soft-uri;</li>
                                <li>creșterea interesului pentru crearea de aplicații informatice;</li>
                                <li>dezvoltarea competenţelor de programare ale elevilor prin crearea unei gândiri
                                    algoritmice şi prin utilizarea eficientă a tehnicii de calcul şi a mijloacelor
                                    moderne
                                    de comunicare;
                                </li>
                                <li>realizarea unor orientări școlare și profesionale a copiilor, în strânsă corelare cu
                                    cerințele actuale și de perspectivă ale economiei de piață.
                                </li>
                            </ul>
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">2. Organizarea Concursului</h5>
                            </p>
                            <p>Concursul se desfășoară pe platformă online și se organizează pe următoarele secţiuni:
                            <ol>
                                <li>Gimnaziu, care constă într-o probă practică de Programare;</li>
                                <li>Liceu–toate filierele și toate profilurile, care constă în realizarea unui proiect
                                    pe o temă dată.
                                </li>

                            </ol>
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">3. Înscrierea</h5>
                            </p>
                            <p>Înscrierea se realizează o singură dată pe platformă în perioada menționată în calendar.
                                Ulterior datei limită de înscriere nu se vor accepta nici un fel de modificări la lista
                                cu participanţi. Absența la una dintre probe atrage după sine descalificarea
                                concurentului.
                            </p>
                            <p>
                                În urma înscrierii, fiecare participant va primi un user și o parolă cu care se va loga
                                pe platformă.

                            </p>
                            <p>
                                La secțiunea gimnaziu elevii se vor putea loga în zilele de concurs în intervalul orar
                                10.00-12.00.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">4. Desfășurarea concursului</h5>
                            </p>
                            <p>La secțiunea <span style="font-weight: bold">Gimnaziu</span> proba practică constă în
                                rezolvarea a două probleme de natură algoritmică folosind aplicația Scratch.
                            </p>
                            <p>
                                Proba se va desfășura în unitatea de învățământ la o dată stabilită conform calendarului
                                concursului cu durata de 2 ore.
                            </p>
                            <p>
                                La secțiunea <span style="font-weight: bold">Liceu</span> proba constă în realizarea
                                unui proiect cu tema <span style="font-weight: bold">Promovarea concursului Calculatorul Joc și Joacă</span>.
                                Proiectul va fi trimis conform calendarului concursului.

                            </p>


                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">5. Evaluarea</h5>
                            </p>

                            <p>
                                La secțiunea Gimnaziu, fiecare problemă va fi evaluată cu câte 45 de puncte,
                                acordându-se 10 puncte din oficiu. La secțiunea <span
                                        style="font-weight: bold">Liceu</span> evaluarea se va face în funcție de
                                următoarele criterii:

                            <table>
                                <tr>
                                    <td>Creativitate și simț artistic</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Elemente de design și cromatică</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Mesaj</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Încadrarea în temă</td>
                                    <td>-20 puncte;</td>
                                </tr>
                                <tr>
                                    <td>Complexitate</td>
                                    <td>- 20 puncte.</td>
                                </tr>
                            </table>
                            </p>


                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">6. Premierea</h5>
                            </p>
                            <p>Premierea se realizează pe fiecare secțiune în ordinea descrescătoare a punctajelor
                                obținute de participanți.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">7. Programa</h5>
                            </p>
                            <p>La secțiunea <span style="font-weight: bold">Gimnaziu</span>, rezolvările se vor realiza
                                în Scratch, iar programa este următoarea:</p>
                            <ul>
                                <li>clasa a V-a – Structura liniară și structura alternativă</li>
                                <li>clasa VI-a – Structura liniară, structura alternativă și structuri repetitive</li>
                            </ul>
                            <p>La secțiunea <span style="font-weight: bold">Liceu</span>, proiectele se vor încadra în
                                următoarea structură:</p>
                            <ul>
                                <li>clasa a IX-a – realizarea unei sigle și a unui afiș sau realizarea unei sigle și a
                                    unui pliant;
                                </li>
                                <li>clasa a X-a – realizarea unei prezentări multimedia și a unei diplome;</li>
                                <li>clasa a XI-a și a XII- a – realizarea unui site.</li>
                            </ul>
                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">8. Dispoziții finale</h5>
                            </p>
                            <p>Pe site-ul concursului, pentru fiecare secţiune, vor fi afişate: clasamentul și lista
                                premianţilor.
                            </p>

                            <p style="text-align: justify">
                            <h5 style="font-weight: bold">9. Calendar</h5>
                            </p>
                            <ul>
                                <li>15 – 25 aprilie 2019 – selectarea elevilor participanți la nivelul fiecărei unități
                                    de învățământ
                                </li>
                                <li>06 – 10 mai 2019 – înscrierea pe platforma online și depunerea cererilor de
                                    înscriere la Inspectoratul Școlar Județean Constanța
                                </li>
                                <li>11 – 14 mai 2019 – validarea înscrierilor pe platforma online</li>
                                <li>17 – 18 mai 2019 – transmiterea proiectelor la secțiunea Liceu</li>
                                <li>18 mai 2019, între orele 10.00 – 12.00 – proba de concurs pentru secțiunea
                                    Gimnaziu
                                </li>
                                <li>27 mai 2019 – afișarea rezultatelor</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
