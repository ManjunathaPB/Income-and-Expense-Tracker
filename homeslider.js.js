const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("active");
    navigation.classList.toggle("active");
});

const btns = document.querySelectorAll(".nav-btn");
const slides = document.querySelectorAll(".img-slide");
const contents = document.querySelectorAll(".content");

 let currentSlideIndex = 0;
const intervalTime = 7000; 

const slideNav = (manual) => {
    btns.forEach((btn) => {
        btn.classList.remove("active");
    });

    slides.forEach((slide) => {
        slide.classList.remove("active");
    });

    contents.forEach((content) => {
        content.classList.remove("active");
    });

    btns[manual].classList.add("active");
    slides[manual].classList.add("active");
    contents[manual].classList.add("active");
};

const nextSlide = () => {
    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    slideNav(currentSlideIndex);
};


btns.forEach((btn, i) => {
    btn.addEventListener("click", () => 
    {
        slideNav(i);
        currentSlideIndex = i;
    });
});

setInterval(nextSlide, intervalTime);

