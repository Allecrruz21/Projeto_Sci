<?php
session_start();
include_once '../conexao/conectar.php';
$btnLogin = filter_input(INPUT_POST, 'logar', FILTER_SANITIZE_STRING);

$btncadastro = filter_input(INPUT_POST, 'cadastrar', FILTER_SANITIZE_STRING);

if ($btncadastro == true){

header("Location: menu.htmllll");	
	
}


if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'txtuser', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'txtpass', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_corretor, nome, usuario, senha FROM corretor WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conectar, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id_corretor'] = $row_usuario['id_corretor'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['usuario'] = $row_usuario['usuario'];
				$_SESSION['msg'] = $row_usuario['usuario'];
				header("Location: ../Paginas/menu.php");
				
			}else{
				 $_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: ../index.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: ../index.php");
	}

}else{
	
	header("Location: ../Paginas/corretor.php");
	
}
?>