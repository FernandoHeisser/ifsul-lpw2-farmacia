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
			width: 100px;
		}
		#bloco2{
			float: left;
			width: 100px;
		}
		#bloco3{
			margin-left: 100px;
			float: left;
			width: 100px;
		}
	</style>
</head>
<body>
	<div id="bloco1">
		<form method="post" name="form4" action="controle.php">
			<fieldset><legend>Consultar Medicamento</legend>
				
				<label for="nome_medicamento">Nome do Medicamento:</label><br>
				<input name="nome_medicamento" type="text"><br><br>

				<input type="submit" name="consultar_medicamento" value="Consultar">
			</fieldset>
		</form>
		<br><br><br><br><a href="index.php">Voltar</a>
		
	</div>
	<div id="bloco2">
		<form method="post" name="form5" action="controle.php">
			<fieldset><legend>Consultar Cliente</legend>
				
				<label for="nome_cli">Nome do Cliente:</label><br>
				<input name="nome_cli" type="text"><br><br>
				<label for="cpf">CPF do Cliente:</label><br>
				<input name="cpf" type="text"><br><br>

				<input type="submit" name="consultar_cliente" value="Consultar">
			</fieldset>
		</form>
	</div>
	<div id="bloco3">
		<form method="post" name="form6" action="controle.php">
			<fieldset><legend>Consultar Laboratorio</legend>
				
				<label for="nome_laboratorio">Nome do Laboratorio:</label><br>
				<input name="nome_laboratorio" type="text"><br><br>

				<input type="submit" name="consultar_laboratorio" value="Consultar">
			</fieldset>
		</form>
	</div>
	
</body>
</html>
