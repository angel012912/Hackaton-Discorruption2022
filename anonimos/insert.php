<?php
/*
Authors: 
  Jose Angel Garcia Gomez
  Jair Josue Jimarez Garcia
  Pablo Gonzalez de la Parra
  Erika Marlene García Sánchez
  Yael Ariel Marquez Mas      
Date: 06-03-2022
Description: This file contains the php code to insert the data from the form into the database
*/

error_reporting(E_ERROR | E_PARSE);

//Se hace la conexion con la base de datos 
$connection = mysqli_connect("localhost", "root", "", "denunciasegura");



//Se definen las variables que se obtienen por metodo post del formulario de la denuncia
$tipo = $_POST["Tipo"];
$nombreDenunciante = $_POST["NOMDENT"];
$sexoDenunciante = $_POST["SEXO"];
$edadDenunciante = $_POST["EDAD"];
$correoDenunciante = $_POST["CORDENT"];
$ocupaDenunciante = $_POST["OCUDENT"];
$escolaridad = $_POST["ESCOL"];
$fecha = $_POST["FECHA"];
$lugar = $_POST["Municipio"];
$nombreDenunciado = $_POST["NOMDEN"];
$ocupaDenunciado = $_POST["OCUDEN"];
$empresa = $_POST["EMPDEN"];
$password = $_POST["PASSW"];
$descripcion = $_POST["DESC"];

//Se evalua el estatus de la conexion
if(!$connection){
    //Se manda un mensaje de error si no se establecio la conexion 
    echo '<script type="text/javascript">
             window.location.href = "index.html";
          </script>';
}else{
    //Se ingresan los datos en la tabla de denuncia
    $ingresar_datos_denuncia = mysqli_query($connection, "insert into denuncia(id_tipo,lugar,fecha,status, descripcion,denunciado,ocupacion_denunciado,empresa_denunciado) values ('$tipo' , '$lugar', '$fecha', 'Proceso', '$descripcion', '$nombreDenunciado', '$ocupaDenunciado', '$empresa')");
    //Se obtiene el folio generado
    $folios = mysqli_query($connection, "select id_denuncia from denuncia order by id_denuncia desc");
    //Se obtiene el ultimo folio generado
    $folio_generado = mysqli_fetch_row($folios);
    //Se evalua si se logro hacer el insert de los datos
    if($ingresar_datos_denuncia){
        //Se ingresa los datos del denunciante
        $ingresar_datos_denunciante = mysqli_query($connection, "insert into denunciante(id_denuncia, contrasena, correo, ocupacion, escolaridad, nombre)  values ('$folio_generado[0]','$password', '$correoDenunciante', '$ocupaDenunciante', '$escolaridad','$nombreDenunciante')");
    }
    echo '
<!doctype html>
<html lang="en">
<head>
    <title>¡Gracias!</title>
    <link rel="icon" type="image/jpeg" href="img/logo.jpeg"> <!-- Anónimo -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/insert.css">
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

    <nav  class="navbar navbar-expand-lg navbar-dark bg-light p-2 scrolling-navbar fixed-top" id="menu">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <span class="text-primary">Denuncia<i class="bi bi-lock"></i>Segura</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" active aria-current="page" href="index.html">Inicio</a>
                  </li>
              </ul>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"> 
                  <a class="nav-link"> Contáctanos: <i class = "bi bi-whatsapp"></i>  (55) 4957-6352 </a>
                </li>
              </ul>
          </div>
        </div>
      </nav>

      <div class="container folio">
        <div class="card text-center">
            <div class="card-header">No.Folio</div>
            <div class="card-body">
                <h5 class="card-title">Folio: ';
                //Se muestra el folio que se le asigno a la denuncia del usuario 
                echo $folio_generado[0];
                echo ' </h5>
                <p class="card-text">
                    Tu denuncia se ha realizado con exito, por favor guarda el número de folio y recuerda tu contraseña 
                    para poder conocer el estado de tu denuncia.
                </p>
                <a href="index.php" class="btn btn-primary">Regresar</a>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
      </div>     

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- cdn  -->
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</body>
</html>';
}
?>