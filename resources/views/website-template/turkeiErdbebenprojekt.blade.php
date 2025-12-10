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
@endsection

@section('content')
    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/3.jpg') }}" alt=""
                        width="1920" height="882" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat"
                        data-bgparallax="1">


                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="center" data-voffset="-70"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="500">
                        <div class="slide-content-box center">
                            <h1>Soziale Projekte in <span>der</span> Türkei</h1>
                            <h2 style="color: white;">Worldculture Travels</h2>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="80"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on" data-start="1500">
                        <div class="slide-content-box">
                            <div class="button">
                                <a class="thm-btn" href="contact.html">Kontaktiere uns</a>
                            </div>
                        </div>
                    </div>

                </li>


            </ul>
        </div>
    </section>

    <section style="padding:40px 0;">
        <h2 class="text-center">SPENDENBERICHT ERDBEBEN TÜRKEI 2023</h2>&nbsp;
        <div style="max-width:1200px; margin:0 auto; display:flex; gap:20px; align-items:flex-start; flex-wrap:wrap;">
            <div style="flex:1 1 400px; max-width:500px;">
                <figure>
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/1.jpg') }}" alt=""
                        style="width:100%; height:auto; border-radius:8px; object-fit:cover;">
                </figure>
            </div>
            <div style="flex:2 1 400px;">
                <p style="font-size: large;">Mit diesem Schreiben möchte ich mich bei Ihnen herzlich für die Unterstützung
                    unserer Spendenkampagne
                    „HELP US! 06.02.2023“ bedanken. Ich weiß Ihr Vertrauen sehr zu schätzen, dass Sie in meine Kampagne
                    gesteckt haben.
                    Sie haben mir dadurch die Möglichkeit gegeben, in der Türkei vor Ort den vom Erdbeben betroffenen
                    Menschen zu helfen.
                    Was mit einer kleinen Kampagne startete, entwickelte sich schnell zu etwas Großem. Es kamen bisher mehr
                    als 24.000 Euro zusammen. </p>&nbsp;
                <p style="font-size: large;">Dank Ihrer Hilfe habe ich fast 100 Familien mit Lebensmitteln, Medikamenten und
                    Sachspenden helfen können.
                    Zudem habe ich aus Deutschland sechs Kilo Medikamente in die Stadt Adana gebracht und dort der „World
                    Human Relief Organisation“ übergeben.
                    Diese Organisation arbeitet in der stark betroffenen Region Hatay und hilft dort medizinisch und
                    psychologisch. </p>&nbsp;
                <p style="font-size: large;">In Adana halfen wir Emres Familie, von dem drei Verwandte starben und die
                    Eltern mussten ihre Wohnung durch starke Beschädigungen aufgeben.
                    Von Adana aus fuhren wir weiter nach Mersin, weil es dort sicherer für uns war, da Mersin nicht als
                    Erdbebenregion eingestuft wurde.
                    Allerdings erlebten wir dort ein Nachbeben der Stärke 4.8. Das mag nicht stark klingen, aber da das
                    Epizentrum nur 7 Kilometer von uns entfernt war,
                    wackelte alles ziemlich stark, zum Glück nur sehr kurz. Der Schock war groß, zumal die Angst der
                    Menschen überall zu spüren war. </p>
            </div>

        </div>
    </section>

    <section style="padding:40px 0;">
        <h2 class="text-center"> In Mersin trafen wir uns mit den Gründern des Vereins „Karaot Tohum Derneği“</h2>&nbsp;
        <div style="max-width:1200px; margin:0 auto; display:flex; gap:20px; align-items:flex-start; flex-wrap:wrap;">
            <div style="flex:2 1 400px;">
                <p style="font-size: large;">Feray und Sinem leiten den Verein in der Region Izmir und kamen gerade aus der
                    Region Hatay.
                    Der Verein setzt sich seit zwanzig Jahren in der Türkei für nicht genmanipuliertes und ökologisch
                    angebautes Saatgut ein.
                    Sie fuhren in die Dörfer der zerstörten Region und prüften, ob es möglich ist, vor Ort Gemüse
                    einzupflanzen.
                    Bei der Aktion der beiden geht es darum, eine Versorgungskette für die stark vom Erdbeben betroffenen
                    Menschen auf dem Land zu schaffen,
                    damit sie sich selbst versorgen können. Die beiden schafften es dort, über 36 Dörfer zu besuchen und
                    dort die Anzahl der Hilfebedürftigen Familien zu erfassen.
                    Die Region Hatay ist dem Erdboden gleich gemacht. Da es dort keinerlei sanitäre Möglichkeiten für die
                    beiden gab, entschieden wir uns für ein Treffen in Mersin,
                    wo die Eltern meines Freundes die beiden einluden und für sie kochten. Nach gutem Essen und der ersten
                    Dusche nach sechs Tagen besprachen wir mit den beiden die nächsten Schritte.
                    Bei Ihrer Idee geht es um ein langfristiges Projekt, da die Menschen nicht nur im Februar und März Hilfe
                    brauchen, sie werden wahrscheinlich Monate, vermutlich sogar Jahre auf Hilfe angewiesen sein.
                    Durch das selbst angebaute Gemüse können sich die Menschen auf dem Land teilweise selbst versorgen und
                    sind dadurch weniger angewiesen auf Hilfe von außen. Dadurch, dass die Pflanzen keine Hybride sind,
                    können sie ihr eigenes Saatgut Gewinnen.
                    Mit Ihren Spendengeldern habe ich dieses landwirtschaftliche Projekt unterstützt und ich werde auch
                    weiterhin mit den beiden zusammenarbeiten.
                    Beim Abschied füllten wir Sinems und Ferays Auto mit Lebensmitteln für 20 Familien, sodass diese direkt
                    aus erster Hand bei den Besuchen in den Dörfern von den beiden verteilt werden konnten.</p>&nbsp;
            </div>
            <div style="flex:1 1 400px; max-width:500px;">
                <figure>
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/2.jpg') }}" alt=""
                        style="width:100%; height:auto; border-radius:8px; object-fit:cover;">
                </figure>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="">
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
                </p>&nbsp;
            </div>
        </div>
    </section>

    <section style="padding:40px 0;">
        <div style="max-width:1200px; margin:0 auto; display:flex; gap:20px; align-items:flex-start; flex-wrap:wrap;">
            <div style="flex:1 1 400px; max-width:500px;">
                <figure>
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/3.jpg') }}" alt=""
                        style="width:100%; height:auto; border-radius:8px; object-fit:cover;">
                </figure>
            </div>
            <div style="flex:2 1 400px;">
                <p style="font-size: large;">In der Frauenkooperative gibt es Kurse, die Handarbeit fördern aber auch
                    Alphabetisierungskurse und zusätzlich einen Kindergarten,
                    in dem die Frauen während sie in den Kursen sind, ihre Kinder kostenlos unterbringen können. Mit dieser
                    Kooperation und der Hilfe,
                    die wir dort leisteten und weiterhin leisten, helfen wir den Frauen und Kindern in den Themenbereichen
                    Bildung, Selbständigkeit gegenüber ihren Männern,
                    Kindesentwicklung, soziales Miteinander und landwirtschaftlicher Anbau. Ich habe zusammen mit dem Verein
                    “Karaot Tohum Derneği” ca. 700 Pflanzen zu der Kooperative geschickt.
                    Die Frauen brachten die Saatpflanzen im Garten der Kooperative aus, wir verteilten weitere Pflanzen an
                    Frauen aus den Erbebenregionen und an Frauen,
                    die aus dem Irak und aus Syrien geflüchtet sind und in der Kooperative arbeiten. Dadurch schafften wir
                    einen Mehrwert für alle Frauen zusammen. </p>&nbsp;
            </div>
        </div>
    </section>

    <section id="media-gallery" style="padding:40px 0;">
        <div class="container">
            <!-- GRID -->
            <div class="media-grid"
                style="
         display:grid;
         grid-template-columns: repeat(3, 1fr);
         gap:12px;
         align-items:stretch;">
                <!-- FOTOĞRAFLAR -->
                <figure class="media-item photo-item" style="margin:0; overflow:hidden; border-radius:8px; cursor:pointer;">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/4.jpg') }}" alt=""
                        data-caption="" style="width:100%; height:400px; object-fit:cover; display:block;">
                </figure>

                <figure class="media-item photo-item" style="margin:0; overflow:hidden; border-radius:8px; cursor:pointer;">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/5.png') }}" alt=""
                        data-caption="" style="width:100%; height:400px; object-fit:cover; display:block;">
                </figure>

                <figure class="media-item photo-item" style="margin:0; overflow:hidden; border-radius:8px; cursor:pointer;">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/6.png') }}" alt=""
                        data-caption="" style="width:100%; height:400px; object-fit:cover; display:block;">
                </figure>
            </div>
        </div>
    </section>

    <section style="padding:40px 0;">
        <div style="max-width:1200px; margin:0 auto; display:flex; gap:20px; align-items:flex-start; flex-wrap:wrap;">
            <div style="flex:2 1 400px;">
                <p style="font-size: large;">Ein Herzensprojekt, was ich zusätzlich mit Ayse zusammen ins Leben gerufen
                    habe,
                    ist die Unterstützung von 20 Kindern in Midyat. In Form eines Schulstipendiums werde ich 20 Kinder
                    zuerst einmal zwei Jahre rund um das
                    Thema Bildung unterstützen. Es gibt tausende Kinder in der Erdbebenregionen die Hilfe brauchen, jedoch
                    reichen die Kapazitäten nicht,
                    um all das Leid vor Ort zu bekämpfen. Deshalb habe ich mich dafür entschieden, diese 20 Kinder intensiv
                    zu unterstützen und zu begleiten.
                    Ich werde durch Ihre Spenden diese Kinder unterstützen, damit sie ihren Träumen für die Zukunft
                    näherkommen können. Auch haben wir einem
                    16-jährigen Jungen einen Rollstuhl kaufen können, den er dringend gebraucht hat, da er seinen eigenen im
                    Erdbeben verloren hatte. </p>&nbsp;
            </div>
            <div style="flex:1 1 400px; max-width:500px;">
                <figure>
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/7.png') }}" alt=""
                        style="width:100%; height:auto; border-radius:8px; object-fit:cover;">
                </figure>
            </div>
        </div>
    </section>

    <section style="padding:40px 0;">
        <div style="max-width:1200px; margin:0 auto; display:flex; gap:20px; align-items:flex-start; flex-wrap:wrap;">
            <div style="flex:1 1 400px; max-width:500px;">
                <figure>
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/8.jpg') }}" alt=""
                        style="width:100%; height:auto; border-radius:8px; object-fit:cover;">
                </figure>
            </div>
            <div style="flex:2 1 400px;">
                <p style="font-size: large;">Einige der Menschen, die gespendet haben, fragten auch, ob es möglich sei,
                    herrenlosen Tieren aus den Erdbebenregionen zu helfen. Daraufhin habe ich das Projekt Barinak Meleği
                    unterstützt.
                    Türkan, eine 27 Jahre alte Tierärztin und bekannte Tierschutzaktivistin in der Türkei, hat seit dem
                    Erdbeben auf ihrer Farm in
                    Marmaris 54 Tiere aus den Erdbebenregionen bei sich aufgenommen. Ihr Hauptziel ist es, ein dauerhaft
                    sicheres Zuhause für diese Hunde und
                    Katzen zu finden. Zurzeit organisiert Türkan die Adoptierung dieser Tiere in das Ausland vor allem nach
                    Europa und Kanada. Im Mai habe ich
                    Türkan in Marmaris besucht und die Tiere kennengelernt. Ich war mit einer Gruppe von Freunden aus
                    Deutschland dort, gemeinsam haben wir zwei
                    Hunde aus der Erdbebenregion Adiyaman nach Deutschland gebracht und dort für beide ein wunderschönes
                    neues Zuhause gefunden. Nun organisieren wir
                    die Vermittlung von weiteren Hunden und Katzen nach Deutschland. Wenn Sie in Zukunft Interesse an einem
                    Hund oder einer Katze haben, bitte geben
                    Sie mir Bescheid, eine Freundin von mir und ich helfen Türkan bei der Vermittlung der Tiere an ihre
                    neuen Besitzer.</p>&nbsp;
            </div>
        </div>
    </section>

    <section id="media-gallery" style="padding:40px 0;">
        <div class="container">
            <!-- GRID -->
            <div class="media-grid"
                style="
         display:grid;
         grid-template-columns: repeat(2, 1fr);
         gap:12px;
         align-items:stretch;">
                <!-- FOTOĞRAFLAR -->
                <figure class="media-item photo-item"
                    style="margin:0; overflow:hidden; border-radius:8px; cursor:pointer;">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/9.png') }}" alt=""
                        data-caption="" style="width:100%; height:600px; object-fit:cover; display:block;">
                </figure>

                <figure class="media-item photo-item"
                    style="margin:0; overflow:hidden; border-radius:8px; cursor:pointer;">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/10.png') }}" alt=""
                        data-caption="" style="width:100%; height:600px; object-fit:cover; display:block;">
                </figure>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="">
                <p style="font-size: large;">Ich habe mich entschlossen, diese Projekte zwei Jahre weiterzuführen.
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
                    es zusammen zu mindern. </p>&nbsp;
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="">
                <p style="font-size: large;">Mit freundlichen Grüßen</p>&nbsp;
                <p style="font-size: large;">Selin Schäfer</p>&nbsp;
                <p style="font-size: large;">Stand 27.06.2023</p>&nbsp;
            </div>
        </div>
    </section>
@endsection

@section('customScript')
    <!-- JS -->
    {{-- <script>
        (function() {
            const mediaItems = document.querySelectorAll('.media-item');

            // FOTOĞRAF LIGHTBOX
            const plb = document.getElementById('photo-lightbox');
            const plbImg = document.getElementById('plb-img');
            const plbCaption = document.getElementById('plb-caption');
            const plbClose = document.getElementById('plb-close');
            const plbPrev = document.getElementById('plb-prev');
            const plbNext = document.getElementById('plb-next');

            let photoItems = Array.from(document.querySelectorAll('.photo-item img'));
            let currentIndex = 0;

            function openPhoto(index) {
                const img = photoItems[index];
                plbImg.src = img.src;
                plbImg.alt = img.alt || '';
                plbCaption.textContent = img.dataset.caption || img.alt || '';
                plb.style.display = 'flex';
                document.documentElement.style.overflow = 'hidden';
                currentIndex = index;
            }

            function closePhoto() {
                plb.style.display = 'none';
                plbImg.src = '';
                document.documentElement.style.overflow = '';
            }

            function nextPhoto() {
                currentIndex = (currentIndex + 1) % photoItems.length;
                openPhoto(currentIndex);
            }

            function prevPhoto() {
                currentIndex = (currentIndex - 1 + photoItems.length) % photoItems.length;
                openPhoto(currentIndex);
            }

            plbClose.addEventListener('click', closePhoto);
            plbNext.addEventListener('click', nextPhoto);
            plbPrev.addEventListener('click', prevPhoto);

            // VİDEO LIGHTBOX
            const vlb = document.getElementById('video-lightbox');
            const vlbVideo = document.getElementById('vlb-video');
            const vlbClose = document.getElementById('vlb-close');

            function openVideo(url) {
                vlbVideo.src = url;
                vlb.style.display = 'flex';
                document.documentElement.style.overflow = 'hidden';
            }

            function closeVideo() {
                vlb.style.display = 'none';
                vlbVideo.src = '';
                document.documentElement.style.overflow = '';
            }

            vlbClose.addEventListener('click', closeVideo);

            mediaItems.forEach((item, index) => {
                if (item.classList.contains('photo-item')) {
                    item.addEventListener('click', () => openPhoto(photoItems.indexOf(item.querySelector(
                        'img'))));
                } else if (item.classList.contains('video-item')) {
                    item.addEventListener('click', () => {
                        const videoUrl = item.querySelector('img').dataset.video;
                        openVideo(videoUrl);
                    });
                }
            });

            // LIGHTBOX ESC KAPATMA
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closePhoto();
                    closeVideo();
                }
                if (e.key === 'ArrowRight') nextPhoto();
                if (e.key === 'ArrowLeft') prevPhoto();
            });
        })();
    </script> --}}
@endsection
