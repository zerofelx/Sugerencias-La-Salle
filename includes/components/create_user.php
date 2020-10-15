<div class="col-md-6">

    <?php include ("status_message.php") ?>

    <div class="card card-body">
        <form action="database/create_user.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" id="username"
                class="form-control" placeholder="Nombre de usuario">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirma la contraseña" class="form-control">
            </div>
            <div class="from-group">
                <select name="rol" id="rol" class="form-control">
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <br>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success btn-block" name="create_user">
            </div>
        </form>
        <a href="login.php?form=login">Iniciar Sesión</a>
    </div>
</div>



