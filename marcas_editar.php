<?php
	require_once("cabecalho.php");
		
	if (isset($_GET['idMarca'])) {
		$idmarca = $_GET['idMarca'];
		
		$sql = "select
					idMarca,
					nome_marca
				from
					marcas
				where
					id<arca = $idMarca";
		
		$resultado = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($resultado);

		$idMarca = $dados['idMarca'];
		$nome_marca = $dados['nome_marca'];
		}
	else {
		$idMarca = '';
		$nome_marca = '';
	}
	
?>

<body>
<div class="geral">
<form name="formulario" method="POST" enctype="multipart/form-data"  action="marcas_salvar.php">
<center>
<input type="hidden" class="botao" name="idmarca" value="<?php echo $idmarca; ?>">
Marca <input type="text" name="marca" class="botao" size="20" maxlength="20" value="<?php echo $nome_marca; ?>"><br /><br />
<br /> <br />
<input class="botao" type="submit" value="Salvar"> &nbsp; &nbsp; 
<input class="botao" type="reset" value="Limpar">
</div>
</body>
<?php
require_once("cabecalho.php");
?>