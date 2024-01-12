<?php
include_once("../../configuracion.php");
$tituloPagina = "Crear Cuenta";
include_once("../Estructuras/headInseguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navInseguro.php");
?>

<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-2 mt-2 text-center">Crear Cuenta</h4>
                </div>
                <div class="card-body">
                    <form name="formCrearCuenta" id="formCrearCuenta" method="POST" class="needs-validation">
                        
                        <!-- Zona de alerta -->
                        <div id="alertaMensajes">
                        </div>

                        <div class="form-group contenedor-dato">
                            <!--<label for="usnombre">Nombre de Usuario:</label>-->
                            <input type="text" class="form-control form-control-lg" id="usnombre" name="usnombre" placeholder="Nombre de Usuario" required>
                        </div>
                        <div class="form-group contenedor-dato mt-3">
                            <!--<label for="usmail">Correo Electrónico:</label>-->
                            <input type="text" class="form-control form-control-lg" id="usmail" name="usmail" placeholder="Correo Electrónico" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">CREAR CUENTA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/validarCrearCuenta.js"></script>
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>