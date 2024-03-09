<?php
include_once("../../configuracion.php");
$tituloPagina = "Productos";
include_once("../Estructuras/headInseguro.php");
include_once("../Estructuras/navInseguro.php");
?>

<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->
<div class="producto">
  <div class="container_cards">


    <?php

    $datos = data_submitted();
    $objProducto = new AbmProducto();
    $listaProd = $objProducto->buscar($datos);

    if(count($listaProd) > 0){

        
        for ($i = 0; $i < count($listaProd); $i++) {
          echo "<div class='cards_producto'>";
            echo "<div class='cards_cuerpo'>";
              echo "<div class='card_img'><img src='" . $listaProd[$i]->getImagenProducto() . "' alt='" . $listaProd[$i]->getProNombre() . "'></div>";
              echo "<div class='card_info'>";
                echo "<p class='text_title'>". $listaProd[$i]->getProNombre() ."</p>";
                echo "<p class='text_body'> Stock: ". $listaProd[$i]->getProCantstock() ." uni</p>";
              echo "</div>";
            echo "</div>";
            echo "<div class='card_footer'>";
              echo "<span class='text_title'> $". $listaProd[$i]->getProDetalle()."</span>";
              echo "<div class='card_button'>";
              if($rol!=null){
                echo "<a href='../Cliente/agregarProductoAlCarrito.php?idproducto=".$listaProd[$i]->getIdProducto()."' ><i class='svg_icon bi bi-cart-check-fill'></i></a>";  
              }else{
              echo "<a href='Home.php' ><i class='svg_icon bi bi-cart-check-fill'></i></a>";
              }
              echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        /* echo "</div>"; */

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
</div>
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>