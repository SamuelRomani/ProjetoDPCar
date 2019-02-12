<?php
	require_once("cabecalho.php");
	?>
	<div class="geral">
<?php
	if (!isset($_GET['idveiculo']))
		header("location: veiculos.php");
	
	
	$idVeiculo = $_GET['idveiculo'];
	
	$sql = "select
				count(idveiculo) as qtd
			from
				veiculos
			where
				idveiculo = $idveiculo";
	
	$resultado = mysqli_query($conexao, $sql);
	$dados = mysqli_fetch_array($resultado);
	$qtd = $dados['qtd'];
	
	if ($qtd == 0)
		header("location: veiculos.php");

	$data = date("Y-m-d H:i:s");
	$sql = "update Veiculos set data_exclusao = '$data' where idVeiculo = $idVeiculo";
	
	if (mysqli_query($conexao, $sql)) {
		header("location: veiculos.php?ret=2");	
	}
	else {
		header("location: veiculos.php?ret=3");	
	}
?>
</div>