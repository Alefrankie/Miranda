const nombre = document.getElementById("user");
const password = document.getElementById("password");
const t_user_admin = document.getElementById("t_user_admin");
const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

form.addEventListener("submit", (e) => {
    let warnings = "";
    let entrar = false;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    parrafo.innerHTML = "";
    if (nombre.value.length <= 6) {
        warnings += `El Nombre no es Válido <br>`;
        entrar = true
    }else{
        if (password.value.length <= 6) {
            warnings += `La Contraseña no es Válida <br>`;
            entrar = true
        } else {
            if (entrar == true) {
                event.preventDefault()
                parrafo.innerHTML = warnings;
            } else {
                parrafo.innerHTML = "Inicio Exitoso";
            }
        }
    };
    // if(regexEmail.test(email.value)){
    //     warnings += `El Email no es Válido <br>`;
    //     entrar = true
    // };


    
})

/*===== ANIMACIONES DE LOS INPUTS */
const inputUser = document.getElementById("user");
const inputPass = document.getElementById("password");
const h3usuario = document.getElementById("h3-usuario");
const h3contraseña = document.getElementById("h3-contraseña");

inputUser.addEventListener("focus", () => {
    h3usuario.style.top = "-30px";
});
inputUser.addEventListener("blur", () => {
    h3usuario.style.top = "";
    if (inputUser.value.length > 0) {
        h3usuario.style.display = "none"
    }else{
        h3usuario.style.display = "flex"
    }
});

inputPass.addEventListener("focus", () => {
    h3contraseña.style.top = "-30px";
});
inputPass.addEventListener("blur", () => {
    h3contraseña.style.top = "";
    if (inputPass.value.length > 0) {
        h3contraseña.style.display = "none"
    }else{
        h3contraseña.style.display = "flex"
    }
});



