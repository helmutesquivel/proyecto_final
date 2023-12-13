<?php

namespace Model;

use Model\ConexionModel;

class AlumnoModel
{

    public static function guardarAlumno($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO alumno (primerNombre, segundoNombre, primerApellido, segundoApellido, fkdireccion, carne, grado) 
            VALUES (:priNom, :seguNom, :priApe, :seguApe, :fkdirec, :carne, :grado)");
            $stmt->bindParam(":priNom", $datos['primerNombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":seguNom", $datos['segundoNombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":priApe", $datos['primerApellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":seguApe", $datos['segundoApellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkdirec", $datos['fkdireccion'], \PDO::PARAM_STR);
            $stmt->bindParam(":carne", $datos['carne'], \PDO::PARAM_STR);
            $stmt->bindParam(":grado", $datos['grado'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            //echo $th;
            return false;
        }
    }
    public static function mostrarAlumno()
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT idAlu, primerNombre, segundoNombre, primerApellido, segundoApellido, direccion.direccion as Direccion, carne, grado FROM alumno INNER JOIN direccion ON alumno.fkdireccion = direccion.idDirec");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarAlumno($idAlu)
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumno where idAlu = :idAlu");
        $stmt->bindParam(':idAlu', $idAlu, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarAlumno($datos)
    {
        $stmt = ConexionModel::conectar()->prepare("UPDATE alumno SET  primerNombre = :priNom, segundoNombre = :seguNom, primerApellido = :priApe, segundoApellido = :seguApe, fkdireccion = :fkdirec, carne = :carne, grado = :grado where idAlu = :idAlu");
        $stmt->bindParam(':grado', $datos['grado'], \PDO::PARAM_STR);
        $stmt->bindParam(':carne', $datos['carne'], \PDO::PARAM_STR);
        $stmt->bindParam(':fkdirec', $datos['fkdireccion'], \PDO::PARAM_STR);
        $stmt->bindParam(':seguApe', $datos['segundoApellido'], \PDO::PARAM_STR);
        $stmt->bindParam(':priApe', $datos['primerApellido'], \PDO::PARAM_STR);
        $stmt->bindParam(':seguNom', $datos['segundoNombre'], \PDO::PARAM_STR);
        $stmt->bindParam(':priNom', $datos['primerNombre'], \PDO::PARAM_STR);
        $stmt->bindParam(':idAlu', $datos['idAlu'], \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
    public static function borrarAlumno($idAlu)
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumno where idAlu = :idAlu");
        $stmt->bindParam(':idAlu', $idAlu, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(); //1 reg. Fetch
    }

    public static function borrarConfirmadoAlumno($idAlu)
    {
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM alumno where idAlu = :idAlu");
        $stmt->bindParam(':idAlu', $idAlu, \PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>