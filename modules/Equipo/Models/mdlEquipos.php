<?php
class mdlEquipos
{
    public $conn;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();
    }


    public function guardarAsignacionEquipo($losDatos)
    {

        $recio = "	INSERT INTO inventario.asignaciones (equipoID,usuarioID,fechaAsignacion,estadoID,observaciones) VALUES (:equipoID,:usuarioID,:fechaAsignacion,3,:observaciones)";

        $stmt = $this->conn->prepare($recio);
        $stmt->bindParam(":equipoID", $losDatos->equipoID);
        $stmt->bindParam(":usuarioID", $losDatos->usuarioID);
        $stmt->bindParam(":fechaAsignacion", $losDatos->fechaAsignacion);
        $stmt->bindParam(":observaciones", $losDatos->Observaciones);


        try {
            $stmt->execute();
            $response[0] = array(
                'status' => '200',
                'mensaje' => 'Insertado correctamente',
            );

            $resultado = json_encode($response);
        } catch (PDOException $e) {
            $res = $stmt->errorInfo();
            $resultado  = json_encode($res);
        }

        echo $resultado;
        return $resultado;
    }
    public function listarEquipoAsignado()
    {

        $Equipo = "SELECT 
        a.asignacionID,
         e.codigoSAP,
        CONCAT(
            UPPER(LEFT(em.primerNombre, 1)), LOWER(SUBSTRING(em.primerNombre, 2, LEN(em.primerNombre))), ' ',
            COALESCE(CONCAT(
                UPPER(LEFT(em.segundoNombre, 1)), LOWER(SUBSTRING(em.segundoNombre, 2, LEN(em.segundoNombre))), ' '
            ), ''), 
            UPPER(LEFT(em.primerApellido, 1)), LOWER(SUBSTRING(em.primerApellido, 2, LEN(em.primerApellido))), ' ',
            UPPER(LEFT(em.segundoApellido, 1)), LOWER(SUBSTRING(em.segundoApellido, 2, LEN(em.segundoApellido)))
        ) AS Asignado,
        p.nombreProyecto AS Proyecto,
        m.nombreMarca,
        md.nombreModelo,
        e.serie,
		es.descripcion AS estado
            FROM inventario.asignaciones AS a
            INNER JOIN inventario.equipo AS e ON a.equipoID = e.equipoID
            INNER JOIN DBSIMFCOH.rrhh.empleados AS em ON a.usuarioID = em.idEmpleado
            INNER JOIN inventario.proyectos AS p ON e.proyectoID = p.proyectoID
            INNER JOIN inventario.marcas AS m ON e.marcaID = m.marcaID
            INNER JOIN inventario.modelos AS md ON e.modeloID = md.modeloID
            INNER JOIN inventario.estados  AS es ON a.estadoID = es.estadoID
            WHERE a.estadoID = 3";
        $stmt = $this->conn->prepare($Equipo);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    public function EliminarAsignacion($asignacionID)
    {
        $sql = "UPDATE inventario.asignaciones SET estadoID = 4 WHERE asignacionID = :asignacionID";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":asignacionID", $asignacionID);

        try {
            $stmt->execute();
            $response[0] = array(
                'status'  => '200',
                'mensaje' => 'Actualización exitosa',
            );
            $resultado = json_encode($response);
            echo $resultado;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
            echo $resultado;
        }
        $stmt->closeCursor();
        return $resultado;
    }

    public function guardarEquipo($losDatos)
    {

        $recio = "	INSERT INTO inventario.equipo (categoriaID,1,fechaAdquisicion,proveedorID,descripcionGeneral,serie,codigoSAP,marcaID,modeloID,proyectoID) 
        VALUES (:categoriaID,:estadoID,:fechaAdquisicion,1,:descripcion,:serie,:codigoSAP,:marcaID,:modeloID,:proyectoID)";

        $stmt = $this->conn->prepare($recio);
        $stmt->bindParam(":categoriaID", $losDatos->categoria2);
        $stmt->bindParam(":fechaAdquisicion", $losDatos->fecha2);
        $stmt->bindParam(":proveedorID", $losDatos->proveedor2);
        $stmt->bindParam(":descripcion", $losDatos->descripcion2);
        $stmt->bindParam(":serie", $losDatos->serie2);
        $stmt->bindParam(":codigoSAP", $losDatos->sap2);
        $stmt->bindParam(":marcaID", $losDatos->marca2);
        $stmt->bindParam(":modeloID", $losDatos->modelo2);
        $stmt->bindParam(":proyectoID", $losDatos->proyecto2);

        try {
            $stmt->execute();
            $response[0] = array(
                'status' => '200',
                'mensaje' => 'Insertado correctamente',
            );

            $resultado = json_encode($response);
        } catch (PDOException $e) {
            $res = $stmt->errorInfo();
            $resultado  = json_encode($res);
        }

        echo $resultado;
        return $resultado;
    }
}
