<?php
include_once("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted(); //idCompra
//verEstructura($datos);

$objEstado = new AbmCompraEstado();
/*  $param['idcompra'] = $datos;
    $param['idcompraestadotipo'] = 1;
    $param['cefechafin'] = null;
    $exito = $objEstado->buscar($param); */


$cambioRealizado = $objEstado->cancelarCompra($datos);
if ($cambioRealizado) {
    header('Location: ../misCompras.php');
} else {
    header('Location: ../misCompras.php');
}
