<?php

require_once("../controller/defaultController.php");
session_start();

if (isset($_POST["IdUsuario"])){
  //process login form
  try{
    $stmt = $connect->prepare("SELECT count(IdUsuario) FROM users where IdUsuario=? and contraseña=?");
    $stmt->execute(array($_POST["IdUsuario"], $_POST["contraseña"]));

    if ($stmt->fetchColumn() == 1) {
      // username/password is valid, put the username in _SESSION
      $_SESSION["currentuser"] = $_POST["IdUsuario"];

      // send user to the restricted area (HTTP 302 code)
      header("Location: personal_area.php");
      die();
    }else{
      echo "Username is not valid<br>";
    }
  } catch(PDOException $ex) {
    die("exception! ".$ex->getMessage());
  }
}
?>

<!DOCTYPE html>

<html>

	<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel ="stylesheet" href="../css/bootstrap.min.css">
    <link rel ="stylesheet" href="../css/loginstyle.css">
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	</head>

	<!--<header id="main-header">
		<id="logoCabecera"><img class="logo" src = "../img/icono.png"/>
	</header>-->

	<body>

    <!--<form action="login.php" method="POST">
    	 <p align= center>Usuario: <input type="text" name="username">
    	 <p align= center>Contraseña: <input type="password" name="passwd">
       <p align= center>Email: <input type="email" name="email">
    	 <p align= center><input type="submit">
    </form>-->
    <div class="container" id="login">
      <center>
      <form action= "login.php" method="POST">
        <label>Usuario: </label>
        <input type="text" name="IdUsuario"/><br>
        <label>Contraseña: </label>
        <input type="password" name="contraseña"/><br><br>
        <a href="#">Registrarse</a>
        <button type="submit">Iniciar sesión</button>
      </form>
      </center>
    </div>
  </body>
</html>
