<?php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idartista'])) {
    $idartista = $_GET['idartista'];

    // Exclui o artista
    $sql = "DELETE FROM spotify.artista WHERE idartista = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idartista]);

    header('Location: read.php');
}
?>
