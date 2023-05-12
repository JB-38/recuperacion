class diapositiva {
  slidesContainer = document.getElementById("slides-container");
  slide = document.querySelector(".slide");
  prevButton = document.getElementById("slide-arrow-prev");
  nextButton = document.getElementById("slide-arrow-next");
  slideCount = document.querySelectorAll(".slide").length;
  currentSlide = 0; // Variable para llevar un seguimiento del slide actual
  
  constructor(){
    // Cambiar automáticamente el slide cada 2 segundos
   setInterval(goToNextSlide, 2000);
   this.nextButton.addEventListener("click", this.goToNextSlide);
 
   this.prevButton.addEventListener("click", this.goToPrevSlide);
 }
  // Función para avanzar al siguiente slide
  goToNextSlide() {
    const slideWidth = slide.clientWidth;
    this.currentSlide++;
    if (this.currentSlide >= slideCount) {
      this.currentSlide = 0; // Volver al primer slide cuando se alcanza el último slide
    }
    slidesContainer.scrollLeft = this.currentSlide * slideWidth;
  }
  
  // Función para retroceder al slide anterior
  goToPrevSlide() {
    const slideWidth = slide.clientWidth;
    this.currentSlide--;
    if (this.currentSlide < 0) {
      this.currentSlide = slideCount - 1; // Ir al último slide cuando se alcanza el primer slide
    }
    slidesContainer.scrollLeft = this.currentSlide * slideWidth;
  }
}