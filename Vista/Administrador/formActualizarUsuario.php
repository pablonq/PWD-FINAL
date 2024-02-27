<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
//CONTRASEÑA: <input type="text" name="uspass" id="uspass" value='<?php echo $objUsuario->getUsPass() ? >'> <br>
include_once('../../configuracion.php');
$tituloPagina = "Gestionar Usuarios";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");
$datos = data_submitted();
$abmUsuario = new AbmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

?>

<div class="actualizarUsuario">
    <form action="action/actualizarUsuarios.php" method="post">
      <h4 class="mb-2 mt-2 text-center">Actualizar Usuario</h4>
          
      <input type="hidden" class="form-control" id="idusuario" name="idusuario" value='<?php echo $objUsuario->getIdUsuario() ?>' readonly>
    
      <label for="usnombre">NOMBRE:</label>
      <input type="text" class="form-control" id="usnombre" name="usnombre" value='<?php echo $objUsuario->getUsNombre() ?>'>
    
      <label for="usmail">E-MAIL:</label>
      <input type="text" class="form-control" id="usmail" name="usmail" value='<?php echo $objUsuario->getUsMail() ?>'>
    
      <!--<label for="uspass">CONTRASEÑA:</label>-->
      <input type="text" class="form-control" id="uspass" name="uspass" value='<?php echo $objUsuario->getUsPass() ?>' hidden>
    
      <label for="usdeshabilitado">HABILITAR:</label>
      <input type="text" class="form-control" id="usdeshabilitado" name="usdeshabilitado" value='<?php echo $objUsuario->getUsDeshabilitado() ?>'>
      <br>
      <button type="submit" class="btn btn-primary w-100">ACTUALIZAR</button>
      <button type="button" id="cerrarFormulario"  class="btn btn-danger btn-lg w-100 mt-3">CANCELAR</button>
    </form>
          
</div>

<?php
include_once("../Estructuras/footer.php");
?>
