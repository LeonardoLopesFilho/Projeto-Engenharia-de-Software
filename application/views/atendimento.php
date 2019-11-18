<?php 

if (!isset($_GET['user'])) {
	header('Location: /controle/vendas?errno=51'); 
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Atendimento </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<style type="text/css">
	/*a {
		width: 100%; 
		margin: 2px; 
	}*/

	div.content {
		width: 50vh; 
		border-style: solid; 
		border-width: 1px; 
		border-color: gray; 
		border-radius: 10px; 
		padding: 15px; 
		text-align: center; 
		max-width: 100%; 
	}
</style>

<div class="jumbotron" style="height: 100vh; margin: 0px; ">
	
	<center>
		<h1 class="display-4"> 
			<p>
				User: <?= $_GET['user']; ?> 
				<a class="logout btn btn-danger btn-lg" href="/controle/vendas?errno=7"> Logout </a>
			</p>
		</h1>
		<p class="lead"> Selecione uma opção: </p>
		<hr class="my-4">
		<div class="content">
			
			<a class="btn btn-outline-primary btn-lg" href="/controle/pedido?user=<?= $_GET['user']; ?>" style="width: 100%; margin: 2px; "> 
				Novo atendimento 
			</a>
			<a class="btn btn-outline-primary btn-lg" href="/controle/cliente?user=<?= $_GET['user']; ?>" style="width: 100%; margin: 2px; ">
				Cadastrar um cliente
			</a>
			<a class="btn btn-outline-primary btn-lg" href="/controle/listaPedido?user=<?= $_GET['user']; ?>" style="width: 100%; margin: 2px; "> 
				Consultar um pedido 
			</a>
			<a class="btn btn-outline-primary btn-lg" href="/controle/listaProduto?user=<?= $_GET['user']; ?>" style="width: 100%; margin: 2px; "> 
				Gerenciar produtos 
			</a>

		</div>

	</center>
</div>


</body>
</html>