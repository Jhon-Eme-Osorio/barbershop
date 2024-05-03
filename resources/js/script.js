//esconder menú on click bootstrap
$(".navbar-nav>li>a").on("click", function () {
  $(".navbar-collapse").collapse("hide");
});

//cambiar imagen simular slider

document.addEventListener("DOMContentLoaded", function () {
   // Rutas de las imágenes
  var currentIndex = 0;
  var background = document.getElementById("example-1");

  function changeBackground() {
    background.style.backgroundImage = "url(" + images[currentIndex] + ")";
    currentIndex = (currentIndex + 1) % images.length;
  }

  // Cambiar imagen cada 5 segundos (5000 milisegundos)
  setInterval(changeBackground, 5000);

  // Cambiar la imagen al cargar la página
  changeBackground();
});


