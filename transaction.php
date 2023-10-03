<?php
require 'db.php';

function fazerTransacao($dados)
{
    global $pdo;

    try {
        // Inicia a transação
        $pdo->beginTransaction();
        $user_gratis = true;
        // Realize uma operação de consulta (seleção) na tabela user_gratis
        $consulta = $pdo->prepare("SELECT * FROM spotify.user_gratis WHERE cpf = ?");
        $consulta->execute([$dados['cpf']]);
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if (empty($resultado)) {
            // Realize uma operação de consulta (seleção) na tabela user_premium caso nn encontre na gratis
            $consulta = $pdo->prepare("SELECT * FROM spotify.user_premium WHERE cpf = ?");
            $consulta->execute([$dados['cpf']]);
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

            if (!empty($resultado)) {
                $user_gratis = false;
            }
        }

        // Etapa 2: Realize uma operação de inserção ou atualização (dependendo do resultado da consulta)
        if ($resultado) {
            if ($user_gratis) {
                // Realize uma operação de atualização
                $atualizacao = $pdo->prepare("UPDATE spotify.user_gratis SET nome = ? WHERE cpf = ?");
                $atualizacao->execute([$dados['nome'], $dados['cpf']]);
            } else {
                // Realize uma operação de atualização
                $atualizacao = $pdo->prepare("UPDATE spotify.user_premium SET nome = ? WHERE cpf = ?");
                $atualizacao->execute([$dados['nome'], $dados['cpf']]);
            }
        } else {
            if ($user_gratis) {
                // Realize uma operação de inserção
                $insercao = $pdo->prepare("INSERT INTO spotify.user_gratis (nome, cpf) VALUES (?, ?)");
                $insercao->execute([$dados['nome'], $dados['cpf']]);
            } else {
                // Realize uma operação de inserção
                $insercao = $pdo->prepare("INSERT INTO spotify.user_premium (nome, cpf) VALUES (?, ?)");
                $insercao->execute([$dados['nome'], $dados['cpf']]);
            }
        }

        // Confirma a transação
        $pdo->commit();
        if($user_gratis) {
            header('Location: user/read.php');
        } else {
            header('Location: user_premium/read.php');
        }
        echo "Transação concluída com sucesso!";
    } catch (PDOException $e) {
        // Em caso de erro, desfaz a transação
        $pdo->rollBack();
        echo "Erro na transação: " . $e->getMessage();
    }
}

// Exemplo de uso do método
$dados = [
    'cpf' => '123987',
    'nome' => 'novo valor teste'
];
fazerTransacao($dados);
