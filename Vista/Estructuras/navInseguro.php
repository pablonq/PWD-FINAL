<?php
//$session = new Session();
$direccionMenu = $session->getDireccionMenu();

$direccionPadre = $session->getDireccionPadreMenu();
?>

<!-- ________________________________________ NAV INSEGURO _____________________________________ -->
<nav class="navbar navbar-expand-sm">
    <div class="container">
    <a href="home.php"> <img src="../img/logo.png" class="logo" alt="Logo"></a>
        <a class="navbar-brand text-white marca" href="#">FERRETERIA CHANETON</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar_items" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active ">
                <a class="nav-link active text-white " aria-current="page" href="crearCuenta.php">Crear Cuenta</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link active text-white" aria-current="page" href="login.php">Iniciar Sesión</a>
              </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ________________________________________ FIN NAV INSEGURO _________________________________ -->