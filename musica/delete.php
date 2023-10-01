<?php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idmusica'])) {
    $idMusica = $_GET['idmusica'];

    // Exclui a música
    $sql = "DELETE FROM spotify.musica WHERE idmusica = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idMusica]);

    header('Location: read.php');
}
?>
