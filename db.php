<?php
$host = 'db-nic-ufs.czqcobc8fmt2.us-east-1.rds.amazonaws.com';
$dbname = 'bd1_pl';
$username = 'professor';
$password = 'professor';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname;user=$username;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>