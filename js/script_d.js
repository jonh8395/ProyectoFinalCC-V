var Codigo;
var Nombre;

function init(){

    Codigo = document.getElementById("CodigoD");
    Nombre = document.getElementById("NombreD");

}

function verificador() {
  
 if(Codigo.value.length == 0){
    document.getElementById("CodigoD").focus();
    alert("Debe llenar campo");
    return false;
}else if(Nombre.value.length ==0 || Nombre.value === null || Nombre.value.trim() == ""){
    document.getElementById("NombreD").focus();
    alert("Debe llenar campo");
    return false;
}else{
    return true;
}
}





init();