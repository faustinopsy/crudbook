<?php
require_once ("class/DBController.php");
require_once ("class/Usuario.php");

class Autenticacao {
    private $db_handle;
    private $usuario;
    function __construct() {
        $this->db_handle = new DBController();
        $this->usuario = new Usuario();
    }
    function registrar($nome, $email, $senha) {
        // verificar se o e-mail já existe no banco de dados
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $paramType = "s";
        $paramValue = array($email);
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        if (!empty($result)) {
            return array("status" => "error", "message" => "Este e-mail já está registrado.");
        }
        // criar o usuário e inserir no banco de dados
        $this->usuario->criarUsuario($nome, $email, $senha);
        return array("status" => "success", "message" => "Usuário registrado com sucesso.");
    }
    function autenticar($email, $senha) {
        // buscar o usuário pelo e-mail
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $paramType = "s";
        $paramValue = array($email);
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        if (empty($result)) {
            return array("status" => "error", "message" => "Usuário não encontrado.");
        }
        // verificar se a senha está correta
        $usuario = $result[0];
        if (!password_verify($senha, $usuario['senha'])) {
            return array("status" => "error", "message" => "Senha incorreta.");
        }
        // iniciar a sessão e salvar o usuário como logado
        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        return array("status" => "success", "message" => "Login efetuado com sucesso.");
    }
    function sair() {
        session_start();
        session_destroy();
        header("Location: login.php");
    }

}
?>
