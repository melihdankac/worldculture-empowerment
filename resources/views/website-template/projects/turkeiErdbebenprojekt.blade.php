@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT</title>
    {{-- <meta name="description" content="Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.">
  <meta name="keywords" content=" worldculture, travels, partner, kundenbewertungen">
  <meta property="og:title" content="WORLDCULTURE TRAVELS">
  <meta property="og:description" content="{{ Str::limit("Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.", 160) }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('frontend/assets/style/images/home-page/bg-image/bg.jpg') }}"> --}}

    <style>
        .rev_slider_wrapper .tparrows {
            display: none !important;
        }

        .section {
            padding: 40px 0;
        }

        .flex-row {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 20px;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .custom-image-box {
            flex: 1 1 400px;
            max-width: 500px;
        }

        .text-box {
            flex: 2 1 400px;
            text-align: justify
        }

        .text-box p {
            font-size: large;
            margin-top: 25px;
        }

        .img-responsive {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .media-grid {
            display: grid;
            gap: 12px;
            align-items: stretch;
        }

        .media-grid.grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .media-grid.grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .img-cover {
            width: 100%;
            height: 100%;
            max-height: 600px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }
    </style>
@endsection

@section('content')
    <!-- SECTION Hero Banner -->
    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/3.jpg') }}"
                        alt="Soziale Projekte in der Türkei" width="1920" height="882" data-bgposition="top center"
                        data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" />

                    <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="15" data-y="top" data-voffset="150"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="700">
                        <div class="slide-content-box">
                            <h4>Tausende Kinder und Erdbebenopfer warten auf Hilfe!</h4>
                            <h1>Soziale Projekte in <span>der</span> Türkei</h1>
                            <p>
                                Möchten Sie die von uns in der Türkei durchgeführten Projekte direkt unterstützen ?
                            </p>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="15" data-y="top" data-voffset="350"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on" data-start="2300">
                        <div class="slide-content-box">
                            <div class="button">
                                <a class="thm-btn" href="{{ route('kontakt') }}">join with us today</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- !SECTION Hero Banner -->

    <!-- SECTION Content -->
    <div class="container">
        <section class="section">
            <h2 class="text-center">SPENDENBERICHT ERDBEBEN TÜRKEI 2023</h2>
            <div class="flex-row">
                <div class="custom-image-box">
                    <figure>
                        <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/1.jpg') }}" alt=""
                            class="img-responsive">
                    </figure>
                </div>
                <div class="text-box">
                    <p>Mit diesem Schreiben möchte ich mich bei Ihnen herzlich für die Unterstützung
                        unserer Spendenkampagne
                        „HELP US! 06.02.2023“ bedanken. Ich weiß Ihr Vertrauen sehr zu schätzen, dass Sie in meine Kampagne
                        gesteckt haben.
                        Sie haben mir dadurch die Möglichkeit gegeben, in der Türkei vor Ort den vom Erdbeben betroffenen
                        Menschen zu helfen.
                        Was mit einer kleinen Kampagne startete, entwickelte sich schnell zu etwas Großem. Es kamen bisher
                        mehr
                        als 24.000 Euro zusammen. </p>&nbsp;
                    <p>Dank Ihrer Hilfe habe ich fast 100 Familien mit Lebensmitteln, Medikamenten und
                        Sachspenden helfen können.
                        Zudem habe ich aus Deutschland sechs Kilo Medikamente in die Stadt Adana gebracht und dort der
                        „World
                        Human Relief Organisation“ übergeben.
                        Diese Organisation arbeitet in der stark betroffenen Region Hatay und hilft dort medizinisch und
                        psychologisch. </p>&nbsp;
                    <p>In Adana halfen wir Emres Familie, von dem drei Verwandte starben und die
                        Eltern mussten ihre Wohnung durch starke Beschädigungen aufgeben.
                        Von Adana aus fuhren wir weiter nach Mersin, weil es dort sicherer für uns war, da Mersin nicht als
                        Erdbebenregion eingestuft wurde.
                        Allerdings erlebten wir dort ein Nachbeben der Stärke 4.8. Das mag nicht stark klingen, aber da das
                        Epizentrum nur 7 Kilometer von uns entfernt war,
                        wackelte alles ziemlich stark, zum Glück nur sehr kurz. Der Schock war groß, zumal die Angst der
                        Menschen überall zu spüren war.</p>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="text-center">In Mersin trafen wir uns mit den Gründern des Vereins „Karaot Tohum Derneği“</h2>
            <div class="flex-row">
                <div class="text-box">
                    <p>Feray und Sinem leiten den Verein in der Region Izmir und kamen gerade aus der
                        Region Hatay.
                        Der Verein setzt sich seit zwanzig Jahren in der Türkei für nicht genmanipuliertes und ökologisch
                        angebautes Saatgut ein.
                        Sie fuhren in die Dörfer der zerstörten Region und prüften, ob es möglich ist, vor Ort Gemüse
                        einzupflanzen.
                        Bei der Aktion der beiden geht es darum, eine Versorgungskette für die stark vom Erdbeben
                        betroffenen
                        Menschen auf dem Land zu schaffen,
                        damit sie sich selbst versorgen können. Die beiden schafften es dort, über 36 Dörfer zu besuchen und
                        dort die Anzahl der Hilfebedürftigen Familien zu erfassen.
                        Die Region Hatay ist dem Erdboden gleich gemacht. Da es dort keinerlei sanitäre Möglichkeiten für
                        die
                        beiden gab, entschieden wir uns für ein Treffen in Mersin,
                        wo die Eltern meines Freundes die beiden einluden und für sie kochten. Nach gutem Essen und der
                        ersten
                        Dusche nach sechs Tagen besprachen wir mit den beiden die nächsten Schritte.
                        Bei Ihrer Idee geht es um ein langfristiges Projekt, da die Menschen nicht nur im Februar und März
                        Hilfe
                        brauchen, sie werden wahrscheinlich Monate, vermutlich sogar Jahre auf Hilfe angewiesen sein.
                        Durch das selbst angebaute Gemüse können sich die Menschen auf dem Land teilweise selbst versorgen
                        und
                        sind dadurch weniger angewiesen auf Hilfe von außen. Dadurch, dass die Pflanzen keine Hybride sind,
                        können sie ihr eigenes Saatgut Gewinnen.
                        Mit Ihren Spendengeldern habe ich dieses landwirtschaftliche Projekt unterstützt und ich werde auch
                        weiterhin mit den beiden zusammenarbeiten.
                        Beim Abschied füllten wir Sinems und Ferays Auto mit Lebensmitteln für 20 Familien, sodass diese
                        direkt
                        aus erster Hand bei den Besuchen in den Dörfern von den beiden verteilt werden konnten.</p>&nbsp;
                </div>
                <div class="custom-image-box">
                    <figure>
                        <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/2.jpg') }}" alt=""
                            class="img-responsive">
                    </figure>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="text-box">
                <p style="font-size: large;">Wir wechselten unseren Standort daraufhin nach Midyat. Die Stadt Midyat liegt
                    in der Region Mardin,
                    ca. drei Autostunden von der Erdbebenregion entfernt. Von dort kamen ca. 8.000 Menschen in die Stadt
                    Midyat.
                    Wir fuhren auch deshalb nach Midyat, weil ich seit fünf Jahren mit den Gründerinnen der
                    Frauenkooperative
                    „Noyanlar Kültür Sanat Evi“ befreundet bin und den beiden Frauen Aysel und Ayse sehr vertraue. Vertrauen
                    war mir bei meiner
                    Arbeit besonders wichtig, da ich mein Versprechen, dass alle Spenden direkt bei den bedürftigen Menschen
                    ankommen, halten wollte.
                    Ayse und Aysel sind zwei Powerfrauen, die sich ihr ganzes Leben für andere Frauen und Kinder einsetzen
                    und dabei auf ihr eigenes bewusst hintenanstellen.
                    Diese Kooperative setzt sich seit Jahren für Frauenrechte, Bildung und die Unabhängigkeit der Frauen in
                    der Region Mardin ein.
                    Durch die in dem Verein erlernte Handwerkskunst erwirtschaften die Frauen ein eigenes Einkommen. Die
                    Frauen in der Kooperative
                    kommen überwiegend aus dem Irak und sind Jesidinnen, die 2014 von dem IS in die Türkei geflohen sind.
                    Außerdem sind es syrische Frauen, die vor dem
                    Krieg in Syrien geflohen sind und hinzu kommen kurdische Frauen aus der Region. Alle zusammen verfolgen
                    das Ziel „Frauen helfen Frauen“. Nach dem Erdbeben
                    verzichteten diese Frauen auf ihre Verkäufe und schneiderten aus verschiedenen Stoffen Pullover, Hosen
                    und Pijamas die sie an Kinder und Frauen aus den Erdbebenregionen
                    spendeten. Eine jesidische Frau sagte zu mir mir: „Ich weiß, wie es ist nichts zu haben, deswegen bin
                    ich froh, wenn ich jetzt helfen kann.” Dieser Satz hat mich sehr berührt.
                    Die jesidische Frau hat ein kleines Einkommen und kommt gerade so über die Runden und trotz dessen gab
                    sie das, was sie geben konnte,
                    weil es andere gab, den es noch schlechter als ihr ging. Sie fragen sich jetzt wahrscheinlich, was
                    dieses Projekt mit dem Erdbeben zu tun hat?
                    Ich habe mit Ayse und dem Rehabilitationszentrum von Midyat mit ausgebildeten Psychologen ein Team
                    gebildet und dann besuchten wir
                    Familien aus den Erdbebenregionen in den jeweiligen Unterkünften/Wohnungen. Wir haben uns angehört, wie
                    die Situationen in den Familien ist, was sie erlebt hatten,
                    haben erste Hilfe leisten können in Form von psychologischer Betreuung, Sachspenden, Lebensmitteln und
                    haben versucht, den Menschen Kraft zu geben und dabei selber die eine oder andere Träne vergossen.
                    Das Leid ist groß und die Trauer sitzt tief, ich erlebte einige sehr traurige und für mich persönlich
                    schwere Momente. Ich hatte weinende Menschen im Arm,
                    die über 20 Familienmitglieder verloren hatten, ein sechsjähriges Kind, welches seine Eltern,
                    Geschwister und noch weitere Verwandte verloren hatte, einen Mann,
                    der mir erzählte, dass seine schwangere Frau in seinen Armen verblutet und starb, Kinder, die ihre
                    Schulfreunde verloren hatten, Mütter, die Ihre Brüder beerdigten,
                    eine Mutter, die sechs ihrer Kinder beerdigt hatte, das Leid ist grenzenlos… Die Frauen aus den
                    Erdbebenregionen unterstützen wir zusätzlich in der Frauenkooperative,
                    wodurch sie Anschluss an das soziale Leben finden und sich in verschiedenen Kursen weiterbilden können.
                </p>
            </div>
        </section>

        <section class="section">
            <div class="flex-row">
                <div class="custom-image-box">
                    <figure>
                        <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/3.jpg') }}" alt=""
                            class="img-responsive">
                    </figure>
                </div>
                <div class="text-box">
                    <p>In der Frauenkooperative gibt es Kurse, die Handarbeit fördern aber auch
                        Alphabetisierungskurse und zusätzlich einen Kindergarten,
                        in dem die Frauen während sie in den Kursen sind, ihre Kinder kostenlos unterbringen können. Mit
                        dieser
                        Kooperation und der Hilfe,
                        die wir dort leisteten und weiterhin leisten, helfen wir den Frauen und Kindern in den
                        Themenbereichen
                        Bildung, Selbständigkeit gegenüber ihren Männern,
                        Kindesentwicklung, soziales Miteinander und landwirtschaftlicher Anbau. Ich habe zusammen mit dem
                        Verein
                        “Karaot Tohum Derneği” ca. 700 Pflanzen zu der Kooperative geschickt.
                        Die Frauen brachten die Saatpflanzen im Garten der Kooperative aus, wir verteilten weitere Pflanzen
                        an
                        Frauen aus den Erbebenregionen und an Frauen,
                        die aus dem Irak und aus Syrien geflüchtet sind und in der Kooperative arbeiten. Dadurch schafften
                        wir
                        einen Mehrwert für alle Frauen zusammen. </p>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="media-grid grid-3">
                <figure><img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/4.jpg') }}" alt=""
                        class="img-cover"></figure>
                <figure><img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/5.png') }}" alt=""
                        class="img-cover"></figure>
                <figure><img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/6.png') }}" alt=""
                        class="img-cover"></figure>
            </div>
        </section>

        <section class="section">
            <div class="flex-row">
                <div class="text-box">
                    <p>Ein Herzensprojekt, was ich zusätzlich mit Ayse zusammen ins Leben gerufen
                        habe,
                        ist die Unterstützung von 20 Kindern in Midyat. In Form eines Schulstipendiums werde ich 20 Kinder
                        zuerst einmal zwei Jahre rund um das
                        Thema Bildung unterstützen. Es gibt tausende Kinder in der Erdbebenregionen die Hilfe brauchen,
                        jedoch
                        reichen die Kapazitäten nicht,
                        um all das Leid vor Ort zu bekämpfen. Deshalb habe ich mich dafür entschieden, diese 20 Kinder
                        intensiv
                        zu unterstützen und zu begleiten.
                        Ich werde durch Ihre Spenden diese Kinder unterstützen, damit sie ihren Träumen für die Zukunft
                        näherkommen können. Auch haben wir einem
                        16-jährigen Jungen einen Rollstuhl kaufen können, den er dringend gebraucht hat, da er seinen
                        eigenen im
                        Erdbeben verloren hatte. </p>
                </div>
                <div class="custom-image-box">
                    <figure>
                        <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/7.png') }}" alt=""
                            class="img-responsive">
                    </figure>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="flex-row">
                <div class="custom-image-box">
                    <figure>
                        <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/8.jpg') }}" alt=""
                            class="img-responsive">
                    </figure>
                </div>
                <div class="text-box">
                    <p>Einige der Menschen, die gespendet haben, fragten auch, ob es möglich sei,
                        herrenlosen Tieren aus den Erdbebenregionen zu helfen. Daraufhin habe ich das Projekt Barinak Meleği
                        unterstützt.
                        Türkan, eine 27 Jahre alte Tierärztin und bekannte Tierschutzaktivistin in der Türkei, hat seit dem
                        Erdbeben auf ihrer Farm in
                        Marmaris 54 Tiere aus den Erdbebenregionen bei sich aufgenommen. Ihr Hauptziel ist es, ein dauerhaft
                        sicheres Zuhause für diese Hunde und
                        Katzen zu finden. Zurzeit organisiert Türkan die Adoptierung dieser Tiere in das Ausland vor allem
                        nach
                        Europa und Kanada. Im Mai habe ich
                        Türkan in Marmaris besucht und die Tiere kennengelernt. Ich war mit einer Gruppe von Freunden aus
                        Deutschland dort, gemeinsam haben wir zwei
                        Hunde aus der Erdbebenregion Adiyaman nach Deutschland gebracht und dort für beide ein wunderschönes
                        neues Zuhause gefunden. Nun organisieren wir
                        die Vermittlung von weiteren Hunden und Katzen nach Deutschland. Wenn Sie in Zukunft Interesse an
                        einem
                        Hund oder einer Katze haben, bitte geben
                        Sie mir Bescheid, eine Freundin von mir und ich helfen Türkan bei der Vermittlung der Tiere an ihre
                        neuen Besitzer.</p>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="media-grid grid-2">
                <figure><img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/9.png') }}" alt=""
                        class="img-cover"></figure>
                <figure><img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/10.png') }}"
                        alt="" class="img-cover"></figure>
            </div>
        </section>

        <section class="section text-box">
            <p>Ich habe mich entschlossen, diese Projekte zwei Jahre weiterzuführen.
                Im Juli fliege ich in den Südosten der Türkei und besuche die Frauenkooperative und die Kinder.
                Auf meinem Instagram Kanal – worldculture_travels werde ich weiterhin über die Projekte informieren.
                Auch sammele ich weiterhin Spenden für die Projekte vor Ort und freue mich, wenn Sie mich die kommenden
                Jahre weiterhin begleiten,
                sodass ich die Projekte fortführen kann. Die Projekte sind handfest und ihre Spende geht nicht in eine
                anonyme Organisation.
                Es ist möglich, die Frauenkooperative und den Verein Karaot Tohum Dernegi zu besuchen und zu begleiten,
                lassen Sie es mich wissen,
                wenn Sie in der Zukunft planen in die Türkei zu reisen.Wir können nicht das Leid der Welt verhindern,
                aber wir können daran arbeiten,
                es zusammen zu mindern. </p>
        </section>

        <section class="section text-box">
            <p>Mit freundlichen Grüßen</p>
            <p>Selin Schäfer</p>
            <p>Stand 27.06.2023</p>
        </section>

    </div>
    <!-- !SECTION Content -->
@endsection

@section('customScript')
@endsection
