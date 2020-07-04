//FUNCIONES DE OCULTACIÓN
const t_User = document.getElementById("t_user").innerHTML;
const data_base = document.getElementById("data-base");
const admin = document.getElementsByClassName("Admin");
const enlace_BuscarUsuario = document.getElementById("enlace_BuscarUsuario");
const managementHomePage = document.getElementById("managementHomePage");

if (t_User == "Usuario") {
    data_base.style.display = 'none';
    enlace_BuscarUsuario.style.display = 'none';
    managementHomePage.style.display = 'none';
};
class Usuarios {
    constructor(user, password) {
        this.user = user
        this.password = password
    }
}

const Users = new Usuarios()



// POO
class dashboard {
    constructor(photo, user, password) {
        this.photo = photo;
        this.user = user;
        this.pass = password;
    }
}

class Interfaz {

    changeImages(image, nameFile) {
        document.getElementById(nameFile).setAttribute("src", `data:image;base64,${image}`);
    }

    chargeTable(table) {
        const buttons_Delete = document.getElementsByClassName("buttonDelete")
        const contenido = document.getElementById("contenido");

        const myRequest = location.origin + "/Miranda/usuarios/";
        for (let valor of table) {
            contenido.innerHTML += `
            <tr>
                <th >${valor.id}</th>
                <td >${valor.nombre}</td>
                <td >${valor.apellido}</td>
                <td >${valor.name_user}</td>
                <td >${valor.t_user}</td>
                <th ${valor.status_user == "Online" ? "class='btn btn-success btn-xs'" : "class='btn btn-danger btn-xs'"}>${valor.status_user}</th>
                <td><a class="buttonEdit" href="${myRequest + "editar/" + valor.id}"><i class="fas fa-user-edit"></i></a></td>
                <td ${valor.t_user == "Administrador" ? "style='display: none;'" : ""}><a class="buttonDelete" href="${myRequest + "delete/" + valor.id}"><i class="fas fa-trash-alt"></i></a></td>
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
                })();
                e.preventDefault()
            }
        }
    }
}
const ui = new Interfaz();

// DOM Events
const inputPhotoPerfil = document.getElementById("inputPhotoPerfil")
inputPhotoPerfil.addEventListener("change", (e) => {
    (async (e) => {
        // const blob = new Blob([inputPhotoPerfil.files[0]], {type: 'application/octet-binary'});

        const data = new FormData();
        data.append("imagen", inputPhotoPerfil.files[0]);
        try {
            const init = {
                method: 'POST',
                body: data
            };
            const myRequest = new Request(location.origin + "/Miranda/usuarios/PhotoPerfil");
            const response = await fetch(myRequest, init);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const photoPerfil = await response.json();
            ui.changeImages(photoPerfil, "photo");
            console.log
        } catch (error) {
            console.log("Error al enviar el formulario: " + error.message);
        }
    })();
})

//CHANGE ANNOUNCEMENT NEWS1 AND NEWS2
const an_inputNews_Array = document.getElementsByClassName("inputNews")
for (const i of an_inputNews_Array) {
    i.onchange = (e) => {
        (async (e) => {
            const data = new FormData();
            data.append("nameFile", i.name);
            data.append("image", i.files[0]);
            try {
                const myRequest = new Request(location.origin + "/Miranda/usuarios/AnnouncementNews1News2");
                const init = {
                    method: 'POST',
                    body: data
                };
                const response = await fetch(myRequest, init);
                if (!response.ok) {
                    throw new error(response.statusText);
                }
                const image = await response.json();
                ui.changeImages(image, i.name);
            } catch (error) {
                alert("Error al enviar el formulario: " + error.message);
            }
        })();
    }
}


//SCRIPT TO PHOTO PERFIL MIN-MAX
const a_newsImages_Array = document.getElementsByClassName("newsImages")
const a_labelsImages_Array = document.getElementsByClassName("labelsImages")

for (const i of a_newsImages_Array) {
    i.onmouseover = (e) => {
        for (const i2 of a_labelsImages_Array) {
            i2.classList.add("active");
        }
    }

    i.onmouseout = (e) => {
        for (const i2 of a_labelsImages_Array) {
            i2.classList.remove("active");
        }
    }
}

for (const i of a_labelsImages_Array) {
    i.onmouseover = (e) => {
        i.classList.add("active");
    }

    i.onmouseout = (e) => {
        i.classList.remove("active");
    }
}



window.addEventListener("load", (e) => {

    (chargeTableUsersFromDB = async (e) => {
        const myRequest = new Request(location.origin + "/Miranda/usuarios/chargeTableUsers");
        try {
            const response = await fetch(myRequest);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const table = await response.json();
            ui.chargeTable(table);

        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
    })();

    (showPhotoPerfil = async (e) => {
        const myRequest = new Request(location.origin + "/Miranda/usuarios/PhotoPerfil");
        try {
            const response = await fetch(myRequest);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const image = await response.json();
            ui.changeImages(image, "photo");
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
    })();

    (showAnnouncementNews1News2 = async (e) => {
        const myRequest = new Request(location.origin + "/Miranda/usuarios/AnnouncementNews1News2");
        try {
            const response = await fetch(myRequest);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const images = await response.json();
            ui.changeImages(images.announcement, "announcement")
            ui.changeImages(images.news1, "news1")
            ui.changeImages(images.news2, "news2")

        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
    })();
})

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
// for (const i = 0; i < inputs.length; i++) {
//     inputs[i].onclick = function () {
//         this.style.width = "200px";
//     }
// }

// for (const i of inputs) {
//     i.onclick = function (e) => {
//         this.style.width = "200px";
//     }
// }

// for (const i of inputs) {
//     i.onclick = function (e) => {
//         this.style.width = "200px";
//     }
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

