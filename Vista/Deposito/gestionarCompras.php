<?php
include_once("../../configuracion.php");
$tituloPagina = "Gestionar Compras";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");
require '../../vendor/autoload.php';
/**
 * desde aqui se puede:
 * Listar las compras
 * ver los productos de las compras
 * modificar el estado de la compra
 * eliminar productos de la compra
 */
?>

<div class="comprasDeposito">
    <?php
    $objAbmCompra = new AbmCompra();
    $objAbmEstado = new AbmCompraEstado();
    $listaCompra = $objAbmCompra->buscar(null);

    if (count($listaCompra) > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead>
                <tr>
                    <th style="width: 50px;">ID DE COMPRA</th>
                    <th style="width: 105px;">FECHA</th>
                    <th style="width: 100px;">ESTADO DE COMPRA</th>
                    <th style="width: 700px;">ITEMS</th>
                    <th style="width: 100px;">PRECIO TOTAL</th>
                    <th style="width: 150px;">OPCIONES DE COMPRA</th>
                </tr>
              </thead>';
        echo '<tbody>';
        for ($i = 0; $i < count($listaCompra); $i++) {
            $objCompra = $listaCompra[$i];
            $idCompra['idcompra'] = $objCompra->getIdCompra();
            $estadoCompra = $objAbmEstado->buscar($idCompra);

            if (count($estadoCompra) > 0) {
                $resp = false;
                $j = 0;
                $tipoEstado = '';
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
                $listaCompraItem = $objCompraItem->buscar($idCompra);

                if (count($listaCompraItem) > 0) {
                    echo '<table>
                    <tr></tr>';

                    $total = 0;

                    for ($p = 0; $p < count($listaCompraItem); $p++) {
                        $objCompraItem = $listaCompraItem[$p];
                        $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                        $busquedaProducto = $objProducto->buscar($idProducto);
                        $producto = $busquedaProducto[0];
                        $total = $total + ($producto->getProDetalle() * $objCompraItem->getCiCantidad());

                        echo '<tr>
                                <td> - <b>' . $producto->getProNombre() . '</b>.   Cant.: <b>'.$objCompraItem->getCiCantidad().'</b>.  Precio unit.: <b>$'.$producto->getProDetalle().'</b></td>';
                                
                        if($tipoEstado == "cancelada"){
                            echo '<td></td>';
                        } else {
                            echo '<td><a href="action/eliminarArticuloCompra.php?idcompraitem=' . $objCompraItem->getIdCompraItem() . '" class="btn btn-warning" >X</a></td>';
                        }
                        echo'</tr>';
                    }
                    echo '</table>';
                    echo '<td class="robotoBold"><b>$'.$total.'</b></td>';
                }

                echo '</td>
                      <td>';
                
                      $body = 'Hola <b>'.$objCompra->getObjUsuario()->getUsNombre().'!</b>, Te queriamos avisar que tu compra a sido <b>ACEPTADA!</b>. Te informaremos a la brevedad como avanza tu compra.<br> <b>FERRETERIA CHANETON</b>';
                      $asunto = 'Estado de tu compra';
                      $url = "action/aceptarCompra.php?";
                      $url .= "idcompra=" . urlencode($objCompra->getIdCompra()); // Usar urlencode para asegurar que los valores sean válidos en la URL
                      $url .= "&body=" . urlencode($body);
                      $url .= "&asunto=" . urlencode($asunto);
                      
                      $bodyCancelar = 'Hola <b>'.$objCompra->getObjUsuario()->getUsNombre().'!</b>, Lamentablemente tu compra a sido <b>CANCELADA</b>. A la brevedad nos estaremos comunicando telefonicamente para dar explicaciones de la situaci´n de tu compra. Saludos.<br> <b>FERRETERIA CHANETON</b>';
                      $asuntoCancelar = 'Noticias sobre tu compra';
                      $urlCancelar = "action/cancelarCompra.php?";
                      $urlCancelar .= "idcompra=" . urlencode($objCompra->getIdCompra()); // Usar urlencode para asegurar que los valores sean válidos en la URL
                      $urlCancelar .= "&body=" . urlencode($bodyCancelar);
                      $urlCancelar .= "&asunto=" . urlencode($asuntoCancelar);

                      $bodyEnviar = 'Hola <b>'.$objCompra->getObjUsuario()->getUsNombre().'!</b>, Gracias por tu compra. Ya está en camino a tu domicilio.<br> FERRETERIA CHANETON';
                      $asuntoEnviar = 'Tu Compra esta en camino';
                      $urlEnviar = "action/enviarCompra.php?";
                      $urlEnviar .= "idcompra=" . urlencode($objCompra->getIdCompra()); // Usar urlencode para asegurar que los valores sean válidos en la URL
                      $urlEnviar .= "&body=" . urlencode($bodyEnviar);
                      $urlEnviar .= "&asunto=" . urlencode($asuntoEnviar);

                if 
                ($tipoEstado == 'iniciada') {
                    echo '<div class="d-block"> <a href='.$url.' class="btn btn-success w-100"  mr-2 >Aceptar</a>
                        <a href='.$urlCancelar.' class="btn btn-danger w-100" >Cancelar</a> </div>';

                } elseif ($tipoEstado == 'aceptada') {
                    echo '<div class="d-block"> <a href='.$urlEnviar.' class="btn btn-success w-100"  mr-2 >Enviar</a> 
                    <a href='.$urlCancelar.' class="btn btn-danger w-100" >Cancelar</a> </div>';

                } elseif ($tipoEstado == 'enviada') {
                    echo '<div class="d-block"> 
                    <a href='.$urlCancelar.' class="btn btn-danger w-100" >Cancelar</a> </div>';
                } elseif ($tipoEstado == 'cancelada') {
                    echo 'CANCELADA';
                }

                echo '</td>
                      </tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="container mt-5 mb-5">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6">';
        echo '<div class="card p-5">';
        echo '<div class="alert alert-info" role="alert">No se encontraron compras.</div>';
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


