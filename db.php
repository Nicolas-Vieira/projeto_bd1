<?php
$host = 'db-nic-ufs.czqcobc8fmt2.us-east-1.rds.amazonaws.com'; // Host do PostgreSQL
$dbname = 'bd1_pl'; // Nome do seu banco de dados PostgreSQL
$username = 'professor'; // Nome de usuário do PostgreSQL
$password = 'professor'; // Senha do PostgreSQL

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname;user=$username;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>