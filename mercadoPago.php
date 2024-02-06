<?php
require 'vendor/autoload.php';
MercadoPago\SDK::setAccessToken('TEST-1289708495081474-020310-c44b89311d71f3c7048b39e3c2882c27-167604962');

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
  const mp = new MercadoPago('TEST-6755ed7a-3269-43a2-b4c5-7352f056e0a5',{
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