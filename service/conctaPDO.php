<?php

try {
    $conexao = new PDO("mysql:host=localhost; dbname=crud_1", "root");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // PDO::ATTR_ERRMODE - Indica que podemos relatar o erro, PDO::ERRMODE_EXCEPTION - Lança uma exceção
    $conexao->exec("set names utf8"); //Para que esteja claro que precisaremos de acentuação, retorna o número de linhas afetadas(Execução direto no banco)
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
    exit;
}

