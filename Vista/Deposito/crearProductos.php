<?php
include_once("../../configuracion.php");
$tituloPagina = "Crear Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
?>


<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <!-- Puedes agregar un encabezado a tu tarjeta si lo deseas -->
                    <h4 class="mb-2 mt-2 text-center">Crear Producto</h4>
                </div>
                <div class="card-body">
                    <form action="action/agregarProducto.php">
                        <div class="form-group">
                            <label for="pronombre">Nombre Producto:</label>
                            <input type="text" class="form-control" name="pronombre" id="pronombre">
                        </div>

                        <div class="form-group">
                            <label for="prodetalle">Precio:</label>
                            <input type="text" class="form-control" name="prodetalle" id="prodetalle">
                        </div>

                        <div class="form-group">
                            <label for="procantstock">STOCK:</label>
                            <input type="text" class="form-control" name="procantstock" id="procantstock">
                        </div>

                        <div class="form-group">
                            <label for="tipo">Tipo:</label>
                            <input type="text" class="form-control" name="tipo" id="tipo">
                        </div>

                        <div class="form-group">
                            <label for="imagenproducto">Imagen:</label>
                            <input type="text" class="form-control" name="imagenproducto" id="imagenproducto">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Crear Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
include_once("../Estructuras/footer.php");
?>