<?php
include '../conexion/conexion.php';


class claseDAO{
    public $id;
    public $nombre;
    public $descripcion;

    function __construct($id=null,$nom=null,$cod=null){
        $this->id=$id;
        $this->nombre=$nom;
        $this->descripcion=$cod;
    }

    function TraerClases (){
        $conexion = new Conexion ('localhost', 'root', '', 'basededatopho');
        try {
            $conn = $conexion->Conectar();
            $stmt = $conn->query('SELECT * FROM clases');
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
            $conexion->cerrarConexion();
        } catch(PDOException $e) {
            echo "error al conectar a la base de datos ======>".$e->getMessage();
        }
    }
    function eliminarClases ($id){
        $conexion = new Conexion ('localhost', 'root', '', 'basededatopho');
        try {
            $conn = $conexion->Conectar();

            // $query = "DELETE FROM clases WHERE id =$id";
            $consulta = $conn->prepare("DELETE FROM clases WHERE id = $id");
            $consulta->execute();
            return "Exito";
        } catch(PDOException $e) {
            echo "error al conectar a la base de datos ======>".$e->getMessage();
        }
    }
    function agregarClases($id,$nombre, $descripcion) {
        $conexion = new Conexion('localhost', 'root', '', 'basededatopho');
        try {
            $conn = $conexion->Conectar(); 
            $agregar = $conn->prepare("INSERT INTO clases (`id`, `nombre`, `descripcion`) VALUES (?, ?, ?)");
            $agregar->bindParam(1, $id);
            $agregar->bindParam(2, $nombre);
            $agregar->bindParam(3, $descripcion);
            $agregar->execute();
            return "Agregado Exitosamente";
        } catch(PDOException $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    } 

    function TraerClase ($id){
        $conexion = new Conexion ('localhost', 'root', '', 'basededatopho');
        try {
            $conn = $conexion->Conectar();
            $stmt = $conn->query("SELECT * FROM clases WHERE id={$id}");
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
            $conexion->cerrarConexion();
        } catch(PDOException $e) {
            echo "error al conectar a la base de datos ======>".$e->getMessage();
        }
    }

    function actualizarClase($id, $nombre, $descripcion) {
        $conexion = new Conexion('localhost', 'root', '', 'basededatopho');
        try {
            $conn = $conexion->Conectar(); 
            $agregar = $conn->prepare("UPDATE clases SET nombre='$nombre', descripcion='$descripcion' WHERE id =$id");
            $agregar->execute();
            return "Actualizado Exitosamente";
        } catch(PDOException $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
    
}


?>