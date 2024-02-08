<?php
include_once("../../configuracion.php");
$tituloPagina = "Su Carrito de Compras";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/navSeguro.php");

$idUsuario = $session->getIdUsuario();
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
 
//Agrega credenciales

MercadoPago\SDK::setAccessToken('TEST-1323948781483767-020715-1d49ac76392fec760ea8bd8d320dbfc3-1673270882');


?>



<div class="carrito mt-8">
    <?php
    $montoAPagar = 0;
    if (count($listaCompraItem) > 0) {
        echo "<table class='table table-bordered'>";
        echo '<thead class="thead-dark"><tr><th scope="col">IMAGEN</th><th scope="col">NOMBRE PRODUCTO</th><th scope="col">CANTIDAD</th><th scope="col">PRECIO POR UNIDAD</th><th scope="col">OPCIONES</th></tr></thead><tbody>';
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
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
          <td><img src=' . $producto->getImagenProducto() . ' width="50px"></td>
          <td>' . $producto->getProNombre() . '</td>
          <td>' . $objCompraItem->getCiCantidad() . '</td>
          <td>' . $producto->getProDetalle() . '</td>
          <td><a href="action/quitarProductoCarrito.php?idcompraitem=' . $objCompraItem->getIdCompraItem() . '" class="btn btn-danger w-100">Quitar Producto</a></td>
          </tr>';
        }
        $preference->items = $items;
        $preference->back_urls = array("success"=>"action/pagoCompra.php?idusuario='.$idUsuario.'", "failure"=>"carrito.php");
        $preference->save();  
        echo '<tr><td colspan="3">Metodo de Envio: <select class="form-select" aria-label="Default select example" name="envio" required>
        <option selected disabled value="">Seleccione una opción</option>
        <option value="$paramCompra["identrega"] = 1">Retiro en Sucursal</option>
        <option value="$paramCompra["identrega"] = 2">Envio a Domicilio</option>
        
        </select></td>';
        echo '<td colspan="1" class="robotoBold">Total: $'.$montoAPagar.'</td>';
        echo '<td colspan="1"><div href="" class="checkout-btn"></div></td></tr>';
        /* echo '<td colspan="1"><a href="action/pagoCompra.php?idusuario='.$idUsuario.'" class="btn btn-primary w-100">REALIZAR COMPRA</a></td></tr>'; */
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
     id:'<?php echo $preference->id; ?>'
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