<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idartista = $_POST['idartista'];
    $nome = $_POST['nome'];
    $pais_origem = $_POST['pais_origem'];
    $email = $_POST['email'];
    // Outros campos

    $sql = "UPDATE spotify.artista SET nome = ?, pais_origem = ?, email = ? WHERE idartista = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $pais_origem, $email, $idartista]);
    header('Location: read.php');
} else {
    // Exibir o formulário de edição preenchido com os dados atuais do artista
    $idartista = $_GET['idartista'];
    $sql = "SELECT * FROM spotify.artista WHERE idartista = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idartista]);
    $artista = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Artista</title>
</head>
<body>
    <h1>Editar Artista</h1>
    <form method="POST">
        <input type="hidden" name="idartista" value="<?php echo $artista['idartista']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $artista['nome']; ?>" required><br>

        <label for="pais_origem">País de origem:</label>
        <input type="text" name="pais_origem" value="<?php echo $artista['pais_origem']; ?>"><br>

        <label for="email">E-mail:</label>
        <input type="text" name="email" value="<?php echo $artista['email']; ?>"><br>

        <!-- Outros campos aqui -->

        <input type="submit" value="Salvar">
    </form>
</body>
</html>

<?php
include '../footer.php';
?>