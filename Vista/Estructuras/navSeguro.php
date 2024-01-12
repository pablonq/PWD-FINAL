<?php
//$session = new Session();
$nombreUsuario = $session->getUsNombre();
$rolActivo = $session->getIdRol();
$idUsuario = $session->getIdUsuario();
$colRoles = $session->getColRoles();
$colMenu = $session->getColMenu();
$direccionMenu = $session->getDireccionMenu();
$direccionPadre = $session->getDireccionPadreMenu();
?>

<!-- ________________________________________ NAV SEGURO _______________________________________ -->
<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="#">Tecno-Mates</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
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

                        } else {

                            //DROPDOWN DE PRODUCTOS
                            if ($direccionMenu == "productos.php"){
                                echo '<div class="ml-auto">';
                                //Caso para página actual (current)
                                echo '<div class="nav-item dropdown active nav-underline">';
                                echo '<a class="nav-link dropdown-toggle active nav-underline" href="#" id="navMenuProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                echo 'Productos';
                                echo '</a>';

                                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                echo '<a class="dropdown-item" href="productos.php?tipo=Mates">Mates</a>';
                                echo '<a class="dropdown-item" href="productos.php?tipo=Yerbas">Yerbas</a>';
                                echo '<a class="dropdown-item" href="productos.php?tipo=Bombillas">Bombillas</a>';
                                echo '<a class="dropdown-item" href="productos.php?tipo=Termos">Termos</a>';
                                echo '<a class="dropdown-item" href="productos.php?tipo=SETS">SETS</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                //FIN DROPDOWN DE PRODUCTOS
                            } else {
                                echo '<div class="ml-auto">';
                                //Caso para otra página (no current)
                                echo '<div class="nav-item dropdown">';
                                echo '<a class="nav-link dropdown-toggle" href="#" id="navMenuProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                echo 'Productos';
                                echo '</a>';

                                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                echo '<a class="dropdown-item" href="../Cliente/productos.php?tipo=Mates">Mates</a>';
                                echo '<a class="dropdown-item" href="../Cliente/productos.php?tipo=Yerbas">Yerbas</a>';
                                echo '<a class="dropdown-item" href="../Cliente/productos.php?tipo=Bombillas">Bombillas</a>';
                                echo '<a class="dropdown-item" href="../Cliente/productos.php?tipo=Termos">Termos</a>';
                                echo '<a class="dropdown-item" href="../Cliente/productos.php?tipo=SETS">SETS</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                //FIN DROPDOWN DE PRODUCTOS
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
                        echo '<div class="nav-item dropdown active nav-underline">';
                        echo '<a class="nav-link dropdown-toggle active nav-underline" href="#" id="nombreUsuarioActivo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $nombreUsuario;
                        echo '</a>';
                    } else {
                        //Caso para otra página (no current)
                        echo '<div class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="nombreUsuarioActivo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $nombreUsuario;
                        echo '</a>';
                    }
                    ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <?php
                                if($direccionPadre == "opcionesDeCuenta"){
                                    echo '<a class="dropdown-item" href="miPerfil.php">Mi Perfil</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="../opcionesDeCuenta/miPerfil.php">Mi Perfil</a>';
                                }
                            ?>

                            <?php
                            if(count($colRoles)>1){
                                if($direccionPadre == "opcionesDeCuenta"){
                                    echo '<a class="dropdown-item" href="cambiarRol.php">Cambiar Rol</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="../opcionesDeCuenta/cambiarRol.php">Cambiar Rol</a>';
                                }
                            }
                            ?>
                            <div class="dropdown-divider"></div>
                            <?php
                                if($direccionPadre == "opcionesDeCuenta"){
                                    echo '<a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesión</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="../opcionesDeCuenta/cerrarSesion.php">Cerrar Sesión</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>
<!-- ________________________________________ FIN NAV SEGURO ___________________________________ -->
