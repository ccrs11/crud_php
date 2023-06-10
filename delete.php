<?php 

if (isset($_POST['eliminar'])){
    session_start();
        if (!empty($_POST["cedula"])){
            $cedula=$_POST["cedula"];
            $user_data = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/?cedula=" . $cedula);
            $user_data = json_decode($user_data, true);
            $options = [
            "http"=>[
                "method" => "DELETE"
                ]   
            ];
            $context = stream_context_create($options);
            $_DATAd1 = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/" . $user_data[0]["id"],false,$context);
                if(isset($_DATAd1) and empty($_DATAd1)){
                    $_SESSION["message"] = "La c'edula ingresada no se encuentra en la base de datos";
                    $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
                }
        }else{
            $_SESSION["message"] = "Debe insertar un n'umero de c'edula";
            $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
        }
    session_unset();
}


?>


