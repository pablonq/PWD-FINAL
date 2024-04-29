<?php
include_once("../../configuracion.php");
$tituloPagina = "Gestionar Usuarios";
include_once("../Estructuras/headSeguro.php");

include_once("../Estructuras/navSeguro.php");
$objAbmUsuario = new AbmUsuario();
$objAbmUsuarioRol = new AbmUsuarioRol();
$objAbmRol = new AbmUsuarioRol();

$listaUsuarios = $objAbmUsuario->buscar(null);

?>
<div class="gestionarUsuario">
<div class="gestionarUsuarios">

    <?php
    if (count($listaUsuarios) > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-light">
                <tr>
                    <th style="width: 50px;">ID USUARIO</th>
                    <th style="width: 80px;">NOMBRE</th>
                    <th style="width: 110px;">E-MAIL</th>
                    <th style="width: 80px;">ROL PRINCIPAL</th>
                    <th style="width: 110px;">FECHA DE DESHABILITADO</th>
                    <th style="width: 280px;">ACCION</th>
                </tr>
              </thead>';
        echo '<tbody>';
        for ($i = 0; $i < count($listaUsuarios); $i++) {
            $objUsuario = $listaUsuarios[$i];
            $usid['idusuario'] = $objUsuario->getIdUsuario();
            $relacionRol = $objAbmUsuarioRol->buscar($usid);
            if ($relacionRol == null) {
                $rolDesc = "-------";
            } else {
                $rolDesc = $relacionRol[0]->getObjRol()->getRolDescripcion();
            }

            echo '<tr>
                    <td class="text-center">' . $objUsuario->getIdUsuario() . '</td>
                    <td class="text-center">' . $objUsuario->getUsNombre() . '</td>
                    <td class="text-center">' . $objUsuario->getUsMail() . '</td>
                    <td class="text-center">' . $rolDesc . '</td>
                    <td class="text-center">' . $objUsuario->getUsDeshabilitado() . '</td>
                    <td class="botonesGestionUsuarios text-center">
                        <a href="formActualizarUsuario.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-primary btn-sm m-1">Actualizar</a>
                        <a href="asignarRoles.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-info btn-sm m-1">Asignar Rol</a>
                        <a href="quitarRol.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-warning btn-sm m-1">Quitar Rol</a>
                        <a href="action/deshabilitarUsuario.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-danger btn-sm m-1">Eliminar</a>
                    </td>
                  </tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo "<br>";
        
       
    } else {
        echo '<div class="alert alert-info" role="alert">No se encontraron Usuarios.</div>';
    }
    ?>
</div>
  </div>

<?php
include_once("../Estructuras/footer.php");
?>



