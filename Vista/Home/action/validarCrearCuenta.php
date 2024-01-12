<?php

include_once "../../../configuracion.php";
$datos = data_submitted();
$nuevoUsuario = new AbmUsuario();

$paramUsuario['usnombre'] = $datos['usnombre'];
$colUsuarios = $nuevoUsuario->buscar($paramUsuario);

if (count($colUsuarios) == 0){
    $resultado = $nuevoUsuario->crearUsuario($datos);
} else {
    $resultado = false;
}

//ARMA LAS RESPUESTAS PARA LA SOLICITUD AJAX
if ($resultado){
    $respuesta = array("resultado" => "exito", "mensaje" => "Su cuenta ha sido creada con éxito.
    \nEspere a que un administrador le asigne un rol para poder ingresar.
    \nLa clave generada por defecto es: 123456
    \nRecuerde cambiarla en su próximo inicio de sesión.");
    
} else {

    if (count($colUsuarios) > 0){
        $respuesta = array("resultado" => "error", "mensaje" => "El nombre de usuario ya se encuentra en uso.");
    } else {
        $respuesta = array("resultado" => "error", "mensaje" => "No fue posible crear su cuenta.");
    }
}

echo json_encode($respuesta);

/* $usnombre = $datos['usnombre'];
$usmail = $datos['usmail'];

$param['usnombre'] = $usnombre;
$param['usmail'] = $usmail;
$param['idusuario'] = 0;
$param['uspass'] = md5(123456);
$param['usdeshabilitado'] = NULL;

$objUsuario = new AbmUsuario();
$resultado = $objUsuario->alta($param);// poner el resulstado de crear al usuario (true o false)
$nuevaCompra = new AbmCompra();
$aux['idcompra'] = 0;
$aux['cofecha'] = null;
$aux['idusuario'] = $idusuario;
$nuevaCompra->alta($aux);
$resp = true; */
?>