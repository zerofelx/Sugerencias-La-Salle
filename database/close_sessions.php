<?php
var_dump($_SESSION);
    if (isset($_GET['session'])) {
        $session = $_GET['session'];
        if ($session = 'close') {
            echo $session;
            session_destroy();

            header("Location: http://localhost/index.php?session=close");
        }
    }
?>