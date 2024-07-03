<?php
class mdlGenerales
{
    public $conn;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();
    }
    public function listarUsuario()
    {
        $sql = "SELECT * from inventario.vw_usuario WHERE estadoID=1";
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

    public function listarEquipo()
    {
    
        $Equipo = "SELECT 
        e.equipoID,e.categoriaID,e.estadoID,e.fechaAdquisicion,precioAdquisicion,ubicacionID,e.proyectoID,p.nombreProyecto AS np,proveedorID,descripcionGeneral,
        e.serie,e.codigoSAP,e.marcaID,e.modeloID,ma.nombreMarca,m.nombreModelo FROM inventario.equipo AS e
        INNER JOIN inventario.proyectos AS p on e.proyectoID = p.proyectoID
        INNER JOIN inventario.modelos AS m ON e.modeloID = m.modeloID 
        INNER JOIN inventario.marcas AS ma ON e.marcaID = ma.marcaID 

        
        WHERE e.estadoID IN (1,4) AND e.equipoID NOT IN (SELECT a.equipoID FROM inventario.asignaciones AS a)";
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
}