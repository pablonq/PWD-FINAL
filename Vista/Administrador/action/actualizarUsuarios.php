<?php 
include_once('../../../configuracion.php');
$datos = data_submitted();
//verEstructura($datos);
$objUsuario = new AbmUsuario();



    $exito = $objUsuario->modificar($datos);
    if($exito){
        header('Location:../gestionarUsuarios.php');
    }else{
        //echo "Algo fallo";
        header('Location:../gestionarUsuarios.php');
    }


?>