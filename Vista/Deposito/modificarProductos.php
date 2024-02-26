<?php
include_once("../../configuracion.php");
$tituloPagina = "Gestionar Productos";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");
//recibe el idproducto
$datos = data_submitted();
$objProducto = new AbmProducto();
$buscarProducto = $objProducto->buscar($datos);
$producto = $buscarProducto[0];
?>

<div class="modificarProducto">

                    <form action="action/modificarProductos.php">
                      <h4 class="mb-2 mt-2 text-center">Modificar</h4>
                        <input type="hidden" class="form-control" name="idproducto" id="idproducto" value='<?php echo $producto->getIdProducto(); ?>' readonly>
                        
                        <label for="pronombre">Nombre Producto:</label>
                        <input type="text" class="form-control" name="pronombre" id="pronombre" value='<?php echo $producto->getProNombre(); ?>'>
                        
                        <div class="form-group">
                            <label for="prodetalle">Precio:</label>
                            <input type="text" class="form-control" name="prodetalle" id="prodetalle" value='$<?php echo $producto->getProDetalle(); ?>'>
                        </div>
                        <div class="form-group">
                            <label for="procantstock">STOCK:</label>
                            <input type="text" class="form-control" name="procantstock" id="procantstock" value='<?php echo $producto->getProCantstock(); ?>'>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo:</label>
                            <input type="text" class="form-control" name="tipo" id="tipo" value='<?php echo $producto->getTipo(); ?>'>
                        </div>
                        <div class="form-group">
                            <label for="imagenproducto">Imagen:</label>
                            <input type="text" class="form-control" name="imagenproducto" id="imagenproducto" value='<?php echo $producto->getImagenProducto(); ?>'>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">MODIFICAR</button>
                        <button type="submit" href="gestionarProductos.php" class="btn btn-danger btn-lg w-100 mt-3">CANCELAR</button>
                    </form>
          
</div>

<?php
include_once("../Estructuras/footer.php");
?>