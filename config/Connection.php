<?php
    class Connection{
        public function dbConnect(){
            try {
                // recio
                
                $serverName = "3.128.144.165";
                $database = "DB20162000225"; 
                $user = 'kevin.antunez';
                $password = 'KA20162000225';
                $port ="1443";

                // Instanciar la conexion con la base de datos
                $conn = new PDO("sqlsrv:server=$serverName; database=$database", $user, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Retornar la variable de conexion
                return $conn;
            } catch (PDOException $e) {
                // En caso de error
            echo "Error en conexion: " . $e->getMessage();
            }
        }
    }
?>