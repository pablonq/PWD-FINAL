<?php
include_once("../../configuracion.php");
$tituloPagina = "Su Carrito de Compras";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/navSeguro.php");

$idUsuario = $session->getIdUsuario();
$nombreUsuario = $session->getUsNombre();
$mailUsuario = $session->getUsMail();
$objCompra = new AbmCompra();
$busquedaCompra = $objCompra->buscarCarrito($idUsuario);

if($busquedaCompra == null){
  
  $objAbmNuevaCompra = new AbmCompra();
  $paramCompra['idcompra'] = 0;
  $paramCompra['cofecha'] = '0000-00-00 00:00:00';
  $paramCompra['idusuario'] = $idUsuario;
  $paramCompra['identrega'] = null;
  
  $objAbmNuevaCompra->alta($paramCompra);
  $busquedaCompra = $objAbmNuevaCompra->buscarCarrito($idUsuario);
}

$compra = $busquedaCompra[0]; 

$idUCompra ['idcompra'] = $compra->getIdCompra(); 

$objCompraItem = new AbmCompraItem();
$objProducto = new AbmProducto();
/**
 * Desde aqui se listan los productos del carrito
 */

$listaCompraItem = $objCompraItem->buscar($idUCompra);

//SDK de mercadopago
require '../../vendor/autoload.php';


MercadoPago\SDK::initialize();
?>



<div class="carrito mt-8">
  <?php
    $montoAPagar = 0;
    if (count($listaCompraItem) > 0) {
      echo "<table class='table table-bordered'>";
      echo '<thead class="thead-dark"><tr><th scope="col" style="width: 80px;">IMAGEN</th><th style="width: 600px;" scope="col">NOMBRE PRODUCTO</th><th scope="col" style="width: 80px;">CANTIDAD</th><th class="text-center" scope="col" style="width: 80px;">PRECIO POR UNIDAD</th><th style="width: 100px;" scope="col">OPCIONES</th></tr></thead><tbody>';
      
      $objPago = new merkPago();
       
        $items = array();
        for ($i = 0; $i < count($listaCompraItem); $i++) {
          $objCompraItem = $listaCompraItem[$i];
          $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
          $busquedaProducto = $objProducto->buscar($idProducto);
          $producto = $busquedaProducto[0];//objProducto
          $montoAPagar = $montoAPagar + ($producto->getProDetalle() *  $objCompraItem->getCiCantidad());
          
          $item = new MercadoPago\Item();
          $item->id = $idProducto['idproducto'];
          $item->title = $producto->getProNombre();
          $item->quantity = $objCompraItem->getCiCantidad();
          $item->unit_price = $producto->getProDetalle();
          $item->currency_id = "ARS";
          $items[] = $item;
          
          
          
          
          echo '<tr>
          <td class="text-center"><img src=' . $producto->getImagenProducto() . ' width="50px"></td>
          <td class="h5"><b>' . $producto->getProNombre() . '</b></td>
          <td class="text-center">' . $objCompraItem->getCiCantidad() . '</td>
          <td class="text-center"> $' . $producto->getProDetalle() . '</td>
          <td><a href="action/quitarProductoCarrito.php?idcompraitem=' . $objCompraItem->getIdCompraItem() . '" class="btn btn-danger w-100">Quitar Producto</a></td>
          </tr>';
        }
        $asunto = 'Gracias por tu compra!';
        $body = 'Hola <b>'.$nombreUsuario.'!</b>, Gracias por tu compra. Estamos preparando tu compra, a la brevedad te estaremos avisando del estado de la misma.<br> FERRETERIA CHANETON';
        $url = "action/pagoCompra.php?";
        $url .= "idusuario=" . urlencode($idUsuario); // Usar urlencode para asegurar que los valores sean válidos en la URL
        $url .= "&body=" . urlencode($body);
        $url .= "&asunto=" . urlencode($asunto);
        $url .= "&email=" . urlencode($mailUsuario);
        $url .= "&nombre=" . urlencode($nombreUsuario);
        

        $arrayRedireccion = array(
          "success" => "http://localhost/PWD/PWD-FINAL/Vista/Cliente/action/pagoCompra.php?idusuario=".$idUsuario ,
          "failure" => "http://localhost/PWD/PWD-FINAL/Vista/Cliente/action/carrito.php" ,
          "pending" => "http://localhost/PWD/PWD-FINAL/Vista/Cliente/action/pagoCompra.php?idusuario=".$idUsuario
        );
        $pagar = $objPago->pagar($items, $arrayRedireccion);
        
        echo '<td colspan="4" class="robotoBold text-center">Total:<b> $'.$montoAPagar.'</b></td>';
        echo '<td colspan="1"><div href="" class="checkout-btn"></div></td></tr>';
       echo '<td colspan="1"><a href='.$url.' class="btn btn-primary w-100">REALIZAR COMPRA</a></td></tr>';
        echo "</tbody></table><br><br>";
    } else {

        echo '<div class="container mt-5 mb-5">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6">';
        echo '<div class="card p-5">';
        echo "<p class='alert alert-warning'>No tiene productos en su carrito.</p>";
        
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
    ?>
</div>
<script>
  const mp = new MercadoPago('TEST-9c5026e5-50a5-40c0-9203-6a14199c474b',{
    locale: 'es-AR',
  });
  
  const checkout = mp.checkout({
   
   preference:{
     id:'<?php echo $pagar; ?>'
    },
    
    render: {
      container: '.checkout-btn',
      label: 'PAGAR'
    }
  })
 
  </script>

<?php
include_once("../Estructuras/footer.php");
?>