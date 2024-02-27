<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
include_once('../../configuracion.php');
$tituloPagina = "Gestionar Usuarios";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");
$idUsuario = data_submitted(); //recibo el id del usuario
//verEstructura($idUsuario);

$objAbmUsuario = new AbmUsuario();
$colObjUsuario = $objAbmUsuario->buscar($idUsuario);
$nombreUsuario = $colObjUsuario[0]->getUsNombre();

$rol = new AbmRol();
$listaRoles = $rol->buscar(null);

?>

    <div class="asignarRol">
        
                        <form action="action/asignarRol.php" method="post">
                          <h4 class="mb-2 mt-2 text-center">Asignar Rol</h4>
                            <?php
                            if (count($listaRoles) > 0) {
                                echo "<div class='form-group'>";
                                echo "ID Usuario: <input type='text' class='form-control' id='idusuario' name='idusuario' value=" . $idUsuario['idusuario'] . " readonly><br>";
                                echo "Nombre Usuario: <input type='text' class='form-control' id='usnombre' name='usnombre' value=" . $nombreUsuario . " readonly><br>";
                                echo "ROLES A ASIGNAR:<br>";
                                for ($i = 0; $i < count($listaRoles); $i++) {
                                    $objRol = $listaRoles[$i];
                                    echo "<div class='form-check'>";
                                    echo "<input type='checkbox' class='form-check-input' name='idrol' id='idrol' value=" . $objRol->getIdRol() . ">";
                                    echo "<label class='form-check-label' for='idrol'>" . $objRol->getRolDescripcion() . "</label>";
                                    echo "</div>";
                                }
                                echo "</div>";
                                echo '<button type="submit" class="btn btn-primary mt-2 w-100">Asignar Roles</button>
                                <button type="button" id="cerrarFormulario"  class="btn btn-danger btn-lg w-100 mt-3">CANCELAR</button>';
                            } else {
                                echo "<p>No se encontraron Roles</p>";
                            }
                            ?>
                        </form>
                    
</div>

<?php
include_once("../Estructuras/footer.php");
?>

