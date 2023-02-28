<?php 
require_once ("class/DBController.php");
class Presenca {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addPresenca($presenca_date, $estudante_id, $presenca, $falta) {
        $query = "INSERT INTO presenca (data_presenca,estudante_id,presenca,falta) VALUES (?, ?, ?, ?)";
        $paramType = "siii";
        $paramValue = array(
            $presenca_date,
            $estudante_id,
            $presenca,
            $falta
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function deletePresencaData($presenca_date) {
        $query = "DELETE FROM presenca WHERE data_presenca = ?";
        $paramType = "s";
        $paramValue = array(
            $presenca_date
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getPresencaData($presenca_date) {
        $query = "SELECT * FROM presenca LEFT JOIN estudante ON presenca.estudante_id = estudante.id 
        WHERE data_presenca = ? ORDER By estudante_id";
        $paramType = "s";
        $paramValue = array(
            $presenca_date
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getPresenca() {
        $sql = "SELECT id, data_presenca, sum(presenca) as presenca, sum(falta) as falta FROM presenca GROUP By data_presenca";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>