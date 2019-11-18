<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Login </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron" style="height: 100vh; margin: 0px; ">
	<center>
		<h1 class="display-4"> Faça seu login! </h1>
		<p class="lead"> Caso não tenha um login, <a href="/controle/gerenciamento">clique aqui</a>. </p>
		<hr class="my-4">
		<div style="width: 50vh; border-style: solid; border-width: 1px; border-color: gray; border-radius: 10px; padding: 15px; text-align: left; ">
			
			<?php 
				$get = $_GET['errno'] ?? ''; 
			switch($get){
				case '0': 
					$styleAlert = 'danger'; 
					$msg = 'Dados inválidos! ';
					break; 
				case 1: 
					$styleAlert = 'success'; 
					$msg = 'Login efetuado com sucesso! ';
					break; 
				case 7: 
					$styleAlert = 'dark'; 
					$msg = 'Sua sessão foi encerrada com sucesso! ';
					break; 
				case 51: 
					$styleAlert = 'danger'; 
					$msg = 'Por favor, forneça seus dados corretamente! ';
					break; 
				case 404:
					$styleAlert = 'warning'; 
					$msg = 'Banco de dados não está operante! ';
					break; 
				default: 
					$styleAlert = 'primary'; 
					$msg = 'Preencha seus dados. ';
					break; 
			} ?>
			<!-- div para emissao de alertas -->
			<div class="alert alert-<?= $styleAlert ?>" role="alert" style="text-align: center; ">
				<?= $msg ?>
			</div>

			<form action="/controle/autenticarVendas" method="POST">
				<div class="form-group">
					<label for="input-username"> Seu username </label>
					<input type="text" class="form-control" id="input-username" name="username" placeholder="Username" autocomplete="off" autofocus required>
				</div>

				<div class="form-group">
					<label for="input-password">Senha</label>
					<input type="password" class="form-control" id="input-password" name="senha" placeholder="Senha" required>
				</div>
				
				<div class="form-group" style="text-align: right; ">
					<button type="submit" class="btn btn-primary" align="right"> Login </button>
				</div>

			</form>
		</div>

	</center>
</div>

</body>
</html>