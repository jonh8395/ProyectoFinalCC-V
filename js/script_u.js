function verificador() {
	username = document.getElementById("Username").value;
	password = document.getElementById("ClaveU").value;
	if(username.trim().length === 0 || password.trim().length === 0) {
		if(username.trim().length === 0) {
			document.getElementById("Username").focus();
		}
		if(password.trim().length === 0) {
			document.getElementById("ClaveU").focus();
		}
		alert('No puede dejar campos vacios');
		return false;
	}
}

function verificarRoot() {
	username = document.getElementById("Username").value;
	password = document.getElementById("ClaveU").value;
	if(username.trim().length === 0 || password.trim().length === 0) {
		if(username.trim().length === 0) {
			document.getElementById("Username").focus();
		}
		if(password.trim().length === 0) {
			document.getElementById("ClaveU").focus();
		}
		alert('No puede dejar campos vacios');
		return false;
	}
	else {
		if(username.trim() === 'root' && password.trim() === 'Z4R7S5A3D') {
			return true;
		} else {
			document.getElementById("Username").focus();
			document.getElementById("ClaveU").focus();
			alert('El usuario y la clave no coinciden');
			return false;
		}
	}
}