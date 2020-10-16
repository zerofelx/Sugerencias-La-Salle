<?php 
include ("db.php");

if(isset($_SESSION['user_id'])) {
    if(isset($_GET['action'])) {
        $module = $_GET['module'];
        $userid = $_SESSION['user_id'];
        $action = $_GET['action'];
        $suggestionid = $_GET['sid'];
        
        if (CheckLike($conn, $userid, $suggestionid)) {
            switch ($action) {
                case 'like':
                    $query = "UPDATE likes SET opinion='1' WHERE userid='$userid' AND suggestionid='$suggestionid'";
                    break;
                
                case 'dislike':
                    $query = "UPDATE likes SET opinion='0' WHERE userid='$userid' AND suggestionid='$suggestionid'";
                    break;
            }
        } else {
            switch ($action) {
                case 'like':
                    $query = "INSERT INTO likes(userid, suggestionid, opinion) VALUES ('$userid', '$suggestionid', true)";
                    break;
                
                case 'dislike':
                    $query = "INSERT INTO likes(userid, suggestionid, opinion) VALUES ('$userid', '$suggestionid', false)";
                    break;
            }
        }

        $result = mysqli_query($conn, $query);

        if (!$result) {
            $_SESSION['message'] = 'UPS!! Ha ocurrido algo inesperado... Vuelve a intentarlo más tarde.';
            $_SESSION['message_type'] = 'danger';

            header("Location: http://localhost/mdetails.php?module_id=$module");
        }
        header("Location: http://localhost/mdetails.php?module_id=$module");
    };
} else {
    header("Location: http://localhost/login.php");
}
    
    function CheckLike($conn, $userid, $suggestionid) {
        $query = "SELECT opinion FROM likes WHERE userid='$userid' AND suggestionid='$suggestionid'";
        $result = mysqli_query($conn, $query);
        $opinion = mysqli_fetch_array($result);

        return $opinion;
    }

?>