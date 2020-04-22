

/*===== ANUNCIO EMERGENTE AL INICIO =====*/
const anuncio = document.getElementsByClassName("anuncio-abierto")[0];
const img = document.getElementsByTagName("img")[0];
const anuncioContainer = document.getElementsByClassName("anuncio-container")[0];
const scrollS = document.getElementsByTagName("html")[0];

document.addEventListener("DOMContentLoaded", () => {
  scrollS.style.overflow = "hidden";
});

window.addEventListener("click", (e) => {
  if (e.target === anuncioContainer || e.target === img) {
    anuncio.classList.add("anuncio-cerrado");
    anuncioContainer.style.opacity = "1";
    anuncioContainer.style.visibility = "hidden";
    scrollS.style.overflow = "auto";
  }
});

/*===== ROTACIÓN DE IMÁGENES DE FONDO =====*/
document.addEventListener("DOMContentLoaded", () => {
  setInterval(() => {
    const fondo = document.getElementById("inicio");
    fondo.classList.toggle("init");
    fondo.classList.toggle("inicio");
  }, 4000);
});

/*===== SCRIPT ANIMACIÓN DE IMAGEN ALCALDE =====*/

const animación = document.getElementById("alcalde-animado");
const posiciónImagenAlcalde = animación.getBoundingClientRect().top;
const tamañoDePantalla = window.innerHeight;

document.addEventListener("DOMContentLoaded", () => {
  animación.style.transform = "translateX(-400%)";
});

window.addEventListener("scroll", () => {
  if (
    posiciónImagenAlcalde > tamañoDePantalla ||
    posiciónImagenAlcalde < tamañoDePantalla
  ) {
    animación.style.transform = "translateX(0%)";
  }
});

/*===== ESTE SCRIPT ES DEL SLIDER =====*/
function main() {
  (function () {
    /*===== Testimonial Slider =====*/

    $("a.page-scroll").click(function () {
      if (
        location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") ||
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ?
          target :
          $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html,body").animate({
              scrollTop: target.offset().top - 40,
            },
            900
          );
          return false;
        }
      }
    });

    /*====================================
    Show Menu on Book
    ======================================*/
    $(window).bind("scroll", function () {
      var navHeight = $(window).height() - 100;
      if ($(window).scrollTop() > navHeight) {
        $(".navbar-default").addClass("on");
      } else {
        $(".navbar-default").removeClass("on");
      }
    });

    $("body").scrollspy({
      target: ".navbar-default",
      offset: 80,
    });

    $(document).ready(function () {
      $("#team").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        autoHeight: true,
        itemsCustom: [
          [0, 1],
          [450, 2],
          [600, 2],
          [700, 2],
          [1000, 4],
          [1200, 4],
          [1400, 4],
          [1600, 4],
        ],
      });

      $("#clients").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        autoHeight: true,
        itemsCustom: [
          [0, 1],
          [450, 2],
          [600, 2],
          [700, 2],
          [1000, 4],
          [1200, 5],
          [1400, 5],
          [1600, 5],
        ],
      });

      $("#noticias-slider").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        autoHeight: true,
        itemsCustom: [
          [0, 1],
          [450, 2],
          [600, 2],
          [700, 2],
          [1000, 4],
          [1200, 4],
          [1400, 4],
          [1600, 4],
        ],
      });

      $("#testimonial").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
      });
    });
  })();
}
main();