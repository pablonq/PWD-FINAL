<?php
include_once ("../../../configuracion.php");
require '../../../vendor/autoload.php';
use PhpSpreadsheet\IOFactory;
$datos = data_submitted();
/* verEstructura($datos);
var_dump($_FILES["excel"]);
die; */
$objProducto = new AbmProducto();
 $exito = $objProducto->agregarProductosExcel($datos);
if($exito){
    header("Location: ../gestionarProductos.php");
}else{
    header("Location: ../crearProductos.php");
}


?>