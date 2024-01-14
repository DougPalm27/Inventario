<?php
class mdlEquipo
{

    public $conn;

    // Constructores
    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();
    }
    // método para guardar correos
    public function guardarEquipo($losDatos){

        $recio = "EXEC inventario.sp_insertarEquipo
        :categoriaID,
        :fechaAdquisicion,
        :precioAdquisicion,
        :ubicacionID,
        :proveedorID,
        :descripcionGeneral,
        :serie";

        $stmt = $this->conn->prepare($recio);
        $stmt->bindParam(":categoriaID", $losDatos->categoriaID);
        $stmt->bindParam(":fechaAdquisicion", $losDatos->fechaAdquisicion);
        $stmt->bindParam(":precioAdquisicion", $losDatos->precioAdquisicion);
        $stmt->bindParam(":ubicacionID", $losDatos->ubicacionID);
        $stmt->bindParam(":proveedorID", $losDatos->proveedorID);
        $stmt->bindParam(":descripcionGeneral", $losDatos->descripcionGeneral);
        $stmt->bindParam(":serie", $losDatos->serie);

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

    // listar ubicaciones para select
    public function listarUbicaciones(){
        $sql = "SELECT * FROM inventario.ubicaciones";
        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // listarcategorias para select
    public function listarCategorias(){
        $sql = "SELECT * FROM inventario.categorias";
        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    // listarcategorias para select
    public function listarProveedores(){
        $sql = "SELECT * FROM inventario.proveedores";
        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

}
