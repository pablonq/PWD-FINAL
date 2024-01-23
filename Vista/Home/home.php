<?php
include_once("../../configuracion.php");
$tituloPagina = "Ferreteria Chaneton";
include_once("../Estructuras/headInseguro.php");

if ($rol !=null ){
    include_once("../Estructuras/navSeguro.php");
    if($descripcionRol == "Cliente"){
      include_once("../Cliente/homeCliente.php");
       
    }
    if($descripcionRol == "Deposito"){
        include_once("../Deposito/homeDeposito.php");
        
    }
    if($descripcionRol == "Admin"){
        include_once("../Administrador/homeAdministrador.php");
        
    }
    
    
} else {
    include_once("../Estructuras/navInseguro.php");
    include_once("Inicio.php");
}
?>
<?php
include_once ('../Estructuras/footer.php');
?>