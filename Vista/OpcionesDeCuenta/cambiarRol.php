<?php
include_once("../../configuracion.php");
$tituloPagina = "Cambiar Rol";
include_once("../Estructuras/headSemiSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

$colRoles = $session->getColRoles();

if(count($colRoles) <= 1){
    $session->redireccionar();
}
?>
<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-2 mt-2 text-center">Seleccione un rol</h4>
                </div>
                <div class="card-body">
                    <form form name="formCambiarRol" id="formCambiarRol" method="POST" action="action/actionCambiarRol.php" class="needs-validation">

                        <?php
                        for ($i=0; $i < count($colRoles); $i++){
                            
                            $rol = $colRoles[$i];
                            $paramRol['idrol'] = $rol;

                            $objRol = new AbmRol();
                            $colRol = $objRol->buscar($paramRol);
                            
                            $nombreRol = $colRol[0]->getRolDescripcion();
                            echo '<div class="form-check custom-lg mb-3">
                                    <input class="form-check-input" type="radio" name="opcion" id="opcion'.$i.'" value="'.$paramRol['idrol'].'">
                                    <label class="form-check-label" for="opcion'.$i.'">
                                        '.$nombreRol.'
                                    </label>
                                </div>';
                        }
                        ?>
                        <button type="submit" id="ingresar" class="btn btn-primary btn-lg w-100">CAMBIAR ROL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>