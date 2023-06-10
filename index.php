<?php
require "./postear.php";
require "./buscar.php";
require "./put.php";
require "./delete.php";



if(isset($_POST['meterArriba'])){
    $datosMETER = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/{$_POST["meterArriba"]}");
    $datosMeter = json_decode($datosMETER);
}

require "./getAll.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>CRUD-PHP</title>
</head>
<body>

    <?php if (!empty($message)): ?>
        <p><?= $message ?></p> <!-- Display the session message within a <p> element -->
    <?php endif; ?>

    <form name="datos1" action="" method="POST">
        <section class="container">
            <div class="grid">
                <div class="header">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->nombre : ((isset($_POST["buscar"])) ? $datag1_decode[0]->nombre: "");?>">
                    <label for="apellido">apellido</label>
                    <input type="text" name="apellido" id="apellido" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->apellido : ((isset($_POST["buscar"])) ? $datag1_decode[0]->apellido : "");?>">
                    <label for="edad">edad</label>
                    <input type="number" name="edad" id="edad" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->edad : ((isset($_POST["buscar"])) ? $datag1_decode[0]->edad : "");?>">
                </div>
                <div class="header">
                    <h1>Campuslands 👨‍🚀</h1>
                    <label for="direccion">direccion</label>
                    <input type="text" name="direccion" id="direccion" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->direccion : ((isset($_POST["buscar"])) ? $datag1_decode[0]->direccion : "");?>">
                    
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->email : ((isset($_POST["buscar"])) ? $datag1_decode[0]->email : "");?>">
                </div>
            </div>
        </section>
        <section class="container">
            <div class="grid">
                <div class="body">
                        <label for="horaEntrada">horaEntrada</label>
                        <input type="text" name="horaEntrada" id="horaEntrada" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->horaEntrada : ((isset($_POST["buscar"])) ? $datag1_decode[0]->horaEntrada : "");?>">
                        
                        <label for="team">team</label>
                        <input type="text" name="team" id="team" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->team : ((isset($_POST["buscar"])) ? $datag1_decode[0]->team : "");?>">
                        
                        <label for="trainer">trainer</label>
                        <input type="text" name="trainer" id="trainer" value="<?=(isset($_POST["meterArriba"])) ? $datosMeter->trainer : ((isset($_POST["buscar"])) ? $datag1_decode[0]->trainer : "");?>">
                </div>
                <div class="body">
                    <div class="crudButtons">
                        <button name="anadir"> ✔️ añadir </button>
                        <button name="eliminar"> ✖️ eliminar</button>
                        <button name="editar"> 📝  editar</button>
                        <button name="buscar"> 🔍 buscar</button>
                    </div>
                    <label for="cedula">cedula</label>
                    <input type="number" name="cedula" id="cedula" value="<?= $datosMeter->cedula ?>">
                </div>
            </div>
        </section>
    </form>
    <form action="" method="POST">
        <table class="container" >
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
                <td><button type="submit" name="meterArriba" value="<?= $item->id; ?>"><?= $item->cedula; ?> /\</button></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </form>
    <br>


    
</body>
</html>