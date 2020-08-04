<?php

error_reporting(0);
ini_set('display_errors', 0);
include '../Model/information_usersModel.php';
$opc = $_POST["opc"];

switch ($opc) {
    case 1:
        $objInfUserModel = new information_usersModelClass();
        $objInfUserModel->setUserID($_POST["idUsr"]);
        $objInfUserModel->deletUsr();
        if ($objInfUserModel->geterror() == '') {
            $respuesa["estado"] = "OK";
            $respuesa["contenido"] = 'Información eliminada correctamente';
        } else {
            $respuesa["estado"] = "ERROR";
            $respuesa["contenido"] = 'Error en la accion ' . $objInfUserModel->geterror();
        }

        break;

    default :
        $respuesa["estado"] = "ERROR";
        $respuesa["contenido"] = 'Parametros invalidos';
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($respuesa);
exit();
