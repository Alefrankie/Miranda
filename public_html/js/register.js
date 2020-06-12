class Register {
    constructor(a_name, a_lastName, an_user, a_pass) {
        this.a_name = a_name;
        this.a_lastName = a_lastName;
        this.an_user = an_user;
        this.a_pass = a_pass;
    }
}

class InterfaceRegister {



}
const form = document.getElementById("form");
form.addEventListener("submit", (e) => {
    e.preventDefault();
    const a_name = document.getElementById("name").value;
    const a_lastName = document.getElementById("lastName").value;
    const an_user = document.getElementById("user").value;
    const a_pass = document.getElementById("pass").value;

    const dataRegister = new Register(a_name, a_lastName, an_user, a_pass);
    const ui = new InterfaceRegister();

    if (a_name == "" || a_lastName == "" || an_user == "" || a_pass == "") {
        return alert("Debe Rellenar Los Campos Faltantes.");
    }
    if (a_name.length <= 6 || a_lastName.length <= 6 || an_user.length <= 6 || a_pass.length <= 6) {
        return alert("Datos No Válidos (Debe contener más de 6 caracteres).");
    }
    
    (async () => {
        const init = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataRegister)
        };
        try {
            const myRequest = new Request(location.origin + "/Miranda/usuarios/register");
            const response = await fetch(myRequest, init);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const respuesta = await response.json();
            alert(respuesta);
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
    })();

});


/*===== MENU DE NAVEGACIÓN RESPONSIVE */

const openMenu = document.getElementById("icon-burger")
const menu = document.getElementById("enlaces");
let close = true;

openMenu.addEventListener("click", () => {
  if (close) {
    menu.style.width = "100%";
    close = false;
  } else {
    menu.style.width = "0%";
    menu.style.overflow = "hidden";
    close = true;
  }
});
