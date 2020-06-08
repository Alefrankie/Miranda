class Register {
    constructor(nombre, apellido, user, pass, t_user) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.pass = pass;
        this.user = user;
    }
}

class InterfaceRegister {



}
const form = document.getElementById("formulario");
form.addEventListener("submit", (e) => {
    e.preventDefault();
    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value;

    const dataRegister= new Register(nombre, apellido, user, pass);
    const ui = new InterfaceRegister();

    if (nombre == "" || apellido == "" ||user == "" || pass == "") {
        return alert("Debe Rellenar Los Campos Faltantes.");
        // return ui.showMessage("Debe Rellenar Los Campos Faltantes.");
    } else if (nombre.length <= 6 || apellido.length <= 6 || user.length <= 6 || pass.length <= 6) {
        return alert("Datos No Válidos.");
        // return ui.showMessage("Datos No Válidos.");
    } else {
        (async (e) => {
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
                    alert(respuesta);
                    form.reset();
                } else {
                    throw new error(response.statusText);
                }
            } catch (error) {
                alert("Error al enviar el formulario: " + error.message);
            }
        })();
    }


});