<?php 

// Executa create
// Verifica se existe um 'act' e se ele é igual a 'save', e se o nome não está vazio
if(isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != ""){
    try{
        
        // Caso o id já tenha sido informado estamos tentado fazer um update no banco
        if($id != ""){
            $stmt = $conexao->prepare("UPDATE contatos SET nome=?, email=?, celular=? WHERE id = ?");

            // Apenas fazemos o binding do id aqui, pois do restante dos parâmetros está abaixo
            $stmt->bindParam(4, $id);
        }

        // Caso o id não exista estamos tentando criar um novo dado no banco
        if($id == ""){
            // Prepara o comando sql que irá adicionar informações no banco
            $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, celular) VALUES(?, ?, ?)");
        }


        //  bindParam() vincula uma variável a um espaço demarcado
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $celular);

        // Executa o statement 
        // Chamado dentro de um if pois retorna um valor booleano se a ação for executada com sucesso
        if($stmt->execute()){

            // Retorna o número de linhas afetadas na tabela(disponível após o execute)
            if($stmt->rowCount() > 0){
                echo '<div class="badge bg-success m-3">Operação efetuada com sucesso </div>';

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

// Executa update
// Verfica a ação do formulario, e se o id não está vazio, e nos retorna um objeto referente ao id(Primary Key)
if(isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != ""){
    try{
        $stmt = $conexao->prepare("SELECT * FROM contatos WHERE id = ?");

        // PDO::PARAM_INT - Informa o tipo do dado da variável $id para o SGBD
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if($stmt->execute()){
            $rs = $stmt->fetch(PDO::FETCH_OBJ);

            // Seta os valores em "value" da index
            $id = $rs->id;
            $nome = $rs->nome;
            $email = $rs->email;
            $celular = $rs->celular;
        }else{
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }

    }catch(PDOException $err){
        echo "Erro: " . $err->getMessage();
    }
}
?>