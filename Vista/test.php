  <?php
  include_once("../configuracion.php");
  require ("../vendor/autoload.php");
   MercadoPago\SDK::initialize();
  $objPago = new merkPago();
  /* MercadoPago\SDK::setAccessToken('TEST-1323948781483767-020715-1d49ac76392fec760ea8bd8d320dbfc3-1673270882'); */
  /* $preference = new MercadoPago\Preference(); */
  $item = new MercadoPago\Item();
          $item->id = 3;
          $item->title = "destornillador";
          $item->quantity = 3;
          $item->unit_price = 300;
          $item->currency_id = "ARS";
          $items[] = $item;
          
  
          $arrayRedireccion = array(
            "success" => "http://localhost/PWD/PWD-FINAL/Vista/Cliente/action/pagoCompra.php",
            "failure" => "http://localhost/PWD/PWD-FINAL/Vista/Cliente/action/carrito.php",
            "pending" => "http://localhost/PWD/PWD-FINAL/Vista/Cliente/action/pagoCompra.php?idusuario="
          );
          /* $preference->items = array($item);
          $preference->save();  */
          $pagar = $objPago->pagar($items, $arrayRedireccion);
          echo $pagar;

    
          ?>
          <!DOCTYPE html>
          <html lang="es">
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <script src="https://sdk.mercadopago.com/js/v2"></script>     
          </head>
          
          <body>
            <div class="checkout-btn"></div>
            
        <script>
          

  const mp = new MercadoPago('TEST-9c5026e5-50a5-40c0-9203-6a14199c474b',{
    locale: 'es-AR',

  });

  const checkout = mp.checkout({
   
   preference:{
     id:'<?php echo $pagar;?>'
    },
    
    render: {
      container: '.checkout-btn',
      label: 'PAGAR'
    }
    
    
    
  });
  
 
  </script>
    
          </body>
          </html>
         
         <!--  $session = new Session();

  $rutaArchivo = $_SERVER['PHP_SELF'];
  $colDireccionesRuta = explode("/", $rutaArchivo); //Separa una sentencia por una letra o simbolo dado y retorna un array
  $direccionMenu = $colDireccionesRuta[count($colDireccionesRuta) - 1];
  $menues = $session->getColMenu();
  $colMenu = [];
  for ($i=0; $i < count($menues); $i++){//Consigo la colección de Menus
    $colMenu[] = $menues[$i]->getmeDescripcion();
  }
  $i=0;
  $resp=false;
  do{
    if($colMenu[$i]==="carrito.php"){
      $resp=true;
      break;
    }
    $i++;
    } while ($i<count($colMenu));
if($resp){
  echo "encontrado";
}else{
echo "no encontrado";
}
echo $rutaArchivo;
var_dump( $colDireccionesRuta);
echo $direccionMenu; -->
