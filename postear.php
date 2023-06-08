<?php 
if (isset($_POST['anadir'])){
    session_start();
    if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['edad']) and isset($_POST['direccion']) and isset($_POST['email']) and isset($_POST['horaEntrada']) and isset($_POST['team']) and isset($_POST['trainer'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $edad=$_POST['edad'];
    $direccion=$_POST['direccion'];
    $email=$_POST['email'];
    $horaEntrada=$_POST['horaEntrada'];
    $team=$_POST['team'];
    $trainer=$_POST['trainer'];
    }
    if( !empty($nombre) and !empty($apellido) and !empty($edad) and !empty($direccion) and !empty($email) and !empty($horaEntrada) and !empty($team) and !empty($trainer)){
        $formData=[
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "edad"=>$edad,
            "direccion"=>$direccion,
            "email"=>$email,
            "horaEntrada"=>$horaEntrada,
            "team"=>$team,
            "trainer"=>$trainer,
        ];
        $jsonFormData=json_encode($formData);

        $options = [
            "http"=>[
                "method" => "POST",
                "header" => "Content-type: application/json; charset=UTF-8",
                "content" => $jsonFormData
            ]
        ];

        $context = stream_context_create($options);
        $_DATA = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud",false,$context);
        //debe devolverlo a una tabla
        //print_r($_DATA);
    }else{
        $_SESSION["message"]= 'Debe ingresar todos los datos del formulario excepto la cedula';
        $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
    // die("sorry, you must fill all the data form"); //change for a card
    }
}

?>