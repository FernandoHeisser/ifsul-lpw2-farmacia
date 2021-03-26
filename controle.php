<?php
	include("func.php");

	if(isset($_POST['cadastrar_medicamento'])){
		cadastraMedicamento($_POST['nome_prod'], $_POST['laboratorio'], $_POST['descricao'], $_POST['lote'], $_POST['data_fabr'], $_POST['data_validade'], $_POST['custo'], $_POST['quantidade']);
	}
	elseif(isset($_POST['cadastrar_venda'])){
		cadastraVenda($_POST['cod_med'], $_POST['id_cliente'], $_POST['data_venda'], $_POST['percentual_venda'], $_POST['preco_venda'], $_POST['quantidade_vendida']);
	}
	elseif(isset($_POST['cadastrar_cliente'])){
		cadastraCliente($_POST['nome_cli'], $_POST['endereco'], $_POST['bairro'], $_POST['estado'], $_POST['cidade'], $_POST['telefone'], $_POST['cpf'], $_POST['email']);
	}
	elseif(isset($_POST['consultar_medicamento'])){
		consultaMedicamento($_POST['nome_medicamento']);
	}
	elseif(isset($_POST['consultar_cliente'])){
		if(!empty($_POST['nome_cli'])){
			consultaClienteNome($_POST['nome_cli']);	
		}
		elseif(!empty($_POST['cpf'])){
			consultaClienteCPF($_POST['cpf']);
		}
	}
	elseif(isset($_POST['consultar_laboratorio'])){
		consultaLaboratorio($_POST['nome_laboratorio']);
	}
	elseif(isset($_POST['listar_todos_medicamentos'])){
		listarTodosMedicamentos();
	}
	elseif(isset($_POST['listar_todas_vendas'])){
		listarTodasVendas();
	}
	elseif(isset($_POST['listar_todas_vendas_cliente'])){
		listarTodasVendasCliente($_POST['nome_cliente']);
	}
	elseif(isset($_GET['excluir'])){
		$id=$_GET['id'];
		echo "<div style=\" width: 25%; \"><form method='post' name='form1' action='controle.php'>
			<label>Tem Certeza que Deseja Excluir este Cliente?</label><br>
			<input style=\" width: 25%; \" name='botao' id='sim' value='sim' type='radio'><label for='sim'>Sim</label>
			<input style=\" width: 25%; \" name='botao' id='nao' value='nao' type='radio'><label for='nao'>Não</label><br><br>
			<input style=\" width: 25%; \" name='id' type='hidden' value=$id>
			<input name='confirma' type='submit' value='Confirmar'><br>
		</form></div>";
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	elseif(isset($_POST['id']) and isset($_POST['botao']) and isset($_POST['confirma'])){
		if($_POST['botao']=='sim')
			excluirCliente($_POST['id']);
		elseif($_POST['botao']=='nao')
			header("Location:index.php");
	}
	elseif(isset($_GET['alterar'])){
		$id=$_GET['id'];
		geraFormularioCliente($id);
	}
	elseif(isset($_POST['alterar_cliente'])){
		alterarCliente($_POST['id'], $_POST['nome'], $_POST['endereco'], $_POST['bairro'], $_POST['estado'], $_POST['cidade'], $_POST['telefone'], $_POST['cpf'], $_POST['email']);
		echo "Alteração Concluida!";
		echo"<br><br><a href='index.php'>Voltar</a>";
	}
	elseif (isset($_GET['sub'])) {
		if($_GET['select']=='op1'){
			header("Location:cadastra_medicamento.php");
		}
		elseif($_GET['select']=='op2'){
			header("Location:cadastra_cliente.php");
		}
		elseif($_GET['select']=='op3'){
			header("Location:cadastra_venda.php");	
		}
		elseif($_GET['select']=='op4'){
			header("Location:consultas.php");	
		}
	}
?>