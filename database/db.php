<?php
session_start();

    $dbhost = "localhost";
    $db = "LaSalle";
    $dbuser = "usuario";
    $dbpassword = "contraseña";

    $conn = mysqli_connect(
        $host,
        $dbuser,
        $dbpassword,
        $db
    );
?>