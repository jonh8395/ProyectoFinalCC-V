
    var Codigo;
    var Nombre;
    var Jornada;
    var Departamento;
    
    function init(){
    
        Codigo = document.getElementById("Codigo");
        Nombre = document.getElementById("Nombre");
        Jornada = document.getElementById("Jornada");
        Departamento = document.getElementById("Departamento");
    }
    
  function verificador() {
      
     if(Codigo.value.length == 0){
        document.getElementById("Codigo").focus();
        alert("Debe llenar campo");
        return false;
    }else if(Nombre.value.length ==0 || Nombre.value === null || Nombre.value.trim() == ""){
        document.getElementById("Nombre").focus();
        alert("Debe llenar campo");
        return false;

    }else if(Jornada.value == "r"){
        document.getElementById("Jornada").focus();
        alert("Debe elegir una opcion");
        return false;
    
    }else if(Departamento.value == "r"){
        document.getElementById("Departamento").focus();
        alert("Debe elegir una opcion");
        return false;
    }else{
        return true;
    }
   }
    
   
    
    
    
    init();