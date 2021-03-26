<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="UTF-8"/>
	<style type="text/css">
		body{
			font-family: arial;
			margin-left: 25%;
		}
		#bloco1{

		}
		#bloco2{
			float: left;
			clear: both;
		}
		select, #lab, input{
			width: 400px;
			height: 50px;
			font-size: 25px;
		}
		#ok{
			width: 50px;
		}
	</style>
</head>
<body>
	<div id="bloco1">
		<form name="form" method="GET" action="controle.php">
			<label id="lab">Selecionar Opção:</label>
			<select name="select">
				<option value="op1">Cadastrar Medicamento</option>
				<option value="op2">Cadastrar Cliente</option>
				<option value="op3">Cadastrar Venda</option>
				<option value="op4">Consultar</option>
				<input id="ok" type="submit" name="sub" value="Ok">
			</select><br><br>
		</form>
	</div>
	<div id="bloco2">
		<form method="post" name="form7" action="controle.php">
				<input type="submit" name="listar_todos_medicamentos" value="Listar Todos Medicamentos"s>
		</form>
		<form method="post" name="form7" action="controle.php"><br>
				<input type="submit" name="listar_todas_vendas" value="Listar Todas Vendas">
		</form>
		<form method="post" name="form8" action="controle.php"><br>
				<input type="text" name="nome_cliente" placeholder="Nome do Cliente">
				<input type="submit" name="listar_todas_vendas_cliente" value="Listar Todas Vendas Por Cliente">
		</form>
	</div>
</body>
</html>