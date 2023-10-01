<?php
require '../db.php';
include '../header.php';

// Consulta para selecionar todos os artistas
$sql = "SELECT * FROM spotify.artista";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Artistas</title>
</head>
<body>
    <h1>Lista de Artistas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>País de origem</th>
            <th>E-mail</th>
            <!-- Outras colunas aqui -->
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['idartista']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['pais_origem']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="update.php?idartista=<?php echo $row['idartista']; ?>">Editar</a></td>
                <td><a href="delete.php?idartista=<?php echo $row['idartista']; ?>">Excluir</a></td>
                <!-- Outras colunas aqui -->
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
include '../footer.php';
?>