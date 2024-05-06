<?php
include_once ("../../../configuracion.php");
require '../../../vendor/autoload.php';
//pasa el carrito al estado iniciada
$datos= data_submitted();
/* verEstructura($datos); */
$obj = new AbmCompraEstado();
$resp = $obj->pagarCompra($datos);

 
if($resp){
   $respMerk = $obj->abonarCompra($datos);
   if($respMerk) {
    echo '<script> merkPago(' . json_encode($respMerk) . ');</script>';
   }else{
    header('Location: ../misCompras.php');
   }   

    
}else{
    header('Location: ../misCompras.php');
}

?>