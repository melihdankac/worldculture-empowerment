<!-- jQuery js -->
<script src="{{ asset('website-template/js/jquery.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('website-template/js/bootstrap.min.js') }}"></script>
<!-- jQuery ui js -->
<script src="{{ asset('website-template/js/jquery-ui.js') }}"></script>
<!-- owl carousel js -->
<script src="{{ asset('website-template/js/owl.carousel.min.js') }}"></script>
<!-- jQuery validation -->
<script src="{{ asset('website-template/js/jquery.validate.min.js') }}"></script>

<!-- mixit up -->
<script src="{{ asset('website-template/js/wow.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('website-template/js/bootstrap-select.min.js') }}"></script>

<!-- revolution slider js -->
<script src="{{ asset('website-template/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('website-template/js/revolution.extension.video.min.js') }}"></script>

<!-- fancy box -->
<script src="{{ asset('website-template/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.polyglot.language.switcher.js') }}"></script>
<script src="{{ asset('website-template/js/nouislider.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('website-template/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('website-template/js/validation.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.appear.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('website-template/js/imagezoom.js') }}"></script>
<script src="{{ asset('website-template/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('website-template/js/isotope.js') }}"></script>

<script src="{{ asset('website-template/js/simplyCountdown.min.js') }}"></script>
<script id="map-script" src="{{ asset('website-template/js/default-map.js') }}"></script>
<script src="{{ asset('website-template/js/custom.js') }}"></script>
<script src="{{ asset('website-template/js/cookie-banner.js') }}"></script>


<!-- SECTION - Google Translate -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const savedLang = localStorage.getItem("selectedLanguage");

        // Sayfa yüklendikten sonra Google Translate banner'ını gizle
        let count = 0;
        const intervalId = setInterval(function() {
            const elements = document.querySelectorAll('.skiptranslate');
            elements.forEach(el => el.style.display = 'none');
            count++;
            if (count === 5) clearInterval(intervalId);
        }, 500);

        // Sayfa ilk açıldığında, 'de' hariç bir dil kaydedilmişse çeviri uygula
        if (savedLang && savedLang !== "de") {
            setTimeout(() => {
                translatePage(savedLang);
                document.body.style.marginTop = '-40px';
            }, 1000);
        }

        // Dil seçimi butonlarına tıklama işlemleri
        document.querySelectorAll(".translate").forEach(function(element) {
            element.addEventListener("click", function(e) {
                e.preventDefault();
                const lang = this.getAttribute("data-lang");

                if (lang === "de") {
                    // Orijinal Almanca'ya dön: çeviri çerezini sil ve reload
                    localStorage.removeItem("selectedLanguage");
                    // Çeviriyi nötrle (asıl kritik satır)
                    document.cookie =
                        "googtrans=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
                    location.reload();
                    return;
                }

                // Diğer diller için Google Translate'i uygula
                localStorage.setItem("selectedLanguage", lang);
                translatePage(lang);

                // SkipTranslate'leri gizle
                const elements = document.querySelectorAll('.skiptranslate');
                elements.forEach(el => el.style.display = 'none');
                document.body.style.marginTop = '-40px';
            });
        });

        function translatePage(lang) {
            const selectElement = document.querySelector(".goog-te-combo");
            if (selectElement) {
                selectElement.value = lang;
                selectElement.dispatchEvent(new Event("change"));
            } else {
                console.warn("Google Translate yüklenmedi!");
            }
        }
    });

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'de',
            autoDisplay: false
        }, 'google_translate_element');
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- !SECTION - Google Translate -->
