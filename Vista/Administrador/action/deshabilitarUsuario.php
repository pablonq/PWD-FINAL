<?php
/**Aca se llama al metodo borradoLogico de AmbUsuario*/
include_once("../../../configuracion.php");
$objAbmUsuario = new AbmUsuario();
$datos = data_submitted();
//verEstructura($datos);

if(isset($datos['idusuario'])){
    $resp = $objAbmUsuario->borradoLogico($datos);
    if($resp){
        header('Location:../gestionarUsuarios.php');
    }else{
        header('Location:../gestionarUsuarios.php');
    }
    
}