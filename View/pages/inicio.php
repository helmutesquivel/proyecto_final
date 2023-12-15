<h1>Bienvenidos al Colegio A & E</h1>

<?php
    if(!empty($_SESSION['usuario'])){
        echo "
        <h2>
        Mucho gusto: 
            <strong> {$_SESSION['nombre']} {$_SESSION['apellido']} </strong>
        </h2>
        ";
    }
    
?>
<img src="img/colegio.jpeg" alt="Logo" width="800" height="800" class="d-inline-block align-text-top">
