<?php
/**
*/
 
include_once ('../../configuracion.php');
$session = new Session();
$rolActivo = $session->getRol();
$colRoles = $session->getListaRoles();
//$colRoles['colroles'][0]=1;
//$colRoles['colroles'][1]=2;
//$colRoles['colroles'][2]=3;
$cantRoles = count($colRoles['colroles']);

if($cantRoles > 1){

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="action/cambio.php" method="post">
        <select name="rol" id="rol">
            <?php
            $objRol = new AbmRol();
            for ($i = 0; $i < $cantRoles; $i++){
                $id['idrol'] = $colRoles ['colroles'][$i];
                $rol = $objRol->buscar($id);
                echo "<option value='$i'>".$rol[0]->getRolDescripcion()."</option>";
            }
            ?>
                
        </select>
        <input type="submit" value="Cambiar Rol">
        </form>
    </body>
    </html>
<?php
}else{

    ?>
      <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="action/cambioContrasenia.php" method="post">
        <select name="rol" id="rol" disabled>
        
              <?php 
               $objRol = new AbmRol();
               $id['idrol'] = $rolActivo;
                $rol = $objRol->buscar($id);
               echo "<option value='$rolActivo'>".$rol[0]->getRolDescripcion()."</option>"; ?>
                
        </select>
        <input type="submit" value="Cambiar Rol" disabled>
        </form>
    </body>
    </html>
<?php
}
?>