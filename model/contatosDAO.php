<?php 
// Verifica se existe um 'act' e se ele é igual a 'save', e se o nome não está vazio
if(isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != ""){
    try{

        // Prepara o comando sql que irá adicionar informações no banco
        $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, celular) VALUES(?, ?, ?)");

        //  bindParam() vincula uma variável a um espaço demarcado
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $celular);

        // Executa o statement 
        // Chamado dentro de um if pois retorna um valor booleano se a ação for executada com sucesso
        if($stmt->execute()){

            // Retorna o número de linhas afetadas na tabela(disponível após o execute)
            if($stmt->rowCount() > 0){
                echo '<div class="badge bg-success m-3">Dados cadastrados com sucesso </div>';

                // Zera os valores
                $id = null;
                $nome = null;
                $email = null;
                $celular = null;
            }else{
                echo 'Erro na tentativa de cadastro';
            }
        }else{
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }

    }catch(PDOException $err){
        echo "Erro: " . $err->getMessage();
    }
}
?>