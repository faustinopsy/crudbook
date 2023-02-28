<?php
require_once ("class/Autenticacao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
	$username = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars($_POST['senha'], ENT_QUOTES, 'UTF-8');
	$confirm_password = htmlspecialchars($_POST['confirm_senha'], ENT_QUOTES, 'UTF-8');
	// Verifica se as senhas conferem
	if ($password !== $confirm_password) {
		// Define a mensagem de erro em uma variável de sessão
		session_start();
		$_SESSION['error_message'] = 'As senhas não conferem';
		header('Location: register.php');
		exit;
	}
	// Registra o usuário
	$auth = new Autenticacao();
	$result = $auth->registrar($nome, $username, $password);
	if ($result['status'] === 'success') {
		// Define a mensagem de sucesso em uma variável de sessão
		session_start();
		$_SESSION['success_message'] = 'Usuário registrado com sucesso';
		header('Location: register.php');
		exit;
	} else {
		// Define a mensagem de erro em uma variável de sessão
		session_start();
		$_SESSION['error_message'] = $result['message'];
		header('Location: register.php');
		exit;
	}
}
// Verifica se há mensagens de sucesso ou erro definidas
session_start();
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['success_message']);
unset($_SESSION['error_message']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="web/css/style.css">
	<title>Registro</title>
</head>
<body>
	<h2>Registro de Usuário</h2>
    <?php if (!empty($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
	<form action="register.php" method="post">
    <label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome" required><br><br>
		<label for="email">Email de usuário:</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="password">Senha:</label>
		<input type="password" id="senha" name="senha" required><br><br>
		<label for="confirm_senha">Confirmar senha:</label>
		<input type="password" id="confirm_senha" name="confirm_senha" required><br><br>
		<input type="submit" value="Registrar">
	</form>
</body>
</html>
