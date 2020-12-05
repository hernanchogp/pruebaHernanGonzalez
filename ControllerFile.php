<?php

error_reporting(0);
ini_set('display_errors', 0);

include '../Model/usersModel.php';
include '../Model/information_usersModel.php';
/**
 * Controlador principal, manipulacion file
 */
/**
 * Definicion de variables;
 */
$strNombreFile = '';
$fopenFile = '';
$contadorLinea = 0;
$idUser = '';
$idInfUser = '';
$arrayEstadoValido = array(1, 2, 3);
$errorArchivo = false;
/**
 * Control de acceso al script
 */
if (count($_FILES) > 0) {

    /*
     * Captura data del archivo
     */
    foreach ($_FILES as $key => $archivos) {
        $strNombreFile = $archivos["name"];
        $fopenFile = fopen($archivos["tmp_name"], "r");
    }
    /**
     * Se valida apertura del archivo
     */
    if (!$fopenFile) {

        $respuesa["nombreArchivo"] = $strNombreFile;
        $respuesa["estado"] = "ERROR";
        $respuesa["contenido"] = 'Error al abrir el archivo ' . error_get_last();
    } else {

        /*
         * Validacion Previa del archivo
         */
        while (!feof($fopenFile)) {
            $strRowact = fgets($fopenFile);
            if (trim($strRowact) != '') {
                $array_linea = explode(",", trim($strRowact));

                if (!in_array($array_linea[3], $arrayEstadoValido)) {
                    $errorArchivo = true;
                    $respuesa["nombreArchivo"] = $strNombreFile;
                    $respuesa["estado"] = "ERROR";
                    $respuesa["contenido"] = 'Error en el archivo, no tiene el formato correcto';
                    break;
                }
            }
        }//*/
        fclose($fopenFile);
        $fopenFile = fopen($archivos["tmp_name"], "r");
        if (!$errorArchivo) {
            while (!feof($fopenFile)) {
                $strRow = fgets($fopenFile);
                if (trim($strRow) != '') {
                    $array_linea = explode(",", trim($strRow));
                    /**
                     * Insertar user
                     */
                    $objUserModel = new usersModel();
                    $objUserModel->setEmail($array_linea[0]);
                    $objUserModel->setStatus($array_linea[3]);
                    $objUserModel->set_Users();
                    $idUser = $objUserModel->getidsetUser();
                    if ($objUserModel->geterror() == '') {
                        //unset($objUserModel);
                        /*
                         * Inserta inf user
                         */
                        $objInfUserModel = new information_usersModelClass();
                        $objInfUserModel->setName($array_linea[1]);
                        $objInfUserModel->setLast_name($array_linea[2]);
                        $objInfUserModel->setStatus($array_linea[3]);
                        $objInfUserModel->setUserID($idUser);
                        $objInfUserModel->set_Users();
                        if ($objInfUserModel->getError() == '') {
                            $idInfUser = $objInfUserModel->getidsetUser();
                        }
                    }
                }
            }
            $respuesa["nombreArchivo"] = $strNombreFile;
            $respuesa["estado"] = "OK";
            $respuesa["contenido"] = 'Archivo cargado correctamente.';
            fclose($fopenFile);
        }
    }//*/
} else {
    $respuesa["nombreArchivo"] = "file";
    $respuesa["estado"] = "ERROR";
    $respuesa["contenido"] = "Los parametros ingresados no son los establecidos";
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($respuesa);
exit();




