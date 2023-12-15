<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <img src="img/AdminLTElogo.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Inicio
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=nosotros">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=contacto">Contacto</a>
                </li>
                <?php if (!empty($_SESSION['usuario'])) { //Tiene sesión activafue 
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Crear Datos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=caTelefono">Categoria Telefono</a>
                            <a class="dropdown-item" href="index.php?action=vercaTelefono">Ver Telefono</a>
                            <a class="dropdown-item" href="index.php?action=mostrarCaTelefono">Mostrar Telefono</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=deparTamento">Departamento</a>
                            <a class="dropdown-item" href="index.php?action=verDepartamento">Ver Departamento</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=muniCipio">Municipio</a>
                            <a class="dropdown-item" href="index.php?action=VermuniCipio">Ver Municipio</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=direccion">Direccion</a>
                            <a class="dropdown-item" href="index.php?action=verdireccion">Ver Direccion</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Crear Cursos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=materia">Cursos</a>
                            <a class="dropdown-item" href="index.php?action=vermateria">Ver Cursos</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Crear Alumno</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=Alumno">Alumno</a>
                            <a class="dropdown-item" href="index.php?action=verAlumno">Ver Alumnos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=telefono">Telefono</a>
                            <a class="dropdown-item" href="index.php?action=telefonoVer">Ver Telefonos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Asigacion</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=detalle">Asignar Cursos</a>
                            <a class="dropdown-item" href="index.php?action=detalleVer">Ver Cursos</a>
                            <a class="dropdown-item" href="index.php?action=mostrarDetalle">Mostrar Cursos</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?action=logout">Cerrar sesion</a>
                    </li>
            </ul>
            <?php } else { //No ha iniciado sesión
            ?>
            
             <li class="nav-item">
                  <a class="nav-link" href="Index.php?action=login">Inicar Sesion <i class="fa-solid fa-user-tie" style="color: #ffffff;"></i> </a></li>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="Index.php?action=usuario">Crear usuario <i class="fa-solid fa-user-tie" style="color: #ffffff;"></i> </a></li>
                </li>
            <!--<div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item ">
                        <div class="dropstart">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios <i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Index.php?action=login">Inicar Sesion <i class="fa-solid fa-user-tie" style="color: #ffffff;"></i> </a></li>
                                <li><a class="dropdown-item" href="Index.php?action=usuario">Crear usuario <i class="fa-solid fa-user-tie" style="color: #ffffff;"></i> </a></li>
                            </ul>
                        </div>
                    </li>
                -->
             <?php } ?>
                </ul>
            </div>
            
        </div>
    </div>      
</nav>