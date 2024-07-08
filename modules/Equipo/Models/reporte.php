<?php

/**
 * Descripción ;COntrol de consultas para la generación de custodios para las asignaciones de equipo
 * Fecha de creación: 04/07/2024
 * Autor:  Douglas Palma
 */

class mdlCustodios
{
    // Variables globales
    public $conn;

    // Constructores
    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();

        if (!isset($_SESSION)) {
            session_start();
        }
    }



    public function custodio($id)
    {
        $sql = "SELECT 
        a.asignacionID,
         e.codigoSAP,
        em.nombreCompleto AS Asignado,
		em.codigoEmpleado,
		a.fechaAsignacion,
		em.ingreso,
		em.cargo,
		em.proyecto AS proyectoEmpleado,
        p.nombreProyecto AS proyectoEquipo,
        m.nombreMarca,
        md.nombreModelo,
        e.serie,
		e.precioAdquisicion,
		e.descripcionGeneral,
		es.descripcion AS estado
            FROM inventario.asignaciones AS a
            INNER JOIN inventario.equipo AS e ON a.equipoID = e.equipoID
            INNER JOIN [DBSIMFCOH].[rrhh].[vw_empleadosActivos] AS em ON a.usuarioID = em.idEmpleado
            INNER JOIN inventario.proyectos AS p ON e.proyectoID = p.proyectoID
            INNER JOIN inventario.marcas AS m ON e.marcaID = m.marcaID
            INNER JOIN inventario.modelos AS md ON e.modeloID = md.modeloID
            INNER JOIN inventario.estados  AS es ON a.estadoID = es.estadoID
            WHERE a.asignacionid = $id";

        $stmt  = $this->conn->prepare($sql);
        //  $stmt->bindParam(":tecnico",$tecnio);
        //$stmt->bindParam(":anio",$anio);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado  = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
}
