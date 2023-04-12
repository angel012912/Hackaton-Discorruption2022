<?php

//Se omiten los warnings
error_reporting(E_ERROR | E_PARSE);

//Se hace la conexion con la base de datos 
$connection = mysqli_connect("localhost", "root", "", "denunciasegura");
//Se evalua el estatus de la conexion
if(!$connection){
    //Se manda un mensaje de error si no se estableció la conexión 
    echo "ERROR - No se pudo establecer la conexion a la base de datos";
    exit;
}

//Se obtienen los estados junto con su id que esta registrado en la base de datos
$datos_estado = mysqli_query($connection, "select estados.id_estado, estados.nombre from estados");
?>

<!doctype html>
<html lang="en">
<head>
    <title>Denuncia Segura</title>
    <!-- Icono que se muestra en la pestaña -->
    <link rel="icon" type="image/jpeg" href="img/Tec.jpeg">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS documents-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="./css/circular_progress.css">

    <!-- JS documents-->
    <script src="scripts/main2.js" defer></script>
    <script src="scripts/main.js" defer></script>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>

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
          <a class="navbar-brand" href="index.php#">
            <!-- uso de bi bi-lock para poner logo en título -->
              <span class="text-primary">Denuncia <i class="bi bi-lock"></i> Segura</span>
          </a>
          <!-- botón colapsable -->
          <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <!-- se muestra un offcanvas desde el lado izquierdo de la pantalla -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link nav-link-h text-secondary" type="button" data-percent="50" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> Denuncia </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-link-h text-secondary" href="misDenuncias.php"> Mis Denuncias </a>
                  </li>
              </ul>
            <!-- Muestra del teléfono del call center en NAVBAR-->
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"> 
                  <a class="nav-link"> Contáctanos: <i class = "bi bi-whatsapp"></i>  (55) 4957-6352 </a>
                </li>
              </ul>
          </div>

        </div>
      </nav>

    <!--========================================================== -->
                        <!-- SLIDER DE IMAGENES-->
    <!--========================================================== -->

    <div id="carousel" class="carousel slide mt-sm-0 mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
        
          <div class="carousel-item active" data-bs-interval="4000">
            
            <img src="./img/foto1.jpeg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="./img/foto2.jpeg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="./img/foto3.jpeg" class="d-block w-100" alt="...">
          </div>
 
 <!-- Botones para poder mover los slides-->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>    
    
        
 

    <!-- Para mostrar título que se escribe poco a poco-->
    <section class="d-flex flex-column justify-content-center align-items-center pt-6 text-center w-50 m-auto" id="intro">
      <h1 class="text-primary mt-4 mb-5 display-1" id="typewriter"></h1>
    <p class="p-3 lead fs-3 border-top border-3 lh-base m-0">Sitio web para que realices tus <span class="text-primary">denuncias </span> de manera<span class="text-primary"> segura </span> y contribuyas a un México libre de corrupción. </p>
     <h1 class="text-primary display-3 py-5 m-0">Nuestra misión</h1>
        <p class="p-3 lead fs-3 lh-lg m-0 pb-5">
            Estamos en pro de la integridad, transparencia y buscamos ayudar a la comunidad brindandoles un sitio seguro para que puedan realizar denuncias en contra de la corrupción.      
        </h1>   
    </section>




    <!--========================================================== -->
                        <!-- Secciones estadisticas -->
    <!--========================================================== -->
 
   <!-- gráf--> 
<section class="w-100">
  <h1 class = "d-flex flex column justify-content-center text-primary py-5 m-0 display-3">¿Sabías que...?</h1>   
  <div class="row w-75 mx-auto" id="servicios-fila-1">   
    <div class="flex-wrapper">
      <div class="single-chart">
        <svg viewBox="0 0 36 36" class="circular-chart red">
          <path class="circle-bg"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <path class="circle"
            stroke-dasharray="97, 100"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <text x="18" y="20.35" class="percentage">
            97%
          </text>
        </svg>
        <p class=" p-3 fs-3 border-3 lead lh-base m-0 text-center">De los delitos no se denuncian.</p>
      </div>
      
      <div class="single-chart">
        <svg viewBox="0 0 36 36" class="circular-chart purple">
          <path class="circle-bg"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <path class="circle"
            stroke-dasharray="100, 100"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <text x="18" y="20.35" class="percentage">7,756</text>
        </svg>
        <p class="p-3 fs-3 border-3 lead lh-base m-0 text-center">Número de denuncias en el Estado de México.</p>
      </div>
    
      <div class="single-chart">
        <svg viewBox="0 0 36 36" class="circular-chart yellow">
          <path class="circle-bg"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <path class="circle"
            stroke-dasharray="61, 100"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <text x="18" y="20.35" class="percentage">61%</text>
        </svg>
        <p class="p-3 fs-3  border-3 lead lh-base m-0 text-center">De los mexicanos cree que es inútil denunciar un acto de corrupción.</p>
      </div>
    </div>
  </div>

  <div class="row w-75 mx-auto mt-5" id="servicios-fila-1">   
    <div class="flex-wrapper">
      <div class="single-chart">
        <svg viewBox="0 0 36 36" class="circular-chart orange">
          <path class="circle-bg"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <path class="circle"
            stroke-dasharray="14, 100"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <text x="18" y="20.35" class="percentage">
            14%
          </text>
        </svg>
        <p class="p-3 fs-3 border-3 lead lh-base m-0 text-center">Han sido victimas de actos de corrupcion.</p>
      </div>
      
      <div class="single-chart">
        <svg viewBox="0 0 36 36" class="circular-chart green">
          <path class="circle-bg"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <path class="circle"
            stroke-dasharray="18, 100"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <text x="18" y="20.35" class="percentage">18%</text>
        </svg>
        <p class="p-3 fs-3 border-3 lead lh-base m-0 text-center">Confían en el partido politico que los representa.</p>
      </div>
    
      <div class="single-chart">
        <svg viewBox="0 0 36 36" class="circular-chart blue">
          <path class="circle-bg"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <path class="circle"
            stroke-dasharray="83, 100"
            d="M18 2.0845
              a 15.9155 15.9155 0 0 1 0 31.831
              a 15.9155 15.9155 0 0 1 0 -31.831"
          />
          <text x="18" y="20.35" class="percentage">83%</text>
        </svg>
        <p class="p-3 fs-3 border-3 lead lh-base m-0 text-center">Percibía a la corrupcion como un fenómeno frecuente en 2011.</p>
      </div>
    </div>
  </div>
</section>
            

<!-- ========================================================== -->
                        <!-- SECCION ACERCA DE NOSOTROS-->
<!--========================================================== -->
<section>
  <!-- ancho para pantallas grandes | margen auto | centrar texto -->
    <div class="container w-50 m-auto text-center mt-5" id="equipo" >
      <!-- margen abajo | tamaño letra | colores primarios  -->
      <h1 class="text-primary display-3 py-5 m-0">Nuestra filosofía</h1>
      <blockquote class="blockquote">
      <p class="fs-3 lead lh-lg m-5 mt-0 pb-5">
        "Creemos que los cambios empiezan con pequeñas acciones. Nosotros protegemos tu identidad, para que des el siguiente paso y te animes a denunciar."   </p>
      </blockquote>
    </div>
    <!--  margen arriba | centrado -->
    <!-- borde de arriba  -->
  </section>
<!-- ========================================================== -->
                        <!-- SECCION RECOMENDACIONES-->
<!--========================================================== -->
<section>
  <!-- ancho para pantallas grandes | margen auto | centrar texto -->
  <div class="container w-50 m-auto text-center mt-5" id="equipo" >
      <!-- margen abajo | tamaño letra | colores primarios  -->
      <h1 class="text-primary display-3 py-5 m-0">Recomendaciones</h1>
      <blockquote class="blockquote">
      <p class="fs-3 lead lh-lg m-5 mt-0 pb-5">
         - Para el uso de la página, recomendamos eliminar las cookies. </p>
      <p class="fs-3 lead lh-lg m-5 mt-0 pb-5">
         - Elegir conexiones a Internet seguras (puede ser utilizando una VPN). </p>
      <p class="fs-3 lead lh-lg m-5 mt-0 pb-5">
         - Asegurar que el dispositivo cuente con la última actualización (para un mejor navegación). </p>
       <p class="fs-3 lead lh-lg m-5 mt-0 pb-5">
         - Asegurarse de contar y de usar las recomendaciones determinadas de seguridad en sus contraseñas. </p>
      </blockquote>
    </div>
    <!--  margen arriba | centrado -->
    <!-- borde de arriba  -->
  </section>

    <!--========================================================== -->
    <!--Formulario-->
    <!--========================================================== -->
    <!--Segmentos con distintas secciones del formulario a ingresar -->
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h2 class="text-white text-center" id="offcanvasRightLabel">Denuncia</h2>
            <button type="button" class="btn-close btn-close-white  text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card">
                <div class="card-header text-center">
                    Información de Denuncia
                </div>

                <form class='form-signin' action='insert.php' method='post'>
                    <div class='form-label-group mb-1'>
                        <select class='custom-select mr-sm-2 form-select' name='TIPO' id='TIPO' autofocus placeholder='Tipo de denuncia' required>
                            <option selected> * Tipo de denuncia</option>
                            <option value='1' id='TIPO'> Anónima </option>
                            <option value='2' id='TIPO'> Abierta </option>
                            <option value='3' id='TIPO'> Confidencial </option>
                        </select>
                        
                        <div class='form-floating mb-1'>
                          <input type='text' class='form-control' id='NOMDENT' name='NOMDENT' autofocus placeholder='Nombre Denunciante'>
                          <label for='NOMDENT'> Nombre del denunciante </label>
                      </div>
                      <div class='form-floating mb-1'>
                        <input type='text' class='form-control' id='SEXO' name='SEXO' autofocus placeholder='Sexo Denunciante'>
                        <label for='SEXO'> Sexo del denunciante </label>
                      </div>
                      <div class='form-floating mb-1'>
                        <input type='text' class='form-control' id='EDAD' name='EDAD' autofocus placeholder='Edad Denunciante'>
                        <label for='EDAD'> Edad del denunciante </label>
                      </div>
                      <div class='form-floating mb-1'>
                        <input autocomplete="off" type="email" id='CORDENT' class='form-control' placeholder='Correo denunciante' autofocus name='CORDENT'>
                        <label for='Cordent'>Correo del denunciante</label>
                    </div>
                    <div class='form-floating mb-1'>
                        <input autocomplete="off" type="password" id='PASSW' class='form-control' placeholder='Contraseña' autofocus name='PASSW' required>
                        <label for='PASSW'>* Crear Contraseña</label>
                    </div>
                    <div class='form-floating mb-1'>
                        <input type='text' class='form-control' id='OCUDENT' name='OCUDENT' autofocus placeholder='Ocupación Denunciante' >
                        <label for='OCUDENT'> Ocupación del denunciante </label>
                    </div>

                    <div class='form-label-group mb-1'>
                      <select class='custom-select mr-sm-2 form-select' name='ESCOL' id='ESCOL' autofocus placeholder='Escolaridad Denunciante' >
                          <option selected> Escolaridad del denunciante</option>
                          <option value='1' id='ESCOL'> Primaria </option>
                          <option value='2' id='ESCOL'> Secundaria </option>
                          <option value='3' id='ESCOL'> Preparatoria </option>
                          <option value='4' id='ESCOL'> Bachillerato </option>
                          <option value='5' id='ESCOL'> Licenciatura </option>
                      </select>
                    </div>

                    <div class='form-floating mb-1'>
                      <input type='date' class='form-control' id='FECHA' name='FECHA' autofocus placeholder="Fecha" required>
                      <label for='FECHA'>* Fecha en la que sucedió</label>
                    </div>
                    <div class='form-label-group mb-1'>
                      <select class='custom-select mr-sm-2 form-select' name='Estado' id='Estado' autofocus placeholder='Tipo de denuncia' required>
                        <option value = 0 selected>* Selecciona el estado donde sucedio </option>
                        <?php
                            //Se muestran como parte del input select los diferentes estados que estan registrados en la base de datos
                            while($resultEstados = mysqli_fetch_row($datos_estado)){
                                echo "<option value= $resultEstados[0] id='Estados'> $resultEstados[0] - $resultEstados[1]   </option> ";
                            }
                            echo "</select>";
                        ?>
                      </select>
                    </div>
                    <div id="municipios"></div>
                    <div class='form-floating mb-1 mt-2'>
                        <input type='text' class='form-control' id='NOMDEN' name='NOMDEN' autofocus placeholder="Nombre Denunciado">
                        <label for='NOMDEN'> Nombre de quien denuncias </label>
                    </div>
                    <div class='form-floating mb-1'>
                        <input type='text' class='form-control' id='OCUDEN' name='OCUDEN' autofocus placeholder='Ocupación Denunciado' required>
                        <label for='OCUDEN'>* Ocupación de quien denuncias </label>
                    </div>
                    <div class='form-floating mb-1'>
                        <input type='text' class='form-control' id='EMPDEN' name='EMPDEN' autofocus placeholder='Empresa Denunciado' required>
                        <label for='EMPDEN'>* Empresa de quien denuncias </label>
                    </div>
                  </div>


                    

                    <div class='form-floating mb-1'>
                        <textarea class="form-control" name="DESC" id="DESC" cols="30" rows="10" required></textarea>
                        <label for="DESC"> Descripción de los hechos</label>
                    </div>

                    <p>Puedes seleccionar múltiples archivos para sustentar tu denuncia:</p>
                    <div class="input-group mb-3">
                      <input type="file"  multiple="multiple" class="form-control" id="inputGroupFile02">
                    </div>
                    
                    <div class='aviso-priv mb-1'>
                        <input class="form-check-input" style = "margin-left: 5px; "type="checkbox" id="AVISO" required>
                        <label class="form-check-label" for="AVISO">Acepto el aviso de Privacidad</label>
                    </div>

                    <div class='dar-sig mb-1'>
                        <input class="form-check-input" style = "margin-left: 5px" type="checkbox" id="SEGUI" required>
                        <label class="form-check-label" for="SEGUI">Dar seguimiento</label>
                    </div>
                    <div style='text-align: center'>
                        <button class='btn btn-outline-primary btn-lg btn-block' type='submit' name='ConsultaPerso' id="go">
                            Envíar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        
        
        

    </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">POLÍTICA DE PRIVACIDAD</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p></p>
                    La presente Política de Privacidad establece los términos en que usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
                    <p></p>
                    <p class="fw-bold"> Información que es recogida </p>
                    Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,  información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.
                    <p></p>
                    <p class="fw-bold"> Uso de la información recogida </p>
                    Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios.  Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.
                     está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.
                     <p></p>
                     <p class="fw-bold"> Cookies </p>
                    Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.
                    Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente . Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.
                    <p></p>
                    <p class="fw-bold"> Enlaces a Terceros </p>
                    Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas.
                    <p></p>
                    <p class="fw-bold"> Control de su información personal </p>
                    En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.
                    Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con una orden judicial.
                    Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.
                  </div>
                  <div class="container" style="margin-left: 10p;">
                    <div class='aviso-priv mb-1'>
                        <input class="form-check-input " type="checkbox" id="AVISO" >
                        <label class="form-check-label" for="AVISO">He leído el aviso de privacidad</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Continuar</button>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      

   
    <!-- Barra lateral estática  -->
    <div class="share-btn-container" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Aviso de Privacidad
    </div>

    <div class="share-btn-container2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            <p class="fala">Faltas administrativas graves</p>
    </div>

     <!-- Modal 2 -->
     <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">Faltas Administrativas Graves</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p></p>
                    Las conductas previstas a continuación, constituyen faltas administrativas graves de los Servidores Públicos, por lo que deberán abstenerse de realizarlas, mediante cualquier acto u omisión.
                    <p></p>
                    <p class="fw-bold"> Cohecho </p>
                    Ejemplo: Cuando un servidor público pide dinero, para agilizar un trámite, una firma, o esconder un expediente. Art. 52 LGRA
                    <p></p>
                    <p class="fw-bold"> Peculado </p>
                    Ejemplo: Un servidor público utiliza al personal de jardinería o de mantenimiento, además de materiales como pintura o cemento, propiedad de la dependencia, para hacer reparaciones en su casa. Art. 53 LGRA
                     <p></p>
                     <p class="fw-bold"> Abuso de funciones </p>
                     Ejemplo: Un servidor público provoca un accidente vial, y pretende valerse de su cargo para que las autoridades que atienden el percance omitan datos en sus reportes con la intención de beneficiarse evadiendo su responsabilidad en el accidente. Art. 57 LGRA
                    <p></p>
                    <p class="fw-bold"> Desvío de recursos públicos </p>
                    Ejemplo: Un servidor público autoriza el pago de una jubilación de un trabajador, mayor a la que le corresponde por ley. Art. 54 LGRA
                    <p></p>
                    <p class="fw-bold"> Actuación bajo conflicto de interés</p>
                    Ejemplo: Un servidor público aprueba o autoriza la adquisición de papelería para la dependencia, y el proveedor es su hermano. Art. 58 LGRA

                  <p></p>
                    <p class="fw-bold"> Utilización indebida de información</p>
                    Ejemplo: Un servidor público compra para si mismo, un terreno a un precio muy bajo, sabiendo que se tiene proyectado desarrollar un complejo turístico en la zona.
          Art. 55 LGRA
                    <p></p>
                    <p class="fw-bold"> Contratación indebida</p>
                    Ejemplo: Un servidor público autoriza la contratación de una persona que fue sancionada con la inhabilitación para el ejercicio del servicio público, al ser encontrada responsable de una falta administrativa. Art. 59 LGRA
                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
              </div>
          </div>
      </div>

    <!--
    <section id="seccion-contacto" class="border-bottom border-secondary border-2">
      <div id="bg-contactos">
  
            <div id="local" class="border-top border-2">
          <div class="container text-center" id="equipo">
              <p class="fs-2 m-0">Equipo conformado por estudiantes del <span class="text-primary">Tecnológico de Monterrey</span>.</p>
              <p class="fs-5 px-2 pt-3 m-0">Denuncia Segura &copy; Todos Los Derechos Reservados 2022.</p>
          </div>
      </div>
          Fondo: imagen vectorial (hasta abajo) 
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1b2a4e" fill-opacity="1" d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
      </div>
  </section>
    -->

    <section class="footer bg-primary text-center py-4">
      <p class="fs-3 m-0 lead text-white">Equipo conformado por estudiantes del <strong class="">Tecnológico de Monterrey</strong></p>
      <p class="fs-6 px-2 lead pt-3 m-0 text-white">Denuncia Segura &copy; Todos Los Derechos Reservados 2022.</p>
    </section>


    
  </body>
  </html>
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
  <script type="text/javascript">
 
    $(document).ready(function(){
      $('#Estado').val(0);
      recargarLista();

      $('#Estado').change(function(){
        recargarLista();
      });
    })
  </script>
  <script type="text/javascript">
    function recargarLista(){
      $.ajax({
        type:"POST",
        url:"datos.php",
        data:"id_estado=" + $('#Estado').val(),
        success:function(r){
          $('#municipios').html(r);
        }
      });
    }
  </script>