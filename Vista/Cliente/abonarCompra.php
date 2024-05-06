<div class="modal" id="merkPago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="formLogin" id="formLogin" method="POST" class="needs-validation">
        <a href="#"> <img src="../img/logo.png" class="logo" alt="Logo"></a>
        <br>
        <br>
        <div class="h2">Pague su Compra con MercadoPago</div>
        <!-- Zona de alerta -->
        <div class="checkout-btn"></div>
      </form>
    </div>
  </div>
</div>

<script>
  // Declara una variable global para almacenar el ID de la compra
  var respMerk = '<?php echo $respMerk; ?>';

  // Función para abrir el modal y cargar el botón de pago de MercadoPago
  function abrirModal() {
    // Obtén el modal por su id
    var modal = document.getElementById("merkPago");
    // Muestra el modal
    modal.style.display = "block";
  }

  // Ejecuta la función para abrir el modal cuando la página cargue
  window.onload = function() {
    abrirModal();
    const mp = new MercadoPago('TEST-9c5026e5-50a5-40c0-9203-6a14199c474b', {
      locale: 'es-AR',
    });
  
    const checkout = mp.checkout({
      preference: {
        id: respMerk
      },
      render: {
        container: '.checkout-btn',
        label: 'PAGAR'
      }
    });
  };
</script>
