<?php


require_once(__DIR__."/../conexion/bdConexion.php");
require_once(__DIR__."/../model/NotaMapper.php");
require_once(__DIR__."/../model/Nota.php");

class NotaController{

  /*Obtenemos todos las notas*/
          public static function getAll(){
            if(!isset($_SESSION)) session_start();
            $notas = new Nota();
            return $notas->getAllNotas();
          }




          /*CREAR NOTA*/
              public static function crearNota(){
              if(!isset($_SESSION)) session_start();

            //  if($_SESSION['tipoUsuario']=="Administrador"){

                $nombre = $_POST['nomNota'];
                $contenido = $_POST['contenidoNota'];
                $idNota = "NULL";

                      //Comprobamos si los datosintroducidos son Correctos
                      if(Nota::registroValido($nombre,$contenido)){


                        //Creamos el Nota
                        $nota = new Nota();

                          $nota->setIdNota($idNota);
                          $nota->setNombre($nombre);
                          $nota->setContenido($contenido);


                        $nota->guardarNota($nota);

                        //recogemos los datos de la nota guardada para asignar el entrenador
                      /*  $act = Actividad::datosActividad($nombre,$fecha);
                        $idActividad = $act->getIdActividad();
                        $asignarEntr = Actividad::asignarEntrenador($entrenador,$idActividad);
                        header("Location: ../views/Admin/gestionActividades.php"); */
                          header("Location: ../views/verNotas.php");
                        }else{
                        $error = "ERROR.El formulario no fue bien completado.";
                        header("Location: ../views/error.php?error=$error");
                      }

                /*}else{
                  $error = "No tiene permiso para crear una Actividad";
                  header("Location: ../views/error.php?error=$error");
                }*/
              } //FIN CREAR nota


    /* GET nota*/
      public static function getNota($idNota){
      if(!isset($_SESSION)) session_start();

      $nota = NULL;
      $nota = Nota::obtenerDatos($idNota);
      if ($nota == NULL){
       $error = "No existe la nota ";
        header("Location: ../views/error.php?error=$error");
      }else{
        return $nota;
      }
    } // FIN GET nota



    /*MODIFICAR NOTA*/
      public static function modificarNota(){
      if(!isset($_SESSION)) session_start();

      //if($_SESSION['tipoUsuario'] =="Administrador"){
        $idNota = $_POST['idNot'];
        $contenido=$_POST['contenidoNota'];
        //Utilizamos la nota sin modificar por si no nos pasan unos argumentos, asignarle los que ya tenía
        $notaSinModificar = Nota::obtenerDatos($idNota);
        //Si no pasan nombre, cogemos el nombre que ya tenia
        if ($_POST['Nombre']!= null) {
          $nombre = $_POST['Nombre'];
        }else{
          $nombre = $notaSinModificar->getNombre();
        }
        //Si no pasan contenido, cogemos elcontenido que ya tenia
        if ($_POST['contenidoNota']!= null) {
          $contenido = $_POST['contenidoNota'];
        }else{
          $contenido = $notaSinModificar->getContenido();
        }


          //Comprobamos si los datosintroducidos son Correctos
          if(Nota::registroValido($nombre,$contenido)){

              //Llamamos a la funcion que modifica la Nota
              $nota = Nota::update($idNota,$nombre,$contenido);
              header("Location: ../views/verNotas.php");
            }else{
              $error = "ERROR.El formulario no fue bien completado.";
              header("Location: ../views/error.php?error=$error");
            }
      } //FIN MODIFICAR nota


      /* BORRAR nota*/
            public static function borrarNota(){
              if(!isset($_SESSION)) session_start();
                //if($_SESSION['tipoUsuario']=="Administrador"){


                    $idNota = $_POST['idNota'];
                    $nombre = $_POST['NomNota'];
                    //Comprobamos si existe la actividad para poder borrarlo
                    if(NotaMapper::existeActividad($nombre)){
                      //Lamamos a la funcion que elimina la Relacion Entrenador-Actividad
                    // Actividad::deleteEntrenadorActividad($idActividad);

                      Nota::delete($idNota);
                      //Redireccionamos a vista
                      header("Location: ../views/verNotas.html");
                    }else{
                      $error = "ERROR.La Nota no existe.";
                      header("Location: ../views/error.php?error=$error");
                    }
              /*  }else{
                  $error = "No tiene permiso para modificar un Ejercicio";
                  header("Location: ../views/error.php?error=$error");
                }*/
            }//FIN BORRAR nota





}



?>
