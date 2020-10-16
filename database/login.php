<?php 
include ("db.php");

    if(isset($_POST['login'])) {
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $username = strtolower($username);
            $password = md5($_POST['password']);

            $query = "SELECT * FROM usuarios WHERE username='$username'";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Failed, Values: $username, $password, $rol");
            }

            $userdata = mysqli_fetch_array($result);

            if (!empty($userdata)) {
                if($password === $userdata['psw']) {
                    if ($userdata['locked']) {
                        $_SESSION['login_message'] = 'El usuario ' . $_SESSION['username'] . ' está baneado!';
                        $_SESSION['login_message_type'] = 'danger';
                        header("Location: http://localhost/index.php");
                    } else {
                        $_SESSION['username'] = ucfirst($userdata['username']);
                        $_SESSION['user_id'] = $userdata['ID'];
                        $_SESSION['rol'] = $userdata['rol'];
                        $_SESSION['locked'] = $userdata['locked'];
    
                        $_SESSION['login_message'] = 'Bienvenido/a de vuelta ' . $_SESSION['username'] . '!';
                        $_SESSION['login_message_type'] = 'success';
                        header("Location: http://localhost/index.php");
                    }
                } else {
                    LoginError();
                }
            } else {
                LoginError();
            }
        } else {
            LoginError();
        }

    };

function LoginError() {
    $_SESSION['login_message'] = 'Usuario o contraseña incorrectos';
    $_SESSION['login_message_type'] = 'danger';
    header("Location: http://localhost/login.php?form=login");
}
?>