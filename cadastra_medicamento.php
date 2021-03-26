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
		<form method="post" name="form2" action="controle.php">
			<fieldset><legend>Cadastrar Medicamento</legend>

				<label for="nome_prod">Nome:</label><br>
				<input name="nome_prod" type="text"><br><br>

				<label for="laboratorio">Laboratório:</label><br>
				<input name="laboratorio" type="text"><br><br>

				<label for="descricao">Descrição:</label><br>
				<input name="descricao" type="text"><br><br>

				<label for="lote">Lote:</label><br>
				<input name="lote" type="text"><br><br>

				<label for="data_fabr">Data de Fabricação:</label><br>
				<input name="data_fabr" type="date"><br><br>

				<label for="data_validade">Data de Validade:</label><br>
				<input name="data_validade" type="date"><br><br>

				<label for="custo">Custo:</label><br>
				<input name="custo" type="number" step="0.01"><br><br>

				<label for="quantidade">Quantidade:</label><br>
				<input name="quantidade" type="number"><br><br>
				
				<input type="submit" name="cadastrar_medicamento" value="Cadastrar">
			</fieldset>
		</form>
		<?php if(isset($_COOKIE['mensagem1'])) echo $_COOKIE['mensagem1']; ?>
		<br><a href="index.php">Voltar</a>
	</div>
</body>
</html>