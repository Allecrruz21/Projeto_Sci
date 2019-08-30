<?php
//sessão
session_start();
//conexão
require_once '../conexao/conectar.php';

if(isset($_POST['exclui'])):
	$id = mysqli_escape_string($conectar, $_POST['id']);
	
	$sql = "DELETE FROM imovel WHERE codigo_base = '$id'";
	
	if(mysqli_query($conectar, $sql)):
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../paginas/gerenciar.php');
	else:
		header('Location: ../erro.php?');
		$_SESSION['mensagem'] = "Erro ao deletar!";
	endif;
endif;

?>