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
        return form.reset();
    }

    changeAnnouncement(Announcement) {
        document.getElementById("Announcement").setAttribute("src", `data:image/png;base64,${Announcement}`);
        return an_announcement_FORM.reset();
    }

    changeNews1(news1) {
        document.getElementById("news1").setAttribute("src", `data:image/png;base64,${news1}`);
        return an_news1_FORM.reset();
    }

    changeNews2(news2) {
        document.getElementById("news2").setAttribute("src", `data:image/png;base64,${news2}`);
        return an_news2_FORM.reset();
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
                <td >${valor.user}</td>
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
    }
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
    })();
    form.onsubmit;
})

//----CHANGE ANNOUNCEMENT AND NEWS
const an_announcement_FORM = document.getElementById("announcementHomepage_FORM");
const an_announcement_Input = document.getElementById("inputAnnouncement");
an_announcement_Input.addEventListener("change", (e) => {
    e.preventDefault();
    if (an_announcement_Input.value == "") {
        return alert("Debe Indicar Una Imagen Válida.");
    }
    (async (e) => {
        const ui = new Interfaz();
        const data = new FormData(an_announcement_FORM);
        const init = {
            method: an_announcement_FORM.method,
            body: data
        };
        try {
            const response = await fetch(an_announcement_FORM.action, init);
            if (response.ok) {
                const image = await response.json();
                ui.changeAnnouncement(image);
            } else {
                throw new error(response.statusText);
            }
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
        // permitimos volver a enviar el formulario de nuevo
        // enviarFormulario.enviando = false;
    })();
    an_announcement_FORM.onsubmit;
})

const an_news1_FORM = document.getElementById("news1Homepage_FORM");
const an_news1_Input = document.getElementById("inputNews1");
an_news1_Input.addEventListener("change", (e) => {
    e.preventDefault();
    if (an_news1_Input.value == "") {
        return alert("Debe Indicar Una Imagen Válida.");
    }
    (async (e) => {
        const ui = new Interfaz();
        var data = new FormData();
        data.append("news1", an_news1_Input.files[0]);
        try {
            const myRequest = new Request(location.origin + "/Miranda/usuarios/changeNews1HomePage");
            const init = {
                method: "POST",
                body: data
            };
            const response = await fetch(myRequest, init);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const image = await response.text();
            ui.changeNews1(image);
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
        // permitimos volver a enviar el formulario de nuevo
        // enviarFormulario.enviando = false;
    })();
    an_news1_FORM.onsubmit;
})

const an_news2_FORM = document.getElementById("news2Homepage_FORM");
const an_news2_Input = document.getElementById("inputNews2");
an_news2_Input.addEventListener("change", (e) => {
    e.preventDefault();
    if (an_news2_Input.value == "") {
        return alert("Debe Indicar Una Imagen Válida.");
    }
    (async (e) => {
        const ui = new Interfaz();
        var data = new FormData();
        data.append("news2", an_news2_Input.files[0]);
        try {
            const myRequest = new Request(location.origin + "/Miranda/usuarios/changeNews2HomePage");
            const init = {
                method: "POST",
                body: data
            };
            const response = await fetch(myRequest, init);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const image = await response.text();
            ui.changeNews2(image);
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
        // permitimos volver a enviar el formulario de nuevo
        // enviarFormulario.enviando = false;
    })();
    an_news2_FORM.onsubmit;
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

    (showPhotoPerfil = async (e) => {
        const myRequest = new Request(location.origin + "/Miranda/usuarios/showAnnouncementNews1News2");
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


// const an_announcement_FORM = document.getElementById("announcementHomepage_FORM")
// const an_announcement_Input = document.getElementById("inputPhotoPerfil")

// for (const i of buttons_Delete) {
//     i.onchange = function (e) {
//         (async () => {
//             try {
//                 const response = await fetch(i.href);
//                 if (!response.ok) {
//                     throw new error(response.statusText);
//                 }
//                 const a_register = await response.json();
//                 alert(a_register)
//             } catch (error) {
//                 alert("Error al enviar el formulario: " + error.message);
//             }
//             // permitimos volver a enviar el formulario de nuevo
//             // enviarFormulario.enviando = false;
//         })();
//         e.preventDefault()

//     }
// }





//SCRIPT TO CHANGE PHOTO IN MANAGEMENT HOMEPAGE--- ANUNCIO
document.getElementById("Announcement").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputAnnouncement").classList.add("active");
})
document.getElementById("Announcement").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputAnnouncement").classList.remove("active");
})
document.getElementById("labelInputAnnouncement").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputAnnouncement").classList.add("active");
})
document.getElementById("labelInputAnnouncement").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputAnnouncement").classList.remove("active");
})
//--------------------------------------------------NEWS1
document.getElementById("news1").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputNews1").classList.add("active");
})
document.getElementById("news1").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputNews1").classList.remove("active");
})
document.getElementById("labelInputNews1").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputNews1").classList.add("active");
})
document.getElementById("labelInputNews1").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputNews1").classList.remove("active");
})
//-------------------------------------------------NEWS2

document.getElementById("news2").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputNews2").classList.add("active");
})
document.getElementById("news2").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputNews2").classList.remove("active");
})
document.getElementById("labelInputNews2").addEventListener("mouseover", (e) => {
    document.getElementById("labelInputNews2").classList.add("active");
})
document.getElementById("labelInputNews2").addEventListener("mouseout", (e) => {
    document.getElementById("labelInputNews2").classList.remove("active");
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


/*===== MENU DE NAVEGACIÓN RESPONSIVE */

// const openMenu = document.getElementById("icon-burger")
// const menu = document.getElementById("enlaces");
// let close = true;

// openMenu.addEventListener("click", () => {
//   if (close) {
//     menu.style.width = "100%";
//     close = false;
//   } else {
//     menu.style.width = "0%";
//     menu.style.overflow = "hidden";
//     close = true;
//   }
// });



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