<?php 
require_once ("class/DBController.php");
class Estudante
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addEstudante($nome, $numero, $data, $classe) {
        $query = "INSERT INTO estudante (nome,numero,data,classe) VALUES (?, ?, ?, ?)";
        $paramType = "siss";
        $paramValue = array(
            $nome,
            $numero,
            $data,
            $classe
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editEstudante($nome, $numero, $data, $classe, $estudante_id) {
        $query = "UPDATE estudante SET nome = ?,numero = ?,data = ?,classe = ? WHERE id = ?";
        $paramType = "sissi";
        $paramValue = array(
            $nome,
            $numero,
            $data,
            $classe,
            $estudante_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteEstudante($estudante_id) {
        $query = "DELETE FROM estudante WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $estudante_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getEstudanteById($estudante_id) {
        $query = "SELECT * FROM estudante WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $estudante_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllEstudante() {
        $sql = "SELECT * FROM estudante ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>