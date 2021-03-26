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
			<fieldset><legend>Cadastrar Venda</legend>
				
				<label for="cod_med">Código do Medicamento:</label><br>
				<input name="cod_med" type="number"><br><br>

				<label for="id_cliente">ID Cliente:</label><br>
				<input name="id_cliente" type="number"><br><br>

				<label for="data_venda">Data da Venda:</label><br>
				<input name="data_venda" type="date"><br><br>

				<label for="percentual_venda">Percentual Venda:</label><br>
				<input name="percentual_venda" type="number" step="0.01"><br><br>

				<label for="preco_venda">Preco da Venda:</label><br>
				<input name="preco_venda" type="number" step="0.01"><br><br>

				<label for="quantidade_vendida">Quantidade Vendida:</label><br>
				<input name="quantidade_vendida" type="number"><br><br>
				
				<input type="submit" name="cadastrar_venda" value="Cadastrar">
			</fieldset>
		</form>
		<?php if(isset($_COOKIE['mensagem2'])) echo $_COOKIE['mensagem2']; ?>
		<br><a href="index.php">Voltar</a>	
	</div>
</body>
</html>