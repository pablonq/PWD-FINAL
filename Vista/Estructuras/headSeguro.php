<?php
include_once("../../configuracion.php");

$session = new Session();

//Valido logueo correcto y ademas que tenga permiso(rol)
if ($session->validar() && $session->tienePermiso()) {
    $rol = $session->getIdRol();
    $colRoles = $session->getColRoles();
} else {
    $session->redireccionar();
}

?>

<!DOCTYPE html>
<html lang="es">

<!-- ________________________________________ HEAD SEGURO ______________________________________ -->

<head>

    
<meta charset="UTF-8">
            <meta name="author" content="PABLO NAVARRO FAI-4284">
            <meta name="description" content="TRABAJO FINAL PWD">
            <meta name="keywords" content="Trabajo final PWD">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- TITULO -->
            <title><?php echo $tituloPagina ?></title>
            <!-- BOOTSTRAP ICONO-->
		        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <!-- FUENTE -->
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

            
            <!-- BOOTSTRAP -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <!-- CSS -->
            <link href="../css/estilos.css" rel="stylesheet">

            <!-- Favicon -->
            <link rel="icon" type="image/x-icon" href="../img/logo.png">

          <!-- link a librería de jquery -->
          <script src="../../Util/librerias/jquery/jquery-3.7.1.min.js"></script>
            <script src="../../Util/librerias/jquery/jquery.validate.min.js"></script>
            <script src="../../Util/librerias/jquery/messages_es_PE.js"></script>

            <!-- link a librería JS para encriptar -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
            <script src="https://sdk.mercadopago.com/js/v2"></script>


</head>
<!-- ________________________________________ FIN HEAD SEGURO __________________________________ -->

<!-- ________________________________________ INCIO BODY _______________________________________ -->
<body>