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
const buttons_Delete = document.getElementsByClassName("buttonDelete")
class Interfaz {
    changePhoto(image) {
        document.getElementById("photo").setAttribute("src", `data:image/png;base64,${image}`);
        form.reset();
    }

    chargeTable(table) {
        const contenido = document.getElementById("contenido");

        const myRequest = location.origin + "/Miranda/usuarios/delete/";
        for (let valor of table) {
            contenido.innerHTML += `
            <tr>
                <th >${valor.id}</th>
                <td >${valor.nombre}</td>
                <td >${valor.apellido}</td>
                <td >${valor.user}</td>
                <td >${valor.t_user}</td>
                <th ${valor.status_user == "Online" ? "class='btn btn-success btn-xs'" : "class='btn btn-danger btn-xs'"}>${valor.status_user}</th>
                <td><a class="buttonEdit" href="Miranda/usuarios/editar/${valor.id}"><i class="fas fa-user-edit"></i></a></td>
                <td><a class="buttonDelete" href="${myRequest + valor.id}"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
                `;

        }
        for (const i of buttons_Delete) {
            i.onclick = function (e) {
                (async () => {
                    try {
                        const response = await fetch(i.href);
                        if (!response.ok) {
                            throw new error(response.statusText);
                        }
                        const a_register = await response.json();
                        alert(a_register)
                    } catch (error) {
                        alert("Error al enviar el formulario: " + error.message);
                    }
                    // permitimos volver a enviar el formulario de nuevo
                    // enviarFormulario.enviando = false;
                })();
                e.preventDefault()

            }
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

//SCRIPT TO DELETE USER


//ANIMATIONS INPUTS UPDATE DATA

/*===== ANIMACIONES DE LOS INPUTS */
const inputNombre = document.getElementById("nombre");
const inputApellido = document.getElementById("apellido");
const inputUser = document.getElementById("user");
const inputPass = document.getElementById("password");
const h3nombre = document.getElementById("h3-nombre");
const h3apellido = document.getElementById("h3-apellido");
const h3usuario = document.getElementById("h3-usuario");
const h3contraseña = document.getElementById("h3-contraseña");

const inputs = [inputNombre, inputApellido, inputUser, inputPass]
const inputs2 = ["0", "1", "2", "3"]
const labels = [h3nombre, h3apellido, h3usuario, h3contraseña]


// Click a un solo elemento
// for (var i = 0; i < inputs.length; i++) {
//     inputs[i].onclick = function () {
//         this.style.width = "200px";
//     }
// }

// for (const i of inputs) {
//     i.addEventListener("click", (e) => {
//         for (const i2 of labels) {
//             i2.onclick = function () {
//                 this.style.width = "200px";
//             }
//         }
//     })
// }



// Array.from(inputs).forEach(function (elementInputs) {
//     elementInputs.addEventListener("focus", (e) => {
//             Array.from(labels).forEach(function (element2Label) {
//                 if(elementInputs = ){

//                 }
//                 element2Label.style.top = "-35px";
//             })
//     });

//     elementInputs.addEventListener("blur", (e) => {
//         Array.from(labels).forEach(function (element2Label) {
//             element2Label.style.top = "";
//             if (elementInputs.value.length > 0) {
//                 element2Label.style.display = "none"
//             } else {
//                 element2Label.style.display = "flex"
//             }
//         })

//     });
// });
// Array.from(inputs).forEach(function (elementInputs) {
//     elementInputs.addEventListener("focus", (e) => {
//             Array.from(labels).forEach(function (element2Label) {
//                 return element2Label.style.top = "-35px";
//             })
//     });

//     elementInputs.addEventListener("blur", (e) => {
//         Array.from(labels).forEach(function (element2Label) {
//             element2Label.style.top = "";
//             if (elementInputs.value.length > 0) {
//                 element2Label.style.display = "none"
//             } else {
//                 element2Label.style.display = "flex"
//             }
//         })

//     });
// });


//PASO DE OBJETOS POR REFERENCIA

// let player1 = {name: "María"}

// function shoot() {
//     console.log(this.name + " Ban bang")
// }

// player1.f = shoot

// player1.f()