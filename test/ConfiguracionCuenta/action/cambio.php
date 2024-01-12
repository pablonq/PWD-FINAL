<?php 
//
 include_once '../../../configuracion.php';
 $datos = data_submitted();
 verEstructura($datos);
 /*$passEncript= md5($datos['uspass']);
 $datos['uspass']=$passEncript;*/
 $session = new Session();
 $session->actualizarRol($datos);
 header("../cambioRol.php");
 
?>