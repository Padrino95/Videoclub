<?php
function conectar(){
  $conexion= new mysqli ("localhost", "root", "", "series");
  $conexion->set_charset("utf8");
  return $conexion;
}
function checkLoggin()
{
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();}
    if (isset($_COOKIE["sesion"])) {
        session_decode($_COOKIE["sesion"]);
        $id = $_SESSION["id"];
    } elseif (isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
    } else {
        $id = -1;
    }
    return $id;
}
function checkAdmin($id)
{
    if ($id > 0) {
        header("refresh:0;url=../index.php");
    }elseif ($id==-1) {
        header("refresh:0;url=../Vistas/acceso.php");
    }
}
function checkUser($id)
{
    if ($id == -1) {
      header("refresh:0;url=../Vistas/acceso.php");
    }elseif ($id==0) {
      header("refresh:0;url=../index.php");
    }
}

function pintaMenuIndex($id)
{
    if ($id == 0) {
        echo "<header>
        <nav class='navbar navbar-expand-lg bg-body-tertiary '>
            <div class='container-fluid'>
              <a class='navbar-brand' href='#'>Videoclub</a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/seriesAdmin.php'>Series</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/plataformasAdmin.php'>Plataformas</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/admin_listar_socios.php'>Socios</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/admin_listar_lanzamientos.php'>Lanzamientos</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/admin_listar_comentarios.php'>Comentarios</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/CerrarSesion.php?cerrar'>Cerrar sesión de $_SESSION[nombre]</a>
                  </li>
                </ul>
                <form class='d-flex' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn-outline-success' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
    } elseif ($id > 0) {
        echo "
        <header>
        <nav class='navbar navbar-expand-lg bg-body-tertiary'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='#'>Videoclub</a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/Series.php'>Series</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/Plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/CerrarSesion.php?cerrar'>Cerrar sesión de $_SESSION[nombre]</a>
                  </li>
                </ul>
                <form class='d-flex' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn-outline-success' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
    } else {
        echo "
        <header>
        <nav class='navbar navbar-expand-lg bg-body-tertiary fixed-top'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='#'>Videoclub</a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/Series.php'>Series</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Controladores/Plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Vistas/acceso.php'>Acceder</a>
                  </li>
                </ul>
                <form class='d-flex' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn-outline-success' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
    }
}


function pintaMenu($id)
{
    if ($id == 0) {
        echo "<header>
        <nav class='navbar navbar-expand-lg bg-body-tertiary'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='#'>Videoclub</a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./seriesAdmin.php'>Series</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./plataformasAdmin.php'>Plataformas</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./admin_listar_socios.php'>Socios</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./admin_listar_lanzamientos.php'>Lanzamientos</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./admin_listar_comentarios.php'>Comentarios</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./CerrarSesion.php?cerrar'>Cerrar sesión de $_SESSION[nombre]</a>
                  </li>
                </ul>
                <form class='d-flex' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn-outline-success' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
    } elseif ($id > 0) {
        echo "
        <header>
        <nav class='navbar navbar-expand-lg bg-body-tertiary'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='#'>Videoclub</a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Series.php'>Series</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./CerrarSesion.php?cerrar'>Cerrar sesión de $_SESSION[nombre]</a>
                  </li>
                </ul>
                <form class='d-flex' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn-outline-success' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
    } else {
        echo "
        <header>
        <nav class='navbar navbar-expand-lg bg-body-tertiary'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='#'>Videoclub</a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Series.php'>Series</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./Plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='../Vistas/acceso.php'>Acceder</a>
                  </li>
                </ul>
                <form class='d-flex' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn-outline-success' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
    }
}

function pintarFooter()
{
    echo "
    <footer class='container h-25'>
  <div class='py-3 my-4'>
    <ul class='nav justify-content-center border-bottom pb-3 mb-3'>
      <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Home</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Features</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Pricing</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>FAQs</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>About</a></li>
    </ul>
    <p class='text-center text-muted'>© 2022 Company, Inc</p>
  </div>
</footer>";
}

function carrouselComentarios($matriz)
{
    echo '
    <h2 class="text-center display-1">Últimos comentarios</h2>
    <div id="carouselExampleIndicators" class="carousel slide p-0" data-bs-ride="carousel">
    
    <div class="carousel-inner text-light text-center">';

    $i = 1;
    foreach ($matriz as $value) {
        $activeClass = ($i == 1) ? 'active' : '';
        
        echo '<div class="carousel-item ' . $activeClass . ' position-relative">
            <img class="d-block w-100" src="./Assets/Imagenes/Series/' . $value["foto"] . '" alt="Slide ' . $i . '">
            <div class="position-absolute top-50 start-50 translate-middle">
              <h2>' . $value["socio"] . '</h2>
              <p>' . $value["texto"] . '</p>
              <span>' .fechaEspañol($value["fecha"]) . '</span>
            </div>
          </div>';
        $i++;
    }

    echo '
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
    ';
}

function fechaEspañol($fecha)
{
    setlocale(LC_ALL, "es-ES.UTF-8");
    $fechaArray = explode("-", $fecha);
    $fechaTimeStampt = mktime(0, 0, 0, $fechaArray[1], $fechaArray[2], $fechaArray[0]);
    return strftime("%d de %B de %Y", $fechaTimeStampt);
}

