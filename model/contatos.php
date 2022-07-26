<?php
// Verifica se os dados foram enviados via POST e popular os values
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Se a variável chegar(existir) e for diferente de nulo, $varivel a recebe, senão ficara vazia
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
    $celular = (isset($_POST["celular"]) && $_POST["celular"] != null) ? $_POST["celular"] : NULL;
    // Se não, se o id não existir
} else if(!isset($id)){ 
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $email = NULL;
    $celular = NULL;
}