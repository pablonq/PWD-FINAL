function cerrarFormulario() {
  // Aquí rediriges al usuario al "home"
  window.location.href = "../../index.php"; // Cambia "index.html" por la ruta de tu página de inicio
}

// Agregar el evento click al botón de cerrar formulario
document.getElementById("cerrarFormulario").addEventListener("click", function() {
  cerrarFormulario();
});