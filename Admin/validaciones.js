function validacion(){
    var Name = document.getElementById("Nom").value;
    var Ap = document.getElementById("AP").value;
    var Am = document.getElementById("AM").value;
    var Email = document.getElementById("email").value;
    var Telefono = document.getElementById("Tel").value;
    var Usuario = document.getElementById("User").value;
    var Password1 = document.getElementById("Pass").value;
    var Password2 = document.getElementById("Pass2").value;
    
    
    if(Name=="" || Ap=="" || Am=="" || Email=="" || Telefono=="" || Usuario=="" || Password1=="" || Password2=="")
    {
        alert("Favor de completar todos los campos");
        return false;
    }
    else if(Name.length>50){
        alert("El campo nombre tiene un maximo de 50 caracteres");
        return false;
    }
    else if(Ap.length>50){
        alert("El campo apellido paterno tiene un maximo de 50 caracteres");
        return false;
    }
    else if(Am.length>50){
        alert("El campo apellido materno tiene un maximo de 50 caracteres");
        return false;
    }
    else if(Email.length>70){
        alert("El campo email tiene un maximo de 70 caracteres");
        return false;
    }
    else if(Telefono.length<10){
        alert("Numero telefonico invalido");
        return false;
    }
    else if(Usuario.length>25){
        alert("El campo usuario tiene un maximo de 25 caracteres");
        return false;
    }
    else if(Password1.length>20 || Password2.length>20){
        alert("El campo contraseña tiene un maximo de 20 caracteres");
        return false;
    }
    else if(isNaN(Telefono)){
        alert("El campo telefono solo acepta numeros");
        return false;
    }
    if(Password1!=Password2){
        alert("Las contraseñas no coinciden");
        return false;
    } 

    if(isNaN(Name) && isNaN(Ap) && isNaN(Am))
    { return true; }
    else  {
        alert("Su nombre o apellidos no se escribe con numeros");
        return false }
}
function realizado(){
    alert("Los datos se guardaron correctamente")
}