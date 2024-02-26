<?php
//se crea un usario al cual se le puede asignar uno de os 3 roles principales
include_once('../../configuracion.php');
$tituloPagina = "Crear Usuarios";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");

$datos = data_submitted();
$abmUsuario = new AbmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

$rol = new AbmRol();
$listaRoles = $rol->buscar(null);
?>

<div class="crearUsuario">
  <form action="action/altaCliente.php" method="post">
    <h4 class="mb-2 mt-2 text-center">Crear Usuario</h4>
    <label for="usnombre">Nombre:</label>
    <input type="text" class="form-control mb-3" id="usnombre" name="usnombre" required>

    <label for="uspass">Contraseña:</label>
    <input type="password" class="form-control mb-3" id="uspass" name="uspass" required>

    <label for="usmail">E-Mail:</label>
    <input type="email" class="form-control mb-3" id="usmail" name="usmail" required>
    <?php
    //Implementar a futuro
    for($i=0; $i < count($listaRoles); $i++){
    $objRol = $listaRoles[$i];
    }
    ?>
    <input type="checkbox" class="form-check-input" id="cliente" name="Cliente" value="Cliente">
    <label class="form-check-label mb-3" for="cliente">Cliente</label>

    <input type="checkbox" class="form-check-input " id="deposito" name="Deposito" value="Deposito">
    <label class="form-check-label mb-3" for="deposito">Depósito</label>

    <input type="checkbox" class="form-check-input" id="admin" name="Admin" value="Administrador">
    <label class="form-check-label mb-3" for="admin">Administrador</label>

    <button type="submit" class="btn btn-primary btn-lg w-100">CREAR</button>
    <button type="button" id="cerrarFormulario" class="btn btn-danger btn-lg w-100 mt-3">CANCELAR</button>
  </form>
</div>

<?php
include_once("../Estructuras/footer.php");
?>

