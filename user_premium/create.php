<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plano = $_POST['plano'];
    $mtd_pagamento = $_POST['mtd_pagamento'];
    $id = $_GET['id'];
    // Outros campos

    //user_gratis
    $sql = "SELECT cpf, nome, email, senha, dt_nascimento FROM spotify.user_gratis WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //user_premium
    $sql = "INSERT INTO spotify.user_premium (cpf, id, nome, email, senha, dt_nascimento, dt_assinatura, plano, mtd_pagamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user['cpf'], $id, $user['nome'], $user['email'], $user['senha'], $user['dt_nascimento'], date('Y-m-d h:m:s'), $plano, $mtd_pagamento]);
    
    $sql = "DELETE FROM spotify.user_gratis WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: ../recursos_premium.php?id='.$id . '&nome='.$user['nome']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tornar-se premium</title>
</head>
<body>
    <h1>Tornar-se premium</h1>
    <form method="POST">
        <label for="plano">Plano:</label>
        <select name="plano">
            <option value="Estudante">Estudante</option>
            <option value="Família">Família</option>
            <option value="Individual">Individual</option>
            <option value="Casal">Casal</option>
        </select><br>

        <label for="mtd_pagamento">Método de pagamento:</label>
        <select name="mtd_pagamento">
            <option value="Cartão">Cartão</option>
            <option value="Boleto">Boleto</option>
            <option value="Pix">Pix</option>
        </select><br>

        <!-- Outros campos aqui -->

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>

<?php
include '../footer.php';
?>