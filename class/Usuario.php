<?php
require_once ("class/DBController.php");

class Usuario {
    private $db_handle;
    function __construct() {
        $this->db_handle = new DBController();
    }
    function criarUsuario($nome, $email, $senha) {
        $hash_senha = password_hash($senha, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $paramType = "sss";
        $paramValue = array($nome, $email, $hash_senha);
        return $this->db_handle->insert($query, $paramType, $paramValue);
    }

}
?>
