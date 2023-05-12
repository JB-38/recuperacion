class Diapositiva {
  slideIndex = 1;

  startTime(){
    console.log("aaa");
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    var m=this.checkTime(m);
    var s=this.checkTime(s);
    document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
  }

  constructor(){
    var today = new Date();
    var m = today.getMonth() + 1;
    var mes = (m < 10) ? '0' + m : m;
    document.getElementById("fechaDiaActual").innerHTML='Fecha: '+today.getDate()+'/' +mes+'/'+today.getYear();
    this.showSlides(this.slideIndex);
    setTimeout(this.startTime(),500);
 }


checkTime(i){
  if (i<10) {i="0" + i;}return i;
}


  plusSlides(n) {
   this.showSlides(this.slideIndex += n);
 }

  currentSlide(n) {
   this.showSlides(this.slideIndex = n);
 }

  showSlides(n) {
   let i;
   let slides = document.getElementsByClassName("mySlides");
   let dots = document.getElementsByClassName("dot");
   if (n > slides.length) {this.slideIndex = 1}    
   if (n < 1) {this.slideIndex = slides.length}
   for (i = 0; i < slides.length; i++) {
     slides[i].style.display = "none";  
   }
   for (i = 0; i < dots.length; i++) {
     dots[i].name = dots[i].setAttribute("name", "");
   }
   slides[this.slideIndex-1].style.display = "block";  
   dots[this.slideIndex-1].setAttribute("name", "active");
 }
}