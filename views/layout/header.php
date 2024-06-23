<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Video Vigilancia MPH</title>
    <!-- Bootstrap -->
    <link href="<?=base_url?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/queries.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!--Parte Header-->
    <header class="clearfix">
        <div class="logo col-md-12">
            <!--<img src="assets/img/MPH.jpg" alt="Carousel Img"><h2 class="logo-text">INFUSION</h2>-->
            &nbsp;&nbsp;&nbsp;<img class="mphc" src="<?=base_url?>assets/img/MPH3.jpg" alt="Carousel Img"> &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; REGISTRO DE INCIDENCIAS - VIDEO VIGILANCIA
        </div>
        <nav class="clearfix">
            <ul class="clearfix">
                <li><a href="<?=base_url?>" class="active">Inicio</a></li>

                <?Php if(isset($_SESSION['identity'])): ?>
                    <li><a href="<?=base_url?>rincidencias/registro" class="active">Registro</a></li>
                    <li><a href="<?=base_url?>rincidencias/gestion" class="active">Incidencias</a></li>
                    <li><a href="#" class="active">Reporte</a></li>
                <?Php endif; ?>

                <?Php if(isset($_SESSION['admin'])): ?>
                    <li><a href="<?=base_url?>camara/gestion" class="active">Camara</a></li>
                    <li><a href="<?=base_url?>cecom/gestion" class="active">Cecom</a></li>
                    <li><a href="<?=base_url?>unidad/gestion" class="active">Unidad</a></li>
                    <li><a href="<?=base_url?>malerta/gestion" class="active">Alerta</a></li>
                    <li><a href="<?=base_url?>tdelito/gestion" class="active">Delito</a></li>
                    <li><a href="<?=base_url?>supervisor/gestion" class="active">Supervisor</a></li>
                    <li><a href="<?=base_url?>operador/gestion" class="active">Operador</a></li>
                    <li><a href="<?=base_url?>pnp/gestion" class="active">PNP</a></li>
                <?Php endif; ?>
            </ul>
        </nav>
        <div class="pullcontainer">
            <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
        </div>
    </header>
    
    <div class="logo2 col-md-12"></div>