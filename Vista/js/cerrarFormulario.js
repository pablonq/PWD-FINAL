
document.addEventListener('DOMContentLoaded', function () {
  let botonCerrarFormulario = document.querySelector('.boton-cerrar-formulario');
  if (botonCerrarFormulario) {
    botonCerrarFormulario.addEventListener('click', function () {
      function cerrarFormulario() {
        
        window.location.href = "../../index.php"; 
      }
      
      document.getElementById("cerrarFormulario").addEventListener("click", function() {
        cerrarFormulario();
      });
      
    });
  } else {
    console.warn("El elemento con clase 'boton-cerrar-formulario' no fue encontrado.");
  }
});