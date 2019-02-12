<?php 
require_once("cabecalho.php")
?>
<body>
<div class="geral">
<a href='veiculos_editar.php' title='Editar'><input class="botao" type="submit" value="Inserir Novo"></a> <a href='marcas_editar.php' title='Editar'><input class="botao" type="submit" value="Inserir Nova Marca"></a> 
<Br><Br>
<?php	$sql = "select 
					v.idVeiculo,
					v.ano_fab,
					v.ano_mod,
					ma.nome_marca,
					mo.nome_mod,
					v.preco,
					v.foto
				from
					Veiculos v
					left join Modelos mo on mo.idModelo = v.Modelos_idModelo
					left join Marcas ma on ma.idMarca = mo.Marcas_idMarca
				where
					v.data_exclusao is null
				order by 
					v.preco";
		
		$resultado = mysqli_query($conexao, $sql);
		echo "<table><tr>";
		while ($dados = mysqli_fetch_array($resultado)) {
			$idVeiculo = $dados['idVeiculo'];
			$ano_fab = $dados['ano_fab'];
			$ano_mod= $dados['ano_mod'];
			$nome_marca = $dados['nome_marca'];
			$nome_mod = $dados['nome_mod'];
			$preco = $dados['preco'];
			$foto = $dados['foto'];

			echo "<td align='center'><img src='$foto' height=170px>
					<br>$nome_marca $nome_mod
					<br>$ano_fab / $ano_mod
					<Br><b>R$ $preco</b>
					<br>
						<a href='veiculos_editar.php?idveiculo=$idVeiculo' title='Editar'><img src='imagens/editar.png' width='18'></a>
						<a href='veiculos_visualizar.php?idveiculo=$idVeiculo' title='Visualizar'><img src='imagens/visualizar.png' width='18'></a>
						<a href='veiculos_excluir.php?idveiculo=$idVeiculo' title='Excluir' onClick='return valida_exc()'><img src='imagens/excluir.png' width='18'></a>
					</td>";
					
			
		}
		
		echo "</tr></table>";
			
?>									
</div>
</body>
<?php
require_once("rodape.php")
?>

