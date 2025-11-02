// Hero Slideshow
let heroSlideIndex = 1;
let heroSlideInterval;

document.addEventListener("DOMContentLoaded", function () {
    initHeroSlideshow();
});

function initHeroSlideshow() {
    showHeroSlide(heroSlideIndex);
    startHeroSlideshow();
    setupHeroControls();
    setupHeroSwipe();
}

function showHeroSlide(n) {
    const slides = document.getElementsByClassName("hero-slide");
    const dots = document.getElementsByClassName("hero-dot");

    if (slides.length === 0) return;

    // Normalize slide index
    if (n > slides.length) {
        n = 1;
    }
    if (n < 1) {
        n = slides.length;
    }
    heroSlideIndex = n;

    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }

    // Update dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active", "w-8", "bg-black");
        dots[i].classList.add("w-3", "bg-gray-400");
    }

    // Show current slide and activate dot
    slides[heroSlideIndex - 1].classList.add("active");
    dots[heroSlideIndex - 1].classList.remove("w-3", "bg-gray-400");
    dots[heroSlideIndex - 1].classList.add("active", "w-8", "bg-black");
}

function changeHeroSlide(n) {
    heroSlideIndex += n;
    showHeroSlide(heroSlideIndex);
    resetHeroSlideshow();
}

function currentHeroSlide(n) {
    heroSlideIndex = n;
    showHeroSlide(heroSlideIndex);
    resetHeroSlideshow();
}

function startHeroSlideshow() {
    heroSlideInterval = setInterval(function () {
        heroSlideIndex++;
        showHeroSlide(heroSlideIndex);
    }, 3000);
}

function resetHeroSlideshow() {
    clearInterval(heroSlideInterval);
    startHeroSlideshow();
}

function setupHeroControls() {
    const heroContainer = document.querySelector(".hero-slideshow-container");

    if (heroContainer) {
        // Pause on hover
        heroContainer.addEventListener("mouseenter", function () {
            clearInterval(heroSlideInterval);
        });

        heroContainer.addEventListener("mouseleave", function () {
            startHeroSlideshow();
        });
    }
}

function setupHeroSwipe() {
    const heroContainer = document.querySelector(".hero-slideshow-container");
    let heroStartX = 0;
    let heroEndX = 0;

    if (heroContainer) {
        heroContainer.addEventListener("touchstart", function (e) {
            heroStartX = e.touches[0].clientX;
        });

        heroContainer.addEventListener("touchend", function (e) {
            heroEndX = e.changedTouches[0].clientX;
            handleHeroSwipe();
        });
    }

    function handleHeroSwipe() {
        const threshold = 50;
        const diff = heroStartX - heroEndX;

        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                changeHeroSlide(1);
            } else {
                changeHeroSlide(-1);
            }
        }
    }
}

// Export functions to global scope for onclick handlers
window.currentHeroSlide = currentHeroSlide;
window.changeHeroSlide = changeHeroSlide;
