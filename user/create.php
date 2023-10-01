<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $dt_nascimento = $_POST['dt_nascimento'];
    $lim_reproducoes = 5;
    // Outros campos

    //user
    $sql = "INSERT INTO spotify.user_gratis (cpf, nome, email, senha, dt_nascimento, lim_reproducoes) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cpf, $nome, $email, $senha, $dt_nascimento, $lim_reproducoes]);
    $id = $pdo->lastInsertId();
    header('Location: ../recursos.php?id='.$id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar usuário</title>
</head>
<body>
    <h1>Criar usuário</h1>
    <form method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome"><br>

        <label for="email">E-mail:</label>
        <input type="text" name="email"><br>

        <label for="senha">Senha:</label>
        <input type="text" name="senha"><br>

        <label for="dt_nascimento">Data de nascimento:</label>
        <input type="text" name="dt_nascimento"><br>

        <!-- Outros campos aqui -->

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>

<?php
include '../footer.php';
?>