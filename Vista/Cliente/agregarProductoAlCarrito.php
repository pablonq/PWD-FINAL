<?php
include_once('../../configuracion.php');
$tituloPagina = "Agregar Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

$datos = data_submitted();
$abmProducto = new AbmProducto;

//Recibe desde productos.php el id del producto seleccionado
$busquedaProducto = $abmProducto->buscar($datos);

?>

<?php
    if (count($busquedaProducto) > 0){
        $producto = $busquedaProducto[0];

        echo '
        <div class="container mt-4 mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="mb-2 mt-2 text-center">'; echo $producto->getProNombre(); echo '</h4>
                        </div>
                        <div class="card-body">

                        <!-- Zona de alerta -->
                        <div id="alertaMensajes">
                        </div>

                            <form name="formAgregarProducto" id="formAgregarProducto" method="POST" class="row needs-validation">
                                <div class="col-md-6">
                                    <img class="card-img-top" style="height: 16rem;" src='; echo $producto->getImagenProducto(); echo ' alt="Product Image">
                                </div>
                                <div class="col-md-6">
                                    <label for="idproducto">Código:</label>
                                    <input type="text" name="idproducto" id="idproducto" class="visorProducto w-100" value='; echo $producto->getIdProducto(); echo ' readonly>

                                    <label for="pronombre">Nombre:</label>
                                    <input type="text" id="pronombre" name="pronombre" class="visorProducto w-100" value='; echo $producto->getProNombre(); echo ' readonly>

                                    <label for="prodetalle">Precio:</label>
                                    <input type="text" id="prodetalle" name="prodetalle" class="visorProducto w-100" value='; echo "$" . $producto->getProDetalle(); echo ' readonly>

                                    <label for="cicantidad">Stock:</label>
                                    <input type="text" id="cicantidad" name="cicantidad" class="visorProducto w-100" value='; echo $producto->getProCantstock(); echo ' readonly>

                                    <div class="contenedor-dato form-group">
                                        <label for="cantidad">Cantidad a llevar:</label>
                                        <input type="text" id="cantidad" name="cantidad" class="form-control w-100">
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-3 w-100" value="Agregar al Carrito">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

<script src="../js/validarProductoCarrito.js"></script>

<?php
include_once("../Estructuras/footer.php");
?>