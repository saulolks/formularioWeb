# Formulário Web

O desenvolvimento deste formulário foi dividido em duas etapas: a interface de entrada para os dados do usuário e a validação e inserção dos dados no banco de dados.

## 1. Formulário com Bootstrap

Uma grata surpresa para mim – que apenas tive rasas aventuras em desenvolvimento web – foi o Bootstrap e sua documentação completíssima. O primeiro passo para a criação desse formulário foi a elaboração de um *container* de englobaria um título para a página e os devidos campos de *input*, no arquivo principal "*index.php*". Após estabelecer o *container* e suas devidas modificações estéticas com *css*, criei uma estrutura *form* com um dos temas do Bootstrap, adicionando cada campo e especificando seus tipos de entrada. E pronto, minha página de formulário estava pronta, com um visual "clean", organizado e bonito, me levando novamente a me perguntar como nunca me arrisquei no Bootstrap antes.

O botão do tipo *input* e a *action* definida no *form* enviava as informações via método *POST* para outro arquivo *.php* que tratava os dados recebidos.

### 1.1. Preenchendo os dados pelo CEP

Como diria um sábio professor meu, Rafael Lins, "meus amigos, não reinventem a roda, isto é perda de tempo", então para obter os dados de localização pelo CEP foi utilizado o método do tutorial do portal **ViaCEP.com.br**, que usa JavaScript para obter o dado de CEP via *onblur*
```
<input type="text" class="form-control" name="inputCep" id="inputCep" placeholder="Ex: 00000-000" onblur="pesquisacep(this.value);" required>
```
E na função chamada, realiza a procura, que seta todos as informações de localização, caso o CEP seja encontrado, ou um alerta.

### 1.2. Campos obrigatórios e formatos de entrada

Para os campos obrigatórios foram utilizados o *required* do HTML para exigir que alguns campos sejam obrigatórios. Para a questão dos formatos de CEP e CPF foram utilizadas máscaras, do JQuery, para estabelecer o tamanho, as separações e os tipos de carácteres dos campos.

```
<script type="text/javascript" src="node_modules/jquery/dist/jquery.mask.min.js">
    $("#inputCpf").mask("000.000.000-00")
    $("#inputCep").mask("00.000-000")
</script>
```
O tamanho da string de CPF e CEP e a validade deles foram tratados no arquivo *.php* que serão explicados posteriormente. E os demais campos foram definidos utilizando a *type* do HTML, como *number, date, text*. O campo de estado, como foi exigido, é um campo *select* do HTML e ao preencher os campos via CEP, é selecionado automaticamente o campo. 

### 1.3. Estruturação por *row* e *col*

Tendo em mente uma matriz, o design do formulário foi dividido em *rows*, onde cada *row* possuía colunas que indicavam os campos a serem preenchidos. Por exemplo, na primeira *row*, o campo "nome" ocupa todo o espaço 12 definido para a *col* padrão, e os demais *rows* dividiam esse espaço entre os campos, de acordo com o tamanho previsto de entrada.

A linha é definida em

```
<div class="form-row">
```
e a coluna da seguinte forma, definindo o tamanho em *col-sm-12*
```
    <div class="form-group col-sm-12">
        <label for="nome">Nome completo</label>
        <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" required>
    </div>
</div>
```

### 1.4. *Submit* com o método *POST*

Um botão *submit* repassa todas as informações preenchidas para a página "*insert.php*" que realiza o tratamento e a inserção dos dados no banco de dados. O método utilizado foi o *POST* para omitir as informações da URL, deixando-a mais limpa.

```
<form action="node_modules/php/insert.php" method="post">
```

## 2. Tratamento e inserção

Esta seção explicita como foi feita o lado tardoz do processo de cadastro, utilizando PHP e SQL.

### 2.1. Obtenção e análise dos dados

Se obtém os dados do método *POST* pela seguinte função **MySQL**

```
$nome = mysqli_real_escape_string($con, $_POST["inputNome"]);
```
onde se retorna uma string correspondente ao *id* informado no parâmetro.

Então, posteriormente, é checada a validade dos CPFs e CEPs inseridos, da seguinte forma:
* Remoção dos caracteres não-numéricos.
```
$chars = array("-" , "," , ".");
$cpf = str_replace($chars,"",$cpf);
```
* Armazenamento do tamanho da string (11 para CPF e 8 para CEP).
```
$sizecep = strlen($cep);
```
* Conversão em inteiro.
```
$cep = intval($cep);
```

A variável *$msg* armazena o possível erro na análise destes dois campos, é uma string que recebe "O CPF informado é inválido!" para ser impresso na tela posteriormente, o mesmo para CEP.

### 2.2. Inserção no bando de dados

#### 2.2.1. A conexão com o banco

Antes de tudo é importante explicitar que em todas as páginas é realizada uma conexão com o banco, descrita no arquivo "*conexao.php*". A conexão é realizada com um banco de dados criado via **phpMyAdmin**, cujo o código para geração deste está presente no arquivo "*formulariocadastro.sql*".

#### 2.2.2. Inserção

Para realizar a inserção no banco de dados, é criada uma string com um comando SQL
```
$sql = "INSERT INTO pessoa(id, nome, nascimento, cpf, cep, rua, numero, bairro, cidade, estado, complemento) 
		VALUES ('$id', '$nome', '$nasc', '$cpf', '$cep', '$rua', null, '$bairro', '$cidade', '$estado', '$complemento')";
```
e a partir daí se inicia o código HTML da página, pois, no meio do script, se realiza uma conferência.
```
if ($con->query($sql) === TRUE)
```
Se a conexão for bem sucedida, ele exibe uma tabela de linha única com as informações do cadastrado. Caso contrário, exibe uma mensagem.
```
<?php  
    }
    else if($msg != " "){
?>
```
Se aquela variável *$msg* possuir algum valor, ou seja, se o erro for no CEP ou CPF, a mensagem contida nela é exibida.
```
<div class="alert alert-danger" role="alert"> <?php echo "Error: " . $msg . "<br>"; ?> </div>
```
Caso contrário, o erro SQL é exibido.
```
<div class="alert alert-danger" role="alert"> <?php echo "Error: " . $sql . "<br>" . $con->error; ?> </div>
```

## 3. Tabela de cadastrados

A formação da tabela de cadastrados é relativamente simples. Após estabelecida a conexão, sempre no começo do código, se inicia o mesmo formato de página HTML que utilizamos nas demais. A novidade à esta altura é a classe *table* e seus belos temas que o Bootstrap proporciona.

### 3.1. A criação da tabela

Para este projeto, foi utilizado um *table* dentro do *container* da classe *table-striped*, que oferece tons de cores de fundo alternados linha-a-linha na tabela criada.

```
<table class="table table-striped">
```
Logo em seguida, são definidas as colunas que serão informadas, com um tema mais escuro, da classe *thead-dark*.

```
<thead class="thead-dark">
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Nome</th>
    <th scope="col">Data de Nascimento</th>
    ...
</thead>
```
E só. A combinação HTML e Bootstrap possibilita criação de estruturas de forma fácil e esteticamente muito bem feitas. Precisa se esforçar bastante para fazer um site feio e desorganizado utilizando Bootstrap.

### 3.2. Preenchimento da tabela

Para preencher a tabela precisamos de apenas dois comandos: um para definir a consulta e outro para executar a consulta.
```
$consulta = "SELECT * FROM pessoa";
$listagem = $con->query($consulta) or die($con->error);
```
Este código é executado dentro do código HTML e faz intercalações entre as duas linguagens para preencher cada coluna com cada dado que a variável *$listagem* retornar.

```
while($lista = $listagem->fetch_array()):            
?>
    <tr>
    <th scope="row"> <?php echo $lista["id"]; ?> </th>
    <td> <?php echo $lista["nome"]; ?> </td>
    <td> <?php echo $lista["nascimento"]; ?> </td>
    ...
    </tr>
    
<?php 
    endwhile;
?>
```

Desta forma, a tabela é preenchida para cada dado que cada *$lista* retornará.

## Conclusão

Por fim, estruturar uma página de formulário utilizando estas tecnologias é simples, ao menos à altura deste projeto foi tranquilo. Como não tinha muito contato com desenvolvimento web, tive que dedicar alguns dias ao estudo das tecnologias (até agreguei um curso de POO com PHP ao currículo) numa madrugada maratonando vídeo-aulas do Curso em Vídeo. Talvez por minha falta de experiência em PHP e web em geral, não soube onde aplicar o framework Slim ao projeto, infelizmente, pois era um dos requisitos. Mas a manutenção dos dados utilizando "PHP puro" não foi muito complicado, também pela simplicidade do projeto, mas o foco é sempre aprender mais e foi muito interessante e proveitoso para mim aprender essas tecnologias até então novas para mim e aplicá-las neste desafio. Enfim, espero que gostem.
