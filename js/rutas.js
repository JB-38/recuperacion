class Rutas {
    readText(ruta_local) {
        var texto = null;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", ruta_local, false);
        xmlhttp.send();
        if (xmlhttp.status == 200) {
          texto = xmlhttp.responseText;
        }
        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(texto,"text/xml");
        console.log(xmlDoc.getElementsByTagName("ruta")[0].childNodes[1].innerHTML);
        console.log(xmlDoc.getElementsByTagName("ruta")[0].childNodes[3].innerHTML);
        console.log(xmlDoc.getElementsByTagName("ruta")[0].childNodes[5].innerHTML);
        console.log(xmlDoc.getElementsByTagName("ruta"));
        console.log("22");
        return xmlDoc;
      }
    rutas;
    arrayLimpioRutas1;
    constructor() {
        this.rutas = this.readText("rutas.xml");
        this.inicializarRuta1();
        this.inicializarRuta2();
        this.inicializarRuta3();
    }

    inicializarRuta1(){
        var arrayRutas1=this.rutas.getElementsByTagName("ruta")[0].textContent.split("\n");
        this.arrayLimpioRutas1 = arrayRutas1.filter(word => word.trim().length !=0);
        document.getElementById("ruta1").innerHTML="<b> Nombre:</b>"+this.arrayLimpioRutas1[0]+
        "<br> <b> Tipo de ruta:</b>"+ this.arrayLimpioRutas1[1]+
        "<br> <b> Medio de transporte:</b>"+ this.arrayLimpioRutas1[2]+
        "<br> <b> Fecha de inicio:</b>"+ this.arrayLimpioRutas1[3]+
        "<br> <b> Hora de inicio:</b>"+ this.arrayLimpioRutas1[4]+
        "<br> <b> Duración:</b>"+ this.arrayLimpioRutas1[5]+
        "<br> <b> Agencia:</b>"+ this.arrayLimpioRutas1[6]+
        "<br> <b> Descripción:</b>"+ this.arrayLimpioRutas1[7]+
        "<br> <b> Personas adecuadas:</b>"+ this.arrayLimpioRutas1[8]+
        "<br> <b> Lugar de inicio:</b>"+ this.arrayLimpioRutas1[9]+
        "<br> <b> Dirección:</b>"+ this.arrayLimpioRutas1[10]+
        "<br>";
    }
    
    inicializarRuta2(){
        var arrayRutas1=this.rutas.getElementsByTagName("ruta")[1].textContent.split("\n");
        this.arrayLimpioRutas1 = arrayRutas1.filter(word => word.trim().length !=0);
        document.getElementById("ruta2").innerHTML="<b> Nombre:</b>"+this.arrayLimpioRutas1[0]+
        "<br> <b> Tipo de ruta:</b>"+ this.arrayLimpioRutas1[1]+
        "<br> <b> Medio de transporte:</b>"+ this.arrayLimpioRutas1[2]+
        "<br> <b> Fecha de inicio:</b>"+ this.arrayLimpioRutas1[3]+
        "<br> <b> Hora de inicio:</b>"+ this.arrayLimpioRutas1[4]+
        "<br> <b> Duración:</b>"+ this.arrayLimpioRutas1[5]+
        "<br> <b> Agencia:</b>"+ this.arrayLimpioRutas1[6]+
        "<br> <b> Descripción:</b>"+ this.arrayLimpioRutas1[7]+
        "<br> <b> Personas adecuadas:</b>"+ this.arrayLimpioRutas1[8]+
        "<br> <b> Lugar de inicio:</b>"+ this.arrayLimpioRutas1[9]+
        "<br> <b> Dirección:</b>"+ this.arrayLimpioRutas1[10]+
        "<br>";
    }
    inicializarRuta3(){
        var arrayRutas1=this.rutas.getElementsByTagName("ruta")[2].textContent.split("\n");
        this.arrayLimpioRutas1 = arrayRutas1.filter(word => word.trim().length !=0);
        document.getElementById("ruta3").innerHTML="<b> Nombre:</b>"+this.arrayLimpioRutas1[0]+
        "<br> <b> Tipo de ruta:</b>"+ this.arrayLimpioRutas1[1]+
        "<br> <b> Medio de transporte:</b>"+ this.arrayLimpioRutas1[2]+
        "<br> <b> Fecha de inicio:</b>"+ this.arrayLimpioRutas1[3]+
        "<br> <b> Hora de inicio:</b>"+ this.arrayLimpioRutas1[4]+
        "<br> <b> Duración:</b>"+ this.arrayLimpioRutas1[5]+
        "<br> <b> Agencia:</b>"+ this.arrayLimpioRutas1[6]+
        "<br> <b> Descripción:</b>"+ this.arrayLimpioRutas1[7]+
        "<br> <b> Personas adecuadas:</b>"+ this.arrayLimpioRutas1[8]+
        "<br> <b> Lugar de inicio:</b>"+ this.arrayLimpioRutas1[9]+
        "<br> <b> Dirección:</b>"+ this.arrayLimpioRutas1[10]+
        "<br>";
    }
}