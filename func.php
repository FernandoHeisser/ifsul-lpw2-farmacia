<!DOCTYPE html>
<html>
<head>
	<title>Consulta</title>
	<style type="text/css">
		body{
			font-family: arial;
		}
		#block1{
			width: 25%;
		}
		#block2{
			width: 25%;
		}
		input{
			width: 100%;
		}
		table, th, td{
			border-collapse: collapse;
			border: black 1px solid;
			padding: 10px;
		}
	</style>
</head>
<body>
<?php
	function conectaBanco(){
		$servidor="localhost";
		$usuario="root";
		$senha="";
		$banco="farmacia";

		$connection=mysqli_connect($servidor, $usuario, $senha);
		$sla=mysqli_select_db($connection, $banco);
		return $connection;
	}
	function cadastraMedicamento($nome_prod, $laboratorio, $descricao, $lote, $data_fabr, $data_validade, $custo, $quantidade){
		$connection=conectaBanco();
		$insere="	INSERT INTO medicamento(nome_prod, laboratorio, descricao, lote, data_fabr, data_validade, custo, quantidade) 
					VALUES('$nome_prod', '$laboratorio', '$descricao', '$lote', '$data_fabr', '$data_validade', '$custo', '$quantidade');";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		setcookie('mensagem1', 'Medicamento Cadastrado com Sucesso!', time()+1);
		mysqli_close($connection);
		header("Location:index.php");
	}
	function cadastraVenda($cod_med, $id_cliente, $data_venda, $percentual_venda, $preco_venda, $quantidade_vendida){
		$connection=conectaBanco();
		$insere="	INSERT INTO venda(cod_med, id_cliente, data_venda, percentual_venda, preco_venda, quantidade_vendida) 
					VALUES('$cod_med', '$id_cliente', '$data_venda', '$percentual_venda', '$preco_venda', '$quantidade_vendida');";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		setcookie('mensagem2', 'Venda Cadastrado com Sucesso!', time()+1);
		mysqli_close($connection);
		header("Location:index.php");
	}
	function cadastraCliente( $nome_cli, $endereco, $bairro, $estado, $cidade, $telefone, $cpf, $email){
		$connection=conectaBanco();
		$insere="	INSERT INTO cliente(nome_cli, endereco, bairro, estado, cidade, telefone, cpf, email) 
					VALUES('$nome_cli', '$endereco', '$bairro', '$estado', '$cidade', '$telefone', '$cpf', '$email');";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		setcookie('mensagem3', 'Cliente Cadastrado com Sucesso!', time()+1);
		mysqli_close($connection);
		header("Location:index.php");
	}
	function consultaMedicamento($nome){
		$connection=conectaBanco();
		$insere="SELECT * FROM medicamento WHERE nome_prod like '%$nome%'";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "<table><tr><th>Nome</th><th>laboratorio</th><th>Descrição</th><th>Lote</th><th>Data Fabricação</th><th>Data Validade</th><th>Custo</th><th>Quantidade</th></tr>";
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['cod_med'];
			echo "<tr><td>".$row['nome_prod']."</td><td>".$row['laboratorio']."</td><td>".$row['descricao']."</td><td>".$row['lote']."</td><td>".$row['data_fabr']."</td><td>".$row['data_validade']."</td><td>".$row['custo']."</td><td>".$row['quantidade']."</td></tr>";
		}
		echo "</table>";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function consultaLaboratorio($nome){
		$connection=conectaBanco();
		$insere="SELECT * FROM medicamento WHERE laboratorio like '%$nome%'";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "<table><tr><th>Nome</th><th>laboratorio</th><th>Descrição</th><th>Lote</th><th>Data Fabricação</th><th>Data Validade</th><th>Custo</th><th>Quantidade</th></tr>";
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['cod_med'];
			echo "<tr><td>".$row['nome_prod']."</td><td>".$row['laboratorio']."</td><td>".$row['descricao']."</td><td>".$row['lote']."</td><td>".$row['data_fabr']."</td><td>".$row['data_validade']."</td><td>".$row['custo']."</td><td>".$row['quantidade']."</td></tr>";
		}
		echo "</table>";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function consultaClienteNome($nome){
		$connection=conectaBanco();
		$insere="SELECT * FROM cliente WHERE nome_cli like '%$nome%'";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "<table><tr><th>Nome</th><th>Endereço</th><th>Bairro</th><th>Estado</th><th>Cidade</th><th>Telefone</th><th>CPF</th><th>Email</th></tr>";
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['id_cliente'];
			echo "<tr><td>".$row['nome_cli']."</td><td>".$row['endereco']."</td><td>".$row['bairro']."</td><td>".$row['estado']."</td><td>".$row['cidade']."</td><td>".$row['telefone']."</td><td>".$row['cpf']."</td><td>".$row['email']."</td><td>".
			"<a href=\"controle.php?id=$cod&alterar\">Alterar</a>"."</td><td>".
			"<a href=\"controle.php?id=$cod&excluir\">Excluir</a>"."</td></tr>";
		}
		echo "</table>";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function consultaClienteCPF($cpf){
		$connection=conectaBanco();
		$insere="SELECT * FROM cliente WHERE cpf='$cpf'";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "<table><tr><th>Nome</th><th>Endereço</th><th>Bairro</th><th>Estado</th><th>Cidade</th><th>Telefone</th><th>CPF</th><th>Email</th></tr>";
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['id_cliente'];
			echo "<tr><td>".$row['nome_cli']."</td><td>".$row['endereco']."</td><td>".$row['bairro']."</td><td>".$row['estado']."</td><td>".$row['cidade']."</td><td>".$row['telefone']."</td><td>".$row['cpf']."</td><td>".$row['email']."</td><td>".
			"<a href=\"controle.php?id=$cod&alterar\">Alterar</a>"."</td><td>".
			"<a href=\"controle.php?id=$cod&excluir\">Excluir</a>"."</td></tr>";
		}
		echo "</table>";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function listarTodosMedicamentos(){
		$connection=conectaBanco();
		$insere="SELECT * FROM medicamento";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "<table><tr><th>Nome</th><th>laboratorio</th><th>Descrição</th><th>Lote</th><th>Data Fabricação</th><th>Data Validade</th><th>Custo</th><th>Quantidade</th></tr>";
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['cod_med'];
			echo "<tr><td>".$row['nome_prod']."</td><td>".$row['laboratorio']."</td><td>".$row['descricao']."</td><td>".$row['lote']."</td><td>".$row['data_fabr']."</td><td>".$row['data_validade']."</td><td>".$row['custo']."</td><td>".$row['quantidade']."</td></tr>";
		}
		echo "</table>";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function listarTodasVendas(){
		$connection=conectaBanco();
		$insere="SELECT * FROM venda";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "<table><tr><th>Numero da Venda</th><th>Código do Medicamento</th><th>ID do Cliente</th><th>Data da Venda</th><th>Percentual da Venda</th><th>Preço da Venda</th><th>Quantidade Vendida</th></tr>";
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['cod_med'];
			echo "<tr><td>".$row['numero_venda']."</td><td>".$row['cod_med']."</td><td>".$row['id_cliente']."</td><td>".$row['data_venda']."</td><td>".$row['percentual_venda']."</td><td>".$row['preco_venda']."</td><td>".$row['quantidade_vendida']."</td></tr>";
		}
		echo "</table>";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function listarTodasVendasCliente($nome){
		$connection=conectaBanco();
		$insere="SELECT * FROM cliente WHERE nome_cli LIKE '%$nome%'";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		$cod=null;
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['id_cliente'];
		}
		mysqli_close($connection);
		if($cod==null){
			echo"Nome não encontrado.";
			echo"<br><br><a href='index.php'>Voltar</a>";
			return;
		}
		$connection=conectaBanco();
		$insere="SELECT * FROM venda WHERE id_cliente=$cod";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "<table><tr><th>Numero da Venda</th><th>Código do Medicamento</th><th>ID do Cliente</th><th>Data da Venda</th><th>Percentual da Venda</th><th>Preço da Venda</th><th>Quantidade Vendida</th></tr>";
		while($row = mysqli_fetch_array($ins)){
			$cod=$row['cod_med'];
			echo "<tr><td>".$row['numero_venda']."</td><td>".$row['cod_med']."</td><td>".$row['id_cliente']."</td><td>".$row['data_venda']."</td><td>".$row['percentual_venda']."</td><td>".$row['preco_venda']."</td><td>".$row['quantidade_vendida']."</td></tr>";
		}
		echo "</table>";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function excluirCliente($id){
		$connection=conectaBanco();
		$insere="DELETE FROM cliente WHERE id_cliente=$id";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		echo "Excluido com Sucesso";
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function geraFormularioCliente($id){
		$connection=conectaBanco();
		$insere="SELECT * FROM cliente WHERE id_cliente=$id";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		
		while($row = mysqli_fetch_array($ins)){
			echo "<div id='block1'><br><br><form method='post' name='formA' action='controle.php'>
				<fieldset><legend>Alterar Cliente</legend>

					<label for='nome'>Nome:</label><br>
					<input name='nome' type='text' value=".$row['nome_cli']."><br><br>

					<label for='endereco'>Endereço:</label><br>
					<input name='endereco' type='text' value=".$row['endereco']."><br><br>

					<label for='bairro'>Bairro:</label><br>
					<input name='bairro' type='text' value=".$row['bairro']."><br><br>

					<label for='estado'>Estado:</label><br>
					<input name='estado' type='text' value=".$row['estado']."><br><br>

					<label for='cidade'>Cidade:</label><br>
					<input name='cidade' type='text' value=".$row['cidade']."><br><br>

					<label for='telefone'>Telefone:</label><br>
					<input name='telefone' type='text' value=".$row['telefone']."><br><br>

					<label for='cpf'>CPF:</label><br>
					<input name='cpf' type='text' value=".$row['cpf']."><br><br>

					<label for='email'>Email:</label><br>
					<input name='email' type='email' value=".$row['email']."><br><br>

					<input name='id' type='hidden' value=".$row['id_cliente'].">
					
					<input type='submit' name='alterar_cliente' value='Alterar'>
				</fieldset>
			</form></div>";
		}
		mysqli_close($connection);
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	function alterarCliente($id, $nome_cli, $endereco, $bairro, $estado, $cidade, $telefone, $cpf, $email){
		$connection=conectaBanco();
		$insere="UPDATE cliente SET nome_cli='$nome_cli', endereco='$endereco', bairro='$bairro', estado='$estado', cidade='$cidade', telefone='$telefone', cpf='$cpf', email='$email' WHERE id_cliente=$id";
		$ins=mysqli_query($connection, $insere) or die(mysqli_error($connection));
		mysqli_close($connection);
	}

?>
</body>
</html>