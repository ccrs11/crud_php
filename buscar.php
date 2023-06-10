<?php 

if (isset($_POST['buscar'])){
    session_start();
    if (!empty($_POST["cedula"])){
        $cedula=$_POST["cedula"];
        $_DATAg1 = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/?cedula=" . $cedula);
        $datag1_decode = json_decode($_DATAg1);
        if(isset($datag1_decode) and empty($datag1_decode)){
            $_SESSION["message"] = "La cedula ingresada no se encuentra en la base de datos";
            $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
        }
    }else{
        $_SESSION["message"] = "Debe llenar el campo de cedula para realizar la busqueda";
        $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
    }

    session_unset();
}
