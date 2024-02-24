<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
 

  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <div class="carousel_titulo carousel-caption d-none d-md-block">
        <p>FERRETERIA CHANETON</p>
      </div>
      <img src="../img/construir.jpg" alt="construccion" class="d-block">
    </div>
    <!-- <div class="carousel-item">
      <img src="../img/herramientas.png" class="d-block" alt="herramientas">
    </div> -->
    <div class="carousel-item">
    <div class="carousel_titulo carousel-caption d-none d-md-block">
        <p>FERRETERIA CHANETON</p>
      </div>
      <img src="../img/herramientasportada.png" class="d-block w-60" alt="herramientas">
    </div>
    <div class="carousel-item">
    <div class="carousel_titulo carousel-caption d-none d-md-block">
        <p>FERRETERIA CHANETON</p>
      </div>
      <img src="../img/cables.jpg" class="d-block w-60" alt="electricidad">
    </div>
    <div class="carousel-item">
    <div class="carousel_titulo carousel-caption d-none d-md-block">
        <p>FERRETERIA CHANETON</p>
      </div>
      <img src="../img/tornillosportada.jpg" class="d-block w-100" alt="tornillos">
    </div>
    <div class="carousel-item">
    <div class="carousel_titulo carousel-caption d-none d-md-block">
        <p>FERRETERIA CHANETON</p>
      </div>
      <img src="../img/REPARACION.JPG" class="d-block w-100" alt="plomeria">
    </div>
    <div class="carousel-item">
    <div class="carousel_titulo carousel-caption d-none d-md-block">
        <p>FERRETERIA CHANETON</p>
      </div>
      <img src="../img/ferre.jpg" class="d-block w-100" alt="ferreteria">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="tarjetas d-flex justify-content-between">
  
    <a class="cards" href="productos.php?tipo=Construccion">
      <img src="../img/Construccion/cal.png" alt="cal">
      <div class="cards_titulos">
      Construccion
      </div>
    </a>
    <a class="cards" href="productos.php?tipo=Electricidad">
      <img src="../img/Electricidad/cables.png" alt="cables">
      <div class="cards_titulos">
      Electricidad
            </div>
    </a>
    <a class="cards" href="productos.php?tipo=Herramientas">
    <img src="../img/Herramientas/serrucho.png" alt="herramientas">
    <div class="cards_titulos">
      Herramientas
      </div>
    </a>
    <a class="cards" href="productos.php?tipo=Plomeria">
      <img src="../img/Plomeria/tuberias.jpg" alt="tuberia">
      <div class="cards_titulos">
        Plomeria
      </div>
    </a>
    
    <a class="cards" href="productos.php?tipo=Tornillos">
      <img src="../img/Tornillos/tornillomadera.png" alt="tornillos">
      <div class="cards_titulos">
        Tornillos
      </div>
    </a>
  </div>

  <!-- Modal Inicio Sesion-->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="formLogin" id="formLogin" method="POST" class="needs-validation">
      <a href="home.php"> <img src="../img/logo.png" class="logo" alt="Logo"></a>
      <br>
      <br>
        <div class="h2">Iniciar Sesión</div>
        <!-- Zona de alerta -->
        <div id="alertaMensajes">
        </div>

        <div class="form-group contenedor-dato">
            <!--<label for="username">Nombre de Usuario:</label>-->
            <input type="text" class="form-control form-control-lg" id="usnombre"  name="usnombre" placeholder="Usuario">
        </div>
        <div class="form-group contenedor-dato mt-3">
            <!--<label for="password">Contraseña:</label>-->
            <input type="password" class="form-control form-control-lg" id="uspass" name="uspass" placeholder="Contraseña">
        </div>
        <button type="submit" id="ingresar" class="btn btn-primary btn-lg w-100 mt-3">INGRESAR</button>
        </form>
    </div>
  </div>
</div>

<!-- Modal Registro-->
<div class="modal" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="formCrearCuenta" id="formCrearCuenta" method="POST" class="needs-validation">
      <a href="home.php"> <img src="../img/logo.png" class="logo" alt="Logo"></a>
      <br>
      <br>
        <div class="h2">Registro</div>  
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
