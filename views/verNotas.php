<?php
require_once("../controller/defaultController.php");

if(!isset($_SESSION)) session_start();
 //$idUsuario=$_SESSION['idUsuario'];
 /*Aqui comprobamos que no intenten entrar otros Usuarios que no sean Administradores*/
/*  if ($_SESSION['tipoUsuario'] =='Administrador'){
*/
  $row = NotaController::getAll();
?>




<!DOCTYPE html>

<html>

	<head>
    <meta charset="utf-8">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel ="stylesheet" href="../css/bootstrap.min.css">
		<link rel ="stylesheet" href="../css/verNotas.css">
		<link rel="shortcut icon" href="../img/favicon.ico">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
	</head>

	<header id="main-header">
		<id="logoCabecera"><img class="logo" src = "../img/icono.png"/>
		<div class = "bloque">
			<br><br><br>
			<a id = "salir" href= "#">Salir</a>
		</div>
	</header>


	<body>
	<div id="main-content" >
		<h1><p align= center>MIS NOTAS</h1>
		<div class="container">

			<a href="crearNota.php">
			<button type="button" class="btn btn-default btn-lg" ><span class="glyphicon glyphicon-plus" id="btnCrearNota"></span> Añadir nota</button>
			</a>



	  	<div class="row">

        <?php
        if($row!=null){
          foreach ($row as $nota) {

        ?>

				<div class="col-md-4">
          <h2><?php echo $nota['nombre']; ?></h2>
					<p><?php echo $nota['contenido']; ?></p>


          <a href="editarNota.php?id=<?php echo $nota['IdNota']; ?> "><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil" id="btnEditar"></span>Editar</button></a>
		  		<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-share" id="btnCompartir"></span> Compartir</button>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-trash" id="btnEliminar"></span>Eliminar</button>

        </div>

        <?php
          }
        }

        ?>

              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content" id="modalLogin">
          <!-- COMIENZO FOMRULARIO LOGIN -->
                 <div class="text-center" style="padding:50px 0">

                <h3>Â¿Estas seguro de eliminar esta nota?</h3>
                <form action="../controller/defaultController.php?controlador=nota&accion=borrarNota" method="POST">
                  <input type="hidden" name="IdNota" value="<?php echo $nota->getIdNota();?>">
                  <input type="hidden" name="nombre" value="<?php echo $nota->getNombre();?>">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Eliminar</button>
                    <a href="verNotas.php"><button type="button" class="btn btn-default">Cancelar</button></a>
               </form>

                </div>

          </div>
        </div>
        </div>
        <!-- FIN MODAL -->

			</div> <!-- /row -->
		</div> <!-- /container -->
	</div> <!-- /main-content -->

	<footer id="main-footer">
		<br>
		<p>&copy; 2017 ¿Alguna duda?  Contacta con nosotros ==> <a href="">info@apunta.com</a></p>
	</footer>

  </body>

</html>
