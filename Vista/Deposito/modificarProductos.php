<?php
include_once("../../configuracion.php");
$tituloPagina = "Gestionar Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
//recibe el idproducto
$datos = data_submitted();
$objProducto = new AbmProducto();
$buscarProducto = $objProducto->buscar($datos);
$producto = $buscarProducto[0];
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <!-- Puedes agregar un encabezado a tu tarjeta si lo deseas -->
                    <h4 class="mb-2 mt-2 text-center">Modificar Producto</h4>
                </div>
                <div class="card-body">
                    <form action="action/modificarProductos.php">
                        <div class="form-group">
                            <label for="idproducto">Id:</label>
                            <input type="text" class="form-control" name="idproducto" id="idproducto" value='<?php echo $producto->getIdProducto(); ?>' readonly>
                        </div>
                        <div class="form-group">
                            <label for="pronombre">Nombre Producto:</label>
                            <input type="text" class="form-control" name="pronombre" id="pronombre" value='<?php echo $producto->getProNombre(); ?>'>
                        </div>
                        <div class="form-group">
                            <label for="prodetalle">Precio:</label>
                            <input type="text" class="form-control" name="prodetalle" id="prodetalle" value='<?php echo $producto->getProDetalle(); ?>'>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("../Estructuras/footer.php");
?>