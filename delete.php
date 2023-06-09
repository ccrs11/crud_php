<?php 
if (isset($_POST['eliminar'])and !empty($_POST["cedula"])){
    $options = [
        "http"=>[
            "method" => "DELETE"
        ]
    ];
    $context = stream_context_create($options);
    $_DATAd1 = file_get_contents("https://6480e445f061e6ec4d4a0286.mockapi.io/crud/{$_POST["cedula"]}",false,$context);
}
?>