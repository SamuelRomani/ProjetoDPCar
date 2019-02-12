<?php
	require_once("cabecalho.php");
	
	if (isset($_GET['idveiculo'])) {
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
		}
	else {
		$idveiculo = '';
		$modelo = '';
		$cambio = '';
		$combustivel = '';
		$portas = '';
		$ano_fab = '';
		$ano_mod = '';
		$km = '';
		$estado = '';
		$preco = '';
		$placa = '';
		$tipo = '';
		$cor = '';
		$foto = '';
	}
	
?>

<body>
<div class="geral">
<form name="formulario" method="POST" enctype="multipart/form-data"  action="veiculos_salvar.php">
<center>
<input type="hidden" class="botao" name="idveiculo" value="<?php echo $idveiculo; ?>">
Marca/Modelo <select id="appearance-select" name="modelo">
		<option value="">--Selecione um opção--</option>
		<?php
			$sql = "select mo.idModelo as idmodelo, mo.nome_mod, ma.nome_marca from Modelos mo left join Marcas ma on ma.idMarca = mo.Marcas_idMarca order by ma.nome_marca, mo.nome_mod";
			$resultado = mysqli_query($conexao, $sql);

			while ($dados = mysqli_fetch_array($resultado)) {
				$idmodelo = $dados['idmodelo'];
				$nome_marca = $dados['nome_marca'];
				$nome_mod = $dados['nome_mod'];
				if ($idmodelo == $modelo) {
					echo "<option value='$idmodelo' selected>$nome_marca $nome_mod</option>";
				}
				else {
					echo "<option value='$idmodelo'>$nome_marca $nome_mod</option>";
				}
			}
		?>
	</select><br /> <br />
Combustivel <select name="combustivel" id="appearance-select">
		<option value="">--Selecione um opção--</option>
		<option value="1" <?php if ($combustivel == "1") echo "selected"; ?>>Diesel</option>
		<option value="2" <?php if ($combustivel == "2") echo "selected"; ?>>Etanol</option>
		<option value="3" <?php if ($combustivel == "3") echo "selected"; ?>>Flex</option>
		<option value="4" <?php if ($combustivel == "4") echo "selected"; ?>>Gasolina</option>			
		<option value="5" <?php if ($combustivel == "5") echo "selected"; ?>>Hibrido</option>	
	</select><br />
Portas <input type="text" name="portas" class="botao" size="10" maxlength="1" value="<?php echo $portas; ?>"><br /><br />
Cambio <select name="cambio" id="appearance-select">
		<option value="">--Selecione um opção--</option>
		<option value="1" <?php if ($cambio == "1") echo "selected"; ?>>Automatico</option>
		<option value="2" <?php if ($cambio == "2") echo "selected"; ?>>Manual</option>			
		</select><br />
Ano Fabricação <input type="text" name="ano_fab"  class="botao" size="10" value="<?php echo $ano_fab; ?>" maxlength="4"><br />
Ano Modelo <input type="text" name="ano_mod" size="10" class="botao" value="<?php echo $ano_mod; ?>" maxlength="4"><br />
KM <input type="text" name="km" size="10" maxlength="10" class="botao" value="<?php echo $km; ?>"><br /> <br />
Estado <select name="estado" id="appearance-select" value="<?php echo $estado; ?>">
		<option value="">--Selecione um opção--</option>
		<option value="1" <?php if ($estado == "1") echo "selected"; ?>>Novo</option>
		<option value="2" <?php if ($estado == "2") echo "selected"; ?>>Seminovo</option>	
		</select><br />
Preço <input type="text" class="botao" name="preco" size="10" maxlength="10" value="<?php echo $preco; ?>"><br />
Placa <input type="text" name="placa" class="botao" size="10" maxlength="8" value="<?php echo $placa; ?>"><br /> <br />
Tipo <select name="tipo" id="appearance-select">
		<option value="">--Selecione um opção--</option>
		<?php
			$sql = "select tv.nome_tipoVeiculo as nomeveiculo, tv.idTipoVeiculo as tipoveiculo from TipoVeiculo tv";
			$resultado = mysqli_query($conexao, $sql);

			while ($dados = mysqli_fetch_array($resultado)) {
				$nomeveiculo = $dados['nomeveiculo'];
				$tipoveiculo = $dados['tipoveiculo'];
				if ($tipo == $tipoveiculo) {
					echo "<option value='$tipoveiculo' selected>$nomeveiculo</option>";
				}
				else {
					echo "<option value='$tipoveiculo'>$nomeveiculo</option>";
				}
			}
		?>
	</select><br /><br />
Cor <select name="cor" id="appearance-select" value="<?php echo $cor; ?>">
		<option value="">--Selecione um opção--</option>
		<?php
			$sql = "select IdCor as idcor, nome_cor from Cor";
			$resultado = mysqli_query($conexao, $sql);

			while ($dados = mysqli_fetch_array($resultado)) {
				$idcor = $dados['idcor'];
				$nome_cor = $dados['nome_cor'];
				if ($cor == $idcor) {
					echo "<option value='$idcor' selected>$nome_cor</option>";
				}
				else {
					echo "<option value='$idcor'>$nome_cor</option>";
				}
			}
		?>
	</select><br />
Foto <input type="file" class="botao" name="foto" value="<?php echo $foto; ?>">
<br /><br />
<input class="botao" type="submit" value="Salvar"> &nbsp; &nbsp; 
<input class="botao" type="reset" value="Limpar">
</center>
</form>

</div>
</body>
<?php
	require_once("rodape.php");
?>
