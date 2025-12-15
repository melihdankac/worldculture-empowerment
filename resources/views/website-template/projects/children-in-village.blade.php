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
                    <img src="{{ asset('website-template/images/projects/children-in-village/bg_image.jpg') }}" alt=""
                        width="1920" height="882" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat"
                        data-bgparallax="1" />

                    <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="15" data-y="top" data-voffset="150"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="700">
                        <div class="slide-content-box">
                            {{-- <h4>Thousand of children are waiting for help!</h4> --}}
                            <h1><span>Hoffnung</span> jenseits des Abhangs</h1>
                            {{-- <p>
                                Sed ut perspiciatis, unde omnis iste natus error sit
                                voluptatem accusantium doloremque la<br />udantium, totam
                                rem aperiam eaque ipsa, quae ab illo inventore
                            </p> --}}
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="15" data-y="top" data-voffset="250"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on" data-start="2300">
                        <div class="slide-content-box">
                            <div class="button">
                                <a class="thm-btn" href="#">join with us today</a>
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
                    <img src="{{ asset('website-template/images/projects/children-in-village/1.jpg') }}"
                        class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>
                            Hoffnung jenseits des Abhangs
                        </h2>
                    </div>
                    <div class="text-box">
                        <h4>
                            <strong>
                                Hilfe - für die Kinder der Bergdörfer im Südosten und Osten der Türkei
                            </strong>
                        </h4>
                        <p>Zwischen schroffen Felsen, tiefen Tälern und schneebedeckten Gipfeln liegen die Bergdörfer des
                            türkischen Ostens – Orte voller Einfachheit, Entbehrung und erstaunlicher Stärke.Eines dieser
                            Dörfer ist Hacımehmet in der Provinz Bitlis: abgelegen, schwer erreichbar, und doch erfüllt von
                            Leben. Hier, wo die Wege steinig und die Winter lang sind, strahlt etwas, das stärker ist als
                            jede Dunkelheit – das Lachen der Kinder.</p>&nbsp;

                        <h4>
                            <strong>
                                Unsere Vision
                            </strong>
                        </h4>

                        <p>In den Augen dieser Kinder brennt eine Hoffnung, die größer ist als die Berge, die sie
                            umgeben:die Hoffnung auf Bildung, auf Zukunft, auf ein Leben mit Möglichkeiten.
                        </p>&nbsp;

                        <p>
                            Diese Vision endet nicht an den Grenzen eines Dorfes.Sie gilt für alle Kinder der abgelegenen
                            Bergregionen im Südosten und Osten der Türkei – Kinder, die täglich gegen Armut und
                            Vergessenwerden anlächeln.
                        </p>

                        <h4>
                            <strong>
                                Unser Ziel
                            </strong>
                        </h4>

                        <p>Wir möchten gemeinsam mit euch die Kinder von Hacımehmet und vielen weiteren Bergdörfern
                            unterstützen.</p>&nbsp;

                        <p>
                            Unsere Hilfe konzentriert sich auf das, was am dringendsten gebraucht wird:
                        </p>

                        <ul style="font-size:large; margin-top:15px; margin-bottom:15px;">
                            <li>
                                <strong>• Schulmaterialien </strong>- Hefte, Stifte, Rucksäcke, Bücher.
                            </li>

                            <li>
                                <strong>• Winterkleidung </strong>- Jacken, Schuhe, Mützen, Handschuhe.
                            </li>

                            <li>
                                <strong> • Grundversorgung </strong>- Hygieneartikel und Nahrungsmittelpakete für Familien
                                in Not.
                            </li>
                        </ul>

                        <p>
                            Jeder Beitrag – ob klein oder groß – hilft, die Zukunft dieser Kinder heller, wärmer und
                            gerechter zu machen.
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-box" style="margin-top: 15px;">
                <h4>
                    <strong>
                        Warum Bergdörfer wie Hacımehmet?
                    </strong>
                </h4>
                <p>In vielen abgelegenen Regionen ist der Zugang zu Bildung, medizinischer Hilfe und Unterstützung stark
                    eingeschränkt. Die meisten Familien leben von dem, was die kargen Böden hergeben. Schulen liegen oft
                    weit entfernt, und Hilfsinitiativen erreichen diese Orte selten.</p>&nbsp;
                <p>
                    Doch dort, wo die Wege enden, beginnt unsere Aufgabe:mit Herz, Hand und echter Nähe.
                </p>

                <h4>
                    <strong>
                        Gemeinsam stark für viele Dörfer
                    </strong>
                </h4>
                <p>
                    Lasst uns gemeinsam zeigen, dass Hoffnung keine Grenzen kennt.Lasst uns den Kindern von Hacımehmet – und
                    all den anderen Kindern im Südosten und Osten der Türkei, die in den Bergen leben – die Hand
                    reichen.Damit ihr Lachen über die Täler hinwegklingt und aus jedem Dorf ein Ort der Zukunft werden kann.
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
                    <img src="{{ asset('website-template/images/projects/children-in-village/1.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/2.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/4.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/5.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/6.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/7.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/8.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/9.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/10.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/11.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/12.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/13.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/14.jpg') }}" alt=""
                        data-caption="" class="img-cover">
                </figure>

                <figure class="media-item photo-item">
                    <img src="{{ asset('website-template/images/projects/children-in-village/15.jpg') }}" alt=""
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
@endsection
