<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $pais_origem = $_POST['pais_origem'];
    $email = $_POST['email'];
    $redes_sociais = $_POST['redes_sociais'];
    // Outros campos

    //artista
    $sql = "INSERT INTO spotify.artista (nome, pais_origem, email, redes_sociais) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $pais_origem, $email, $redes_sociais]);
    header('Location: read.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Artista</title>
</head>
<body>
    <h1>Adicionar Artista</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="pais_origem">País de origem:</label>
        <input type="text" name="pais_origem"><br>

        <label for="email">E-mail:</label>
        <input type="text" name="email"><br>

        <label for="redes_sociais">Redes sociais:</label>
        <input type="text" name="redes_sociais"><br>

        <!-- Outros campos aqui -->

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>

<?php
include '../footer.php';
?>