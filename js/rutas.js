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
        return xmlDoc;
      }
    rutas;
    constructor() {
        this.rutas = this.readText("rutas.xml");
        this.inicializarRutas();
    }

    inicializarRutas(){
        var cantidad_rutas=this.rutas.getElementsByTagName("ruta").length;
        for (var i=0; i<cantidad_rutas; i++){
            var arrayRutas=this.rutas.getElementsByTagName("ruta")[i].textContent.split("\n");
            var arrayLimpioRutas = arrayRutas.filter(word => word.trim().length !=0);
            arrayLimpioRutas =arrayLimpioRutas.map(x => x.trim());

            var arrayHitos=this.rutas.getElementsByTagName("ruta")[i].childNodes[37].textContent.split("\n").map(x => x.trim());
            document.getElementById("rutas").innerHTML+=
            "<b> Nombre:  </b>"+arrayLimpioRutas[0]+
            "<br> <b> Tipo de ruta:  </b>"+ arrayLimpioRutas[1]+
            "<br> <b> Medio de transporte:  </b>"+ arrayLimpioRutas[2]+
            "<br> <b> Fecha de inicio:  </b>"+ arrayLimpioRutas[3]+
            "<br> <b> Hora de inicio:  </b>"+ arrayLimpioRutas[4]+
            "<br> <b> Duración:  </b>"+ arrayLimpioRutas[5]+
            "<br> <b> Agencia:  </b>"+ arrayLimpioRutas[6]+
            "<br> <b> Descripción:  </b>"+ arrayLimpioRutas[7]+
            "<br> <b> Personas adecuadas:  </b>"+ arrayLimpioRutas[8]+
            "<br> <b> Lugar de inicio:  </b>"+ arrayLimpioRutas[9]+
            "<br> <b> Dirección:  </b>"+ arrayLimpioRutas[10]+
            "<br> <b> Latitud:  </b>"+ arrayLimpioRutas[11]+
            "<br> <b> Longitud:  </b>"+ arrayLimpioRutas[12]+
            "<br> <b> Altitud:  </b>"+ arrayLimpioRutas[13]+"m"+
            "<br> <b> Recomendación:  </b>"+ arrayLimpioRutas[14]+
            "<br> <b> Referencia 1:  </b> <a target='_blank' href="+arrayLimpioRutas[15]+">"+arrayLimpioRutas[15]+"</a>"+ 
            "<br> <b> Referencia 2:  </b> <a target='_blank' href="+arrayLimpioRutas[16]+">"+arrayLimpioRutas[16]+"</a>"+
            "<br> <b> Referencia 3:  </b> <a target='_blank' href="+arrayLimpioRutas[17]+">"+arrayLimpioRutas[17]+"</a>"+
            "<br> <b> Hitos:  </b>"+
            "<br> <b> Nombre:  </b>"+ arrayHitos[2]+
            "<br> <b> Descripción:  </b>"+ arrayHitos[3]+
            "<br> <b> Latitud:  </b>"+ arrayHitos[4]+
            "<br> <b> Logitud:  </b>"+ arrayHitos[5]+
            "<br> <b> Altitud:  </b>"+ arrayHitos[6]+"m"+
            "<br> <b> distancia entre hito anterior:  </b>"+ arrayHitos[7];
            
            if(arrayHitos[8].length>0)
                document.getElementById("rutas").innerHTML+="<br> <img src='multimedia/"+arrayHitos[8]+"' style='width:40%; height: 40vh;'> </img>";
            
            if(arrayHitos[9].length>0)
                document.getElementById("rutas").innerHTML+="<br> <img src='multimedia/"+arrayHitos[9]+"' style='width:40%; height: 40vh;'> </img>";
            
            if(arrayHitos[10].length>0)
                document.getElementById("rutas").innerHTML+="<br> <img src='multimedia/"+arrayHitos[10]+"' style='width:40%; height: 40vh;'> </img>";
            
            if(arrayHitos[11].length>0)
                document.getElementById("rutas").innerHTML+="<br> <video width='250' height='150'> <source src='multimedia/"+arrayHitos[11]+"' type='video/mp4'> </video>";
            
            if(arrayHitos[12].length>0)
                document.getElementById("rutas").innerHTML+="<br> <video width='250' height='150'> <source src='multimedia/"+arrayHitos[12]+"' type='video/mp4'> </video>";
            
            if(arrayHitos[13].length>0)
                document.getElementById("rutas").innerHTML+="<br> <video width='250' height='150'> <source src='multimedia/"+arrayHitos[13]+"' type='video/mp4'> </video>";
            
            document.getElementById("rutas").innerHTML+="<br>"+
            "<br> <b> Nombre:  </b>"+ arrayHitos[16]+
            "<br> <b> Descripción:  </b>"+ arrayHitos[17]+
            "<br> <b> Latitud:  </b>"+ arrayHitos[18]+
            "<br> <b> Logitud:  </b>"+ arrayHitos[19]+
            "<br> <b> Altitud:  </b>"+ arrayHitos[20]+"m"+
            "<br> <b> distancia entre hito anterior:  </b>"+ arrayHitos[21]+
            "<br>"+
            "<br> <b> Nombre:  </b>"+ arrayHitos[30]+
            "<br> <b> Descripción:  </b>"+ arrayHitos[31]+
            "<br> <b> Latitud:  </b>"+ arrayHitos[32]+
            "<br> <b> Logitud:  </b>"+ arrayHitos[33]+
            "<br> <b> Altitud:  </b>"+ arrayHitos[34]+"m"+
            "<br> <b> distancia entre hito anterior:  </b>"+ arrayHitos[35]+
            "<div>"+
            "      <form onsubmit='rutas.generarKML("+i+")'>"+
            "         <input type='submit' value='Generar KML'>"+
            "      </form>"+
            "      <form onsubmit='rutas.generarSVG("+i+")'>"+
            "         <input type='submit' value='Generar SVG'>"+
            "      </form>"+
            "   </div>"+
            "<br> <br> <br>";
        }
        
    }

    generarKML(i){
        var arrayRutas=this.rutas.getElementsByTagName("ruta")[i].textContent.split("\n");
        var arrayLimpioRutas = arrayRutas.filter(word => word.trim().length !=0);
        arrayLimpioRutas =arrayLimpioRutas.map(x => x.trim());

        var arrayHitos=this.rutas.getElementsByTagName("ruta")[i].childNodes[37].textContent.split("\n").map(x => x.trim());
        
        let filename = arrayLimpioRutas[0]+'.kml';
        let text = '<?xml version="1.0" encoding="UTF-8"?> \n'+
        '   <kml xmlns="http://www.opengis.net/kml/2.2"> \n'+
        '       <Document> \n'+
        '           <name>'+'Rutas'+'</name> \n'+
        '           <Style id="red-line"> \n'+
        '               <LineStyle> \n'+
        '                   <width>2</width> \n'+
        '                   <color>ff0000ff</color> \n'+
        '               </LineStyle> \n'+
        '           </Style> \n'+
        '           <Placemark> \n'+
        '               <name>'+arrayLimpioRutas[0]+'</name>\n'+
        '               <styleUrl>#red-line</styleUrl>\n'+
        '               <LineString>\n'+
        '                   <tessellate>1</tessellate>\n'+
        '                   <coordinates>\n'+
        '                       '+arrayLimpioRutas[11]+','+arrayLimpioRutas[12]+',0.0\n'+
        '                       '+arrayHitos[4]+','+arrayHitos[5]+'0.0\n'+
        '                       '+arrayHitos[18]+','+arrayHitos[19]+',0.0\n'+
        '                       '+arrayHitos[32]+','+arrayHitos[33]+',0.0\n'+
        '                   </coordinates>\n'+
        '               </LineString>\n'+
        '           </Placemark>\n'+
        '       </Document> \n'+
        '   </kml>';
    
      
        let element = document.createElement('a');
        element.setAttribute('href', 'data:text/xml;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);
      
        element.style.display = 'none';
        document.body.appendChild(element);
      
        element.click();
      
        document.body.removeChild(element);
    }

    generarSVG(i){
        var arrayRutas=this.rutas.getElementsByTagName("ruta")[i].textContent.split("\n");
        var arrayLimpioRutas = arrayRutas.filter(word => word.trim().length !=0);
        arrayLimpioRutas =arrayLimpioRutas.map(x => x.trim());

        var arrayHitos=this.rutas.getElementsByTagName("ruta")[i].childNodes[37].textContent.split("\n").map(x => x.trim());
        let filename = arrayLimpioRutas[0]+'.svg';

        var mayorAltitud=arrayHitos[6];
        var menorAltitud=arrayHitos[6];
        
        //Busqueda del punto mas alto
        if(mayorAltitud<arrayHitos[20])
            mayorAltitud=arrayHitos[20];

        if(mayorAltitud<arrayHitos[34])
            mayorAltitud=arrayHitos[34];

        if(mayorAltitud<arrayLimpioRutas[13])
            mayorAltitud=arrayLimpioRutas[13];

        //Busqueda del punto mas bajo
        if(menorAltitud>arrayHitos[20])
            menorAltitud=arrayHitos[20];

        if(menorAltitud>arrayHitos[34])
            menorAltitud=arrayHitos[34];
        
        if(menorAltitud>arrayLimpioRutas[13])
            menorAltitud=arrayLimpioRutas[13];
        
        var Puntos=[];
        Puntos.push(((1 - ((arrayHitos[6] - menorAltitud) / (mayorAltitud - menorAltitud))) * 200) + 20);
        Puntos.push(((1 - ((arrayHitos[20] - menorAltitud) / (mayorAltitud - menorAltitud))) * 200) + 20);
        Puntos.push(((1 - ((arrayHitos[34] - menorAltitud) / (mayorAltitud - menorAltitud))) * 200) + 20);
        Puntos.push(((1 - ((arrayLimpioRutas[13] - menorAltitud) / (mayorAltitud - menorAltitud))) * 200) + 20);
        //var Punto=;

        let text = '<svg viewBox="0 0 600 609" class="chart"> \n'+
        '   <text x="5" y="20">'+mayorAltitud+'m</text>\n'+
        '   <text x="5" y="220">'+menorAltitud+'m</text>\n'+
        '   <polyline fill="none" stroke="#ff0000" stroke-width="1"\n'+
        '       points="\n'+
        '           100,'+Puntos[0]+'\n'+
        '           120,'+Puntos[1]+'\n'+
        '           140,'+Puntos[2]+'\n'+
        '           160,'+Puntos[2]+'\n'+
        '           "/>\n'+
        '</svg>';
    
      
        let element = document.createElement('a');
        element.setAttribute('href', 'data:text/xml;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);
      
        element.style.display = 'none';
        document.body.appendChild(element);
      
        element.click();
      
        document.body.removeChild(element);       
    }
}