<?php
include_once("../../../configuracion.php");
$datos = data_submitted();

$session = new Session();
$opcion = $datos['opcion'];
$session->actualizarIdRol($opcion);

header("Location: ../../Home/home.php");
?>