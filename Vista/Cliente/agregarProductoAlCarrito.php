<?php
include_once('../../configuracion.php');
$tituloPagina = "Agregar Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/navSeguro.php");

$datos = data_submitted();
$abmProducto = new AbmProducto;

//Recibe desde productos.php el id del producto seleccionado
$busquedaProducto = $abmProducto->buscar($datos);

?>
<div class="agregarProduc">
<?php
    if (count($busquedaProducto) > 0){
        $producto = $busquedaProducto[0];
         
        echo '
                <!-- Zona de alerta -->
                <form name="formAgregarProducto" id="formAgregarProducto" method="POST" class="text-center needs-validation">
                <img src='. $producto->getImagenProducto().' alt="Product Image">
                <br>
                <br>
                <br>
                <h4 class="text-center">'.$producto->getProNombre().'</h4>
                <div class="inputs text-center">
                <input type="hidden" name="idproducto" id="idproducto"  value='; echo $producto->getIdProducto(); echo '>
                
                <input type="hidden" id="pronombre" name="pronombre"  value='; echo $producto->getProNombre(); echo '>
                <label for="prodetalle" class="text-center">Precio:</label>
                <input type="text" id="prodetalle" name="prodetalle"  value=$'. $producto->getProDetalle().'>
                
                <input type="hidden" id="cicantidad" name="cicantidad"  value='; echo $producto->getProCantstock(); echo '>
                <br>
                <div class="text-center">
                <label for="cantidad">Cantidad a llevar:</label>
                <input type="text" id="cantidad" name="cantidad" class="form-control ">
                </div>
                <br>
                <input type="submit" class="btn btn-primary mt-3 w-100" value="Agregar al Carrito">
                
                </div>
                <div id="alertaMensajes" class="text-sm">
                </div>
                </form>
                         
            
          
        </div>';

    } else {
        echo '<div class="container mt-5 mb-5">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6">';
        echo '<div class="card p-5">';
        echo "<p class='alert alert-warning'>Error, la página a la que quiere acceder no existe.</p>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
?>

<!-- <script src="../js/validarProductoCarrito.js"></script> -->

<?php
include_once("../Estructuras/footer.php");
?>