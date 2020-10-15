<div class="col-md-6">

    <?php include ("status_message.php") ?>

    <div class="card card-body">
        <form action="database/login.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" id="username"
                class="form-control" placeholder="Nombre de usuario" autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success btn-block" name="create_user">
            </div>
        </form>
        <a href="login.php?form=register">Registrarse</a>
    </div>
</div>