<?php

//Incluimos todos los controladores
	include_once("NotaController.php");

//Llamamos alcontrolador y su accion
	if(isset($_GET["controlador"]) && isset($_GET["accion"])){
		$targetController = ucfirst($_GET["controlador"])."Controller";
		$action = $_GET["accion"];

		//Inicializamos la funcion del controlador
		$targetController::$action();
		
	}
	?>
