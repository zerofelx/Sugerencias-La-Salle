<?php 
include ("db.php");

    if(isset($_POST['login'])) {
        # VERIFICAR QUE EL CAMPO DE USUARIO Y CONTRASEÑA NO ESTÉN VACÍOS
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            # VOLVER A MINÚSCULAS EL USERNAME
            $username = strtolower($username);
            # CIFRAR CONTRASEÑA A MD5
            $password = md5($_POST['password']);

            $query = "SELECT * FROM usuarios WHERE username='$username'";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Failed, Values: $username, $password, $rol");
            }

            $userdata = mysqli_fetch_array($result);

            # VERIFICAR QUE $userdata NO ESTÉ VACÍO
            if (!empty($userdata)) {

                # COMPARAR LAS CONTRASEÑAS CIFRADAS
                if($password === $userdata['psw']) {

                    # VERIFICAR SI EL USUARIO ESTÁ O NO ESTÁ BANEADO
                    if ($userdata['locked']) {
                        $_SESSION['login_message'] = 'El usuario ' . $_SESSION['username'] . ' está baneado!';
                        $_SESSION['login_message_type'] = 'danger';
                        header("Location: http://localhost/index.php");
                    } else {

                        # GUARDAR LOS DATOS DE USUARIO EN $_SESSION PARA USARLOS GLOBALMENTE
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

# MENSAJE DE ERROR AL HABER UN ERROR EN EL INICIO DE SESIÓN
function LoginError() {
    $_SESSION['login_message'] = 'Usuario o contraseña incorrectos';
    $_SESSION['login_message_type'] = 'danger';
    header("Location: http://localhost/login.php?form=login");
}
?>