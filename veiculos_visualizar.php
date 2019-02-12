<?php 
require_once("cabecalho.php")

	if (!isset($_GET['idveiculo'])) {
		header("location: veiculos.php");
	}

	$idveiculo = $_GET['idveiculo'];
	
	$sql = "select
					idVeiculo,
					Modelos_idModelo as modelo,
					combustivel,
					portas,
					cambio,
					ano_fab,
					ano_mod,
					km,
					estado,
					preco,
					placa,
					Tipo_idTipoVeiculo as tipo,
					Cor_IdCor as cor,
					foto
				from
					veiculos
				where
					idveiculo = $idveiculo";
	
	$resultado = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($resultado);

		$modelo = $dados['modelo'];
		$cambio = $dados['cambio'];
		$combustivel = $dados['combustivel'];
		$portas = $dados['portas'];
		$ano_fab = $dados['ano_fab'];
		$ano_mod = $dados['ano_mod'];
		$km = $dados['km'];
		$estado = $dados['estado'];
		$preco = $dados['preco'];
		$placa = $dados['placa'];
		$tipo = $dados['tipo'];
		$cor = $dados['cor'];
		$foto = $dados['foto'];

	if ($combustivel =="1")
		$combustivel = "Diesel";
	elseif ($combustivel =="2")
		$combustivel = "Etanol";
	elseif ($combustivel =="3")
		$combustivel = "Flex";
	elseif ($combustivel =="4")
		$combustivel = "Gasolina";
	elseif ($combustivel =="5")
		$combustivel = "Hibrido";

	if ($cambio =="1")
		$cambio = "Automatico"
	elseif ($cambio =="2")
		$cambio = "Manual";
		
	if ($estado =="1")
		$estado = "Novo"
	elseif ($estado =="2")
		$estado = "Seminovo";
		
	if ($tipo =="1")
		$tipo = "Carro"
	elseif ($tipo =="2")
		$tipo = "Caminhonete";
	elseif ($tipo =="3")
		$tipo = "Caminhao";
	elseif ($tipo =="4")
		$tipo = "Moto";
		
	if ($cor =="1")
		$cor = "Azul"
	elseif ($cor =="1")
		$cor = "Branco";
	elseif ($cor =="2")
		$cor = "Vermelho";
	elseif ($cor =="3")
		$cor = "Preto";
	elseif ($cor =="4")
		$cor = "Prata";
	elseif ($cor =="5")
		$cor = "Caminhao";
	elseif ($cor =="6")
		$cor = "Moto";
}
	
?>

<h2>Funcionário</h2>
<table width="100%">
	<tr>
		<td align="center" width="180">
			<img src="<?php echo $foto; ?>" width="160">
		</td>
		<td>
			<input type="hidden" name="idveiculo" value="<?php echo $idveiculo; ?>">
			Nome <input type="text" name="nome" value="<?php echo $nome; ?>" size="60" maxlenght="60"><br />
			Cargo <input type="text" name="cargo" value="<?php echo $cargo; ?>" size="60" maxlenght="60"><br />
			Data de nascimento <input type="text" name="data_nascimento" value="<?php echo $data_nascimento; ?>" size="10" maxlenght="10"><br />
			CPF <input type="text" name="cpf" value="<?php echo $cpf; ?>" size="11" maxlenght="11"><br />
			E-mail <input type="text" name="email" value="<?php echo $email; ?>" size="60" maxlenght="250"><br />
			Sexo <input type="text" name="email" value="<?php echo $sexo; ?>" size="10" maxlenght="10"><br /><br />
			
			<input type="button" value="Voltar" onClick="location.href='funcionario.php'">

		</td>
	</tr>
</table>



</form>


<?php
	require_once("rodape.php");
?>
