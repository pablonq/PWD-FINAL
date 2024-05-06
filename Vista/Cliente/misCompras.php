<?php
include_once "../../configuracion.php";
$tituloPagina = "Mis Compras";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");

/**
 * desde aqui se puede:
 * Listar las compras de un usuario con sus productos
 * cancelar una compra iniciada
 */
?>

<div class="miscompras">
    <?php

    // recibe el id de usuario
    $datos['idusuario'] = $session->getIdUsuario();; 
    $objAbmCompra = new AbmCompra();
    $objAbmEstado = new AbmCompraEstado();
    $listaCompra = $objAbmCompra->buscar($datos);

    if (count($listaCompra) > 1) {

        echo "<table class='table table-bordered'>";
        echo '<thead>
                    <tr>
                      <th style="width: 50px;">ID COMPRA</th>
                      <th style="width: 105px;">FECHA</th>
                      <th style="width: 100px;">ESTADO DE COMPRA</th>
                      <th style="width: 700px;" rowspan="2">ITEMS</th>
                      <th style="width: 100px;">PRECIO TOTAL</th>
                      <th style="width: 150px;">PROGRESO</th>
                      
                    </tr>
              </thead>';
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
                    echo '<td class="bg-warning"> <div class="fondoAmarillo text-center">' . "Iniciada" . '</div></td>';

                } else if ($tipoEstado == "aceptada"){
                    echo '<td class="bg-primary"> <div class="fondoAzul text-center">' . "Aceptada" . '</div></td>';

                } else if ($tipoEstado == "enviada"){
                    echo '<td class="bg-success"> <div class="fondoVerde text-center">' . "Enviada" . '</div></td>';

                } else {
                    echo '<td class="bg-danger"> <div class="fondoRojo text-center">' . "Cancelada" . '</div></td>';

                }
                
                echo '<td>';

                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($bucarCompra);

                if (count($listaCompraItem) > 0) {
                    echo "<table>";
                    echo '<tr></tr>';

                    $total = 0;

                    for ($p = 0; $p < count($listaCompraItem); $p++) {
                        $objCompraItem = $listaCompraItem[$p];
                        $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                        $busquedaProducto = $objProducto->buscar($idProducto);
                        $producto = $busquedaProducto[0];
                        $total = $total + ($producto->getProDetalle() * $objCompraItem->getCiCantidad());

                        echo '<tr>
                                <td> -<b> ' . $producto->getProNombre() . '</b>.  Cant.: <b>'.$objCompraItem->getCiCantidad().'</b>.  Precio unit.: <b>$'.$producto->getProDetalle().'</b></td>
                              </tr>';
                    }
                    echo "</table>";
                    echo '<td class="robotoBold text-center"><b>$'.$total.'</b></td>';
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
<div class="checkout-btn"></div>
<script>
    const mp = new MercadoPago('TEST-9c5026e5-50a5-40c0-9203-6a14199c474b', {
        locale: 'es-AR'
    });

    const checkout = mp.checkout({
        preference: {
            id: '<?php echo $pagar; ?>'
        },
        render: {
            container: '.checkout-btn',
            label: 'PAGAR'
        }
    });
</script>
<?php
include_once("../Estructuras/footer.php");
?>


