<?php
include_once("../../configuracion.php");
$tituloPagina = "Crear Productos";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");
?>


<div class="crearProducto">

  <form action="action/agregarProducto.php">
    <h4 class="mb-2 mt-2 text-center">Crear Producto</h4>
     
       <label for="pronombre">Nombre Producto:</label>
       <input type="text" class="form-control" name="pronombre" id="pronombre">

       <label for="prodetalle">Precio:</label>
       <input type="text" class="form-control" name="prodetalle" id="prodetalle">
   
       <label for="procantstock">STOCK:</label>
       <input type="text" class="form-control" name="procantstock" id="procantstock">
    
       <label for="tipo">Tipo:</label>
       <input type="text" class="form-control" name="tipo" id="tipo">
    
       <label for="imagenproducto">Imagen:</label>
       <input type="text" class="form-control" name="imagenproducto" id="imagenproducto">
     
     <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Crear</button>
     <button type="button" id="cerrarFormulario"  class="btn btn-danger btn-lg w-100 mt-3">CANCELAR</button>
  </form>
        
</div>

<div class="cargarExcel">
  <form action="action/importarProductos.php" method="post">
    <label for="" class="form-label">Seleccione Archivo Excel</label>
    <input type="file" name="excel" id="excel" class="form-control">
    <button type="button" class="btn btn-primary mt-5" name="send">Importar Productos</button>
  </form>

</div>
<?php
include_once("../Estructuras/footer.php");
?>