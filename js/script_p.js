function verificador() {
	document.getElementById("Username").setAttribute("value",document.getElementById("Username").value.trim());
	document.getElementById("ClaveU").setAttribute("value",document.getElementById("ClaveU").value.trim());
	username = document.getElementById("Username").value;
	password = document.getElementById("ClaveU").value;
	if(username.length === 0 || password.length === 0) {
		if(username.length === 0) document.getElementById("Username").focus();
		if(password.length === 0) document.getElementById("ClaveU").focus();
		alert("No puede dejar campos vacios");
		return false;
	}
	return true;
}

function verificadorPermiso() {
	
	fecha = document.getElementById("fechaPerm").value;
	empleado = document.getElementById("Empl").value;
	descr = document.getElementById("descripcion").value;
	codigop = document.getElementById("CodigoP").value;
	if(fecha.length == 0 || descr.trim().length == 0 || empleado == "r" || codigop == "r") {
		alert("No puede dejar campos vacios");
		return false;
	}
	return true;
}

function opcionPermiso() {
	opcion = document.getElementById("CodigoP").value;
	
	switch(opcion) {
		case "1":
			document.getElementById("descripcion").setAttribute("placeholder","Permiso para faltar: ");
			break;
		case "2":
			document.getElementById("descripcion").setAttribute("placeholder","Permiso para entrar tarde: ");
			break;
		case "3":
			document.getElementById("descripcion").setAttribute("placeholder","Permiso para salir temprano: ");
			break;
	}
}