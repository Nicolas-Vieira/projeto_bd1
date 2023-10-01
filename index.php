<?php
require 'db.php';
include 'header.php';
$erro = '';

/* email: teste@teste.com
senha: 147 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Outros campos
    
    //user
    $sql = "SELECT * FROM spotify.user_gratis WHERE email = ? AND senha = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $senha]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        header('Location: recursos.php?id='.$user['id']);
    } else {
        $erro = 'Login ou senha incorreto.';
    }
}
?>
<body>
    <h1>Acessar</h1>
    <h2><?php echo $erro; ?></h2>
    <form method="POST">
        <label for="email">E-mail:</label>
        <input type="text" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="text" name="senha"><br>
        <br>
        <input type="submit" value="Acessar">
    </form>
</body>

<br><a href="user/create.php">Criar usuário</a>

<?php
include 'footer.php';
?>