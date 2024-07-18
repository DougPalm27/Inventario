<?php
class mdlKit
{
    public $conn;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();
    }

    public function listarKit()
    {

        $Equipo = "SELECT * FROM inventario.kit AS k
            INNER JOIN inventario.proyectos AS p ON k.proyectoID = p.proyectoID
            INNER JOIN inventario.estados AS e ON k.estadoID = e.estadoID";
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
    public function EliminarKit($ID)
    {
        $sql = "UPDATE inventario.kit SET estadoID = 2 WHERE kitID = :kitID";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":kitID", $kitID);

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
    public function guardarKit($losDatos)
    {

        $recio = "	INSERT INTO inventario.kit
        (descripcion,precio,proyectoID,estadoID) 
        VALUES 
        (:descripcion,:precio,:proyectoID,:estadoID)";

        $stmt = $this->conn->prepare($recio);
        $stmt->bindParam(":descripcion", $losDatos->descripcion);
        $stmt->bindParam(":precio", $losDatos->precio);
        $stmt->bindParam(":proyectoID", $losDatos->proyectoID);
        $stmt->bindParam(":estadoID", $losDatos->estadoID);


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
