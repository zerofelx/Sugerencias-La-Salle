<?php 
include ("db.php");

    if(isset($_POST['save_suggestion'])) {
        $title = $_POST['suggestion_title'];
        $suggestion = $_POST['suggestion'];

        $query = "INSERT INTO usuarios(username, psw, rol, locked) VALUES (Andrea, )";
    };

?>