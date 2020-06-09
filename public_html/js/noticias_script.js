// FUNCIÓN OCULTACIÓN DE OPCIONES

class NewsInterface {

  showImagesNews(table) {
    const seccionPrincipal = document.getElementById("sección-principal");
    for (let valor of table) {
      seccionPrincipal.innerHTML += `
      <article class="articulo">
			    <div class="cabecera-articulo">
			          <div class="thumbnail">
			              <img loading="lazy" src="<?php echo RUTA_URL ?>/img/usuarios/profile.png" alt="X">
			          </div>
			            <a href="">${valor.user}</a>
          </div>
          
			    <div class="gallery">
			          <img loading="lazy" src="data:image/png;base64,${valor.imagen}" alt="" class="imagen" />
			    </div>
          
          <div class="footer-article">
			          <p>"${valor.description_image}".</p>
          </div>
          
		  </article>
        `;
    }
  }
}

//DOM EVENTS
//------------ CHARGE NEWS
(() => {
  const myRequest = new Request(location.origin + "/Miranda/noticias/updateNews");
  (async (e) => {
    const ui = new NewsInterface();
    try {
      const response = await fetch(myRequest);
      if (response.ok) {
        const images = await response.json();
        ui.showImagesNews(images);
      } else {
        throw new error(response.statusText);
      }
    } catch (error) {
      alert("Error al enviar el formulario: " + error.message);
    }
  })();
})();


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
