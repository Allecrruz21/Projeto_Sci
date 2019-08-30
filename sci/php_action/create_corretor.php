<?php
//sessão
session_start();
//conexão
include_once '../conexao/conectar.php';

if(isset($_POST['salva'])):
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
		$_SESSION['mensagem'] = "Corretor cadastrado com sucesso!";
		$_SESSION['msg'] = $usuario;
		header('Location: ../Paginas/menu.php');
	else:
		header('Location: ../corretorrrr.html');
		$_SESSION['mensagem'] = "Erro ao cadastrar o imóvel!";
	endif;

	
else:

header('Location: ../Paginas/login.php');	
	
endif;

?>