<?php  include('model/contatos.php') //Criado antes para que possamos setar as variáveis ?> 
<?php include('service/conctaPDO.php') //Efetua conexão ?>
<?php include('model/contatosDAO.php')  //Efetua operações no banco de dados?>

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
                                            $id = 1;
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

        <!-- <script src="main.js"></script> -->
    </div>

</body>

</html>