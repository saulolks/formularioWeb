<?php
    include("node_modules/php/conexao.php"); 
?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">

    <title>Formulário de Cadastro</title>

    <style>
        body{
            background-color: white;
        }
        .container{
            border: 2px solid black;
            background-color: white  ;
            border-radius: 10px;
            width: 1500px;
        }
        table{
            border: 2px solid #212529;
            border-radius: 10px;
        }
        button{
            margin-bottom: 10px;
        }
    </style>

</head>

<script language="JavaScript" src="node_modules/java-script/funcoes.js"></script>

<body>

    <div class="container">

            <div class="row">

                <div class="col-12 text-center my-5">
                    <h1 class="display-4"> Pessoas Cadastradas <i class="fa fa-check"></i></h1>
                </div>

            </div>
                
            <table class="table table-striped">
                
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">CPF</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Número</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Complemento</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                         
                        $consulta = "SELECT * FROM pessoa";
                        $listagem = $con->query($consulta) or die($con->error);
                        while($lista = $listagem->fetch_array()):            
                    ?>
                        <tr>
                        <th scope="row"> <?php echo $lista["id"]; ?> </th>
                        <td> <?php echo $lista["nome"]; ?> </td>
                        <td> <?php echo $lista["nascimento"]; ?> </td>
                        <td> <?php echo $lista["cpf"]; ?> </td>
                        <td> <?php echo $lista["cep"]; ?> </td>
                        <td> <?php echo $lista["rua"]; ?> </td>
                        <td> <?php echo $lista["numero"]; ?> </td>
                        <td> <?php echo $lista["bairro"]; ?> </td>
                        <td> <?php echo $lista["cidade"]; ?> </td>
                        <td> <?php echo $lista["estado"]; ?> </td>
                        <td> <?php echo $lista["complemento"]; ?> </td>
                        </tr>
                    <?php 
                        endwhile;
                    ?>

                </tbody>

            </table>

            <button type="button" class="btn btn-outline-secondary" onclick="location.href= 'index.php'">Cadastrar outro</button>

    </div>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.mask.min.js"></script>

    <script type="text/javascript">
    $("#inputCpf").mask("000.000.000-00")
        $("#inputCep").mask("00.000-000")
        </script>

</body>
</html>