<?php
session_start();

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../_css/bootstrap.css">
	<link rel="stylesheet" href="../_css/estilo.css">
	<link rel="icon" href="../_sources\icon2.png" type= "image/x-icon"/>
    <script type="text/javascript" src="../_js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="_js/jquery.mask.min.js"></script>
		<script type="text/javascript">
		//FUNÇÃO PARA APLICAR FORMATAÇÃO NOS CAMPOS//
		$(document).ready(function(){
			$("#creci").mask("00.000")
			$("#cxtxtcpfprop").mask("000.000.000-00")
			$("#cxtxtcelprop").mask("(00) 0000-00009")
			$("#cxtxtcelprop").blur(function(event){
				if ($(this).val().length == 15){
					$("#cxtxtcelprop").mask("(00) 00000-0009")
				}else{
					$("#cxtxtcelprop").mask("(00) 0000-00009")
				}
			})
			$("#cxtxtrgprop").mask("999.999.999-W", {
				translation: {
					'W': {
						pattern: /[X0-9]/
					}
				},
				reverse: true
			})
			
				})
		</script>
			
    <title>Cadastro Corretor - SCI</title>
  </head>
  <body>
    
	<header><h1>Sistema de Captação de Imóveis</h1></header>
	
	
	
	
			
			<div  id="cadimob">
			<h5>Cadastre-se aqui corretor</h5>
			<form action="../php_action/create_corretor.php" method="post">
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="inputnome">Nome do corretor</label>
				  <input type="text" class="texto" id="cxtxt" name="cpnomecor" placeholder="Corretor">
				</div>
				<div class="form-group col-md-6">
				  <label for="inputcpf">CPF</label>
				  <input type="text" class="texto" id="cxtxt" name="cpcpfcor" placeholder="CPF">
				</div>
			  </div>
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="inputcreci">Creci</label>
				  <input type="text" class="texto" id="cxtxt" name="cpcrecicor" placeholder="CRECI">
				</div>
				<div class="form-group col-md-6">
				  <label for="inputfone">Telefone</label>
				  <input type="text" class="texto" id="cxtxt" name="cptelcor" placeholder="(00) 00000.0000">
				</div>
			  </div>
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="inputemail">E-mail</label>
				  <input type="email" class="texto" id="cxtxt" name="cpemailcor" placeholder="E-mail">
				</div>
				<div class="form-group col-md-2">
				  <label for="inputuser">Usuário</label>
				  <input type="text" class="texto" id="cxtxt" name="cpuser" placeholder="USUÁRIO">
				</div>
				<div class="form-group col-md-2">
				  <label for="inputpass">Senha</label>
				  <input type="password" class="texto" id="cxtxt" name="cppass" placeholder="******">
				</div>
			  </div>
				<button type="submit" name="salva" class="btn btn-primary">Salvar</button> &nbsp; <button type="reset" name="limpa" class="btn btn-warning">Limpar</button>&nbsp; <button type="return" name="voltar" class="btn btn-warning">voltar</button>
				</form>
			</div>
	
	
	
	
	
	
	
	

	
	<footer><label id="rodape">S.C.I - Versão: 1.0.0 - &copy;Copyright 2018</label></footer>
	
	<script src="_js/jquery-3.3.1.slim.min.js"></script>
    <script src="_js/bootstrap.min.js"></script>
  </body>
</html>