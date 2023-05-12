const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".slide");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");
const slideCount = document.querySelectorAll(".slide").length;
let currentSlide = 0; // Variable para llevar un seguimiento del slide actual

// Función para avanzar al siguiente slide
function goToNextSlide() {
  const slideWidth = slide.clientWidth;
  currentSlide++;
  if (currentSlide >= slideCount) {
    currentSlide = 0; // Volver al primer slide cuando se alcanza el último slide
  }
  slidesContainer.scrollLeft = currentSlide * slideWidth;
}

// Función para retroceder al slide anterior
function goToPrevSlide() {
  const slideWidth = slide.clientWidth;
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = slideCount - 1; // Ir al último slide cuando se alcanza el primer slide
  }
  slidesContainer.scrollLeft = currentSlide * slideWidth;
}

nextButton.addEventListener("click", goToNextSlide);

prevButton.addEventListener("click", goToPrevSlide);

// Cambiar automáticamente el slide cada 2 segundos
setInterval(goToNextSlide, 2000);