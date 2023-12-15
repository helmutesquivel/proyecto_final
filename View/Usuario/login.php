<?php

use Controller\UsuarioController;

$usuario = new UsuarioController();

?>

<h1>Inicio de Sesión</h1>

<div class="container-login">

    <form class="form" method="POST" data-intro='Formulario para usuario de ingreso'>


        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Usuario</label></div>
                <div class="col-10"><input class="form-control" type="text" name="usuario" data-intro='Ingresa tu usuario' required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Contraseña</label></div>
                <div class="col-10"><input type="password" class="form-control" name="password" data-intro='Ingresa tu password'></input></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </div>
        <?php
        $resultado = $usuario->login();
        if ($resultado == "error") {
            echo "<div class='alert alert-danger mt-5' role='alert'>
                        Error en los datos
                     </div>";
        }
        ?>
    </form>
    <div id="passwordError" title="Error en Password" hidden>
        <p>La contraseña es muy corta.</p>
    </div>


</div>
<script>
    introJs().setOptions({
        showProgress: true,
    }).start()

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault(); //Evitar que la página se actualice
        let password = document.getElementById('password').value;

        if (password.length < 3) {
            $.passwordError(); //Mostrar el mensaje de contraseña corta
            return; //Detenga toda la ejecucion
        } else {
            this.submit(); //Envia la info. al servidor de PHP
        }
    }

    $.passwordError = function() {
        let element = document.getElementById("passwordError");
        element.removeAttribute("hidden");
        $("#passwordError").dialog();
        //$("#passwordError").show();
    };
</script>