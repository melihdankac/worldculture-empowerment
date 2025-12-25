@extends('website-template.layouts.app')

@section('meta&title')
    <title>Women’s Cooperative Noyanlar - Empowering Women in Turkey | Worldculture Empowerment e.V.</title>

    <meta name="description" content="Support the Women’s Cooperative “Noyanlar Kültür Sanat Evi” in Mardin, Turkey. This project empowers women and children through education, protection and economic independence.">

    <!-- SEO: keywords (opsiyonel) -->
    <meta name="keywords" content="women empowerment project, NGO Turkey women, women cooperative Mardin, education projects for women, Worldculture Empowerment projects">

    <!-- Open Graph -->
    <meta property="og:title" content="Women’s Cooperative Noyanlar – Empowerment Through Education">
    <meta property="og:description" content="A women-led cooperative in Mardin, Turkey empowering women and children through education, protection and economic independence. Learn how you can support this project.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('website-template/images/projects/frauenkooperative-noyanla/9.jpg') }}">
    <meta name="robots" content="index, follow">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Women’s Cooperative Noyanlar – Empowering Women">
    <meta name="twitter:description" content="Support a women-led cooperative in Turkey that strengthens women and children through education, protection and economic independence.">

    <style>
        .rev_slider_wrapper .tparrows {
            display: none !important;
        }

        .text-box p {
            text-align: justify;
            font-size: large;
            margin-bottom: 15px;
        }

        .section {
            padding: 40px 0;
        }

        .img-responsive {
            width: 100%;
            height: auto;
            display: block;
        }

        .media-grid {
            display: grid;
            gap: 12px;
            align-items: stretch;
        }

        .media-grid.grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .img-cover {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }

        .img-cover-small {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .video-cover {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .lightbox {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            padding: 20px;
        }

        .lightbox-inner {
            width: 100%;
            position: relative;
        }

        .max-1100 {
            max-width: 1100px;
            max-height: 90vh;
        }

        .max-900 {
            max-width: 900px;
        }

        .lightbox-btn {
            position: absolute;
            background: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
        }

        .lightbox-btn.close {
            right: 8px;
            top: 20px;
            font-size: 32px;
        }

        .lightbox-btn.prev {
            left: 8px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 32px;
        }

        .lightbox-btn.next {
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 32px;
        }

        .lightbox-img {
            width: 100%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 6px;
        }

        .lightbox-caption {
            color: #ddd;
            margin-top: 8px;
            text-align: center;
        }

        .lightbox-video {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 6px;
        }
    </style>
@endsection

@section('content')
    <!-- SECTION Hero Banner -->
    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/9.jpg') }}" alt=""
                        width="1920" height="882" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="1" />

                    <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="15" data-y="top" data-voffset="200"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="700">
                        <div class="slide-content-box">
                            <h1>Frauenkooperative
                                <br>„Noyanlar Kültür Sanat Evi“
                            </h1>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- !SECTION Hero Banner -->

    <!-- SECTION Content -->
    <section class="our-missions">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/1.jpg') }}"
                        class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>
                            Frauenkooperative <br> „Noyanlar Kültür Sanat Evi“ <br> Schutz, Bildung und Selbstbestimmung
                        </h2>
                    </div>
                    <div class="text-box">
                        <p>
                            Im Mittelpunkt dieses Projekts steht die Frauenkooperative <strong>„Noyanlar Kültür Sanat
                                Evi“</strong> in
                            Midyat, in der Region Mardin. Die Zusammenarbeit basiert auf einer langjährigen, engen und
                            vertrauensvollen Beziehung zwischen Selin, die seit vielen Jahren persönlich vor Ort aktiv ist,
                            und den Gründerinnen Aysel und Ayşe. Die beiden Frauen setzen sich mit außergewöhnlichem
                            Engagement und großer Hingabe für Frauen und Kinder in der Region Mardin im Südosten der Türkei
                            ein. Gerade durch Selins kontinuierliche Präsenz und Mitarbeit vor Ort ist ein tiefes
                            gegenseitiges Vertrauen gewachsen. Dieses Vertrauen ist für uns ein zentraler Wert und die
                            Grundlage unserer Arbeit – denn nur so können wir sicherstellen, dass jede Unterstützung und
                            jede Spende direkt dort ankommt, wo sie am dringendsten gebraucht wird: bei den Frauen und
                            Familien selbst.
                        </p>&nbsp;

                        <p>
                            Die Kooperative setzt sich seit vielen Jahren für Frauenrechte, Bildung und wirtschaftliche
                            Unabhängigkeit von Frauen ein. Dieses Projekt empowert Frauen und Kinder ganzheitlich, indem es
                            Schutz, Bildung und wirtschaftliche Unabhängigkeit vereint und ihnen die Kraft gibt, aus eigener
                            Stärke heraus ein selbstbestimmtes Leben zu führen und solidarische Gemeinschaften aufzubauen.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-md-6">
                    <div class="text-box">
                        <p>
                            Die Frauen, die Teil der Kooperative sind, stammen überwiegend aus besonders vulnerablen
                            Gruppen:Jesidische Frauen aus dem Irak, syrische Frauen mit Fluchterfahrung sowie kurdische
                            Frauen aus der Region. Trotz unterschiedlicher Hintergründe verbindet sie ein gemeinsames Ziel:
                            „Frauen helfen Frauen.“

                        </p>

                        <p>
                            Ein wichtiger Bestandteil des Projekts ist die wirtschaftliche Stärkung der Frauen. In der
                            Kooperative erlernen sie verschiedene Formen der Handwerkskunst, mit denen sie ein eigenes
                            Einkommen erwirtschaften können. Dadurch gewinnen sie finanzielle Eigenständigkeit und mehr
                            Entscheidungsfreiheit in ihrem Leben.
                        </p>

                        <p>
                            Darüber hinaus bietet die Kooperative ein ganzheitliches Bildungsangebot:
                        </p>

                        <ul style="font-size: large; margin-bottom: 15px;">
                            <li>
                                <strong>• Alphabetisierungs- und Bildungskurse</strong>, um grundlegende Lese- und
                                Schreibkompetenzen zu vermitteln
                            </li>

                            <li>
                                <strong>• Förderung sozialer Kompetenzen und Gemeinschaft</strong>, um gegenseitige
                                Unterstützung und Solidarität zu stärken
                            </li>

                            <li>
                                <strong>• Ein integrierter Kindergarten</strong>, in dem die Kinder der Frauen während der
                                Kurszeiten kostenlos betreut werden. Dies ermöglicht den Müttern eine aktive Teilnahme an
                                Bildungs- und Qualifizierungsmaßnahmen und unterstützt gleichzeitig die frühkindliche
                                Entwicklung der Kinder.
                            </li>
                        </ul>

                        <p>
                            Dieses Projekt zeigt eindrucksvoll, wie ganzheitliche Frauenarbeit langfristige Veränderungen
                            bewirken kann - indem Frauen geschützt, gestärkt und befähigt werden, ihr Leben selbstbestimmt
                            zu gestalten und ihre Gemeinschaft aktiv mit aufzubauen.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/2.jpg') }}"
                        class="img-responsive">
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-md-6">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/3.jpg') }}"
                        class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="text-box">
                        <h4 style="margin-bottom: 20px;">
                            <strong>
                                So helfen wir als Verein
                            </strong>
                        </h4>

                        <p>
                            Als Verein leisten wir konkrete, direkte und nachhaltige Unterstützung für Frauen und Kinder vor
                            Ort.
                            Unsere Hilfe orientiert sich an den tatsächlichen Bedürfnissen der Frauen und stärkt sie
                            langfristig in
                            ihrer Selbstständigkeit.
                        </p>

                        <p>
                            Ein zentraler Beitrag war die Anschaffung einer professionellen Nähmaschine, mit der die Frauen
                            in den
                            Kursen das Nähen erlernen. Dadurch können sie Kleidung für sich und ihre Familien herstellen und
                            ihre
                            handwerklichen Fähigkeiten nutzen, um eigene Produkte zu verkaufen und ein Einkommen zu
                            erzielen.
                            Ergänzend dazu stellen wir Stoffe, Nähmaterialien und weitere Arbeitsutensilien für die
                            Workshops zur
                            Verfügung. Darüber hinaus kaufen wir dringend benötigte Hygieneartikel für die Frauen und
                            unterstützen
                            sie bei medizinischen Problemen, indem wir den Zugang zu notwendiger medizinischer Versorgung
                            ermöglichen.
                        </p>

                        <p>
                            Darüber hinaus unterstützen wir den Kindergarten der Kooperative, indem wir Spielzeug sowie
                            Materialien
                            für den Alltag und die frühkindliche Förderung bereitstellen. So schaffen wir einen sicheren und
                            fördernden Raum für Kinder, während ihre Mütter an Kursen und Bildungsangeboten teilnehmen
                            können.
                        </p>

                        <p>
                            In akuten Notlagen helfen wir Frauen und Kindern direkt – unter anderem durch die Finanzierung
                            von
                            psychologischer Unterstützung, therapeutischen Angeboten sowie durch gezielte Bildungsförderung
                            für
                            Kinder. Unser Ansatz ist dabei stets ganzheitlich und menschenzentriert.
                        </p>

                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-sm-12">
                    <div class="text-box">
                        <p>
                            Durch unsere enge Kooperation ermöglichen wir nachhaltige Hilfe in den folgenden Bereichen:
                        </p>

                        <ul style="font-size: large; margin-bottom: 15px;">
                            <li>
                                <strong>• Bildung und Alphabetisierung</strong>
                            </li>

                            <li>
                                <strong>• Wirtschaftliche Selbstständigkeit von Frauen</strong>
                            </li>

                            <li>
                                <strong>• Gesunde Kindesentwicklung</strong>
                            </li>

                            <li>
                                <strong>• Soziales Miteinander und Solidarität</strong>
                            </li>
                        </ul>

                        <p>
                            So tragen wir dazu bei, Frauen zu empowern, Kinder zu schützen und Gemeinschaften langfristig zu
                            stärken.
                        </p>

                        <p>
                            Möchtest auch du diese Frauen empowern und ihnen Perspektiven für ein selbstbestimmtes Leben
                            eröffnen?
                        </p>

                        <p>
                            Dann werde jetzt aktiv, unterstütze unser Projekt und sei Teil einer Bewegung, die Frauen
                            stärkt,
                            schützt und Zukunft möglich macht.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-md-6">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/4.jpg') }}"
                        class="img-responsive">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/5.jpg') }}"
                        class="img-responsive">
                </div>
            </div>
        </div>
    </section>
    <!-- !SECTION Content -->

    <!-- SECTION Gallery -->
    <section id="media-gallery" class="section">
        <div class="container">
            <div class="media-grid grid-3">
                <!-- VİDEO -->
                <figure class="media-item video-item">
                    <video class="video-cover" {{-- poster="{{ asset('website-template/images/projects/dream-of-hearing/1.webp') }}" --}} controls>
                        <source src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/video1.mp4') }}"
                            type="video/mp4" />
                        Tarayıcınız video etiketini desteklemiyor.
                    </video>
                </figure>

                <!-- FOTOĞRAF -->
                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/6.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/7.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/8.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/bg_image.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/10.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/11.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/12.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/14.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/15.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/16.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/18.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/19.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/20.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>


                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/frauenkooperative-noyanla/23.jpg') }}"
                        alt="" data-caption="" class="img-cover">
                </figure>

            </div>
        </div>
    </section>
    <!-- !SECTION Gallery -->

    <!-- SECTION LIGHTBOX -->
    <div id="lightbox" class="lightbox">
        <div class="lightbox-inner">
            <button id="lb-close" class="lightbox-btn close">&times;</button>
            <button id="lb-prev" class="lightbox-btn prev">&lt;</button>
            <button id="lb-next" class="lightbox-btn next">&gt;</button>
            <div class="lightbox-content">
                <img id="lb-img" class="lightbox-img" style="display:none;">
                <video id="lb-video" class="lightbox-video" controls style="display:none;"></video>
            </div>
            <p id="lb-caption" class="lightbox-caption"></p>
        </div>
    </div>
    <!-- !SECTION LIGHTBOX -->
@endsection

@section('customScript')
    <!-- JS -->
    <script>
        (function() {
            const mediaItems = Array.from(document.querySelectorAll('.media-item'));
            let currentIndex = 0;

            const lightbox = document.getElementById('lightbox');
            const lbImg = document.getElementById('lb-img');
            const lbVideo = document.getElementById('lb-video');
            const lbCaption = document.getElementById('lb-caption');
            const lbClose = document.getElementById('lb-close');
            const lbPrev = document.getElementById('lb-prev');
            const lbNext = document.getElementById('lb-next');

            function openMedia(index) {
                const item = mediaItems[index];
                const imgEl = item.querySelector('img');
                const videoEl = item.querySelector('video, source');

                // Reset
                lbImg.style.display = 'none';
                lbVideo.style.display = 'none';
                lbImg.src = '';
                lbVideo.src = '';

                if (item.classList.contains('photo-item')) {
                    lbImg.src = imgEl.src;
                    lbImg.alt = imgEl.alt || '';
                    lbImg.style.display = 'block';
                    lbCaption.textContent = imgEl.dataset.caption || imgEl.alt || '';
                } else if (item.classList.contains('video-item')) {
                    const sourceEl = item.querySelector('source');
                    const videoUrl = sourceEl ? sourceEl.src : null;

                    if (videoUrl) {
                        lbVideo.src = videoUrl;
                        lbVideo.style.display = 'block';
                        lbCaption.textContent = 'Video';

                        // Autoplay için:
                        lbVideo.muted = true; // sessiz başlatmak gerekebilir
                        lbVideo.play().catch(err => {
                            console.log("Autoplay engellendi:", err);
                        });
                    }
                }

                lightbox.style.display = 'flex';
                document.documentElement.style.overflow = 'hidden';
                currentIndex = index;
            }

            function closeMedia() {
                lightbox.style.display = 'none';
                lbImg.src = '';
                lbVideo.src = '';
                document.documentElement.style.overflow = '';
            }

            function nextMedia() {
                currentIndex = (currentIndex + 1) % mediaItems.length;
                openMedia(currentIndex);
            }

            function prevMedia() {
                currentIndex = (currentIndex - 1 + mediaItems.length) % mediaItems.length;
                openMedia(currentIndex);
            }

            // Event bindings
            mediaItems.forEach((item, i) => {
                item.addEventListener('click', () => openMedia(i));
            });

            lbClose.addEventListener('click', closeMedia);
            lbNext.addEventListener('click', nextMedia);
            lbPrev.addEventListener('click', prevMedia);

            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') closeMedia();
                if (e.key === 'ArrowRight') nextMedia();
                if (e.key === 'ArrowLeft') prevMedia();
            });
        })();
    </script>
@endsection
