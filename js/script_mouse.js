function myFunction(){
    var x = document.getElementById("ClaveU");
    if(x.type === "password"){
        x.type = "text";
    }else {
        x.type = "password";
    }
}