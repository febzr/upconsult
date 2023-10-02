
const carousel = document.querySelector('.carousel');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
const carouselList = document.querySelector('.carousel-list');
const carouselItems = document.querySelectorAll('.carousel-item');
const itemWidth = carouselItems[0].offsetWidth;

let currentIndex = 0;

function showSlide(index) {
    currentIndex = index;
    const translateX = -currentIndex * itemWidth;
    carouselList.style.transform = `translateX(${translateX}px)`;
}

function nextSlide() {
    if (currentIndex < carouselItems.length - 1) {
        showSlide(currentIndex + 1);
    }
}

function prevSlide() {
    if (currentIndex > 0) {
        showSlide(currentIndex - 1);
    }
}

nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click', prevSlide);

// Inicie o carrossel mostrando o primeiro slide
showSlide(currentIndex);
