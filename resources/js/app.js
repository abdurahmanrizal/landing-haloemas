import './bootstrap';

let heroSlideIndex = 1;
let heroSlideInterval;

// Initialize hero slideshow
document.addEventListener("DOMContentLoaded", function () {
    showHeroSlide(heroSlideIndex);
    startHeroSlideshow();
});

// Show specific hero slide
function showHeroSlide(n) {
    const slides = document.getElementsByClassName("hero-slide");
    const dots = document.getElementsByClassName("hero-dot");

    if (n > slides.length) {
        heroSlideIndex = 1;
    }
    if (n < 1) {
        heroSlideIndex = slides.length;
    }

    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }

    // Remove active class from all dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }

    // Show current slide and activate corresponding dot
    slides[heroSlideIndex - 1].classList.add("active");
    dots[heroSlideIndex - 1].classList.add("active");
}

// Change hero slide by n steps
function changeHeroSlide(n) {
    heroSlideIndex += n;
    showHeroSlide(heroSlideIndex);
    resetHeroSlideshow();
}

// Go to specific hero slide
function currentHeroSlide(n) {
    heroSlideIndex = n;
    showHeroSlide(heroSlideIndex);
    resetHeroSlideshow();
}

// Start automatic hero slideshow
function startHeroSlideshow() {
    heroSlideInterval = setInterval(function () {
        heroSlideIndex++;
        showHeroSlide(heroSlideIndex);
    }, 6000); // Change slide every 6 seconds
}

// Reset hero slideshow timer
function resetHeroSlideshow() {
    clearInterval(heroSlideInterval);
    startHeroSlideshow();
}

// Pause hero slideshow on hover
const heroSlideshowContainer = document.querySelector(
    ".hero-slideshow-container"
);
if (heroSlideshowContainer) {
    heroSlideshowContainer.addEventListener("mouseenter", function () {
        clearInterval(heroSlideInterval);
    });

    heroSlideshowContainer.addEventListener("mouseleave", function () {
        startHeroSlideshow();
    });
}

// Touch/swipe support for mobile hero slideshow
let heroStartX = 0;
let heroEndX = 0;

if (heroSlideshowContainer) {
    heroSlideshowContainer.addEventListener("touchstart", function (e) {
        heroStartX = e.touches[0].clientX;
    });

    heroSlideshowContainer.addEventListener("touchend", function (e) {
        heroEndX = e.changedTouches[0].clientX;
        handleHeroSwipe();
    });
}

function handleHeroSwipe() {
    const threshold = 50; // Minimum swipe distance
    const diff = heroStartX - heroEndX;

    if (Math.abs(diff) > threshold) {
        if (diff > 0) {
            // Swipe left - next slide
            changeHeroSlide(1);
        } else {
            // Swipe right - previous slide
            changeHeroSlide(-1);
        }
    }
}