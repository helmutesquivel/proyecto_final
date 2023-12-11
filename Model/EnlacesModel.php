<?php 

namespace Model;

class EnlacesModel{

    public static function enlacesPagina($enlace){
        $modulo = match($enlace){
            "inicio" => "View/pages/inicio.php",
            "nosotros" => "View/pages/nosotros.php",
            "contacto" => "View/pages/contacto.php",
            "registrate" => "View/registrate.php",
            "Telefono" => "View/Telefono/CaTelefono.php",
            "caTelefonoEditar" => "View/Telefono/CaTelefonoEditar.php",
            "caTelefonoEliminar" => "View/Telefono/CaTelefonoEliminar.php",
            "vercaTelefono" => "View/Telefono/VerCaTelefono.php",
            "telefono" => "View/Telefono/Telefono.php",
            "telefonoEditar" => "View/Telefono/TelefonoEditar.php",
            "telefonoEliminar" => "View/Telefono/TelefonoEliminar.php",
            "telefonoVer" => "View/Telefono/TelefonoVer.php",
            "deparTamento" => "View/Departamento/Departamento.php",
            "departamentoEditar" => "View/Departamento/DepartamentoEditar.php",
            "departamentoEliminar" => "View/Departamento/DepartamentoEliminar.php",
            "verDepartamento" => "View/Departamento/VerDepartamento.php",
            "muniCipio" => "View/Municipio/Municipio.php",
            "municipioEditar" => "View/Municipio/MunicipioEditar.php",
            "municipioEliminar" => "View/Municipio/MunicipioEliminar.php",
            "VermuniCipio" => "View/Municipio/VerMunicipio.php",
            "direccion" => "View/Direccion/Direccion.php",
            "direccionEditar" => "View/Direccion/DireccionEditar.php",
            "direccionEliminar" => "View/Direccion/DireccionEliminar.php",
            "verdireccion" => "View/Direccion/VerDireccion.php",
            "materia" => "View/Materia/Materia.php",
            "materiaEditar" => "View/Materia/MateriaEditar.php",
            "materiaEliminar" => "View/Materia/MateriaEliminar.php",
            "vermateria" => "View/Materia/VerMateria.php",
            "Alumno" => "View/Alumno/Alumno.php",
            "alumnoEditar" => "View/Alumno/AlumnoEditar.php",
            "alumnoEliminar" => "View/Alumno/AlumnoEliminar.php",
            "verAlumno" => "View/Alumno/VerAlumno.php",
            "detalle" => "View/Detalle/Detalle.php",
            "detalleEditar" => "View/Detalle/DetalleEditar.php",
            "detalleEliminar" => "View/Detalle/DetalleEliminar.php",
            "detalleVer" => "View/Detalle/DetalleVer.php",
            "login" => "View/login.php",
            "logout" => "View/logout.php",
            default => "View/pages/error.php"
        };
        return $modulo;
    }
}

?>