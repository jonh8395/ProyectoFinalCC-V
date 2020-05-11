function verificador() {
	Empleado = document.getElementById("Empleado").value;
	Fechain = document.getElementById("FechaInicial").value;
	Fechafin = document.getElementById("FechaFinal").value;
    
   
    if(Empleado === "r" ){ 
		document.getElementById("Empleado").focus();
		alert("Debe Seleccionar una opcion");
		return false;
	}else if(Fechain.length === 0){
		document.getElementById("FechaInicial").focus();
		alert("Debe llenar campo");
		return false;
	}else if(Fechafin.length === 0){
		document.getElementById("FechaFinal").focus();
        alert("Debe llenar campo");
        
         
        
		return false;
	}
    añoin = parseInt(Fechain.substr(0,4));
    mesin = parseInt(Fechain.substr(5,7));
    diain = parseInt(Fechain.substr(8,Fechain.length - 1));
    añofin =parseInt(Fechafin.substr(0,4));
    mesfin =parseInt(Fechafin.substr(5,7));
    diafin = parseInt(Fechafin.substr(8,Fechafin.length - 1));
    
     if(añoin > añofin){
         document.getElementById("FechaInicial").focus();
         alert("Fecha inicial no puede ser mayor que final");
         return false;

     }else if(añoin === añofin){
            if(mesin > mesfin){
                document.getElementById("FechaInicial").focus();
         alert("Fecha inicial no puede ser mayor que final");
         return false;
            }else if(mesin === mesfin){
                if(diain > diafin){
                    document.getElementById("FechaInicial").focus();
         alert("Fecha inicial no puede ser mayor que final");
         return false;           
                }
            }
        }


	return true;
}
 