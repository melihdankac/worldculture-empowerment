@extends('website-template.layouts.app')

@section('meta&title')
    <title>Education & Youth Empowerment in Istanbul - Youth Re-Autonomy Foundation | Worldculture Empowerment e.V.</title>

    <meta name="description" content="Supporting education, youth work and juvenile justice reform in Istanbul. Learn about our partnership with the Youth Re-Autonomy Foundation of Turkey empowering disadvantaged young people.">

    <meta name="keywords" content="youth empowerment Turkey, education projects Istanbul, juvenile justice NGO Turkey, youth work foundation, child rights Turkey">

    <!-- Open Graph -->
    <meta property="og:title" content="Education & Youth Empowerment in Istanbul">
    <meta property="og:description" content="A long-term partnership supporting education, youth work and the rights of disadvantaged young people in Istanbul.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('website-template/images/projects/autonomy-foundation/2.jpg') }}">
    <meta name="robots" content="index, follow">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Education & Youth Empowerment in Istanbul">
    <meta name="twitter:description" content="Discover our partnership with the Youth Re-Autonomy Foundation of Turkey supporting education and youth rights in Istanbul.">


    <style>
        .rev_slider_wrapper .tparrows {
            display: none !important;
        }

        .text-box p {
            text-align: justify;
            font-size: large;
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
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/bg_image.jpg') }}" alt=""
                        width="1920" height="882" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="1" />

                    <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="15" data-y="top" data-voffset="150"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="700">
                        <div class="slide-content-box">
                            {{-- <h4>Thousand of children are waiting for help!</h4> --}}
                            <h1>Zukunft gestalten:
                                <br>
                                Bildung & Jugendarbeit
                                <br>
                                in Istanbul
                            </h1>
                            {{-- <p>
                                Sed ut perspiciatis, unde omnis iste natus error sit
                                voluptatem accusantium doloremque la<br />udantium, totam
                                rem aperiam eaque ipsa, quae ab illo inventore
                            </p> --}}
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
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/2.jpg') }}"
                        class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>
                            Youth Re-Autonomy Foundation of Turkey, Istanbul
                        </h2>
                    </div>
                    <div class="text-box">
                        <p>Die Youth Re-Autonomy Foundation of Turkey ist eine Pionierorganisation der türkischen
                            Zivilgesellschaft. Seit ihrer Gründung im Jahr 1992 engagiert sie sich gezielt im Bereich der
                            Jugendgerichtsbarkeit und setzt sich konsequent für die Rechte von Kindern und Jugendlichen ein.
                            Ein besonderer Fokus ihrer Arbeit liegt seit 1997 auf der Unterstützung sozial benachteiligter
                            sowie inhaftierter junger Menschen. </p>&nbsp;

                        <p>Im Mittelpunkt der gemeinsamen Arbeit steht die Prävention von Jugendkriminalität. Die
                            Stiftung entwickelt Programme zur beruflichen Qualifizierung gefährdeter Jugendlicher und
                            fördert deren psychosoziale Stabilisierung. Ziel ist es, belastende Risikofaktoren frühzeitig zu
                            mindern und nachhaltige Rehabilitationsprozesse zu ermöglichen, die jungen Menschen neue
                            Perspektiven eröffnen.
                        </p>&nbsp;

                        <p>
                            Darüber hinaus setzt sich die Youth Re-Autonomy Foundation of Turkey aktiv für eine
                            Weiterentwicklung des Jugendstrafrechts im Einklang mit internationalen Standards ein. Ein
                            weiterer wichtiger Bestandteil ihrer Arbeit ist der Abbau gesellschaftlicher Stigmatisierung
                            und negativer Zuschreibungen gegenüber straffällig gewordenen Kindern. <br>

                            Der Hauptsitz der Organisation befindet sich in Istanbul (Kadıköy). Durch weitere
                            Niederlassungen in Ankara (seit 1995) und Izmir (seit 1996) konnte ihr Wirkungsradius
                            kontinuierlich ausgebaut werden.
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-box" style="margin-top:25px;">
                <h4>
                    <strong>
                        Gemeinsame Vision
                    </strong>
                </h4>

                <p>Uns verbindet die Vision einer Gesellschaft, in der Kinder geschützt aufwachsen, ihre Rechte gewahrt
                    werden undsie sich frei von Gewalt, Ausgrenzung und Bedrohung gesund entwickeln können.</p>&nbsp;


                <h4>
                    <strong>
                        Zusammenarbeit
                    </strong>
                </h4>

                <p>
                    Worldculture Empowerment e.V. begleitet und unterstützt die Youth Re-Autonomy Foundation of
                    Turkeyinsbesondere in den Bereichen Jugendarbeit und Bildungsförderung. Die Kooperation wirdseit 2021
                    intensiv von Selin Schäfer begleitet, die sich mehrfach über längere Zeiträume ehrenamtlich vor Ort
                    engagiert hat.
                </p>

                <p>
                    Im Jahr 2026 übernimmt Selin Schäfer zudem die Rolle der Projektmanagerin im Rahmen
                    eines HelpAlliance-Projekts. In diesem Kontext erhält die Stiftung eine Förderung in Höhe
                    von 15.000 Euro. Die Projektleitung sowie die Initiative zur Förderung liegen maßgeblich bei
                    Selin Schäfer, die sich nachhaltig für den Ausbau der gemeinsamen Arbeit einsetzt. <br>

                    Diese enge Partnerschaft steht beispielhaft für wirkungsvolle internationale Zusammenarbeit
                    im Einsatz für Kinder- und Jugendrechte.

                </p>
            </div>

        </div>
    </section>
    <!-- !SECTION Content -->

    <!-- SECTION Gallery -->
    <section id="media-gallery" class="section">
        <div class="container">
            <div class="media-grid grid-3">
                <!-- FOTOĞRAF -->
                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/3.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/5.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/6.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/7.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/8.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/10.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/12.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/2.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/autonomy-foundation/bg_image.jpg') }}"
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
