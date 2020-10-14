<?php

session_start();

    $host = "localhost";
    $db = "LaSalle";

    $conn = mysqli_connect(
        $host,
        'usuario',
        'contraseña',
        $db
    );
?>