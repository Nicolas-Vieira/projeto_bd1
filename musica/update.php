<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idMusica = $_POST['idmusica'];
    $titulo = $_POST['titulo'];
    $compositor = $_POST['compositor'];
    // Outros campos

    $sql = "UPDATE spotify.musica SET titulo = ?, compositor = ? WHERE idmusica = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $compositor, $idMusica]);
    header('Location: read.php');
} else {
    // Exibir o formulário de edição preenchido com os dados atuais da música
    $idMusica = $_GET['idmusica'];
    $sql = "SELECT * FROM spotify.musica WHERE idmusica = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idMusica]);
    $musica = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <input type="hidden" name="idmusica" value="<?php echo $musica['idmusica']; ?>">

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $musica['titulo']; ?>" required><br>

        <label for="compositor">Compositor:</label>
        <input type="text" name="compositor" value="<?php echo $musica['compositor']; ?>"><br>

        <!-- Outros campos aqui -->

        <input type="submit" value="Salvar">
    </form>
</body>
</html>

<?php
include '../footer.php';
?>