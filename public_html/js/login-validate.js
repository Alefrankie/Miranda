class Login {
    constructor(user, pass) {
        this.user = user;
        this.pass = pass;
    }
}

class Interfaz {
    
    showMessage(mensaje) {
        const Warnings = document.getElementById("warnings");
        const element = document.createElement('div');
        if (mensaje === "<br>Inicio de Sesión Exitoso.<br>") {
            element.innerHTML = `
            <div id="warning-message">
                <h5>Iniciando Sesión...</h5><br>
            </div>
            `;
            Warnings.appendChild(element);
            document.location.href = (location.origin + "/Miranda/usuarios/dashboard");
        } else {
            element.innerHTML = `
            <div id="warning-message">
                <h5>Advertencia: ${mensaje}</h5><br>
            </div>
            `;
            Warnings.appendChild(element);
            // this.resetForm();
            setTimeout(() => {
                document.getElementById("warning-message").remove();
            }, 2000)

        }
    }

    resetForm() {
        document.getElementById("form").reset();
    }
}

// DOM Events

document.getElementById("form").addEventListener("submit", (e) => {
    //alert("Enviando Formulario")
    e.preventDefault();
    const user = document.getElementById("user").value;
    const password = document.getElementById("password").value;

    const dataLogin = new Login(user, password);
    const ui = new Interfaz();

    if (user == "" || password == "") {
        return ui.showMessage("Debe rellenar los campos faltantes.");
    } else if (user.length <= 6 || password.length <= 6) {
        return ui.showMessage("Usuario/Contraseña No válido.");
    } else {
        (async () => {
            try {
                const myRequest = new Request(location.origin + "/Miranda/usuarios/login");
                const init = {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(dataLogin)
                };
                const response = await fetch(myRequest, init);
                if (response.ok) {
                    const response2 = await response.json();
                    console.log(response2.mensaje);
                    ui.showMessage(response2.mensaje);
                } else {
                    throw new Error(response.statusText);
                }
            } catch (err) {
                console.log("Error al realizar la petición AJAX: " + err.message);
            }
        })();
    }

})
//



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
    } else {
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
    } else {
        h3contraseña.style.display = "flex"
    }
});