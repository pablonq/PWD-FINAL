<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
include_once('../../../configuracion.php');
$datos = data_submitted(); //estoy recibiendo el id del rol y el usuario
verEstructura($datos);
$datos['medeshabilitado'] = "0000-00-00 00:00:00";
verEstructura($datos);
$objMenu = new AbmMenu();
$exito = $objMenu->alta($datos);

if ($exito) {
    echo "Menu Creado";
} else {
    echo "Algo fallo";
}
?>