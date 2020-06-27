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
const ui = new NewsInterface();

//DOM EVENTS
//----------- UPLOAD NEWS
const form = document.getElementById("form");
document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault();
    const description = document.getElementById("description").value;
    if (description === "") {
        return ui.showMessage("Debe indicar una Descripción.");
    }
    if (description.length <= 6) {
        return ui.showMessage("Descripción No Válida (Debe contener más de 6 caracteres).");
    }
    (async (e) => {
        const data = new FormData(form);
        try {
            const init = {
                method: "POST",
                body: data
            };
            const myRequest = new Request(location.origin + "/Miranda/noticias/PostNews");
            const response = await fetch(myRequest, init);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const respuesta = await response.json();
            ui.showMessage("Publicación Realizada con Éxito.");
            ui.updateIconNews(respuesta);
        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
    })();
})



