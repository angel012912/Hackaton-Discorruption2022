<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
//Se hace la conexion con la base de datos 
$connection = mysqli_connect("localhost", "root", "", "denunciasegura");
//Se evalua el estatus de la conexion
if(!$connection){
    //Se manda un mensaje de error si no se establecio la conexion 
    echo "ERROR - No se pudo establecer la conexion a la base de datos";
    exit;
}
//Se guarda en variables lo que se toma por metodo post los input del formulario de buscar el estatus de un folio 
$folio_usuario = $_POST['inputFolio'];
$contraseña = $_POST['inputPassword'];

//Se evalua si ya esta definido un valor en el input 
if(isset($_POST["inputFolio"])){
  //Compara que el folio que ingreso si esta registrado en la base de datos --> Falta asignar la variable de folio_usuario 
  $contraseña_query = mysqli_fetch_row(mysqli_query($connection, "select contrasena from denunciante where '$folio_usuario' = id_denuncia"));
  //Evalua si se encontro el folio que el usuario ingresó 
  //Comparar la contraseña ingresada con la registrada en el usuario
  if($contraseña_query[0] == $contraseña){
      $_SESSION["folio"] = $folio_usuario;
      //Si esta eñ folio 
      echo '<script type="text/javascript">
              setTimeout( function() { window.location.href = "estatus.php"; }, 1000 );
          </script>'; 
   }else{
      //Si la contraseña no es igual se muestra una alerta de error
      echo '<div class="alert alert-danger d-flex align-items-center" style = "margin: 1.5cm 3cm;;"role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Error - Los datos ingresados son incorrectos, intente de nuevo
  </div>
</div>';
       
   }
}else{
  //Si no hay ningun dato seleccionado en el input se destruye la sesion para limpiar las variables
    session_destroy();
    session_unset();
}

?>
<!-- Pàgina de pestaña "Mis Denuncias"-->
<!doctype html>
<html lang="en">
<head>
    <title>Denuncia Segura</title>
    <link rel="icon" type="image/jpeg" href="img/Tec.jpeg">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="./css/circular_progress.css">

    <!-- JS -->
    <script src="scripts/main2.js" defer></script>
    <script src="scripts/main.js" defer></script>

    <!-- Bootstrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
 

</head>
    <body>
        <!--========================================================== -->
                          <!-- NAVBAR -->
    <!--========================================================== -->
    <nav  class="navbar navbar-expand-lg navbar-dark bg-light p-2 scrolling-navbar fixed-top" id="menu">
        <!-- contenedor  -->
        <div class="container">
          <!-- enlace -->
          <a class="navbar-brand" href="index.php">
            <!--elemento spna | font size | texto color primario | font weight (grosor), negritas | nombre del botón-->
              <span class="text-primary">Denuncia <i class="bi bi-lock"></i> Segura</span>
          </a>
          <!-- botón colapsable -->
          <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <!--Escritura del texto de la sección Mis Denuncias-->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link nav-link-h disabled" aria-current="page" active href="misDenuncias.html"> Mis Denuncias </a>
                </li>
              </ul>
            <!-- Sección de visualización del número-->
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"> 
                  <a class="nav-link"> Contáctanos: <i class = "bi bi-whatsapp"></i>  (55) 4957-6352 </a>
                </li>
              </ul>
          </div>

        </div>
      </nav>

    <!--========================================================== -->
                        <!-- Sección de Login-Log out -->
    <!--========================================================== -->
          <form action="" method = "post" class="shadow p-5 rounded w-50 mx-auto">
      <!--Muestreo de inicio de sesión -->
          <h1 class = "text-center display-3"><i class="bi bi-lock"></i>Inicia Sesión</h1>   
      <!--Colocar el número de Folio-->
          <div class="my-5 w-sm-50 w-75 mx-auto">
            <label for="inputCase" class="form-label">Número de Folio</label>
            <input type="number" class="form-control" id="inputFolio" name="inputFolio"placeholder="Inserta tu número de folio">
          </div>
      <!--Colocar la contraseña asignada-->
          <div class="my-5 w-sm-50 w-75 mx-auto">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword"placeholder="Password">
          </div>
      <!--Botón de "envíar", para proceder a ver la fase de la denuncia -->
          <div class="my-5 w-50 mx-auto text-center">
          <button class='btn btn-outline-primary btn-lg btn-block' type='submit' name='ConsultaPerso' id="go">
            Envíar
          </button>
        </div>
        </form>
  </body>
</html>
