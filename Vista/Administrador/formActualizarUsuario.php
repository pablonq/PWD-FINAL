<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
//CONTRASEÑA: <input type="text" name="uspass" id="uspass" value='<?php echo $objUsuario->getUsPass() ? >'> <br>
include_once('../../configuracion.php');
$tituloPagina = "Gestionar Usuarios";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
$datos = data_submitted();
$abmUsuario = new AbmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

?>

<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-2 mt-2 text-center">Actualizar Usuario</h4>
                </div>
                <div class="card-body">
                    <form action="action/actualizarUsuarios.php" method="post">
                        <div class="form-group">
                            <label for="idusuario">ID:</label>
                            <input type="text" class="form-control" id="idusuario" name="idusuario" value='<?php echo $objUsuario->getIdUsuario() ?>' readonly>
                        </div>
                        <div class="form-group">
                            <label for="usnombre">NOMBRE:</label>
                            <input type="text" class="form-control" id="usnombre" name="usnombre" value='<?php echo $objUsuario->getUsNombre() ?>'>
                        </div>
                        <div class="form-group">
                            <label for="usmail">E-MAIL:</label>
                            <input type="text" class="form-control" id="usmail" name="usmail" value='<?php echo $objUsuario->getUsMail() ?>'>
                        </div>
                        <div class="form-group">
                            <!--<label for="uspass">CONTRASEÑA:</label>-->
                            <input type="text" class="form-control" id="uspass" name="uspass" value='<?php echo $objUsuario->getUsPass() ?>' hidden>
                        </div>
                        <div class="form-group">
                            <label for="usdeshabilitado">HABILITAR:</label>
                            <input type="text" class="form-control" id="usdeshabilitado" name="usdeshabilitado" value='<?php echo $objUsuario->getUsDeshabilitado() ?>'>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary w-100">ACTUALIZAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("../Estructuras/footer.php");
?>
