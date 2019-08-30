<?php
//sessão
session_start();
//conexão
include_once '../conectar.php';

if(isset($_POST['salvarhtml'])):
	$Corretor = mysqli_escape_string($conectar, $_POST['cpnomecor']);
	$cpf = mysqli_escape_string($conectar, $_POST['cpcpfcor']);
	$creci = mysqli_escape_string($conectar, $_POST['cpcrecicor']);
	$telefone = mysqli_escape_string($conectar, $_POST['cptelcor']);
	$email = mysqli_escape_string($conectar, $_POST['cpemailcor']);
	$usuario = mysqli_escape_string($conectar, $_POST['cpuser']);
	//password_hash($senha, PASSWORD_DEFAULT);
	$senha = mysqli_escape_string($conectar, $_POST['cppass']);
	$senha2 = password_hash($senha, PASSWORD_DEFAULT); 
	 
	$sql = "INSERT INTO corretor (nome, cpf, creci, telefone, email, usuario, senha ) VALUES ('$Corretor', '$cpf', '$creci', '$telefone', '$email', '$usuario','$senha2')";
	
	if(mysqli_query($conectar, $sql)):
		$_SESSION['msg'] = "Cadastrado Realizado com Sucesso!";
		header('Location: ../corretorhtml.php');
	else:
		header('Location: ../corretor.htmnl');
		$_SESSION['mensagem'] = "Erro ao cadastrar o imóvel!";
	endif;
endif;

?>