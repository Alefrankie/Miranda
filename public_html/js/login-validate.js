class Login {
    constructor(user, password) {
        this.user = user
        this.password = password
    }
}

class Interfaz {

    showMessage(mensaje) {
        const Warnings = document.getElementById("warnings")
        const element = document.createElement('div')
        if (mensaje === "<br>Inicio de Sesión Exitoso.<br>") {
            element.innerHTML = `
            <div id="warning-message">
                <h5>Iniciando Sesión...</h5><br>
            </div>
            `
            Warnings.appendChild(element)
            return document.location.href = (location.origin + "/Miranda/usuarios/dashboard")
        }
        element.innerHTML = `
            <div id="warning-message">
                <h5>Advertencia: ${mensaje}</h5><br>
            </div>
            `
        Warnings.appendChild(element)
        // this.resetForm()
        setTimeout(() => {
            document.getElementById("warning-message").remove()
        }, 2000)
    }

    resetForm() {
        document.getElementById("form").reset()
    }
}
const ui = new Interfaz()

// DOM Events

document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault()
    const user = document.getElementById("user").value
    const password = document.getElementById("password").value

    const dataLogin = new Login(user, password)

    if (user == "" || password == "") {
        return ui.showMessage("Debe rellenar los campos faltantes.")
    }

    if (user.length <= 6 || password.length <= 6) {
        return ui.showMessage("Usuario/Contraseña No válido (Debe contener más de 6 caracteres).")
    }

    (async () => {
        try {
            const myRequest = new Request(location.origin + "/Miranda/usuarios/login")
            const init = {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dataLogin)
            }
            const response = await fetch(myRequest, init)
            if (!response.ok) {
                throw new Error(response.statusText)
            }
            const mensaje = await response.json()
            ui.showMessage(mensaje)
        } catch (err) {
            console.log("Error al realizar la petición AJAX: " + err.message)
        }
    })()
})

document.getElementById("forgotPassword").onclick = (e) => {
    e.preventDefault()
    alert("Contacte con el Administrador, para mayor información")
}

/*===== ANIMACIONES DE LOS INPUTS */
const inputUser = document.getElementById("user")
const inputPass = document.getElementById("password")
const h3usuario = document.getElementById("h3-usuario")
const h3contraseña = document.getElementById("h3-contraseña")


const an_inputs_array = document.getElementsByTagName("input")
const a_labelInput_array = document.getElementsByClassName("labelInput")

for (const i of an_inputs_array) {
    i.onblur = (e) => {
        for (const i2 of a_labelInput_array) {
            i2.style.top = ""
        }
    }
}

inputUser.addEventListener("focus", () => {
    h3usuario.style.top = "-30px"
})
inputUser.addEventListener("blur", () => {
    if (inputUser.value.length > 0) {
        return h3usuario.style.display = "none"
    }
    return h3usuario.style.display = "flex"

})

inputPass.addEventListener("focus", () => {
    h3contraseña.style.top = "-30px"
})
inputPass.addEventListener("blur", () => {
    if (inputPass.value.length > 0) {
        return h3contraseña.style.display = "none"
    }
    return h3contraseña.style.display = "flex"

})

