<?php
$ruta = $_SERVER['PHP_SELF'];
echo "PHP_SELF: ".$ruta."<br>";
$ruta = explode("/" ,$ruta);
echo count($ruta)."<br>";
$rutaStr = "../";
$rutaStr .= $ruta[count($ruta)-2] . "/";
$rutaStr .= $ruta[count($ruta)-1];
echo "Ruta armada: ".$rutaStr."<br>";
for ($i=0;$i<count($ruta);$i++){
    echo "Posicion ".$i."<br>".
    $ruta[$i]."<br>";
}


$ruta = $_SERVER['REQUEST_URI'];
echo "REQUEST_URI: ".$ruta;
?>