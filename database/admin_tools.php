<?php 
include ("db.php");
$module = $_GET['module'];

if ($_SESSION['rol'] == "admin") {
    if(isset($_GET['delete_suggestion'])) {
        $suggestionid = $_GET['delete_suggestion'];
        $query = "DELETE FROM suggestions WHERE ID='$suggestionid';";
        $query .= "DELETE FROM comments WHERE suggestionid='$suggestionid';";
        $query .= "DELETE FROM likes WHERE suggestionid='$suggestionid';";

        $result = mysqli_multi_query($conn, $query);

        if(!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = "Publicación eliminada satisfactoriamente";
        $_SESSION['message_type'] = "danger";
        header("Location: http://localhost/mdetails.php?module_id=$module");
    }

    if(isset($_GET['delete_comment'])) {
        $commentid = $_GET['delete_comment'];
        $query = "DELETE FROM comments WHERE ID='$commentid'";
        
        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Failed");
        }
        
        $_SESSION['message'] = "Mensaje eliminado satisfactoriamente";
        $_SESSION['message_type'] = "danger";
        header("Location: http://localhost/mdetails.php?module_id=$module");
    }

    if(isset($_GET['ban_user'])) {
        $userid = $_GET['ban_user'];
        
        $query = "SELECT * FROM usuarios WHERE ID='$userid'";
        $CheckResult = mysqli_query($conn, $query);

        if(!$CheckResult) {
            die("Query Failed 1");
        }

        $user = mysqli_fetch_array($CheckResult);

        if ($user['rol'] != "admin") {
            $query2 = "UPDATE usuarios SET locked='1' WHERE ID='$userid'";
    
            $result = mysqli_query($conn, $query2);
    
            if(!$result) {
                die("Query Failed");
            }
            
            $_SESSION['message'] = "Usuario baneado";
            $_SESSION['message_type'] = "danger";
            header("Location: http://localhost/mdetails.php?module_id=$module");
        } else {
            $_SESSION['message'] = "El usuario no se puede banear ya que es un administrador";
            $_SESSION['message_type'] = "danger";
            header("Location: http://localhost/mdetails.php?module_id=$module");
        }
    }
} else {
    $_SESSION['message'] = "No tienes los permisos para hacer esto!";
    $_SESSION['message_type'] = "danger";
    header("Location: http://localhost/index.php");
}
?>