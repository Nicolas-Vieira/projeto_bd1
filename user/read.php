<?php
require '../db.php';
include '../header.php';

// Consulta para selecionar todas as usuários
$sql = "SELECT * FROM spotify.user_gratis";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <!-- Outras colunas aqui -->
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="update.php?id=<?php echo $row['id']; ?>">Editar</a></td>
                <td><a href="delete.php?id=<?php echo $row['id']; ?>">Excluir</a></td>
                <!-- Outras colunas aqui -->
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
include '../footer.php';
?>