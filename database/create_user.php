<?php 
include ("db.php");

    if(isset($_POST['create_user'])) {
        if($_POST['password'] === $_POST['confirm_password'] && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $rol = $_POST['rol'];

            $query = "INSERT INTO usuarios(username, psw, rol, locked) VALUES ('$username', '$password', '$rol', 0)";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Failed, Values: $username, $password, $rol");
            }

            $_SESSION['message'] = 'Usuario ' . $username . ' creado';
            $_SESSION['message_type'] = 'success';
            echo $_SESSION['message'];
            header("Location: http://localhost/index.php");
        } else {
            die("Las contraseñas no son las mismas");
        }

    };

?>