<?php
//se crea un usario al cual se le puede asignar uno de os 3 roles principales
include_once('../../configuracion.php');
$tituloPagina = "Crear Usuarios";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

$datos = data_submitted();
$abmUsuario = new AbmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

$rol = new AbmRol();
$listaRoles = $rol->buscar(null);
?>

<div class="container mt-4 mb-4">
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header bg-dark text-white">
                <h4 class="mb-2 mt-2 text-center">Crear Usuario</h4>
        </div>
        <div class="card-body">
            <form action="action/altaCliente.php" method="post">
                <div class="form-group">
                    <label for="usnombre">Nombre:</label>
                    <input type="text" class="form-control mb-3" id="usnombre" name="usnombre" required>
                </div>
                <div class="form-group">
                    <label for="uspass">Contraseña:</label>
                    <input type="password" class="form-control mb-3" id="uspass" name="uspass" required>
                </div>
                <div class="form-group">
                    <label for="usmail">E-Mail:</label>
                    <input type="email" class="form-control mb-3" id="usmail" name="usmail" required>
                </div>

                <?php

                //Implementar a futuro
                for($i=0; $i < count($listaRoles); $i++){
                    $objRol = $listaRoles[$i];

                }

                ?>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="cliente" name="Cliente" value="Cliente">
                    <label class="form-check-label mb-3" for="cliente">Cliente</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input " id="deposito" name="Deposito" value="Deposito">
                    <label class="form-check-label mb-3" for="deposito">Depósito</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="admin" name="Admin" value="Administrador">
                    <label class="form-check-label mb-3" for="admin">Administrador</label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">CREAR</button>
            </form>
        </div>
    </div>
    </div>
</div>
</div>

<?php
include_once("../Estructuras/footer.php");
?>

