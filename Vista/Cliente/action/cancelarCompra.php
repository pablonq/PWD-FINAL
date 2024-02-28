<?php
include_once("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted(); //idCompra
//verEstructura($datos);

$objEstado = new AbmCompraEstado();



$cambioRealizado = $objEstado->cancelarCompra($datos);
if ($cambioRealizado) {
    header('Location: ../misCompras.php');
} else {
    header('Location: ../misCompras.php');
}
