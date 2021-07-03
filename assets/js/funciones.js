function generarcontrasena(){
    primeramayusc();
    primeramayusc1();
	var identificacion = document.getElementById("identificacion").value;
	var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var contrasenas="";
	contrasenas=apellido.substring(0, 2) + nombre.substring(0, 2) + identificacion.substring(0, 4) + "*";    
    document.getElementById("contrasena").value = contrasenas;			
}

function primeramayusc(){
    var nombre = document.getElementById("nombre").value;
    document.getElementById("nombre").value = nombre.charAt(0).toUpperCase() + nombre.slice(1);
}

function primeramayusc1(){
    var apellido = document.getElementById("apellido").value;
    document.getElementById("apellido").value = apellido.charAt(0).toUpperCase() + apellido.slice(1);  
}

function promedioNota(){
    
    var notauno = Number(document.getElementById("notauno").value);
    var notados = Number(document.getElementById("notados").value);
    var notatres = Number(document.getElementById("notatres").value);
    var resultado = (notauno+notados+notatres);
    
    if(resultado>0){
        resultado = resultado/3;
        document.getElementById("promedio").value = resultado.toFixed(2); 
    }
    if(resultado>=7){
        document.getElementById("estado").value = "Aprobado"; 
    }else{
        document.getElementById("estado").value = "Reprobo"; 
    }
     
    
}

