<?php 
	// Script para emissao de alertas
	$get = $_GET['return'] ?? ''; 

	switch($get){
		case '0': 
			$styleAlert = 'danger'; 
			$voltar = $styleAlert; 
			$msg = 'Dados já estão cadastrados no banco de dados! ';
			break; 
		case 1: 
			$styleAlert = 'danger'; 
			$voltar = $styleAlert; 
			$msg = 'CPF inválido! ';
			break; 
		case 2: 
			$styleAlert = 'danger'; 
			$voltar = $styleAlert; 
			$msg = 'Data de nascimento indica menoridade! ';
			break; 
		case 51: 
			$styleAlert = 'success'; 
			$voltar = $styleAlert; 
			$msg = 'Cadastro realizado com sucesso! ';
			break; 
		case 404:
			$styleAlert = 'warning'; 
			$voltar = $styleAlert; 
			$msg = 'Banco de dados não está operante! ';
			break; 
		default: 
			$styleAlert = 'primary'; 
			$voltar = $styleAlert; 
			$msg = 'Preencha os campos com os dados do cliente. ';
			break; 
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
<a href="/controle/Atendimento?user=<?= $_GET['user']; ?>" class="alert alert-<?= $voltar; ?>">
	Voltar 
</a>
</div>

<div class="general">

<!-- div para emissao de alertas -->
<div class="alert alert-<?= $styleAlert ?>" role="alert">
	<?= $msg ?>
</div>

<form action="/controle/autenticaCliente" method="POST">

	<div class="form-row">
		<!-- Id interno do cliente -->
		<div class="form-group col-md-2">
			<label for="id"> ID Cliente </label>
			<input type="number" class="form-control" id="id" name="id_cliente" readonly>
		</div>
		<!-- CPF -->
		<div class="form-group col-md-4">
			<label for="cpf"> CPF </label>
			<input type="text" class="form-control" id="cpf" name="cpf" autocomplete="off" maxlength="11" autofocus required>
		</div>
		<!-- Documento de Identidade (RG) -->
		<div class="form-group col-md-6">
			<label for="rg"> R.G. </label>
			<input type="number" class="form-control" id="rg" name="rg" autocomplete="off" required>
		</div>
	</div>

	<!-- Nome do cliente -->
	<div class="form-group">
		<label for="name"> Nome </label>
		<input type="text" class="form-control" id="name" name="nome" placeholder="Nome do cliente" autocomplete="off" required>
	</div>

	<div class="form-row">
		<!-- Data nascimento -->
		<div class="form-group col-md-4">
			<label for="date"> Data nascimento </label>
			<input type="date" class="form-control" id="date" name="data_nascimento" required>
		</div>
		<!-- Orgao emissor -->
		<div class="form-group col-md-8">
			<label for="email"> E-mail </label>
			<input type="email" class="form-control" id="email" name="email" placeholder="endereco@email.com" autocomplete="off">
		</div>
	</div>

	<div class="form-row">
		<!-- Cadastrado por $username -->
		<div class="form-group col-md-8">
			<label for="user"> Cadastro realizado por: </label>
			<input type="text" value="<?= $_GET['user']; ?>" class="form-control" id="user" name="username" readonly>
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


</body>
</html>