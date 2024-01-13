<?php
include_once "../../configuracion.php";
$tituloPagina = "Mis Compras";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

/**
 * desde aqui se puede:
 * Listar las compras de un usuario con sus productos
 * cancelar una compra iniciada
 */
?>

<div class="container mt-4 mb-4">
    <?php

    // recibe el id de usuario
    $datos['idusuario'] = $session->getIdUsuario();; 
    $objAbmCompra = new AbmCompra();
    $objAbmEstado = new AbmCompraEstado();
    $listaCompra = $objAbmCompra->buscar($datos);

    if (count($listaCompra) > 1) {

        echo "<table class='table table-bordered'>";
        echo '<thead class="thead-dark"><tr><th>ID DE COMPRA</th><th>FECHA</th><th>ESTADO DE COMPRA</th><th>ITEMS</th><th>PROGRESO</th></tr></thead>';
        echo '<tbody>';

        for ($i = 0; $i < count($listaCompra); $i++) {
            $objCompra = $listaCompra[$i];
            $bucarCompra['idcompra'] = $objCompra->getIdCompra();
            $bucarCompra['idusuario'] = $datos['idusuario'];

            $estadoCompra = $objAbmEstado->buscar($bucarCompra);
            if (count($estadoCompra) > 0) {
                $resp = false;
                $j = 0;

                while ($j < count($estadoCompra) && $resp == false) {
                    $fechafin = $estadoCompra[$j]->getCeFechaFin();
                    if ($fechafin == '0000-00-00 00:00:00') {
                        $tipoEstado = $estadoCompra[$j]->getObjCompraEstadoTipo()->getDescripcion();
                        $resp = true;
                    }
                    $j++;
                }

                echo '<tr>
                <td> <div class="textoIdCompra text-center">' . $objCompra->getIdCompra() . '</div></td>
                <td>' . $objCompra->getCoFecha() . '</td>';
                if ($tipoEstado == "iniciada"){
                    echo '<td> <div class="fondoAmarillo text-center">' . "Iniciada" . '</div></td>';

                } else if ($tipoEstado == "aceptada"){
                    echo '<td> <div class="fondoAzul text-center">' . "Aceptada" . '</div></td>';

                } else if ($tipoEstado == "enviada"){
                    echo '<td> <div class="fondoVerde text-center">' . "Enviada" . '</div></td>';

                } else {
                    echo '<td> <div class="fondoRojo text-center">' . "Cancelada" . '</div></td>';

                }
                
                echo '<td>';

                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($bucarCompra);

                if (count($listaCompraItem) > 0) {
                    echo "<table class='table table-bordered'>";
                    echo '<tr class="robotoBold"><td>IMAGEN</td><td>PRODUCTO</td><td>PRECIO POR UNIDAD</td><td>CANTIDAD</td></tr>';

                    $total = 0;

                    for ($p = 0; $p < count($listaCompraItem); $p++) {
                        $objCompraItem = $listaCompraItem[$p];
                        $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                        $busquedaProducto = $objProducto->buscar($idProducto);
                        $producto = $busquedaProducto[0];
                        $total = $total + ($producto->getProDetalle() * $objCompraItem->getCiCantidad());

                        echo '<tr>
                                <td><img src=' . $producto->getImagenProducto() . ' width="60px"></td>
                                <td>' . $producto->getProNombre() . '</td>
                                <td>$' . $producto->getProDetalle() . '</td>
                                <td>' . $objCompraItem->getCiCantidad() . '</td>
                            </tr>';
                    }
                    echo '<tr><td colspan="4" class="robotoBold">Total: $'.$total.'</td></tr>';
                    echo "</table>";
                }
                if($tipoEstado == 'iniciada'){
                    echo '</td>
                            <td>
                                <a href="action/cancelarCompra.php?idcompra=' . $objCompra->getIdCompra() . '" class="btn btn-danger w-100">Cancelar Compra</a>
                            </td>
                        </tr>';
                } else if($tipoEstado == 'aceptada'){
                    echo '</td>
                            <td>
                                La compra está siendo preparada
                            </td>
                        </tr>';
                } else if($tipoEstado == 'enviada'){
                    echo '</td>
                            <td>
                                La compra ha sido enviada
                            </td>
                        </tr>';
                } else {
                    echo '</td>
                            <td>
                                La compra ha sido cancelada
                            </td>
                        </tr>';
                }
            }
        }
        echo '</tbody></table>';

    } else {
        echo '<div class="container mt-5 mb-5">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6">';
        echo '<div class="card p-5">';
        echo '<div class="alert alert-warning" role="alert">Historial de compras vacío.</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>

</div>

<?php
include_once("../Estructuras/footer.php");
?>


