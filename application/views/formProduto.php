<?php 
	// Script para emissao de alertas
	$get = $_GET['return'] ?? ''; 
	switch($get){
		case '0': 
			$styleAlert = 'danger'; 
			$voltar = $styleAlert; 
			$msg = 'Código de barras informado já está cadastrado no banco de dados! ';
			break; 
		case 2: 
			$styleAlert = 'danger'; 
			$voltar = $styleAlert; 
			$msg = 'Data de validade indica produto vencido! ';
			break; 
		case 51: 
			$styleAlert = 'success'; 
			$voltar = $styleAlert; 
			$msg = 'Produto cadastrado com sucesso! ';
			break; 
		case 404:
			$styleAlert = 'warning'; 
			$voltar = $styleAlert; 
			$msg = 'Banco de dados não está operante! ';
			break; 
		default: 
			$styleAlert = 'primary'; 
			$voltar = $styleAlert; 
			$msg = 'Preencha os campos com os dados do produto. ';
			break; 
	} 
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
		width: 100vh; 
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

<!-- botao para voltar -->
<div class="return">
<a href="/controle/listaProduto?user=<?= $_GET['user']; ?>" class="alert alert-<?= $voltar; ?>">
	Voltar 
</a>
</div>

<div class="general">

<!-- div para emissao de alertas -->
<div class="alert alert-<?= $styleAlert ?>" role="alert">
	<?= $msg ?>
</div>

<form action="/controle/autenticaProduto" method="POST">

	<div class="form-row">
		<!-- Id produto -->
		<div class="form-group col-md-3">
			<label for="id"> ID Produto </label>
			<input type="number" class="form-control" id="id" name="id_produto" readonly>
		</div>
		<!-- Cadastrado por -->
		<div class="form-group col-md-3">
			<label for="username"> Cadastrado por: </label>
			<input type="text" class="form-control" id="username" name="username" value="<?= $_GET['user']; ?>" readonly>
		</div>
		<!-- Codigo de barras -->
		<div class="form-group col-md-6">
			<label for="code"> Código de barras </label>
			<input type="number" class="form-control" id="code" name="cod_barras" autocomplete="off" autofocus required>
		</div>
	</div>

	<div class="form-row">
		<!-- Nome do produto -->
		<div class="form-group col-md-6">
			<label for="name"> Nome </label>
			<input type="text" class="form-control" id="name" name="nome" placeholder="Nome do produto" autocomplete="off" maxlength="50" required>
		</div>
		<div class="form-group col-md-6">
			<label for="type"> Tipo </label>
			<select class="form-control" id="type" name="tipo">
				<option value="1"> Selecione... </option>
			</select>
			<!-- <input type="text" class="form-control" id="nome-produto" name="nome" placeholder="Nome do produto"> -->
		</div>
	</div>

	<div class="form-group">
		<label for="description"> Descrição </label>
		<textarea class="form-control" id="description" name="descricao" placeholder="Descrição do produto" required></textarea>
		<!-- <input type="text" class="form-control" id="nome-produto" name="nome" placeholder="Nome do produto"> -->
	</div>

	<div class="form-row">
		<!-- Data validade -->
		<div class="form-group col-md-4">
			<label for="validity"> Validade </label>
			<input type="date" class="form-control" id="validity" name="data_validade" required>
		</div>
		<!-- Quantidade -->
		<div class="form-group col-md-4">
			<label for="quantity"> Quantidade </label>
			<input type="number" class="form-control" id="quantity" name="quantidade" autocomplete="off" required>
		</div>
		<!-- Valor -->
		<div class="form-group col-md-4">
			<label for="value"> Valor </label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon"> R$ </span>
				</div>
				<input type="text" class="form-control" id="value" name="valor" placeholder="0.00" aria-label="Usuário" aria-describedby="basic-addon" autocomplete="off" required>
			</div>
		</div>
	</div>

	<div class="form-row">
		<!-- Fornecedor -->
		<div class="form-group col-md-4">
			<label for="provider"> Fornecedor </label>
			<select class="form-control" id="provider" name="fornecedor">
				<option> Selecione... </option>
			</select>
		</div>
		<!-- Visibilidade -->
		<div class="form-group col-md-4">
			<label class="form-check-label"> Visibilidade </label>
			<p>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="flag" value="1" checked> Visível
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="flag" value="0"> Não visível
				</div>
			</p>
		</div>
		<!-- Salvar / Limpar -->
		<div class="form-group col-md-4">
			<label> Finalizar cadastro </label>
			<p>
				<button type="reset" class="btn btn-outline-danger"> Limpar </button>
				<button type="submit" class="btn btn-primary"> Salvar </button>
			</p>
		</div>
	</div>

</form>

</div>


<!-- Scripts Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

