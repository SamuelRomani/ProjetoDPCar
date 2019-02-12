
<link rel="stylesheet" href="css/formteste.css"> 
<html>
   <fieldset>
   <fieldset class="grupo">
   <input type="hidden" name="idveiculo" value="<?php echo $idveiculo; ?>">
   <div class="campo">
	Marca/Modelo <select name="modelo">
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
	</select>
	</div>
	<div class="campo">
	Combustivel <select name="combustivel">
		<option value="">--Selecione um opção--</option>
		<option value="1" <?php if ($combustivel == "1") echo "selected"; ?>>Diesel</option>
		<option value="2" <?php if ($combustivel == "2") echo "selected"; ?>>Etanol</option>
		<option value="3" <?php if ($combustivel == "3") echo "selected"; ?>>Flex</option>
		<option value="4" <?php if ($combustivel == "4") echo "selected"; ?>>Gasolina</option>			
		<option value="5" <?php if ($combustivel == "5") echo "selected"; ?>>Hibrido</option>	
	</select>
	</div>
	<div class="campo">
	Portas <input type="text" name="portas" size="10" maxlength="1" value="<?php echo $portas; ?>"
	</div>
	<div class="campo">
	Cambio <select name="cambio">
		<option value="">--Selecione um opção--</option>
		<option value="1" <?php if ($cambio == "1") echo "selected"; ?>>Automatico</option>
		<option value="2" <?php if ($cambio == "2") echo "selected"; ?>>Manual</option>			
		</select
	</div>
		</fieldset>
        <fieldset class="grupo">
            <div class="campo">
        KM <input type="text" name="km" size="10" maxlength="10" value="<?php echo $km; ?>">
		</div>
		<div class="campo">
		Estado <select name="estado" value="<?php echo $estado; ?>">
		</div>
		<div class="campo">
		<option value="">--Selecione um opção--</option>
		<option value="1" <?php if ($estado == "1") echo "selected"; ?>>Novo</option>
		<option value="2" <?php if ($estado == "2") echo "selected"; ?>>Seminovo</option>	
		</select>
		</div>
		<div class="campo">
		Preço <input type="text" name="preco" size="10" maxlength="10" value="<?php echo $preco; ?>">
		</div>
		<div class="campo">
		Placa <input type="text" name="placa" size="10" maxlength="8" value="<?php echo $placa; ?>">
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
		</select>
		</div>
        </fieldset>
        <div class="campo">
            <label>Sexo</label>
            <label>
                <input type="radio" name="sexo" value="masculino"> Masculino
            </label>
            <label>
                <input type="radio" name="sexo" value="feminino"> Feminino
            </label>
        </div>
        <div class="campo">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" style="width: 20em" value="">
        </div>
        <div class="campo">
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" style="width: 10em" value="">
        </div>

        <fieldset class="grupo">
            <div class="campo">
                <label for="cidade">Ano fabricação</label>    
			<input type="text" name="ano_fab" style="width: 10em" value="<?php echo $ano_fab; ?>" maxlength="4">
            </div>
            <div class="campo">
                <label for="estado">Ano modelo</label>
                 <input type="text" name="ano_mod" style="width: 10em" value="<?php echo $ano_mod; ?>" maxlength="4">
                   
            </div>
        </fieldset>

        <div class="campo">
        <label for="mensagem">Cor</label>
        <select name="cor" value="<?php echo $cor; ?>">
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
        </div>

        <div class="campo">
            <label>Foto</label>
            <label>
                <input type="file" name="foto" value="<?php echo $foto; ?>">
            </label>
        </div>

        <input class="botao" type="submit" value="Salvar">
		<input class="botao" type="reset" value="Limpar">
    </fieldset>
</html>