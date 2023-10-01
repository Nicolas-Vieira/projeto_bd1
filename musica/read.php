<?php
require '../db.php';
include '../header.php';

// Consulta para selecionar todas as músicas
$sql = "SELECT * FROM spotify.musica";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Músicas</title>
</head>
<body>
    <h1>Lista de Músicas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Compositor</th>
            <!-- Outras colunas aqui -->
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['idmusica']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['compositor']; ?></td>
                <td><a href="update.php?idmusica=<?php echo $row['idmusica']; ?>">Editar</a></td>
                <td><a href="delete.php?idmusica=<?php echo $row['idmusica']; ?>">Excluir</a></td>
                <!-- Outras colunas aqui -->
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
include '../footer.php';
?>