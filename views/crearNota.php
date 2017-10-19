<?php
require_once("../controller/defaultController.php");
if(!isset($_SESSION)) session_start();

?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel ="stylesheet" href="../css/bootstrap.min.css">
		<link rel ="stylesheet" href="../css/crearNota.css">
		<link rel="shortcut icon" href="../img/favicon.ico">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
	</head>


	<header id="main-header">
				<id="logoCabecera"><img class="logo" src = "../img/icono.png" />
				<div class="bloque">
					<br><br><br>
				<a id = "notas" href= "verNotas.php">Ver mis notas</a>
				<a id = "salir" href= "#">Salir</a>
				</div>
	</header>

	<body>
	<div id="main-content" >
		<h1><p align= center>Crear nota</h1>

		<div class="container">

      <form action="../controller/defaultController.php?controlador=nota&accion=crearNota"   method="post" class ="formularioCrear" role = "form">

				  <div class ="form-group ">
					  <label for = "nomNota" id="labelNombre">Nombre:</label>
					  <input type="text"  class ="form-control" name="nomNota"  id="textBoxNombre" maxlength="50">
				  </div>

				  <div class ="form-group">
					  <label for = "contenidoNota" id="contenidoNota">Contenido:</label>
					  <input type="text" name="contenidoNota" class ="form-control" id="textBoxContenido"  maxlength="300" >
				  </div>

					<button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-paperclip" id="btnGuardar"></span> Guardar</button>
					<a href="verNotas.php"><button type="button" class="btn btn-default btn-lg">Atrás</button></a></p>
	  </form>
	  </div>
	</div>


    <footer id="main-footer">
		<br>
		<p>&copy; 2017 ¿Alguna duda?  Contacta con nosotros ==> <a href="">info@apunta.com</a></p>
	</footer>



  </body>
</html>
