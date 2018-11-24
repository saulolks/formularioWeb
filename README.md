# Formulário Web

O desenvolvimento deste formulário foi dividido em duas etapas: a interface de entrada para os dados do usuário e a validação e inserção dos dados no banco de dados.

## 1. Formulário com Boostrap

Uma grata surpresa para mim – que apenas tive rasas aventuras em desenvolvimento web – foi o Boostrap e sua documentação completíssima. O primeiro passo para a criação desse formulário foi a elaboração de um container de englobaria um título para a página e os devidos campos de *input*, no arquivo principal "*index.php*". Após estabelecer o container e suas devidas modificações estéticas com *css*, criei uma estrutura *form* com um dos temas do Bootstrap, adicionando cada campo e especificando seus tipos de entrada. E pronto, minha página de formulário estava pronta, com um visual "clean", organizado e bonito, me levando novamente a me perguntar como nunca me arrisquei no Bootstrap antes.

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
