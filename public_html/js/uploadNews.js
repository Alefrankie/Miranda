class NewsInterface {

    updateIconNews(news) {
        document.getElementById("photoNews").setAttribute("src", `data:image/png;base64,${news}`);
        form.reset();
    }

    showMessage(mensaje) {
        const Warnings = document.getElementById("warnings");
        const element = document.createElement('div');
        element.innerHTML = `
          <div id="warning-message">
              <h5>${mensaje}</h5><br>
          </div>
          `;
        Warnings.appendChild(element);
        setTimeout(() => {
            document.getElementById("warning-message").remove();
        }, 2000)
    }

}

//DOM EVENTS
//----------- UPLOAD NEWS
const form = document.getElementById("form");
document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault();
    const description = document.getElementById("description").value;
    const ui = new NewsInterface();
    if (description === "") {
        return ui.showMessage("Debe indicar una Descripción.");
    } else if (description.length <= 6) {
        return ui.showMessage("Descripción No Válida.");
    } else {
        (async (e) => {
            const data = new FormData(form);
            const init = {
                method: form.method,
                body: data
            };
            try {
                const response = await fetch(form.action, init);
                if (response.ok) {
                    const respuesta = await response.json();
                    ui.showMessage("Publicación Realizada con Éxito.");
                    ui.updateIconNews(respuesta);
                } else {
                    throw new error(response.statusText);
                }
            } catch (error) {
                alert("Error al enviar el formulario: " + error.message);
            }
            // permitimos volver a enviar el formulario de nuevo
            // enviarFormulario.enviando = false;
        })();
    }

})

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



