/* FUNCIÓN AUTO LLAMADA
(function NOMBRE FUNCIÓN(){ ...  })();
*/

// const cerrar = document.querySelectorAll(".close")[0];
// const abrir = document.querySelectorAll(".abrir-modal")[0];
// const modal = document.querySelectorAll("#modals")[0];
// const modalContainer = document.querySelectorAll("#anuncio1")[0];

// abrir.addEventListener("click", function (e) {;
//     e.preventDefault();
//     modalContainer.style.opacity = "1";
//     modalContainer.style.visibility = "visible";
//     modalContainer.classList.toggle("anuncio");
//     modal.classList.toggle("modals");
// });

// window.addEventListener("click", function (e) {
//     console.log(e.target);

//     if (e.target == modalContainer) {;
//         setTimeout(function () {;
//             modal.classList.toggle("modal-close");
//             modalContainer.style.opacity = "0";
//             modalContainer.style.visibility = "hidden";
//         }, 1000);

//     };
// });


/*===== SCRIPT AMPLIACIÓN DE IMÁGENES =====*/
const contenedor = document.getElementsByClassName("gallery");
const amp = document.getElementsByClassName("imagen");

for (const i of amp) {
  i.onclick = function () {
    if ((i.style.transform = "scale(1)") == true ) {
      i.style.transform = "scale(1.5)";
    } else {
      i.style.transform = "scale(1)";
    }
  }
}