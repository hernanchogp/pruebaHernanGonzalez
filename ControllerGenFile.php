<?php

error_reporting(0);
ini_set('display_errors', 0);
include '../Model/information_usersModel.php';
$opc = $_GET["opcion"];
$boolfile = false;
switch ($opc) {
    case 1:


        $objInfUserModel = new information_usersModelClass();
        $datainfusr = $objInfUserModel->get_Users();
        $nombreArch = "list_activos.csv";
        $file = fopen($nombreArch, "a");

        foreach ($datainfusr as $value) {
            if ($value["status_id"] == 1) {
                fwrite($file, $value["email"] . ',' . $value["name"] . "," . $value["last_name"] . "," . $value["status_id"] . "\n");
            }
        }

        fclose($file);
        $boolfile = true;
        break;
    case 2:
        $nombreArch = "list_inactivos.csv";
        $objInfUserModel = new information_usersModelClass();
        $datainfusr = $objInfUserModel->get_Users();
        $file = fopen($nombreArch, "a");

        foreach ($datainfusr as $value) {
            if ($value["status_id"] == 2) {
                fwrite($file, $value["email"] . ',' . $value["name"] . "," . $value["last_name"] . "," . $value["status_id"] . "\n");
            }
        }

        fclose($file);
        $boolfile = true;
        break;

    case 3:
        $nombreArch = "list_enespera.csv";
        $objInfUserModel = new information_usersModelClass();
        $datainfusr = $objInfUserModel->get_Users();

        $file = fopen($nombreArch, "a");

        foreach ($datainfusr as $value) {
            if ($value["status_id"] == 3) {
                fwrite($file, $value["email"] . ',' . $value["name"] . "," . $value["last_name"] . "," . $value["status_id"] . "\n");
            }
        }

        fclose($file);
        $boolfile = true;
        break;

    default :
}
$fileName = $nombreArch;
$filePath = $fileName;

if ($boolfile == true) {
    if (!empty($fileName) && file_exists($filePath)) {



        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_example));
        ob_clean();
        flush();
        readfile($file_example);
        unlink($fileName);
        exit;
    } else {
        echo 'No existe archivo';
    }
}else{
     echo 'Parametros no validos';
}

