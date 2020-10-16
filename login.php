<?php 
    include ("./database/db.php");
    include ("./includes/header.php");

    switch ($_GET['form']) {
        case 'login':
            $View = 'Login';
            break;
        case 'register':
            $View = 'Register';
            break;
        default:
            $View = 'Login';
            break;
    }
?>

<div class="container p-4">
    <div class="row justify-content-center align-self-center">
        <?php 
            switch ($View) {
                case 'Login':
                    include ("./includes/components/login_form.php");
                    break;
                
                case 'Register':
                    include ("./includes/components/create_user.php");
                    break;
            }
        ?>
    </div>
</div>

<?php
    include ("./includes/footer.php");
?>