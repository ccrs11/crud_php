<?php 
if (isset($_POST['buscar'])and !empty($_POST["cedula"])){
    session_start();
    $_DATAg1 = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/{$_POST["cedula"]}");
    if($DATAg1 = false ){
        $_SESSION["message"]= 'El id ingresado no se encuentra';
        $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
    }
}
?>

<!--  -->