<?php
include 'configuracionBD.php';

class conexion {

    public $conexion = null;

    public static function conexionDB() {
        if ($conexion = mysqli_connect(dbHost, dbUsuario, dbClave)) {

            if (mysqli_select_db($conexion,dbBD)) {
                return $conexion;
            } else {
                 throw new Exception ('No existe la BD '.  mysqli_errno());
            }
        } else {

            throw new Exception ('La informacion de conexion a la BD es incorrecta '.  mysqli_errno());
        }
    }
    
    public static function cierraConexionDB($conexion) {
        mysqli_close($conexion);
    }

}
?>