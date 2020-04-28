const nombre = document.getElementById("user");
const password = document.getElementById("password");
const t_user_admin = document.getElementById("t_user_admin");
const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let warnings = "";
    let entrar = false;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    parrafo.innerHTML = "";
    if(nombre.value.length <=6){
        warnings += `El nombre no es Válido <br>`;
        entrar = true
    };
    // if(regexEmail.test(email.value)){
    //     warnings += `El Email no es Válido <br>`;
    //     entrar = true
    // };

    if(password.value.length <=6){
        warnings += `La Contraseña no es Válida <br>`;
        entrar = true
    };

    if(entrar){
        parrafo.innerHTML = warnings;
    }else{
        parrafo.innerHTML = "Inicio Exitoso";

    }
})