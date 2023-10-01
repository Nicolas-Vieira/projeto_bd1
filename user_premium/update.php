<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Outros campos

    $sql = "UPDATE spotify.user_premium SET nome = ?, email = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $id]);
    header('Location: read.php');
} else {
    // Exibir o formulário de edição preenchido com os dados atuais da música
    $id = $_GET['id'];
    $sql = "SELECT * FROM spotify.user_premium WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Música</title>
</head>
<body>
    <h1>Editar Música</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $user['nome']; ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>

        <label for="senha">Senha:</label>
        <input type="text" name="senha" value="<?php echo $user['senha']; ?>"><br>

        <!-- Outros campos aqui -->

        <input type="submit" value="Salvar">
    </form>
</body>
</html>

<?php
include '../footer.php';
?>