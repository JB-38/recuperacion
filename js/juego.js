class Juego{
  preguntas_aleatorias = true;
  mostrar_pantalla_juego_términado = true;
  reiniciar_puntos_al_reiniciar_el_juego = true;
  
  interprete_bp;

  constructor() {
    var base_preguntas = this.readText("base-preguntas.json");
    this.interprete_bp = JSON.parse(base_preguntas);
    this.escogerPreguntaAleatoria();
  };

  readText(ruta_local) {
    var texto = null;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", ruta_local, false);
    xmlhttp.send();
    if (xmlhttp.status == 200) {
      texto = xmlhttp.responseText;
    }
    return texto;
  }
  
  pregunta;
  posibles_respuestas;

  select_id(id) {
    return document.getElementById(id);
  }
  btn_correspondiente = [
    this.select_id("btn1"),
    this.select_id("btn2"),
    this.select_id("btn3"),
    this.select_id("btn4"),
    this.select_id("btn5")
  ];
  npreguntas = [];
  
  preguntas_hechas = 0;
  preguntas_correctas = 0;
  
  escogerPreguntaAleatoria() {
    let n;
    if (this.preguntas_aleatorias) {
      n = Math.floor(Math.random() * this.interprete_bp.length);
    } else {
      n = 0;
    }
  
    while (this.npreguntas.includes(n)) {
      n++;
      if (n >= this.interprete_bp.length) {
        n = 0;
      }
      if (this.npreguntas.length == this.interprete_bp.length) {
        //Aquí es donde el juego se reinicia
        if (this.mostrar_pantalla_juego_términado) {
          swal.fire({
            title: "Juego finalizado",
            text:
              "Puntuación: " + this.preguntas_correctas + "/" + (this.preguntas_hechas - 1),
            icon: "success"
          });
        }
        if (this.reiniciar_puntos_al_reiniciar_el_juego) {
          this.preguntas_correctas = 0
          this.preguntas_hechas = 0
        }
        this.npreguntas = [];
      }
    }
    this.npreguntas.push(n);
    this.preguntas_hechas++;
  
    this.escogerPregunta(n);
  }
  
  escogerPregunta(n) {
    this.pregunta = this.interprete_bp[n];
    this.select_id("categoria").innerHTML="";
    this.select_id("pregunta").innerHTML="";
    if(this.pregunta.categoria){
      this.select_id("categoria").innerHTML=this.pregunta.categoria;
    }
    if(this.pregunta.pregunta){
      this.select_id("pregunta").innerHTML = this.pregunta.pregunta;
    }
    this.select_id("numero").innerHTML = n;
    let pc = this.preguntas_correctas;
    if (this.preguntas_hechas > 1) {
      this.select_id("puntaje").innerHTML = pc + "/" + (this.preguntas_hechas - 1);
    } else {
      this.select_id("puntaje").innerHTML = "";
    }
  
    this.style("imagen").objectFit = this.pregunta.objectFit;
    this.desordenarRespuestas(this.pregunta);
    if (this.pregunta.imagen) {
      this.select_id("imagen").setAttribute("src", this.pregunta.imagen);
      this.style("imagen").height = "200px";
      this.style("imagen").width = "100%";
    } else {
      this.style("imagen").height = "0px";
      this.style("imagen").width = "0px";
      setTimeout(() => {
        this.select_id("imagen").setAttribute("src", "");
      }, 500);
    }
  }
  
  desordenarRespuestas(pregunta) {
     this.posibles_respuestas = [
      pregunta.respuesta,
      pregunta.incorrecta1,
      pregunta.incorrecta2,
      pregunta.incorrecta3,
      pregunta.incorrecta4,
    ];
    this.posibles_respuestas.sort(() => Math.random() - 0.5);
  
    this.select_id("btn1").innerHTML = this.posibles_respuestas[0];
    this.select_id("btn2").innerHTML = this.posibles_respuestas[1];
    this.select_id("btn3").innerHTML = this.posibles_respuestas[2];
    this.select_id("btn4").innerHTML = this.posibles_respuestas[3];
    this.select_id("btn5").innerHTML = this.posibles_respuestas[4];
  }
  
  suspender_botones = false;

  oprimir_btn(i) {
    if (this.suspender_botones) {
      return;
    }
    this.suspender_botones = true;
    if (this.posibles_respuestas[i] == this.pregunta.respuesta) {
      this.preguntas_correctas++;
      this.btn_correspondiente[i].style.background = "lightgreen";
    } else {
      this.btn_correspondiente[i].style.background = "pink";
    }
    for (let j = 0; j < 4; j++) {
      if (this.posibles_respuestas[j] == this.pregunta.respuesta) {
        this.btn_correspondiente[j].style.background = "lightgreen";
        break;
      }
    }
    setTimeout(() => {
      this.reiniciar();
      this.suspender_botones = false;
    }, 3000);
  }
  
  // let p = prompt("numero")
  
  reiniciar() {
    for (const btn of this.btn_correspondiente) {
      btn.style.background = "white";
    }
    this.escogerPreguntaAleatoria();
  }
  
  style(id) {
    return this.select_id(id).style;
  }
  
  
}