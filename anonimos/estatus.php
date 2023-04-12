<?php
    //Se omiten los warning
    error_reporting(E_ERROR | E_PARSE);
    //Se establece la conexion con el base de datos
   $connection = mysqli_connect("localhost", "root", "", "denunciasegura");
   //Se crea una sesion
   session_start();
   //Se le asigna a una variable el valor guardado de una sesion anteriormente creada
   $folio = $_SESSION["folio"];
   //Se obtiene los datos a cerca del status del folio que se busca
   $query = mysqli_query($connection, "select * from denuncia where id_denuncia = '$folio'");
   $result_query = mysqli_fetch_row($query);
   $query_lugar = mysqli_query($connection, "select estados.nombre, municipios.nombre from estados, municipios where municipios.id_municipio = '$result_query[2]' and municipios.id_estado = estados.id_estado");
   $result_lugar = mysqli_fetch_row($query_lugar);
   $status = $result_query[4];
   $descripcion = $result_query[5];
   $fecha = $result_query[3];
   $municipio = $result_lugar[1];
   $estado = $result_lugar[0];
?>

<!-- Página de pestaña "Mis Denuncias"-->
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
                    <!-- elemento spna | font size | texto color primario | font weight (grosor), negritas | nombre del botón -->
                    <span class="text-primary">Denuncia <i class="bi bi-lock"></i> Segura</span>
                </a>
                <!-- botón colapsable -->
                <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-h disabled" aria-current="page" active href="misDenuncias.html"> Mis Denuncias </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-h" aria-current="page" active href="logout.php"> Salir </a>
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

        <div class="container-fluid">
            <div class="card progreso">
                <div class="card-header">
                    <p class = "tituloprogress text-center ">Estatus Denuncia</p>
                </div>
                <div class="card-body">
                    <p class ="tarjeta"> No. Folio: <?php echo $folio;?> </p>
                    <p class ="tarjeta"> Estado: <?php echo $status;?> </p>
                    <p class ="tarjeta"> Fecha: <?php echo $fecha;?> </p>
                    <p class ="tarjeta"> Lugar: <?php echo $municipio .",". $estado;?> </p>
                    <p class ="tarjeta"> Descripción: <?php echo $descripcion;?> </p>
                </div>
            
                
                <div class="card-footer">
                <!--========================================================== -->
                                    <!-- Estatus del caso -->
                <!--========================================================== -->
                  <?php
                  //Se evalua el estatus registrado para saber que barra de progreso desplegar
                    if($status == "Proceso"){
                        echo '<div class="progress" style="height: 50px;" id = "Proceso">
                        <div class="progress-bar bg-info " role="progressbar" style="width: 31%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><h5>En revisión 25%</h5></div>
                        </div>';
                    }elseif($status == "Datos") {
                        echo '<div class="progress " style="height: 50px;" id = "Datos">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 56%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><h5>Necesitamos más datos 50%</h5></div>
                      </div>';
                    }elseif($status == "Aprobado"){
                        echo '
                        <div class="progress " style="height: 50px;" id = "Aprobado">
                        <div class="progress-bar bg-success " role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><h5>Caso aprobado 100%</h5></div>
                        </div>';
                    }
                  ?>
                </div>
            </div>
        </div>
        </body>
    </html> 

