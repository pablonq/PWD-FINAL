<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
include_once('../../../configuracion.php');

$datos = data_submitted();//estoy recibiendo el id del rol y el usuario
verEstructura($datos);
$objUsuarioRol = new AbmUsuarioRol();
$exito = $objUsuarioRol->alta($datos);
if($exito){
    header('Location:../gestionarUsuarios.php');
}else{
    header('Location:../gestionarUsuarios.php');
}

?>