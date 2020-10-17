<?php 
include ("db.php");
$moduleid = $_GET['module'];

# VERIFICAR SI EL USUARIO ESTÁ LOGGEADO Y ESTÁ SU ID ALMACENADO EN $_SESSION
if(isset($_SESSION['user_id'])) {
    
    if(isset($_POST['send_comment'])) {
        if(!empty($_POST['comment'])) {
            $comment = $_POST['comment'];
            $suggestionid = $_GET['suggestion'];
            $userid = $_SESSION['user_id'];
    
            $query = "INSERT INTO comments (userid, suggestionid, descripcion) VALUES ('$userid', '$suggestionid', '$comment')";
            $result = mysqli_query($conn, $query);
    
            if(!$result) {
                die("Query Failed");
            };
    
            $_SESSION['message'] = 'Comentario agregado';
            $_SESSION['message_type'] = 'success';
            header("Location: http://localhost/mdetails.php?module_id=$moduleid");
        } else {
            $_SESSION['message'] = 'Comentario sin contenido';
            $_SESSION['message_type'] = 'danger';
            header("Location: http://localhost/mdetails.php?module_id=$moduleid");
        }
    }
}

?>