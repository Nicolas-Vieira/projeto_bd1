<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $compositor = $_POST['compositor'];
    $album = $_POST['album'];
    $artista = $_POST['artista'];
    $letra = $_POST['letra'];
    // Outros campos

    //album
    $sql = "INSERT INTO spotify.album (titulo, dt_lancamento) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$album, date('Y-m-d')]);
    $idalbum = $pdo->lastInsertId();

    //artista
    $sql = "INSERT INTO spotify.artista (nome, pais_origem) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$artista, 'Brasil']);
    $idartista = $pdo->lastInsertId();

    //letra
    $sql = "INSERT INTO spotify.letra (texto, idioma) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$letra, 'PT - BR']);
    $idletra = $pdo->lastInsertId();

    //musica
    $sql = "INSERT INTO spotify.musica (titulo, compositor, idalbum, idartista, idletra) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $compositor, $idalbum, $idartista, $idletra]);
    header('Location: read.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Música</title>
</head>
<body>
    <h1>Adicionar Música</h1>
    <form method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>

        <label for="compositor">Compositor:</label>
        <input type="text" name="compositor"><br>

        <label for="album">Álbum:</label>
        <input type="text" name="album"><br>

        <label for="artista">Artista:</label>
        <input type="text" name="artista"><br>

        <label for="letra">Letra:</label>
        <input type="text" name="letra"><br>

        <!-- Outros campos aqui -->

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>

<?php
include '../footer.php';
?>