<?php
require_once ("class/Autenticacao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $senha = htmlspecialchars($_POST['senha'], ENT_QUOTES, 'UTF-8');
    // Autentica o usuário
    $auth = new Autenticacao();
    $result = $auth->autenticar($email, $senha);
    // Verifica se a autenticação foi bem-sucedida
    if ($result['status'] === 'success') {
        session_start();
		$_SESSION['email'] = $email;
        header("Location: index.php");
        exit;
    } else {
        $message = $result['message'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="web/css/style.css">
</head>
<body>
<div class="login-container">
    <h1>Login</h1>
    <?php if (isset($message)) { ?>
        <div class="error-message"><?php echo $message; ?></div>
    <?php } ?>
    <form action="login.php" method="post">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required value="
        <?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '' ?>">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <input type="submit" name="login"></button>
    </form>
        <p>Não tem uma conta? <a href="register.php">Registre-se</a></p>
    </div>
</body>
</html>
