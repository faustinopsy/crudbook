<?php
session_start();
if (isset($_SESSION["email"])) {
    $username = $_SESSION["email"];
    session_write_close();
} else {
    session_unset();
    session_write_close();
    $url = "login.php";
    header("Location: $url");
}
?>
<html>
<head>
<title>Criando CRUD com OOP</title>
<link href="web/css/style.css" type="text/css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Criando CRUD com OOP</h2>
    <div>
        <ul class="menu-list">
            <li><a href="index.php?action=estudante">Estudante</a></li>
            <li><a href="index.php?action=presenca">Presença</a></li>
            <li><?php echo $_SESSION["email"]; ?></li>
            <li><a href="index.php?action=sair">Sair</a></li>
        </ul>
    </div>