<?php
 class mdlCategoria{

    public $conn;

    // Constructores
    public function __construct(){
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();
    
    }

    // método para guardar categorias
    public function guardarNuevaCategoria($losDatos){

        $recio ="exec inventario.sp_insertarCategoria :descripcion,:codigoCategoria";

        $stmt = $this->conn->prepare($recio);
        $stmt->bindParam(":descripcion",$losDatos->categoria);
        $stmt->bindParam(":codigoCategoria",$losDatos->codigoCategoria);

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
    
    // listar correos para select
    public function listarCategorias(){
        $sql ="SELECT * FROM inventario.Categorias";
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

?>