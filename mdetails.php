<?php 
    include ("./database/db.php");
    include ("./includes/header.php");
?>

<?php 
    if (isset($_GET['module_id'])) {
        $id = $_GET['module_id'];
        $query = "SELECT * FROM modulos WHERE ID='$id'";
        $response = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($response);

        $query2 = "SELECT * FROM suggestions WHERE moduloid='$id'";
        $SResponse = mysqli_query($conn, $query2);
?>


<div class="p-5">
    <div class="row">
    <div class="col-md-5"></div>
        <div class="col-md-4 position-fixed">
            <div class="card card-body">
                <h3>Ciclo: <?=$row['Ciclo']?></h3>
                <h3>Módulo: <?=$row['Modulo']?></h3>
                <h5><?=$row['Descripcion']?></h5>
            </div>
        </div>
        <div class="col-md-7">
            <?php 
                if(isset($_SESSION['user_id'])) {
                    include ("./includes/components/suggestion_form.php");
                }
            ?>

            <?php while ($suggestions = mysqli_fetch_array($SResponse)) {?>
                <?php include ("./includes/components/suggestion.php") ?>
            <?php } ?>
            </div>
        </div>
    </div>
</div>







<?php
    };
?>


<?php
    include ("./includes/footer.php");
?>