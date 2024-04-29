<?php
//$session = new Session();
$nombreUsuario = $session->getUsNombre(); /*Cliente*/
$rolActivo = $session->getIdRol(); /*3*/ 
$descripcionRol = $session->getDescripcionRol();
$idUsuario = $session->getIdUsuario();/*7*/
$colRoles = $session->getColRoles();/*Cliente*/
$colMenu = $session->getColMenu();/*[11,Inicio,home.php,../Home],[41,Productos,productos.php,../Cliente],[42,Miscompras,misCompras.php,../Cliente],[43,Carrito,carrito.php,../Cliente],[44,Agregar productos, agregarProductosAlCarrito.php,../Nada]*/
$direccionMenu = $session->getDireccionMenu();
$direccionPadre = $session->getDireccionPadreMenu();
?>

<!-- ________________________________________ NAV SEGURO _______________________________________ -->
<nav class="navbar navbar-expand-lg ">
    <div class="container">
    <a href="../Home/home.php"> <img src="../img/logo.png" class="logo" alt="Logo"></a>
        <a class="navbar-brand text-white" href="../Home/home.php">FERRETERIA CHANETON</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
                      
          <ul class="navbar-nav d-flex flex-row">
            
            <?php
            
            if(count($colMenu) != 0){

                for ($i=0; $i < count($colMenu); $i++){

                    $menombre = $colMenu[$i]->getMeNombre();
                    $medescripcion = $colMenu[$i]->getMeDescripcion();
    
                    $padreMenu = $colMenu[$i]->getMenuPadre();
                    $nombrePadre = $padreMenu->getMeNombre();
                    $medescripcionpadre = $padreMenu->getMeDescripcion();
    
                    if ($colMenu[$i]->getMenuPadre()->getIdMenu() != 0){

                        if ($medescripcion !="productos.php"){

                            if ($direccionMenu == $medescripcion){
                                echo '<li class="nav-item active nav-underline">';
                                echo '  <a class="nav-link active " aria-current="page" href="#">'.$menombre.'</a>';
                                echo '</li>';
                            } else {
                                if ($direccionPadre == $nombrePadre){
                                    echo '<li class="nav-item">';
                                    echo '  <a class="nav-link" href='.$medescripcion.'>'.$menombre.'</a>';
                                    echo '</li>';
                                } else {
                                    echo '<li class="nav-item">';
                                    echo '  <a class="nav-link" href='.$medescripcionpadre.$medescripcion.'>'.$menombre.'</a>';
                                    echo '</li>';
                                }
                            }

                        }                                 
                    }
                }
            }

            ?>
                <div class="ml-auto">
                    <?php
                    if ($direccionPadre == "opcionesDeCuenta"){
                        //Caso para página actual (current)
                        echo '<li class="nav-item dropdown active nav-underline">';
                        echo '<a class="nav-link dropdown-toggle active nav-underline" href="#" id="nombreUsuarioActivo" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo 'Bienvenido '.$nombreUsuario.'! ';
                        echo '</a>';
                    } else {
                        //Caso para otra página (no current)
                        echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="nombreUsuarioActivo" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo 'Bienvenido '.$nombreUsuario.'! ';
                        echo '</a>';
                    }
                    ?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <?php
                                if($direccionPadre == "Home"){
                                    echo '<li><a class="dropdown-item" href="../opcionesDeCuenta/miPerfil.php">Mi Perfil</a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="../opcionesDeCuenta/miPerfil.php">Mi Perfil</a></li>';
                                }
                            ?>

                            <?php
                            if(count($colRoles)>1){
                                if($direccionPadre == "opcionesDeCuenta"){
                                    echo '<li><a class="dropdown-item" href="cambiarRol.php">Cambiar Rol</a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="../opcionesDeCuenta/cambiarRol.php">Cambiar Rol</a></li>';
                                }
                            }
                            ?>
                            <li><hr class="dropdown-divider"></li>
                            <?php
                                if($direccionPadre == "opcionesDeCuenta"){
                                    echo '<li><a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesión</a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="../opcionesDeCuenta/cerrarSesion.php">Cerrar Sesión</a></li>';
                                }
                            ?>
                        </ul>
                              </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
<!-- ________________________________________ FIN NAV SEGURO ___________________________________ -->
