<?php
require_once ("class/DBController.php");
require_once ("class/Estudante.php");
require_once ("class/Presenca.php");

$db_handle = new DBController();

// $action = "";
if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}else{
    $action ="action=presenca";
}
switch ($action) {
    case "presenca-add":
        if (isset($_POST['add'])) {
            $presenca = new Presenca();
            
            $presenca_timestamp = strtotime($_POST["data_presenca"]);
            $presenca_date = date("Y-m-d", $presenca_timestamp);
            
            if(!empty($_POST["estudante_id"])) {
                $presenca->deletePresencaData($presenca_date);
                foreach($_POST["estudante_id"] as $k=> $estudante_id) {
                    $present = 0;
                    $absent = 0;
                    
                    if($_POST["presenca-$estudante_id"] == "presenca") {
                        $present = 1;
                    }
                    else if($_POST["presenca-$estudante_id"] == "falta") {
                        $absent = 1;
                    }
                    
                    $presenca->addPresenca($presenca_date, $estudante_id, $present, $absent);
                }
            }
            header("Location: index.php?action=presenca");
        }
        $estudante = new Estudante();
        $estudanteResult = $estudante->getAllEstudante();
        require_once "web/presenca-add.php";
        break;
    
    case "presenca-edit":
        $presenca_date = $_GET["data"];
        $presenca = new presenca();
        if (isset($_POST['add'])) {
            $presenca->deletePresencaData($presenca_date);
            if(!empty($_POST["estudante_id"])) {
                foreach($_POST["estudante_id"] as $k=> $estudante_id) {
                    $present = 0;
                    $absent = 0;
                    
                    if($_POST["presenca-$estudante_id"] == "presenca") {
                        $present = 1;
                    }
                    else if($_POST["presenca-$estudante_id"] == "falta") {
                        $absent = 1;
                    }
                    
                    $presenca->addPresenca($presenca_date, $estudante_id, $present, $absent);
                }
            }
            header("Location: index.php?action=presenca");
        }
        
        $result = $presenca->getPresencaData($presenca_date);
        
        $estudante = new estudante();
        $estudanteResult = $estudante->getAllEstudante();
        require_once "web/presenca-edit.php";
        break;
    
    case "presenca-delete":
        $presenca_date = $_GET["data"];
        $presenca = new presenca();
        $presenca->deletePresencaData($presenca_date);
        
        $result = $presenca->getPresenca();
        require_once "web/presenca.php";
        break;
    
    case "presenca":
        $presenca = new presenca();
        $result = $presenca->getPresenca();
        require_once "web/presenca.php";
        break;
    
    case "estudante-add":
        if (isset($_POST['add'])) {
            $name = $_POST['nome'];
            $numero = $_POST['numero'];
            $data = "";
            if ($_POST["data"]) {
                $data_timestamp = strtotime($_POST["data"]);
                $data = date("Y-m-d", $data_timestamp);
            }
            $classe = $_POST['classe'];
            
            $estudante = new estudante();
            $insertId = $estudante->addEstudante($name, $numero, $data, $classe);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema ao tentar salvar",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once "web/estudante-add.php";
        break;
    
    case "estudante-edit":
        $estudante_id = $_GET["id"];
        $estudante = new estudante();
        
        if (isset($_POST['add'])) {
            $name = $_POST['nome'];
            $numero = $_POST['numero'];
            $data = "";
            if ($_POST["data"]) {
                $data_timestamp = strtotime($_POST["data"]);
                $data = date("Y-m-d", $data_timestamp);
            }
            $classe = $_POST['classe'];
            
            $estudante->editEstudante($name, $numero, $data, $classe, $estudante_id);
            
            header("Location: index.php");
        }
        
        $result = $estudante->getEstudanteById($estudante_id);
        require_once "web/estudante-edit.php";
        break;
    
    case "estudante-delete":
        $estudante_id = $_GET["id"];
        $estudante = new estudante();
        
        $estudante->deleteEstudante($estudante_id);
        
        $result = $estudante->getAllEstudante();
        require_once "web/estudante.php";
        break;
    
    default:
        $estudante = new estudante();
        $result = $estudante->getAllEstudante();
        require_once "web/estudante.php";
        break;
}
?>