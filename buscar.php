<?php 

if (isset($_POST['buscar'])){
    session_start();
    if (!empty($_POST["cedula"])){
    $_DATAg1 = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/{$_POST["cedula"]}");
    $datag1_decode = json_decode($_DATAg1);
    
        if(isset($_DATAg1) and empty($_DATAg1)){
            $_SESSION["message"] = "El id ingresado no se encuentra";
            $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
        }
    }else{
        $_SESSION["message"] = "debe ingresar un ID";
        $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
    }

    session_unset();
}
