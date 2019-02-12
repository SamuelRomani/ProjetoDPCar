<?php

require_once("cabecalho.php");

$idveiculo = $_POST['idveiculo'];
$combustivel = $_POST['combustivel'];
$portas = $_POST['portas'];
$cambio = $_POST['cambio'];
$ano_fab = $_POST['ano_fab'];
$ano_mod = $_POST['ano_mod'];
$km = $_POST['km'];
$estado = $_POST['estado'];
$preco = $_POST['preco'];
$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$cor = $_POST['cor'];
$tipo = $_POST['tipo'];

$arq_temp = $_FILES['foto']['tmp_name'];
$arq_nome = $_FILES['foto']['name'];

$nomefoto = md5(date("HisYmd"));


copy($arq_temp, "fotos/$nomefoto");
$foto = "fotos/$nomefoto";

if ($idveiculo == '') {
	$sql = "insert into veiculos (km, combustivel, portas, Tipo_idTipoVeiculo, cambio, ano_fab, ano_mod, estado, preco, placa, Modelos_idModelo, Cor_IdCor, foto) values ('$km', '$combustivel', '$portas', '$tipo', '$cambio', '$ano_fab', '$ano_mod', '$estado', '$preco', '$placa', '$modelo', '$cor','$foto' )";
}
else {
	$sql = "update veiculos set combustivel = '$combustivel', portas = '$portas', cambio = '$cambio', ano_fab = '$ano_fab', ano_mod = '$ano_mod', estado = '$estado', preco = '$preco', placa = '$placa', Cor_IdCor = '$cor', Modelos_idModelo = '$modelo', foto = '$foto', Tipo_idTipoVeiculo = '$tipo' where idVeiculo = $idveiculo";
}

if (mysqli_query($conexao, $sql)) {
	header("location: veiculos.php?ret=1");	
	echo "<br><br><br>" . $sql;
}
else {
	header("location: veiculos.php?ret=0");	
	echo "<br><br><br>" . $sql;
}

?>
