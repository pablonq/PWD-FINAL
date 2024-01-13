<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
include_once('../../configuracion.php');
$abmMenu = new AbmMenu();
//vamos ver que sucede desde la BD
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="action/altaItemMenu.php" method="post">


        Nombre del menu: <input type="text" id="menombre" name="menombre" > <br>
        Descripcion del menu: <input type="text" id="medescripcion" name="medescripcion" > <br>
        Id del menu padre al que pertenece (nada si no posee id padre): <input type="text" id="idpadre" name="idpadre" > <br>
        
       
        <input type="submit"  value="Crear"> 
    </form>
</body>
</html>