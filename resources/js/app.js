import "./bootstrap";
import "./hero-slider";

document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash) {
        const hash = window.location.hash;
        const target = document.querySelector(hash);

        if (target) {
            setTimeout(() => {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }, 100);
        }
    }

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");

            if (href.startsWith("#") && href.length > 1) {
                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });

                    history.pushState(null, null, href);
                }
            }
        });
    });
});
