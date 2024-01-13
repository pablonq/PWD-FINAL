<?php
include_once("../../configuracion.php");
$tituloPagina = "Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
?>

<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->
<div class="container">
    <?php

    $datos = data_submitted();
    $objProducto = new AbmProducto();
    $listaProd = $objProducto->buscar($datos);

    if(count($listaProd) > 0){

        echo "<div class='row'>";
        for ($i = 0; $i < count($listaProd); $i++) {
            echo "<div class='col'>";
            echo "<div class='p-3 d-flex justify-content-center align-items-center'>";
            echo "<div class='card text-center sombraCarta' style='width: 17rem;'>";
            echo "<img class='card-img-top' style='height: 16rem;' src='" . $listaProd[$i]->getImagenProducto() . "' alt='" . $listaProd[$i]->getProNombre() . "'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $listaProd[$i]->getProNombre() . "</h5>";
            echo "<p class='card-text'>Precio: $" . $listaProd[$i]->getProDetalle() . "</p>";
            echo "<p class='card-text'>Stock: " . $listaProd[$i]->getProCantstock() . "</p>";
        
            echo "<a href='agregarProductoAlCarrito.php?idproducto=".$listaProd[$i]->getIdProducto()."'  class='btn btn-primary' >Agregar al carrito</a></button>";

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";

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
</div>
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>