<?php 
//conexão
include_once '../conexao/conectar.php';

session_start();

?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../_css/bootstrap.css">
	<link rel="stylesheet" href="../_css/bootstrap.min.css">
	<link rel="stylesheet" href="../_css/estilo.css">
	<link rel="icon" href="../_sources\icon2.png" type= "image/x-icon"/>
    <title>Menu - SCI</title>
  </head>
  <body>
    
	<header><h1>Sistema de Captação de Imóveis</h1></header>
	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	
	  <a class="navbar-brand" href="#">&nbsp;&nbsp S.C.I - 1.0.0</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		 
			
		  <li class="nav-item">
			<a class="nav-link" href="sobre.html">Sobre</a>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Módulos
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="cadastro.php">Captar imóvel</a>
			  <a class="dropdown-item" href="gerenciar.php">Gerenciar imóvel</a>
               <a class="dropdown-item" href= "https://www.sciportal.epizy.com/"target="_blank">Portal</a>
			<a class="dropdown-item" href="../php_action/sair.php">Sair</a>
			  
			</div>
		  </li>
		</ul>
	<div id="texto_menu_mensg">
	 <?php 
	   if(isset($_SESSION['msg'])){ 
		echo "Bem Vindo: ".$_SESSION['msg']; 
		}
	 ?>
	</div>
	  </div>
	</nav>

	<div id="espaco2"></div>
			<div class="container">
				<div id="central">
		
		<div class="card" id="caixa">
		  <div class="card-body">
		  <img src="../_sources\home.png">
			<label id="infx">Aluguel</label> &nbsp; <p class="card-text" id="inf" name="inf1"><?php $query = "SELECT COUNT(situacao_imovel) AS contador FROM imovel where situacao_imovel = 'Aluguel'";
				$seleciona_imovel = mysqli_query($conectar, $query);
				$linha = mysqli_fetch_array($seleciona_imovel); echo $linha['contador'];?></p>
		  </div>
		</div>
		
		<div class="card" id="caixa">
		  <div class="card-body">
		  <img src="../_sources\home.png">
			<label id="infx">Venda</label> &nbsp;
			<p class="card-text" id="inf" name="inf2"><?php $query = "SELECT COUNT(situacao_imovel) AS contador FROM imovel where situacao_imovel = 'Venda'";
				$seleciona_imovel = mysqli_query($conectar, $query);
				$linha = mysqli_fetch_array($seleciona_imovel); echo $linha['contador'];?></p>
		  </div>
		</div>
		
		<div class="card" id="caixa">
		  <div class="card-body">
		  <img src="../_sources\home.png">
			<label id="infx">Total</label> &nbsp;
			<p class="card-text" id="inf" name="inf3"><?php $query = "SELECT COUNT(situacao_imovel) AS contador FROM imovel where situacao_imovel in('Aluguel','Venda')";
				$seleciona_imovel = mysqli_query($conectar, $query);
				$linha = mysqli_fetch_array($seleciona_imovel); echo $linha['contador'];?></p>
		  </div>
		</div>
				</div>
			</div>
			
			<div id="espaco2"></div><div id="espaco2"></div><div id="espaco3"></div>
	<footer><label id="rodape">S.C.I - Versão: 1.0.0 - &copy;Copyright 2018</label></footer>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>

	
  
	<script src="_js/bootstrap.bundle.js"></script>
	<script src="_js/bootstrap.bundle.min.js"></script>
	<script src="_js/bootstrap.js"></script>
	<script src="_js/bootstrap.min.js"></script>
	<script src="_js/popper.min.js"></script>
	<script src="_js/jquery.min.js"></script>
	<script src="_js/jquery-3.3.1.slim.min.js"></script>