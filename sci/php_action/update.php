<?php
//sessão
session_start();
//conexão
require_once '../conexao/conectar.php';

if(isset($_POST['btn-salvar'])):
	$tipo_imovel = $_POST['tipo_imovel'];
	$cidade =  $_POST['cidade'];
	$bairro =  $_POST['bairro'];
	$situacao_imovel =  $_POST['situacao_imovel'];
	$valor_imovel =  $_POST['valor_imovel'];
	$id =  $_POST['codigo_base'];
	$codigo_base = $_POST ['codigo_base'];
	$chaves =  $_POST['chaves'];
	$estado = $_POST ['estado'];
	$cep = $_POST ['cep'];
	$numero = $_POST ['numero'];
	$rua = $_POST ['rua'];
	$complemento = $_POST ['complemento'];
	//$ano_de_construcao = $_POST ['ano_de_construcao'];
	//$estado_imovel = $_POST ['estado_imovel'];
	$tamanho_imovel = $_POST ['tamanho_imovel'];
	$quarto = $_POST ['quarto'];
	$suite = $_POST ['suite'];
	$wc_social = $_POST ['wc_social'];
	$garagem = $_POST ['Garagem'];
	$sala = $_POST ['sala'];
	$imovel = $_POST ['imovel'];
	$posicao_do_sol = $_POST ['posicao_do_sol'];
	//$observacao = $_POST ['observacao'];
	
	$sql = "UPDATE imovel SET tipo_imovel = '$tipo_imovel', cidade = '$cidade', bairro = '$bairro', rua = '$rua', situacao_imovel = '$situacao_imovel', valor_imovel = '$valor_imovel',chaves_imovel = '$chaves',estado = '$estado',cep='$cep',numero='$numero',complemento='$complemento',tamanho_imovel='$tamanho_imovel',quarto='$quarto',suite='$suite',WC_social='$wc_social',garagem='$garagem',sala='$sala',imovel='$imovel',posicao_do_sol='$posicao_do_sol' WHERE codigo_base = '$id'";

	if(mysqli_query($conectar, $sql)):
		$_SESSION['msg'] = "Atualizado com sucesso!";
		header('Location: ../Paginas/gerenciar.php');
	else:
	
        header('Location: ../erro.php?');
		$_SESSION['mensagem'] = "Erro ao atualizar!";
	endif;

endif;
