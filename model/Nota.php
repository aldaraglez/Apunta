<?php
require_once(__DIR__."/../conexion/bdConexion.php");
require_once(__DIR__."/../model/NotaMapper.php");


class Nota {
  protected $idNota;
  protected $nombre;
  protected $contenido;


  /*
      Constructor de la NOTA
    */
    public function __construct($idNota=NULL,$nombre=NULL, $contenido=NULL) {
      $this->idNota = $idNota;
      $this->nombre = $nombre;
      $this->contenido = $contenido;

    }

    public function getIdNota() {
      return $this->idNota;
    }
    public function setIdNota($idNota) {
      $this->idNota = $idNota;
    }

    public function getNombre() {
      return $this->nombre;
    }
    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function getContenido() {
      return $this->contenido;
    }
    public function setContenido($contenido) {
      $this->contenido = $contenido;
    }


    /*Obtener todos las notas*/
    public static function getAllNotas()
      {
          return $resultado = NotaMapper::findAll();
      }

      /* Guardamos una Nota en la BD*/
      public static function guardarNota($nota){
        return NotaMapper::guardarNota($nota);
      }
      /*Obtenemos datos de la nota por su nombre */
      public static function datosNota($nombre) {
        if ($nombre) {
                return NotaMapper::findByNomNota($nombre);
            } else {
                return "ERROR, no existe la nota";
            }
      }

      /*Comprobacion existe nota... Si existe nota devuelve Objeto Nota*/
        public static function obtenerDatos($idNota) {
          if ($idNota) {
              if ($res = NotaMapper::esValidoNota($idNota)) {

                      return NotaMapper::findByIdNota($idNota);
              } else {
                      echo "ERROR: La nota no existe";
              }
          } else {
                  return "ERROR, no existe la nota ";
          }
        }

        /*Comprobamos si se puede registrar la Nota. Si se puede retornamos un TRUE*/
public static function registroValido($nombre,$contenido){
    $error = array();
    if (strlen($nombre) < 1 || strlen($nombre) > 50) {
     $error["nombre"] = "El nombre de la Nota debe tener entre 3 y 50 caracteres.";
    }
    if (strlen($contenido) < 1 || strlen($contenido) > 300) {
     $error["contenido"] = "El contenido de la Nota debe tener entre 5 y 300 caracteres.";
    }
    if (sizeof($error)>0){
     echo "No se puede resgistrar la Nota por los siguientes motivos: ";
     print_r(array_values($error));
    }
    if (sizeof($error)==0){
     return true;
    }
}

public static function notasBuscadas($nombre) {
    if (NotaMapper::existeNota($nombre)) {
            return NotaMapper::findActBySearch($nombre);
        } else {
            return "ERROR, no existe la nota";
        }
  }


  public static function update($idNota, $nombre, $contenido){
     return NotaMapper::update($idNota, $nombre,$contenido);
  }
  public static function delete($idNota){
      NotaMapper::delete($idNota);
  }







}




  ?>
