<?php
include_once("../../configuracion.php");
require '../../vendor/autoload.php';

$datos = data_submitted();
$idPreferencia = isset($datos['id_preferencia']) ? $datos['id_preferencia'] : null;

?>

<div class="modal" id="merkPago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <a href="#"> <img src="../img/logo.png" class="logo" alt="Logo"></a>
      <br>
      <br>
      <div class="h2">Pague su Compra con MercadoPago</div>
      <!-- Zona de alerta -->
      <div class="checkout-btn"></div>
    </div>
  </div>
</div>

<script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"></script>
<script>
  // Obtén el ID de preferencia desde PHP
  var idPreferencia = '<?php echo $idPreferencia; ?>';

  // Si idPreferencia es null, no configures el botón de pago
  if (idPreferencia !== null) {
    // Crea una instancia de MercadoPago y configura el botón de pago
    const mp = new MercadoPago('TEST-9c5026e5-50a5-40c0-9203-6a14199c474b', {
      locale: 'es-AR',
    });
    const checkout = mp.checkout({
      preference: {
        id: idPreferencia
      },
      render: {
        container: '.checkout-btn',
        label: 'PAGAR'
      }
    });
  }
</script>
