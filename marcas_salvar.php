<?php

require_once("cabecalho.php");

$idMarca = $_POST['idMarca'];
$nome_marca = $_POST['nome_marca'];

if ($idmarca == '') {
	$sql = "insert into marcas (idMarca, nome_marca) values ('$idMarca','$nome_marca')";
}
if (mysqli_query($conexao, $sql)) {
	//header("location: inicio.php?ret=1");
	echo "<br><br><br>" . $sql;
}
else {
	//header("location: inicio.php?ret=0");	
	echo "<br><br><br>" . $sql;
}

?>
