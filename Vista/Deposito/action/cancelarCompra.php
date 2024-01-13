<?php
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
verEstructura($datos);
$objEstado = new AbmCompraEstado();
$cancelado = $objEstado->cancelarCompra($datos);
if($cancelado){
    header("Location: ../gestionarCompras.php"); 
}else{
    header("Location: ../gestionarCompras.php"); 
}
?>