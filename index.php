<?php
require "./postear.php";
require "./buscar.php";




if (isset($_POST['eliminar'])and !empty($_POST["cedula"])){
    $options = [
        "http"=>[
            "method" => "DELETE"
        ]
    ];
    $context = stream_context_create($options);
    $_DATAd1 = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/{$_POST["cedula"]}",false,$context);
}

if (isset($_POST['editar']) and !empty($_POST["cedula"])){
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
                "method" => "PUT",
                "header" => "Content-type: application/json; charset=UTF-8",
                "content" => $jsonFormData
            ]
        ];

        $context = stream_context_create($options);
        $_DATA = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/{$_POST["cedula"]}",false,$context);
        //debe devolverlo a una tabla
        //print_r($_DATA);
    }
}
require "./getAll.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-PHP</title>
</head>
<body>
    <form name="datos1" action="" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="">
        <br><br>
        <label for="apellido">apellido</label>
        <input type="text" name="apellido" id="apellido">
        <br><br>
        <label for="edad">edad</label>
        <input type="number" name="edad" id="edad">
        <br><br>
        <label for="direccion">direccion</label>
        <input type="text" name="direccion" id="direccion">
        <br><br>
        <label for="email">email</label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="horaEntrada">horaEntrada</label>
        <input type="text" name="horaEntrada" id="horaEntrada">
        <br><br>
        <label for="team">team</label>
        <input type="text" name="team" id="team">
        <br><br>
        <label for="trainer">trainer</label>
        <input type="text" name="trainer" id="trainer">
        <br><br>
        <br><br><br><br><br>
        <label for="cedula">cedula</label>
        <input type="number" name="cedula" id="cedula">
        <button name="anadir">añadir</button>
        <button name="eliminar">eliminar</button>
        <button name="editar">editar</button>
        <button name="buscar">buscar</button>
    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Dirección</th>
            <th>Email</th>
            <th>Hora de Entrada</th>
            <th>Equipo</th>
            <th>Entrenador</th>
            <th>UP</th>
        </tr>
        <?php foreach ($data1_decode as $item): ?>
        <tr>
            <td><?= $item->nombre; ?></td>
            <td><?= $item->apellido; ?></td>
            <td><?= $item->edad; ?></td>
            <td><?= $item->direccion; ?></td>
            <td><?= $item->email; ?></td>
            <td><?= $item->horaEntrada; ?></td>
            <td><?= $item->team; ?></td>
            <td><?= $item->trainer; ?></td>
            <td ><button value="<?= $item->id; ?>"> /\ </button></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br><br><br><br>

    <?php if (isset($_DATAg1)): ?>
        <p><?php echo $_DATAg1; ?></p> <!-- Display the session message within a <p> element -->
    <?php endif; ?>

    <br><br>

    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p> <!-- Display the session message within a <p> element -->
    <?php endif; ?>
    
</body>
</html>