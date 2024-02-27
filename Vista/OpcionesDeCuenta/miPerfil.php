<?php
include_once("../../configuracion.php");
$tituloPagina = "Mi Perfil";
include_once("../Estructuras/headSemiSeguro.php");

include_once("../Estructuras/navSeguro.php");
//$session = new Session();

$nombreUsuario = $session->getUsNombre();
$mail = $session->getUsMail();

?>
<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->

<div class="miPerfil">

                
                <table class="table table-bordered">
                  <thead class="thead-light">
                    <tr>
                        <th style="width: 60px;">NOMBRE</th>
                        <th style="width: 90px;">E-MAIL</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center" ><p><span id="nombreUsuario"><?php echo $nombreUsuario ?></span></p></td>
                    <td class="text-center"><p><span id="mailUsuario"><?php echo $mail ?></span></p></td>
                  </tr>
                </tbody>
              </table>
              <form name="formConfiguracionCuenta" id="formConfiguracionCuenta" method="POST" class="needs-validation" novalidate>
              <!-- Zona de alerta -->
                <div id="alertaMensajes">
                </div>

                <label for="uspass" class="form-label">Ingrese su nuevo nombre de usuario</label>
                <input type="text" class="form-control" id="usnombre" name="usnombre">
                <br>
                         
                <label for="usmail" class="form-label">Ingrese su nueva dirección de mail</label>
                <input type="text" class="form-control" id="usmail" name="usmail">
                <br>

                <label for="uspass" class="form-label">Ingrese su nueva contraseña</label>
                <input type="password" class="form-control" id="uspass" name="uspass">

                <label for="uspass2" class="form-label">Repita su nueva contraseña</label>
                <input type="password" class="form-control mb-4" id="uspass2" name="uspass2">
                <button type="submit" id="realizarCambios" class="btn btn-primary btn-lg w-100">REALIZAR CAMBIOS</button>
                <button type="button" id="cerrarFormulario"  class="btn btn-danger btn-lg w-100 mt-3">CANCELAR</button>
              </form>
 
</div>
<!-- <script src="../js/configuracionCuenta.js"></script> -->
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>