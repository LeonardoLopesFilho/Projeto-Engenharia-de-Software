<?php
  // echo 'Hello world! ';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Document </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<style type="text/css">
  
  div.general {
    width: 100vw; 
    max-width: 90%; 
    margin: 1.5vw 0px 0px 3vw; 
    border-style: solid; 
    border-width: 1px; 
    border-radius: 10px; 
    border-color: gray; 
    padding: 2vw; 
    background-color: none; 
  }

  div.return {
    margin: 3vw 3vw 10px 3vw; 
    padding: 0vw; 
    background-color: none; 
  }

</style>

<div class="return">
<a href="/controle/Atendimento?user=<?= $_GET['user']; ?>" class="alert alert-primary">
  Voltar 
</a>
</div>

<div class="general">

<h1 class="display-4"> Gerenciamento de produtos </h1>

<p>
  <a class="btn btn-primary btn-lg" href="/controle/produto?user=<?= $_GET['user']; ?>" style="width: 100%; margin: 2px; "> 
    Cadastrar um novo produto 
  </a>
</p>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id_produto</th>
      <th scope="col">nome</th>
      <th scope="col">descrição</th>
      <th scope="col">tipo</th>
      <th scope="col">data_validade</th>
      <th scope="col">quantidade</th>
      <th scope="col">valor</th>
      <th scope="col">fornecedor</th>
      <th scope="col">flag</th>
      <th scope="col">username</th>
      <th scope="col">-</th>
      <th scope="col">-</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($produtos as $produto): ?>
      <tr>
        <td><?= $produto->id_produto ?></td>
        <td><?= $produto->nome ?></td>
        <td><?= $produto->descricao ?></td>
        <td><?= $produto->tipo ?></td>
        <td><?= $produto->data_validade ?></td>
        <td><?= $produto->quantidade ?></td>
        <td><?= $produto->valor ?></td>
        <td><?= $produto->fornecedor ?></td>
        <td><?= $produto->flag ?></td>
        <td><?= $produto->username ?></td>
        <td><a href="/controle/autenticaProduto?tipo=0&id=<?= $produto->id_produto ?>">alterar</a></td>
        <td><a href="/controle/excluiregistro?id=<?= $produto->id_produto ?>&username=<?= $produto->username?>">Excluir</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>


</body>
</html>