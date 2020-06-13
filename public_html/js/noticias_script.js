class NewsInterface {

  showImagesNews(table) {
    const seccionPrincipal = document.getElementById("sección-principal");
    const buttons_Delete = document.getElementsByClassName("buttonDelete")
    const myRequest = location.origin + "/Miranda/noticias/deleteNews/";
    for (let valor of table) {
      seccionPrincipal.innerHTML += `
      <article class="articulo">
			    <div class="cabecera-articulo">
			          <div class="thumbnail">
			              <img loading="lazy" src="data:image/png;base64,${valor.photoPerfil}" alt="X">
			          </div>
                  <a href="">${valor.user}</a>
			            <a class="buttonDelete" href="${myRequest + valor.id_noticia}" type="submit">Eliminar Noticia</a>
          </div>
          
			    <div class="gallery">
			          <img loading="lazy" src="data:image/png;base64,${valor.imagenNews}" alt="" class="imagen" />
			    </div>
          
          <div class="footer-article">
			          <p>"${valor.description_image}"</p>
          </div>
          
		  </article>
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
            const a_news = await response.json();
            alert(a_news)
            window.location.reload(true)
          } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
          }
        })();
        e.preventDefault()

      }
    }
  }
}

//DOM EVENTS
//------------ CHARGE NEWS
window.addEventListener("load", (e) => {
  const Admin = document.getElementById("Admin").innerText;
  const buttons_Delete = document.getElementsByClassName("buttonDelete")
  const myRequest = new Request(location.origin + "/Miranda/noticias/updateNews");
  (async (e) => {
    const ui = new NewsInterface();
    try {
      const response = await fetch(myRequest);
      if (!response.ok) {
        throw new error(response.statusText);
      }
      const news = await response.json();
      ui.showImagesNews(news);

      if (Admin == "Usuario" || Admin == "RIF G-20000169-0") {
        Array.from(buttons_Delete).forEach(function (element) {
          element.style.display = 'none'
        });
      }

    } catch (error) {
      alert("Error al enviar el formulario: " + error.message);
    }
  })();
})



/*===== SCRIPT AMPLIACIÓN DE IMÁGENES =====*/
const contenedor = document.getElementsByClassName("gallery");
const amp = document.getElementsByClassName("imagen");

for (const i of amp) {
  i.onclick = function () {
    if ((i.style.transform = "scale(1)") == true) {
      i.style.transform = "scale(1.5)";
    } else {
      i.style.transform = "scale(1)";
    }
  }
}

/*===== SCRIPT MENU DE NAVEGACIÓN =====*/
const header = document.getElementsByTagName("header")[0];
const section = document.getElementsByTagName("section")[0];
const positionSection = section.getBoundingClientRect().top;
const x = document.getElementsByClassName("inicio");

document.addEventListener("scroll", () => {
  if (window.pageYOffset > positionSection) {
    header.classList.add("fondo-gradiente");
  } else {
    header.classList.remove("fondo-gradiente");
  }
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
