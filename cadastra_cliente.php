<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="UTF-8"/>
	<style type="text/css">
		body{
			font-family: arial;
		}
		#bloco1{
			margin-right: 100px;
			float: left;
		}
	</style>
</head>
<body>
	<div id="bloco1">
		<form method="post" name="form3" action="controle.php">
			<fieldset><legend>Cadastrar Cliente</legend>
				
				<label for="nome_cli">Nome do Cliente:</label><br>
				<input name="nome_cli" type="text"><br><br>

				<label for="endereco">Endereço:</label><br>
				<input name="endereco" type="text"><br><br>

				<label for="bairro">Bairro:</label><br>
				<input name="bairro" type="text"><br><br>

				<label for="estado">Estado:</label><br>
				<input name="estado" type="text"><br><br>

				<label for="cidade">Cidade:</label><br>
				<input name="cidade" type="text"><br><br>

				<label for="telefone">Telefone:</label><br>
				<input name="telefone" type="text"><br><br>

				<label for="cpf">CPF:</label><br>
				<input name="cpf" type="text"><br><br>

				<label for="email">Email:</label><br>
				<input name="email" type="email"><br><br>
				
				<input type="submit" name="cadastrar_cliente" value="Cadastrar">
			</fieldset>
		</form>
		<?php if(isset($_COOKIE['mensagem3'])) echo $_COOKIE['mensagem3']; ?>
		<br><a href="index.php">Voltar</a>
	</div>
</body>
</html>