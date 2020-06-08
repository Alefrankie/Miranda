const t_User = document.getElementById("t_user").innerHTML;
const data_base = document.getElementById("data-base");
if (t_User == "Usuario") {
    data_base.style.display = 'none';
};

class dashboard {
    constructor(photo, user, password) {
        this.photo = photo;
        this.user = user;
        this.pass = password;
    }
}

class Interfaz {
    changePhoto(image) {
        const imagen = (`data:image/png;base64,${image}`);
        document.getElementById("photo").setAttribute("src", imagen);
        form.reset();
    }
}

// DOM Events
const form = document.getElementById("dashboard_perfil");
form.addEventListener("submit", (e) => {
    e.preventDefault();
    (async (e) => {
        const ui = new Interfaz();

        // if (enviarFormulario.enviando) { return; }
        // enviarFormulario.enviando = true;
        const data = new FormData(form);
        const init = {
            method: form.method,
            body: data
        };
        try {
            const response = await fetch(form.action, init);
            debugger
            if (response.ok) {
                const respuesta = await response.json();
                ui.changePhoto(respuesta);
                // alert(respuesta + " Gracias por contactar con nosotros.")
                // // result.innerHTML = "Gracias por contactar con nosotros.";
            } else {
                throw new error(response.statusText);
            }
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
        // permitimos volver a enviar el formulario de nuevo
        // enviarFormulario.enviando = false;
    })();
})




