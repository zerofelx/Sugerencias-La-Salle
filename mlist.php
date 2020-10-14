<?php 
    include ("./database/db.php");
    include ("./includes/header.php");
?>

<div class="container pt-5">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Módulo</th>
                    <th>Ciclo</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM modulos";
                    $modules = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($modules)) {
                        ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['Modulo']; ?></td>
                            <td><?php echo $row['Ciclo']; ?></td>
                            <td><?php echo $row['Descripcion']; ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include ("./includes/footer.php");
?>