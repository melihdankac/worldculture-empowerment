@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT</title>

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
            z-index: 99999;
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
            background-color: #fff;
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
                    <img src="{{ asset('website-template/images/projects/patenschaft/banner/banner.jpg') }}"
                        alt="Patenschaftsprogramm" width="1920" height="882" data-bgposition="top center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="1" />

                    <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="15" data-y="top" data-voffset="150"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="700">
                        <div class="slide-content-box">
                            <h2 style="color: #fff;">Patenschaftsprogramm</h2>
                            <h1> Bildung mit <span>persönlicher Verbindung </span> </h1>
                            <p>
                                Möchtest du Patin oder Pate werden und ein Kind direkt in seiner Bildung unterstützen?
                            </p>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="15" data-y="top" data-voffset="350"
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
    <section class="our-missions">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('website-template/images/projects/patenschaft/1.jpg') }}" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>
                            Patenschaftsprogramm - <strong>Bildung mit persönlicher Verbindung </strong>
                        </h2>

                    </div>

                    <div class="text-box">
                        <p>
                            Möchtest du Patin oder Pate werden und ein Kind direkt in seiner Bildung unterstützen?
                            <br>
                            Mit unserem Patenschaftsprogramm fördern wir Kinder, deren Bildungschancen stark eingeschränkt
                            sind,
                            und begleiten sie dort, wo sie Unterstützung benötigen - mit dem Ziel, ihnen den Zugang zu einem
                            Studium oder einer Berufsausbildung zu ermöglichen.
                        </p>

                        <p>
                            Besonders wichtig ist uns dabei der persönliche Austausch. Eine Patenschaft bei Worldculture
                            Empowerment e.V. bedeutet weit mehr als ein jährlicher Bericht per Brief. Wir möchten echte
                            Beziehungen schaffen. Patinnen und Paten haben die Möglichkeit, direkt mit dem jeweiligen Kind
                            in
                            Kontakt zu treten und den Bildungsweg aktiv mitzugestalten.
                        </p>

                        <p>
                            So kannst du beispielsweise durch Gespräche in englischer Sprache zur sprachlichen Entwicklung
                            des
                            Kindes beitragen oder Einblicke in deine eigene Kultur geben. Gleichzeitig lernst auch du die
                            Lebensrealität, Kultur und Perspektiven des Kindes kennen. Unsere Patenschaften basieren auf
                            gegenseitigem Respekt, Begegnung auf Augenhöhe und einem lebendigen kulturellen Austausch, bei
                            dem
                            beide Seiten voneinander lernen und wachsen.
                        </p>

                        <p>
                            Derzeit kannst du ein Kind in der Türkei mit <strong>50 Euro monatlich</strong> unterstützen.
                            Mit
                            diesem Beitrag
                            werden unter anderem Bücher und Schulmaterialien finanziert sowie - sofern erforderlich - der
                            Schulbus und die Schuluniform.
                        </p>

                        <p>
                            Mit <strong>120 Euro monatlich</strong> ermöglichen wir darüber hinaus eine gezielte Förderung
                            durch
                            Nachhilfe, beispielsweise in Mathematik, Englisch und weiteren relevanten Fächern. Diese
                            individuelle Unterstützung bereitet das Kind intensiv auf Abschlussprüfungen vor und erhöht
                            somit
                            die Chancen auf einen erfolgreichen Schulabschluss sowie auf einen Studienplatz an einer
                            Universität.
                        </p>
                    </div>
                </div>
            </div>
            <p style="font-size: large; margin-top: 20px;">
                Unsere Patenschaften begleiten die Kinder in der Regel bis zum Abitur. Im Anschluss besteht die
                Möglichkeit, die Unterstützung auf die Finanzierung eines Studiums auszuweiten. Dies ist
                besonders
                im Südosten der Türkei von großer Bedeutung, da dort noch immer viele Kinder - insbesondere
                Mädchen
                - aus finanziellen Gründen nicht an eine Universität gehen können, obwohl sie die fachlichen
                Voraussetzungen erfüllen.
        </div>
    </section>
    <!-- !SECTION Content -->

    <!-- SECTION Gallery -->
    <section id="media-gallery" class="section">
        <div class="container">
            <div class="media-grid grid-3">
                <!-- FOTOĞRAF -->
                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/2.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/3.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/4.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/11.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/5.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/6.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/7.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/9.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/patenschaft/10.jpg') }}" alt=""
                        data-caption="" class="img-cover">
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
