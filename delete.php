<?php 

if (isset($_POST['eliminar'])){
    session_start();
        if (!empty($_POST["cedula"])){
            $options = [
            "http"=>[
                "method" => "DELETE"
            ]
        ];
        $context = stream_context_create($options);
        $_DATAd1 = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/{$_POST["cedula"]}",false,$context);
            if(isset($_DATAd1) and empty($_DATAd1)){
                $_SESSION["message"] = "1dEl id ingresado no se encuentra";
                $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
            }
        }else{
            $_SESSION["message"] = "2ddebe ingresar un ID";
            $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
        }
    session_unset();
}


?>