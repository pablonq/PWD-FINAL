<?php
require 'vendor/autoload.php';
MercadoPago\SDK::setAccessToken('TEST-1323948781483767-020715-1d49ac76392fec760ea8bd8d320dbfc3-1673270882');

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
  <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
  <h3>MERCADOPAGO</h3>

  <div class="checkout-btn"></div>



  

  <script>
  const mp = new MercadoPago('TEST-9c5026e5-50a5-40c0-9203-6a14199c474b',{
    locale: 'es-AR',
    
  });
const checkout = mp.checkout({
  preference:{
    id:'<?php echo $preference->id; ?>'
  },
  
  render: {
    container: '.checkout-btn',
    label: 'PAGAR'
  }
  
  })
  </script>
 






  
</body>
</html>