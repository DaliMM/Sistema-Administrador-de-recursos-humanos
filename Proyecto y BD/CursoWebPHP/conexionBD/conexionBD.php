<?php
class conexionBD {
    private $host;
    private $user;
    private $password;
    private $bd;
    
    function __construct(){
        
        $this->host = 'localhost';
        $this->user = 'testCurso';
        $this->password = '1234';
        $this->bd = 'curso_web_php';
    }
    
    public function getConexionPDO(){
        
        $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->bd . ';';
        
        try{
            $connPDO = new PDO($dns, $this->user, $this->password);
            return $connPDO;
        } catch (PDOException $exception) {
            echo "Conexión fallida BD Curso Web PHP: ".$exception->getMessage();
            die();
        }       
    }
}

