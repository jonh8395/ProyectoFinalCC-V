
    var CodigoE;
   
    
    function init(){
    
        CodigoE = document.getElementById("CodigoE");
       
    }
    
  function verificador() {
      
      if(CodigoE.value.length === 0 ){
        document.getElementById("CodigoE").focus();
        alert("Debe llenar campo");
        return false;
    }else{
        return true;
    }
   }

  function verificadorManual() {
    fecha = document.getElementById("Fecha").value;
    hora = document.getElementById("Hora").value;
    if(CodigoE.value.length === 0 ){
        document.getElementById("CodigoE").focus();
        alert("Debe llenar campo");
        return false;
    } else if(fecha.length === 0) {
      document.getElementById("Fecha").focus();
      alert("Debe llenar campo");
      return false;
    } else if(hora.length === 0) {
      document.getElementById("Hora").focus();
      alert("Debe llenar campo");
      return false;
    }
    else{
        return true;
    }
  }
    
   
    
    
    init();