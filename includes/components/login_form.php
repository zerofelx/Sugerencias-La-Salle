<div class="col-md-6">
    <h1 class="text-center">Inicia Sesión</h1>
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
                <input value="Iniciar Sesión" type="submit" class="btn btn-success btn-block" name="login">
            </div>
        </form>
        <a class="text-right" href="login.php?form=register">Registrarse</a>
    </div>
</div>