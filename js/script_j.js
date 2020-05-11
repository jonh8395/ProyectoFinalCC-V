function verificador() {
	codigo = document.getElementById("codigo").value;
	nombre = document.getElementById("nombre").value;
	horain = document.getElementById("horain").value;
    horaout = document.getElementById("horaout").value;
   
    if(codigo.length === 0 ){ 
		document.getElementById("codigo").focus();
		alert("Debe llenar campo");
		return false;
	}else if(nombre.length === 0 || nombre.trim() === "" ){
		document.getElementById("nombre").focus();
		alert("Debe llenar campo");
		return false;
	}else if(horain.length === 0){
		document.getElementById("horain").focus();
		alert("Debe llenar campo");
		return false;
	}else if(horaout.length === 0){
		document.getElementById("horaout").focus();
		alert("Debe llenar campo");
		return false;
	}
	horahorain = parseInt(horain.substring(0,2));
	minutoshorain = parseInt(horain.substring(3,5));
	horahoraout = parseInt(horaout.substring(0,2));
	minutoshoraout = parseInt(horaout.substring(3,5));
	if(horahoraout < horahorain) {
		alert("Las jornadas solo pueden transcurrir durante un mismo dia");
		return false;
	}
	if(horahorain === horahoraout) {
		if(minutoshoraout < minutoshorain) {	
			alert("La hora de salida no puede ser antes de la hora de entrada");
			return false;
		} else if(minutoshoraout === minutoshorain) {
			alert("La hora de salida no puede ser igual a la hora de entrada");
			return false;
		}
	}
	return true;
}