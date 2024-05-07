
<?php
include_once("../../../configuracion.php");
require '../../../vendor/autoload.php';

$datos = data_submitted();
$obj = new AbmCompraEstado();
$resp = $obj->pagarCompra($datos);
if($resp){
 /*  header('Location:../misCompras.php'); */
  
  $merkPago = $obj->abonarCompra($datos);
 header('Location:../abonarCompra.php?pago='.$merkPago);
  
}else{
 
 header('Location:../misCompras.php');
}

?>

