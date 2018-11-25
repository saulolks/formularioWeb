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
            width: 1000px;
        }
        .form-control{
            border: 2px solid #D2D2D2;
            border-radius: 10px;
        }
        button{
            margin-bottom: 10px;
            color: grey; 
        }
    </style>

</head>

<script language="JavaScript" src="node_modules/java-script/funcoes.js"></script>

<body>


    <div class="container">

            <div class="row">

                <div class="col-12 text-center my-5">
                    <h1 class="display-4"> <i class="fa fa-address-card"></i> Formulário de Cadastro </h1>
                </div>

            </div>

            <div class="row justify-content-center mb-5">

                <div class="col-sm-12 col-md-10 col-lg-8">

                    <form action="node_modules/php/insert.php" method="post">

                        <div class="form-row">

                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-12">

                                <label for="nome">Nome completo</label>
                                <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" required>

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-4">

                                <label for="nascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" name="inputNasc" id="inputNasc" placeholder="DD/MM/AAAA" required>

                            </div>

                            <div class="form-group col-sm-4">

                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" name="inputCpf" id="inputCpf" placeholder="Ex: 000.000.000-00" required>

                            </div>

                            <div class="form-group col-sm-4">

                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" name="inputCep" id="inputCep" placeholder="Ex: 00000-000" onblur="pesquisacep(this.value);" required>

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-5">

                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" placeholder="Rua, avenida, etc..." required>

                            </div>

                            <div class="form-group col-sm-3">

                                <label for="numero">Número</label>
                                <input type="number" class="form-control" name="inputNum" id="inputNum"  placeholder="Número">

                            </div>

                            <div class="form-group col-sm-4">

                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" name="inputBairro" id="inputBairro" placeholder="Bairro" required>

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-5">

                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" name="inputCidade" id="inputCidade" placeholder="Cidade" required>

                            </div>

                            <div class="form-group col-sm-2">

                                <label for="estado">Estado</label>
                                <select class="form-control" name="inputEstado" id="inputEstado"> 
                                    <option>AC</option>
                                    <option>AL</option>
                                    <option>AM</option>
                                    <option>BA</option>
                                    <option>CE</option>
                                    <option>DF</option>
                                    <option>ES</option>
                                    <option>GO</option>
                                    <option>MA</option>
                                    <option>MT</option>
                                    <option>MS</option>
                                    <option>MG</option>
                                    <option>PA</option>
                                    <option>PB</option>
                                    <option>PR</option>
                                    <option>PE</option>
                                    <option>PI</option>
                                    <option>RJ</option>
                                    <option>RN</option>
                                    <option>RS</option>
                                    <option>RO</option>
                                    <option>RR</option>
                                    <option>SC</option>
                                    <option>SP</option>
                                    <option>SE</option>
                                    <option>TO</option> 
                                </select>

                            </div>

                            <div class="form-group col-sm-5">

                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" name="inputComplemento" id="inputComplemento" placeholder="Complemento">

                            </div>

                        </div>

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="registerButton">Cadastrar</button>
                            <button class="btn btn-outline-secondary" type="button" id="tableButton" onclick="location.href= 'tabelaConsulta.php'">Cadastrados</button>
                        </div>

                    </form>

                    <p id="labelError" class="text-center text-danger"></p>

                </div>

            </div>

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