<?php
include_once("../../configuracion.php");
$tituloPagina = "Gestionar Productos";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");
$objAbmProducto = new AbmProducto();

//Desde aquí se puede ver la lista de productos y modificarla
$listaProductos = $objAbmProducto->buscar(null);
?>

<div class="gestionarProductos">
    <?php
    if (count($listaProductos) > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-light">
                <tr>
                    <th style="width: 80px;">IMAGEN</th>
                    <th style="width: 400px;">NOMBRE PRODUCTO</th>
                    <th style="width: 80px;">PRECIO</th>
                    <th style="width: 80px;">STOCK</th>
                    <th style="width: 80px;">OPCIONES</th>
                </tr>
              </thead>';
        echo '<tbody>';
        for ($i = 0; $i < count($listaProductos); $i++) {
            $objProducto = $listaProductos[$i];
            
            echo '<tr>
                    <td><img src=' . $objProducto->getImagenProducto() . ' width="100px"></td>
                    <td>' . $objProducto->getProNombre() . '</td>
                    <td> $' . $objProducto->getProDetalle() . '</td>
                    <td>' . $objProducto->getProCantstock() . '</td>
                    <td><a href="modificarProductos.php?idproducto=' . $objProducto->getIdProducto() . '" class="btn btn-primary">Modificar</a></td>
                  </tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="alert alert-info" role="alert">No se encontraron productos.</div>';
    }
    ?>
</div>

<?php
include_once("../Estructuras/footer.php");
?>

