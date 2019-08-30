<?php
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
	<link rel="icon" href="../_sources/icon2.png" type= "image/x-icon"/>
		<script type="text/javascript" src="../_js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../_js/jquery.mask.min.js"></script>
	
	
		
    <title>Captação - SCI2</title>
	
  </head>
  <body>
    
	<header>
	<h1>Sistema de Captação de Imóveis</h1>	
	</header>
	</br></br>

	<h4>Incluir Mais Fotos</h4>
	
	<form action="../php_action/imagem_valida.php" method="post" class="envio" enctype="multipart/form-data">
		  
			
				
				
					<div class="form-group" id="fotosimovel">
						<label id="lblfoto">Foto do imóvel</label>&nbsp;<input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagem">
					</div>	
					
					</br>
					
					 <div id="espaco"></div>
					  
						  <div class="buttons">
							<button class="btnsalvar" type="submit" value="OK">Salvar</button> &nbsp; 
							<a href="menu.php"><button type="button"class="btnvoltar" name="limpa">sair</button></a>
						  </div>
					  </form>
					 
					  </br>
					  <div id="espaco"> </div>
			

					 
						<footer><label id="rodape">S.C.I - Versão: 1.0.0 - &copy;Copyright 2018</label></footer>

					
				  </body>
				</html>