<?php 
include ("db.php");
$module = $_GET['modulo'];

if(isset($_SESSION['user_id'])) {
    # VERIFICAR QUE LOS CAMPOS DE TÍTULO Y DESCRIPCIÓN NO ESTÉN VACÍOS
    if(!empty($_POST['suggestion_title']) && !empty($_POST['suggestion'])) {
        if(isset($_POST['save_suggestion'])) {
            $userid = $_SESSION['user_id'];
            $title = $_POST['suggestion_title'];
            $suggestion = $_POST['suggestion'];
    
            $query = "INSERT INTO suggestions(userid, moduloid, titulo, descripcion) VALUES ('$userid', $module, '$title', '$suggestion')";
            $result = mysqli_query($conn, $query);
    
            if (!$result) {
                echo $userid;
                die("Query Failed");
            }
    
            $_SESSION['message'] = 'Sugerencia "' . $title . '" creada';
            $_SESSION['message_type'] = 'success';
    
            header("Location: http://localhost/mdetails.php?module_id=$module");
        };
    } else {
        $_SESSION['message'] = 'Sugerencia sin titulo o contenido';
        $_SESSION['message_type'] = "danger";
        header("Location: http://localhost/mdetails.php?module_id=$module");
    }
} else {
    header("Location: http://localhost/login.php");
}
?>
