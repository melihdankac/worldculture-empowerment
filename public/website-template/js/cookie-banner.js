document.addEventListener("DOMContentLoaded", function () {
    const cookieBanner = document.getElementById("cookie-consent-banner");
    const cookiePanel = document.getElementById("cookie-management-panel");

    // Başta banner'ı gizli başlat
    if (cookieBanner) cookieBanner.style.display = "none";

    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = `${name}=${value};expires=${date.toUTCString()};path=/;`;
    }

    function getCookie(name) {
        const cookieArr = document.cookie.split(";");
        for (let c of cookieArr) {
            let trimmed = c.trim();
            if (trimmed.indexOf(name + "=") === 0) {
                return trimmed.substring((name + "=").length);
            }
        }
        return null;
    }

    function hideBanner() {
        if (cookieBanner) cookieBanner.style.display = "none";
    }

    function showBanner() {
        if (cookieBanner) cookieBanner.style.display = "block";
    }

    function loadAnalytics() {
        const analyticsAllowed = getCookie("analytics_cookies") === "true";
        if (analyticsAllowed) {
            const s = document.createElement("script");
            s.src = "https://www.googletagmanager.com/gtag/js?id=G-22BVKEQ52Y";
            s.async = true;
            document.head.appendChild(s);
            s.onload = () => {
                window.dataLayer = window.dataLayer || [];
                function gtag() {
                    dataLayer.push(arguments);
                }
                window.gtag = gtag;
                gtag("js", new Date());
                gtag("config", "G-22BVKEQ52Y");
            };
        }
    }

    // Sayfa tamamen yüklendikten 200ms sonra cookie kontrolü
    // (küçük gecikme, görsel "göz kırpma"yı önler)
    setTimeout(() => {
        if (getCookie("necessary_cookies")) {
            hideBanner();
            loadAnalytics();
        } else {
            showBanner();
        }
    }, 200);

    // Accept All
    document.getElementById("accept-cookies")?.addEventListener("click", () => {
        setCookie("necessary_cookies", true, 365);
        setCookie("analytics_cookies", true, 365);
        setCookie("marketing_cookies", true, 365);
        hideBanner();
        loadAnalytics();
    });

    // Reject All
    document.getElementById("reject-cookies")?.addEventListener("click", () => {
        setCookie("necessary_cookies", true, 365);
        setCookie("analytics_cookies", false, 365);
        setCookie("marketing_cookies", false, 365);
        hideBanner();
    });

    // Manage preferences
    document.getElementById("manage-cookies")?.addEventListener("click", () => {
        document.querySelector('input[name="analytics"]').checked =
            getCookie("analytics_cookies") === "true";
        document.querySelector('input[name="marketing"]').checked =
            getCookie("marketing_cookies") === "true";
        if (cookieBanner) cookieBanner.style.display = "none";
        if (cookiePanel) cookiePanel.style.display = "block";
    });

    // Save preferences
    document
        .getElementById("save-cookie-preferences")
        ?.addEventListener("click", () => {
            const analytics = document.querySelector(
                'input[name="analytics"]'
            ).checked;
            const marketing = document.querySelector(
                'input[name="marketing"]'
            ).checked;
            setCookie("necessary_cookies", true, 365);
            setCookie("analytics_cookies", analytics, 365);
            setCookie("marketing_cookies", marketing, 365);
            hideBanner();
            if (cookiePanel) cookiePanel.style.display = "none";
            if (analytics) loadAnalytics();
        });
});
