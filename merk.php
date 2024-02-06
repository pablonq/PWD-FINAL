<?php
require_once 'vendor/autoload.php';

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

  // SDK de Mercado Pago

use MercadoPago\PreferenceClient;
// Agrega credenciales
MercadoPagoConfig::setAccessToken("PROD_ACCESS_TOKEN");

$preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();
        $item->id = '001';
        $item->title = 'compra2';
        $item->quantity = 2;
        $item->unit_price = 300;
        $item->currency_id = "ARS";
        $preference->items = array($item);
        $preference->save(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
// SDK MercadoPago.js
<script src="https://sdk.mercadopago.com/js/v2"></script>

</head>
<body>
  <div class="wallet_container"></div>
<script>  
const mp = new MercadoPago('TEST-6755ed7a-3269-43a2-b4c5-7352f056e0a5');
const bricksBuilder = mp.bricks();
mp.bricks().create("wallet", "wallet_container", {
   initialization: {
       preferenceId: "<PREFERENCE_ID>",
   },
customization: {
 texts: {
  valueProp: 'smart_option',
 },
}
});

</script>
</body>
</html>