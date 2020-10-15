<?php 
include ("db.php");
    if(isset($_POST['save_suggestion'])) {
        $userid = 1;
        $module = $_GET['modulo'];
        $title = $_POST['suggestion_title'];
        $suggestion = $_POST['suggestion'];

        $query = "INSERT INTO suggestions(userid, moduloid, titulo, descripcion) VALUES ('$userid', $module, '$title', '$suggestion')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo $module;
            die("Query Failed");
        }

        $_SESSION['message'] = 'Sugerencia "' . $title . '" creada';
        $_SESSION['message_type'] = 'success';

        header("Location: http://localhost/mdetails.php?module_id=$module");
    };

?>

<?php echo $row['Modulo'] . "a";?>
