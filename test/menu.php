<?php
include_once "../configuracion.php";
//TEST DEL CODIGO
//$session = new Session();
//$rolActivo = $session->getRol();
$idUsuario = 9;//$session->getUsuario()->getIdUsuario();
//$colRoles = $session->getListaRoles();//$_SESSION['colroles'][$i]= id rol
$rolActivo = 2;//id del rol
$resp = false;
$j=0;
$colRoles['colroles'][0]=1;
$colRoles['colroles'][1]=2;
$colRoles['colroles'][2]=3;
$menu = ""; //aca se almacena texto con html 
$objRol = new AbmRol();

while($j<count($colRoles['colroles']) && $resp == false){
    if($colRoles['colroles'][$j]==$rolActivo){
        $resp = true;
    }
    $j++;
}
if($resp){
    
 
    for ($i = 0; $i < 1; $i++){
        $id['id'] = $rolActivo;
        $permisos = $objRol->buscarPermisos($id);
        if($permisos != null){
            $idrol['idrol'] = $id['id'];
            $rol = $objRol->buscar($idrol);
            $rolDesc = $rol[0]->getRolDescripcion();
            $menu = "ROL: ".$rolDesc."<br>";
            foreach ($permisos as $permiso){
                $menu .= "RUTA MENU: ".$permiso->getmenu()->getMeDescripcion().
                         "<br>NOMBRE MENU: ".$permiso->getmenu()->getMeNombre()."<br>";
            }
    
        }
        echo $menu;
    }
}



//echo count($colRoles['colroles'])."<br>";




?>