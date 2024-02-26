<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
include_once('../../configuracion.php');
$tituloPagina = "Gestionar Roles";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/navSeguro.php");

$rol = new AbmRol();
$listaRoles = $rol->buscar(null);
?>

<div class="gestionarRoles">
    
                    <?php
                    if (count($listaRoles) > 0) {
                        echo "<table class='table table-bordered'>";
                        echo '<thead class="thead-dark"><tr><th>ID ROL</th><th>DESCRIPCION</th><th>OPCIONES</th></tr></thead>';
                        echo '<tbody>';
                        for ($i = 0; $i < count($listaRoles); $i++) {
                            $objRol = $listaRoles[$i];
                            echo '<tr><td>' . $objRol->getIdRol() . '</td><td>' . $objRol->getRolDescripcion() . '</td><td><a href="action/eliminarRol.php?idrol=' . $objRol->getIdRol() . '" class="btn btn-danger btn-sm">Eliminar</a></td></tr>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo "<p>No se encontraron Roles</p>";
                    }
                    ?>

                    <form action="action/altaRol.php" method="post">
                        <input type="text" name="idrol" id="idrol" hidden value="0">

                        <div class="form-group text-center">
                            <label for="rodescripcion">NOMBRE DE ROL NUEVO:</label>
                            <input type="text" class="form-control" id="rodescripcion" name="rodescripcion"><br>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">CREAR ROL</button>
                        <button type="button" id="cerrarFormulario"  class="btn btn-danger btn-lg w-100 mt-3">CANCELAR</button>
                    </form>
                
</div>

<?php
include_once("../Estructuras/footer.php");
?>

