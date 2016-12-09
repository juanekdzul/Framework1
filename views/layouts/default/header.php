<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">

	<title>Framework Básico</title>

	<link rel="stylesheet" 
	href ="<?php echo $layoutParams["route_css"]; ?>/bootstrap.css" >
</head>

<body>

<div class="container">
 <nav>
 	<ul>
 		<a class="btn btn-default" href="<?php echo APP_URL; ?>" role="button">Inicio</a> 
 		<a class="btn btn-default" href="<?php echo APP_URL; ?>/users" role="button">Usuarios</a> 
 		<a class="btn btn-default" href="<?php echo APP_URL; ?>/types" role="button">Types</a> 	
 		<!--<a href="<?php// echo APP_URL; ?>/users">Usuarios</a>
 		<li><a href="#">Productos</a></li>
 		<li><a href="#">Notificaciones</a></li>
 		<li><a href="#">Contactanos</a></li>-->
 	</ul>
 </nav>
 <div align="center" class="login">HOLA<?php echo $_SESSION["username"]; ?>
 <button><a href="<?php echo APP_URL."/users/logout";?>">salir</a></button>
</div>