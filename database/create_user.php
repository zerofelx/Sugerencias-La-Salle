<?php 
include ("db.php");

    if(isset($_POST['create_user'])) {
        if($_POST['password'] === $_POST['confirm_password'] && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $username = strtolower($username);
            $password = md5($_POST['password']);

            $query = "INSERT INTO usuarios(username, psw, rol, locked) VALUES ('$username', '$password', 'usuario', 0)";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Failed, Values: $username, $password, $rol");
            }

            $_SESSION['message'] = 'Usuario ' . $username . ' creado';
            $_SESSION['message_type'] = 'success';
            header("Location: http://localhost/login.php");
        } else {
            if(empty($_POST['password'])) {
                $_SESSION['message'] = 'La contraseña está vacía';
                $_SESSION['message_type'] = 'danger';
                header("Location: http://localhost/login.php?form=register");
            } else {
                $_SESSION['message'] = 'Las contraseñas son distintas';
                $_SESSION['message_type'] = 'danger';
                header("Location: http://localhost/login.php?form=register");
            }
        }

    };

?>