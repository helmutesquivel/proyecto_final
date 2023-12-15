<?php

    use Controller\UsuarioController;
    $usuario = new UsuarioController();

?>

<h1>Crear Usuario</h1>

<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre</label></div>
                <div class="col-10"><input class="form-control" type="text" name="nombre" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Apellido</label></div>
                <div class="col-10"><input class="form-control" type="text" name="apellido" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Rol</label></div>
                <div class="col-10"><input class="form-control" type="text" name="rol" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Usuario</label></div>
                <div class="col-10"><input class="form-control" type="text" name="usuario" required></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Contraseña</label></div>
                <div class="col-10"><input type="password" class="form-control" name="password"></input></div>
            </div>
         </div>
            <div class="form-group">
                <div class="row mt-3">
                    <button type="submit" class="form-control btn btn-primary">Crear usuario</button>
                </div>
            </div>
            <?php
        $resultado = $usuario->crearUsuario();
            if($resultado == false){
                echo "<div class='alert alert-danger mt-5' role='alert'>
                        Error en los datos
                     </div>";
            }
        ?>
    </form>

    

</div>