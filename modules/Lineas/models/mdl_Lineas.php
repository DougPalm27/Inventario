<?php
class mdlLineas
{
    public $conn;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();
    }


    //Metodo para cargarLineas
    public function listarLineas()
    {
        $sql = "SELECT * FROM inventario.vw_AsignacionesLineas";
        $exec = $this->conn->prepare($sql);

        try {
            $exec->execute();
            $resultado = $exec->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $exec->closeCursor();
        return $resultado;
    }

    //Metodo para cargarLineas
    public function listarLineasActivas()
    {
        $sql = "SELECT * FROM inventario.vw_AsignacionesLineas";
        $exec = $this->conn->prepare($sql);

        try {
            $exec->execute();
            $resultado = $exec->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $exec->closeCursor();
        return $resultado;
    }

    public function listarMarca()
    {
        $sql = "SELECT * FROM inventario.marcas";
        $exec = $this->conn->prepare($sql);

        try {
            $exec->execute();
            $resultado = $exec->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $exec->closeCursor();
        return $resultado;
    }

    public function listarModelo()
    {
        $sql = "SELECT * FROM inventario.modelos";
        $exec = $this->conn->prepare($sql);
        try {
            $exec->execute();
            $resultado = $exec->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $exec->closeCursor();
        return $resultado;
    }

    public function listarProyecto()
    {
        $sql = "SELECT * FROM inventario.proyectos";
        $exec = $this->conn->prepare($sql);
        try {
            $exec->execute();
            $resultado = $exec->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $exec->closeCursor();
        return $resultado;
    }
    //metodo para ingresarNuevaLinea
    public function ingresarLinea($losDatos)
    {

        $errorLineasDetalle = 0;
        $estadoID = 1;

        $sqllinea = "INSERT INTO inventario.lineas (numeroLinea,estadoActivo,FechaActivacion,codigoProyecto) 
        VALUES (:numeroLinea,1,:FechaActivacion,:codigoProyecto)";

        $stmt = $this->conn->prepare($sqllinea);
        $stmt->bindParam(":numeroLinea", $losDatos->numeroLinea);
        $stmt->bindParam(":FechaActivacion", $losDatos->fechaActivacion);
        $stmt->bindParam(":codigoProyecto", $losDatos->codigoProyecto);
        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();
            $stmt->execute();

            # Captura del ultimo id insertado de la tabla inventario.lineas
            $idLinea = $this->conn->lastInsertId();

            $sqllineaDetalle = "    INSERT INTO inventario.lineasDetalle (lineaID, Marca, Modelo, IMEI, fechaRenovacion, fechaVencimiento)
                VALUES (:lineaID, :marca, :modelo,:Imei, :fechaRenovacion, :fechaVencimiento)";
            $stmt = $this->conn->prepare($sqllinea);
            $stmt->bindParam(":lineaID", $idLinea);
            $stmt->bindParam(":marca", $losDatos->marca);
            $stmt->bindParam(":modelo", $losDatos->modelo);
            $stmt->bindParam(":Imei", $losDatos->imei);
            $stmt->bindParam(":fechaRenovacion", $losDatos->fechaRenovacion);
            $stmt->bindParam(":fechaVencimiento", $losDatos->fechaVencimiento);
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                $this->conn->rollBack();
                $errorLineasDetalle = $errorLineasDetalle + 1;
                $res = $stmt->errorInfo();
                $resultado = json_encode($res);
            }
        } catch (PDOException $e) {
            $res = $stmt->errorInfo();
            $resultado  = json_encode($res);
        }

        $stmt->closeCursor();
        echo $resultado;
        return $resultado;
    }
}
