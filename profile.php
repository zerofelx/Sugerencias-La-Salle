<?php 
    include ("./database/db.php");
    include ("./includes/header.php");

    $uid = $_SESSION['user_id'];
    $query2 = "SELECT * FROM suggestions WHERE userid='$uid'";
    $SResponse = mysqli_query($conn, $query2);
?>

<div class="p-5">
    <div class="row">
    <div class="col-md-5"></div>
        <div class="col-md-4 position-fixed">
            <div class="card card-body">
                <h2><?=ucfirst($_SESSION['username'])?></h2>
                <h3>Rol: <?=$_SESSION['rol']?></h3>
            </div>
            <br>
        <form action="database/close_sessions.php?session=close" method="post">
            <input type="submit" value="Salir" class="btn-danger form-control">
        </form>
        </div>
        <div class="col-md-7">
            <?php while ($suggestions = mysqli_fetch_array($SResponse)) {?>
                <?php include ("./includes/components/suggestions_profile.php") ?>
            <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php
    include ("./includes/footer.php");
?>