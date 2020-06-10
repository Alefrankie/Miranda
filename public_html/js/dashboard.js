//FUNCIONES DE OCULTACIÓN
const t_User = document.getElementById("t_user").innerHTML;
const data_base = document.getElementById("data-base");
const admin = document.getElementsByClassName("Admin");
const enlace_BuscarUsuario = document.getElementById("enlace_BuscarUsuario");
if (t_User == "Usuario") {
    data_base.style.display = 'none';
    enlace_BuscarUsuario.style.display = 'none';
    // Array.from(admin).forEach(function (element) { 
    //     element.style.display = 'none'
    //   }); 

    // for (const i of admin) {
    //     i.style.display = 'none'
    //   }
};


//
class dashboard {
    constructor(photo, user, password) {
        this.photo = photo;
        this.user = user;
        this.pass = password;
    }
}

class Interfaz {
    changePhoto(image) {
        document.getElementById("photo").setAttribute("src", `data:image/png;base64,${image}`);
        form.reset();
    }

    chargeTable(table) {
        const contenido = document.getElementById("contenido");
        for (let valor of table) {
            contenido.innerHTML += `
            <th>
                <th >${valor.id}</th>
                <td >${valor.nombre}</td>
                <td >${valor.apellido}</td>
                <td >${valor.user}</td>
                <td >${valor.t_user}</td>
                <th ${valor.status_user == "Online" ? "class='btn btn-success btn-xs'" : "class='btn btn-danger btn-xs'"}>${valor.status_user}</th>
                <td><a href="Miranda/usuarios/editar/${valor.id}"><i class="fas fa-user-edit"></i></a></td>
                <td><a href="Miranda/usuarios/delete/${valor.id}"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            `;
        }
    }
}

// DOM Events
const form = document.getElementById("dashboard_perfil");
const inputPhotoPerfil = document.getElementById("inputPhotoPerfil")
inputPhotoPerfil.addEventListener("change", (e) => {
    e.preventDefault();
    if (inputPhotoPerfil.value == "") {
        return alert("Debe Indicar su Foto de Perfil.");
    } else {
        (async (e) => {
            const ui = new Interfaz();
            const data = new FormData(form);
            const init = {
                method: form.method,
                body: data
            };
            try {
                const response = await fetch(form.action, init);
                if (response.ok) {
                    const photoPerfil = await response.json();
                    ui.changePhoto(photoPerfil);
                } else {
                    throw new error(response.statusText);
                }
            } catch (error) {
                alert("Error al enviar el formulario: " + error.message);
            }
            // permitimos volver a enviar el formulario de nuevo
            // enviarFormulario.enviando = false;
        })();
        form.onsubmit;
    }
})

//SCRIPT TO PHOTO PERFIL MIN-MAX
document.getElementById("photo").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputPhotoPerfil").classList.add("active");
})
document.getElementById("photo").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputPhotoPerfil").classList.remove("active");
})
document.getElementById("labelInputPhotoPerfil").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputPhotoPerfil").classList.add("active");
})
document.getElementById("labelInputPhotoPerfil").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputPhotoPerfil").classList.remove("active");
})


window.addEventListener("load", (e) => {
    const ui = new Interfaz();
    (chargeTableUsersFromDB = async (e) => {
        const myRequest = new Request(location.origin + "/Miranda/usuarios/chargeTableUsers");
        try {
            const response = await fetch(myRequest);
            if (response.ok) {
                const table = await response.json();
                ui.chargeTable(table);
            } else {
                throw new error(response.statusText);
            }
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
        // permitimos volver a enviar el formulario de nuevo
        // enviarFormulario.enviando = false;
    })();

    (showPhotoPerfil = async (e) => {
        const myRequest = new Request(location.origin + "/Miranda/usuarios/showPhotoPerfil");
        try {
            const response = await fetch(myRequest);
            if (response.ok) {
                const photoPerfil = await response.json();
                ui.changePhoto(photoPerfil);
            } else {
                throw new error(response.statusText);
            }
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
    })();

})



