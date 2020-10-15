<?php 
    include ("./database/db.php");
    include ("./includes/header.php");
?>


<div class="container text-center pt-5">
    <h1>SUGERENCIAS LA SALLE ONLINE</h1>
    <br>
    <div class="row justify-content-center">
        <div class="card card-body col-md-6 ">
            <form action="mlist.php" method="GET">
                <div class="from-group">
                    <select name="ciclo" id="ciclo" class="form-control" autofocus>
                        <option value="all">No Filtrar</option>
                        <option value="ASIR">ASIR</option>
                        <option value="DAM">DAM</option>
                    </select>
                </div>
                <br>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success btn-block">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include ("./includes/footer.php");
?>