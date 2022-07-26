<?php include('model/contatos.php') //Criado antes para que possamos setar as variáveis 
?>
<?php include('service/conctaPDO.php') //Efetua conexão 
?>
<?php include('model/contatosDAO.php')  //Efetua operações no banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>CRUD</title>
</head>

<body>

    <div class="container">
        <form action="?act=save" method="POST" name="form1">

            <h1>Testes</h1>

            <hr>

            <input type="hidden" name="id" <?php
                                            // Preenche o id no campo id com um valor "value" se ele existir
                                            if (isset($id) && $id != null || $id != "") {
                                                echo "value=\"{$id}\"";
                                            }
                                            ?> />

            Nome:
            <input type="text" name="nome" <?php
                                            //Preenche o nome no campo nome com o valor "value se ele existir"
                                            if (isset($nome) && $nome != null || $nome != "") {
                                                echo "value=\"{$nome}\"";
                                            }
                                            ?> />
            E-mail:
            <input type="text" name="email" <?php
                                            //Preenche o nome no campo email com o valor "value se ele existir"
                                            if (isset($email) && $email != null || $email != "") {
                                                echo "value=\"{$email}\"";
                                            }

                                            ?> />
            Celular:
            <input type="text" name="celular" <?php
                                                //Preenche o nome no campo celular com o valor "value se ele existir"
                                                if (isset($celular) && $celular != null || $celular != "") {
                                                    echo "value=\"{$celular}\"";
                                                }
                                                ?> />
            <input type="submit" class="btn btn-primary" value="Salvar">
            <input type="reset" class="btn btn-dark" value="Novo">
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Etapa que executa o Read() trazendo as informações do banco gerando a tabela -->
                <?php
                try {
                    $stmt = $conexao->prepare("SELECT * FROM contatos");

                    if ($stmt->execute()) {

                        // $rs - Result Set: recebe cada interação do loop como objeto de registro
                        // fetch() - Busca o resultado que obtemos pelo execute()
                        // PDO::FETCH_OBJ - Indica ao método que queremos os registro como objetos
                        // While abaixo indica que enquanto for possível iterar no $rs será true
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr>";
                            echo "<td>" . $rs->nome . "</td><td>" . $rs->email . "</td><td>" . $rs->celular . "</td><td><a class='btn btn-secondary' href=\"?act=upd&id=". $rs->id . "\">Alterar</a>"
                                . "<a class='btn btn-danger mx-1' href=\"?act=del&id=" . $rs->id . "\">Excluir</a>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Erro: Não foi possível recuperar os dados do banco de dados";
                    }
                } catch (PDOException $err) {
                    echo "Erro: " . $err->getMessage();
                }


                ?>

            </tbody>
        </table>

    </div>

</body>

</html>