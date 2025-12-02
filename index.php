<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$msg  = "";
if (isset($_POST['txtNombre']) && isset($_POST['txtApellido']) && isset($_POST['txtEmpresa']) && isset($_POST['txtEmail']) && isset($_POST['txtTelefono']) && isset($_POST['txtMensaje'])  && $_POST['txtNombre'] != "" && $_POST['txtApellido'] != "" && $_POST['txtEmpresa'] != "" && $_POST['txtEmail'] != "" && $_POST['txtTelefono'] != ""  && $_POST['txtMensaje'] != "") {



    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing true enables exceptions
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.guimea.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'noreply@guimea.com';                     // SMTP username
        $mail->Password   = 'AdministracionGuimea123';                               // SMTP password
        $mail->SMTPSecure = 'tls';      // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->SetFrom('noreply@guimea.com', 'No reply');
        $mail->addAddress('servicios@powatt.mx', 'Union Ganadera');     // Add a recipient         // Name is optional

        $mail->addReplyTo('noreply@guimea.com', 'No reply');


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Contacto de la pagina web';
        $mail->Body    = "<p>Una nueva persona ha enviado su informacion a traves de la forma de contacto del sitio web.</p>
        
        <p>Su Informacion es la siguiente:</p>
        <p>Nombre:" . $_POST['txtNombre'] .  $_POST['txtApellido'] . "</p>
        <p>Empresa:" . $_POST['txtEmpresa'] . "</p>
        <p>Email: " . $_POST['txtEmail'] . "</p>
        <p>Telefono de Contacto:" . $_POST['txtTelefono'] . "</p>
        <p>Mensaje:" . $_POST['txtMensaje'] . "</p>
        ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        echo '<script>alert("Se mando el mensaje con exito.")</script>';
        $msg = "El mensaje fue enviado con exito";
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="slogan    ">
    <meta name="keywords" content="   ">
    <meta name="author" content="Powatt">

    <meta name="apple-mobile-web-app-title" content="Powatt">
    <meta name="apple-mobile-web-app-status-bar-style" content="orange">
    <link rel="apple-touch-icon" href="img/favicon.jpg">

    <meta property="og:url" content="https://www.powatt.mx" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Powatt" />
    <meta property="og:description" content="slogan " />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link href="assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" /> -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/now-ui-kit@1.3.0/assets/css/now-ui-kit.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />

    <link href="css/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <title>Powatt</title>
    <style>
        .zero {
            padding: 0% !important;
            margin: 0% !important;
        }

        .card-azul {
            background-color: #4a5a65;
            padding: 10%;

        }

        .card-azul2 {
            background-color: #8593AF;
            padding: 10%;

        }

        .white {
            color: white !important;
            font-weight: bold;
        }

        .boton {
            border-radius: 35px;
            position: fixed;
            bottom: 15px;
            right: 15px;
            margin: 0;
            padding: 15px;
            color: white;
            z-index: 999;

        }

        .text {
            color: black;
            font-weight: 350;
            display: none;


        }

        .contain {

            cursor: pointer !important;
        }

        .card {
            background-color: rgba(245, 245, 245, 0.4);
        }

        .card-header,
        .card-footer {
            opacity: 1
        }


        .contain .text {
            display: block;
        }

        .img-contenedor img {
            transition: all .9s ease;   

            -webkit-transition: all .9s ease;
            /* Safari y Chrome */
            -moz-transition: all .9s ease;
            /* Firefox */
            -o-transition: all .9s ease;
            /* IE 9 */
            -ms-transition: all .9s ease;
            /* Opera */
            width: 100%;
        }



        .img-contenedor:hover img {

            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }



        .boton:hover {
            opacity: 0.50;
            -moz-opacity: .50;
            filter: alpha (opacity=50);
        }

        .boton a {
            color: #fff;
            text-decoration: none;
            padding: 5px 5px 5px 0;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            transition: .5s ease;
        }


        .slogan {
            color: white;
            font-weight: bold !important;
            margin-top: -400px;
            text-align: center;
        }

        .row {
            margin-bottom: 20px;
        }

        .card-title {
            text-align: center;
        }

        .inputC {
            background-color: white !important;
        }

        .cotiza {
            font-size: 20px;
        }



        h4 {
            color: #0e1648;
        }

        .cliente {
            margin-top: 40px !important;
            margin-bottom: 40px !important;
        }

        img .pulse {
            margin-left: 10px auto !important;
            margin-right: 10px auto !important;
        }

        .navbar-toggler-bar {
            background-color: black !important;
        }

        .navbar-toggler {
            padding-right: 50px;
        }

        .img {
            margin-bottom: 15px;
        }

        @media screen and (max-width: 800px) {
            .slogan {
                display: none !important;
            }

        }
    </style>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent fixed-top zero" color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand " href="/"> <img src="assets/img/header/logo-powatt.webp" class="img-fluid float-left" alt="Powatt MX Logo" id="logo" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-primary" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse show" id="example-navbar-primary" data-nav-image="assets/img//blurred-image-1.jpg">
                <ul class="navbar-nav ml-auto" id="ceva">

                    <li class="nav-item ">
                        <a class="nav-link" href="#nosotros" id="script1">
                            <p>Nosotros</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#servicios" id="script2">
                            <p>Servicios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto" id="script5">
                            <p>Contacto</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Cabecera-->

    <div class="container-fluid zero contenedor ">
        <div class="row zero">
            <div class="col-12 zero">

                <img src="img/img1.jpg" class="img-responsive img-fluid animated fadeIn" alt="">
            </div>
            <div class="col-12 slogan">
                <h2 class="s">“La energía no se crea ni se destruye, Powatt la transforma”</h2>
                <a type="submit" class="btn btn-warning btn-round  cotiza" href="#contacto">Cotiza</a>
            </div>
        </div>
    </div>

    <!--nosotros-->
    <div class="container-fluid  card-azul">
        <div class="row" id="nosotros">

            <div class="col-md-8 ml-auto mr-auto text-center">

                <h2 class="title white">¿Quiénes somos?</h2>
                <h5 class="description white animated slideInUp wow">Somos una empresa especializada en brindar servicios y soluciones eléctricas en todos los sectores.</h5>

            </div>
        </div>

    </div>

    <!--Presencia-->

    <div class="container-fluid card-azul2">
        <div class="row">
            <div class="col ml-auto mr-auto text-center">
                <h2 class="title white">Presencia</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <img src="img/presencia.jpg" class="img-responsive img-fluid animated fadeIn" alt="">

            </div>
        </div>
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h5 class="description animated slideInUp wow white">Nuestra presencia cubre todo el territorio nacional.</h5>
            </div>
        </div>
    </div>

    <!--Servicios-->
    <div class="container">

        <div class="row " id="servicios">
            <div class="col-12 columna text-center pt-5 mt-5">
                <h2>
                    <b>NUESTROS SERVICIOS</b>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-5 ">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction1()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio2.jpg" class="card-img-top " alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col">
                        <h5 class="card-title text zero ">Diseño de ingeniería</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction2()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio3.jpg" class="card-img-top " alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col">
                        <h5 class="card-title text zero ">Suministro de material eléctrico</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction3()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio4.jpg" class="card-img-top zero" alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col">
                        <h5 class="card-title text zero ">Código de red</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction4()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio5.jpg" class="card-img-top zero" alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col">
                        <h5 class="card-title text zero ">Sistema fotovoltaicos</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction5()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio7.jpg" class="card-img-top zero" alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col">
                        <h5 class="card-title text zero ">Mantenimiento eléctrico</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction6()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio1.jpg" class="card-img-top zero" alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col ">
                        <h5 class="card-title text zero ">Trámites con compañías suministradoras</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction7()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio10.png" class="card-img-top zero" alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col">
                        <h5 class="card-title text zero ">Estudios eléctricos</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction8()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col ">
                        <img src="img/servicio9.jpg" class="card-img-top zero" alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col ">
                        <h5 class="card-title text zero ">Diagnóstico y pruebas eléctricas</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 columna col-sm-12 col-md-4 col-lg-4 col-xl-4  mb-5">
                <div class="row contain animated bounceInLeft wow img-contenedor" onclick="myFunction9()" data-toggle="modal" data-target="#exampleModal">
                    <div class="col">
                        <img src="img/servicio6.jpg" class="card-img-top zero" alt="">
                    </div>
                </div>
                <div class="row contain animated bounceInLeft wow">
                    <div class="col ">
                        <h5 class="card-title text zero ">Construcción</h5>
                    </div>
                </div>
            </div>

          
        </div>

    </div>
    <!--Modal servicios-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <ul id="lista"></ul>

                    </p>
                </div>

            </div>
        </div>
    </div>

    <!--Galeria
    <div class="container" id="galeria">
        <div class="row ">
            <div class="col-12 columna text-center">
                <h2>
                    <b> Galería</b>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class=" img col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <img src="img/galeria1.jpg" class="img-responsive img-fluid" alt="">
            </div>
            <div class=" img col-6 col-sm-6 com-md-6 col-lg-3 col-xl-3">
                <img src="img/galeria2.jpg" class="img-responsive img-fluid" alt="">
            </div>
            <div class=" img col-6 col-sm-6 com-md-6 col-lg-3 col-xl-3">
                <img src="img/galeria3.jpg" class="img-responsive img-fluid" alt="">
            </div>
            <div class=" img col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <a href="gallery.php">
                    <img src="img/galeria14.jpg" class="img-responsive  more img-fluid" alt="">
                    <div class="plus">
                        <i class="fas fa-plus fa-4x"></i>
                    </div>
                    <div class="mas">
                        Galería completa
                    </div>
                </a>

            </div>
        </div>
    </div>
    Clientes
    <div class="container">
        <div class="row " id="clientes">
            <div class="col-12 columna text-center">
                <h2>
                    <b> CLIENTES</b>
                </h2>
            </div>
        </div>

        <div class="row ">
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
        </div>
        <div class="row ">
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
        </div>
        <div class="row ">
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 cliente">
                <img src="img/logo.png" class="img-responsive img-fluid animated pulse wow" alt="">
            </div>
        </div>


    </div>-->
    <!--Contactanos-->
    <div class="contactus-1 section-image" id="contacto" style="background-image: url('img/img8.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="title">Más de nosotros</h2>
                    <h4 class="description">¿Necesitas más información? Busca nuestras oficinas o contacta con nosotros
                        para saber más.</h4>
                    <div class="info info-horizontal  animated zoomIn wow">


                    </div>
                    <div class="info info-horizontal animated zoomIn wow">
                        <div class="icon icon-primary">
                            <i class="now-ui-icons tech_mobile"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Contactanos</h4>
                            <p class="description">
                                Correo: servicios@powatt.mx
                                <br> Celular: 4444190487
                                <br> Whatssap: 4444811212
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 ml-auto mr-auto text-light">
                    <div class="animated zoomIn wow">
                        <form role="form" id="contact-form1" method="POST" action="index.php">
                            <div class=" text-center">
                                <h4 class="card-title text-light">Contactanos</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 pr-2">
                                        <label>Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                                            </div>
                                            <input required type="text" class="form-control inputC" placeholder="Nombre..." name="txtNombre" aria-label="First Name..." autocomplete="given-name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-2">
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="now-ui-icons text_caps-small"></i></span>
                                                </div>
                                                <input required type="text" class="form-control inputC" name="txtApellido" placeholder="Apellido..." aria-label="Last Name..." autocomplete="family-name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-2">
                                        <label>Empresa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="now-ui-icons business_badge"></i></span>
                                            </div>
                                            <input required type="text" class="form-control inputC" name="txtEmpresa" placeholder="Empresa..." aria-label="First Name..." autocomplete="given-name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-2">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="now-ui-icons tech_mobile"></i></span>
                                                </div>
                                                <input required type="text" class="form-control inputC" name="txtTelefono" placeholder="Telefono..." aria-label="Last Name..." autocomplete="family-name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                                        </div>
                                        <input required type="email" name="txtEmail" class="form-control inputC" placeholder="Correo..." autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tu mensaje</label>
                                    <textarea required name="txtMensaje" class="form-control" id="message" rows="6"></textarea>
                                </div>
                                <div class="row">

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-warning btn-round ">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a class="btn boton btn-success" href="https://api.whatsapp.com/send?phone=524444811212">
                <i class="fab fa-whatsapp fa-2x" style="color:white;"></i></a>

        </div>
    </div>
    <!--pie-->
    <footer class="footer" data-background-color="black">
        <div class=" container ">
            <nav>
                <ul>
                    <li>
                        <a href="#nosotros" id="script1">
                            Nosotros
                        </a>
                    </li>
                    <li>
                        <a href="#servicios" id="script2">
                            Servicios
                        </a>
                    </li>
                    <!--
                    <li>
                        <a href="#galeria" id="script3">
                            Galeria
                        </a>
                    </li> 
                    <li>
                        <a href="#clientes" id="script4">
                            Clientes
                        </a>
                    </li>-->
                </ul>
            </nav>
            <div class="copyright" id="copyright">
                ©
                <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>, Powered by
                <a href="https://www.guimea.com" style="text-decoration:underline!important;">Guimea</a>.
            </div>
        </div>
    </footer>


    <!--scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>

    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
    <script>
        $('#script1').on('click', function(e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $('#nosotros').offset().top
            }, 1000);
        });
        $('#script2').on('click', function(e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $('#servicios').offset().top
            }, 1000);
        });
        $('#script3').on('click', function(e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $('#galeria').offset().top
            }, 1000);
        });
        $('#script4').on('click', function(e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $('#clientes').offset().top
            }, 1000);
        });
        $('#script5').on('click', function(e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $('#contacto').offset().top
            }, 1000);
        });
    </script>

    <script>
        function myFunction6() {
            var titulo_data = "TRÁMITES ANTE COMPAÑÍAS SUMINISTRADORAS";
            var lista_data = "<li> <b>CENACE</b> Centro Nacional de Control de Energía</li>";
            lista_data = lista_data + "<li> <b>CFE</b> Comisión Federal de Electricidad</li>";
            lista_data = lista_data + "<li> <b>CRE</b> Comisión Reguladora de Energía</li>";
            lista_data = lista_data + "<li> <b>UVIE</b> Unidades de Verificación en Instalaciones Eléctricas</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction1() {
            var titulo_data = "DISEÑO DE INGENIERÍA";
            var lista_data = "<li> Diseño de proyecto de baja, media y alta tensión para las áreas comercial, industrial y torres departamentales.</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction2() {
            var titulo_data = "SUMINISTRO DE MATERIAL ELÉCTRICO";
            var lista_data = "<li>Material eléctrico para residencial, comercial, industrial y hospitalario.</li>";
            lista_data = lista_data + "<li> Productos fotovoltaicos de alto rendimiento.</li>";
            lista_data = lista_data + "<li> Accesorios en general.</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction3() {
            var titulo_data = "CÓDIGO DE RED";
            var lista_data = "<li>Estudios y trámites requeridos para cumplir con el código</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction4() {
            var titulo_data = "SISTEMAS FOTOVOLTAICOS";
            var lista_data = "<li>Estudio por medio de PVSIST</li>";
            lista_data = lista_data + "<li> Monitoreo las 24 horas por una app</li>";
            lista_data = lista_data + "<li> Instalación y suministro de materiales EPC</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction9() {
            var titulo_data = "CONSTRUCCIÓN";
            var lista_data = "<li>Subestaciones de baja, media y alta tensión.</li>";
            lista_data = lista_data + "<li> Instalaciones de sistemas fotovoltaicos</li>";
            lista_data = lista_data + "<li> Instalación de baja, media y alta tensión (charola, electroducto, tubería, líneas subterráneas y aéreas.</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction5() {
            var titulo_data = "MANTENIMIENTO ELÉCTRICO";
            var lista_data = "<li>Subestaciones</li>";
            lista_data = lista_data + "<li> Transformadores</li>";
            lista_data = lista_data + "<li> Electroductos</li>";
            lista_data = lista_data + "<li> Tableros</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction8() {
            var titulo_data = "DIAGNÓSTICO Y PRUEBAS ELÉCTRICAS";
            var lista_data = "<li>Relación de transformación</li>";
            lista_data = lista_data + "<li> Resistencia de aislamiento</li>";
            lista_data = lista_data + "<li> Resistencia óhmica de devanados</li>";
            lista_data = lista_data + "<li> Pruebas de aceite aislante</li>";
            lista_data = lista_data + "<li> Factor de potencia y corriente de excitación</li>";
            lista_data = lista_data + "<li> Medición de sistema de tierras</li>";
            lista_data = lista_data + "<li> VLF(Voltage Low Frequency)</li>";
            lista_data = lista_data + "<li> Termografía</li>";
            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }

        function myFunction7() {
            var titulo_data = "Estudios eléctricos";
            var lista_data = "<li>Corto circuito</li>";
            lista_data = lista_data + "<li> Coordinación de protecciones</li>";
            lista_data = lista_data + "<li> Arc Flash </li>";
            lista_data = lista_data + "<li> Sistema de tierras </li>";
            lista_data = lista_data + "<li> Blindaje de acuerdo a NMX-J-549-ANCE-2005 </li>";
            lista_data = lista_data + "<li> Flujos de potencia </li>";
            lista_data = lista_data + "<li> Áreas clasificadas de acuerdo a la NOM-001-SEDE-2012 </li>";
            lista_data = lista_data + "<li> Calidad de energía </li>";
            lista_data = lista_data + "<li> Análisis de contingencias </li>";
            lista_data = lista_data + "<li> Análisis de demanda y cargabilidad de dispositivos </li>";
            lista_data = lista_data + "<li> Estudios de estabilidad de voltaje y transitorios </li>";
            lista_data = lista_data + "<li> Modelado de funcionamiento de planta por medio de DIGSILENT </li>";
            lista_data = lista_data + "<li> Modelado matemático de sistemas eléctricos </li>";


            document.getElementById("titulo").innerHTML = titulo_data;
            document.getElementById("lista").innerHTML = lista_data;
        }
    </script>
</body>

</html>