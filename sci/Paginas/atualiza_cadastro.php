<?php
//conexão
include_once '../conexao/conectar.php';

//select
if(isset($_GET['id'])):
	$id = mysqli_escape_string($conectar, $_GET['id']);
	            $query = "SELECT * FROM imovel where codigo_base = '$id'";
				$seleciona_imovel = mysqli_query($conectar, $query);
				$linha = mysqli_fetch_array($seleciona_imovel);
               

endif;
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
    <title>Captação - SCI</title>
  </head>
  <body>
    
	<header>
	<h1>Sistema de Captação de Imóveis</h1>	
	</header>
	</br></br>
	

	<h4> Editar Dados do imóvel</h4>
	
	<form action="../php_action/update.php" method="post" class="envio" enctype="multipart/form-data">
		  <div class="form-row">
  
			<div class="form-group col-md-2">
			  <label>CEP</label>
			  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: 00.000-000" name="cep" maxlength="10" value="<?php echo $linha['cep']; ?>">
			</div>
		  <div class="form-group col-md-5">
			<label>Endereço</label>
			<input type="text" id="cxtxt" class="texto" placeholder="Ex.: Rua do Brasil" name="rua" maxlength="30" value="<?php echo $linha['rua']; ?>">
		  </div>
		  <div class="form-group  col-md-3">
			<label>Bairro</label>
			<input type="text" id="cxtxt" class="texto" placeholder="Ex.: Jardim das Acácias" name="bairro" maxlength="20" value="<?php echo $linha['bairro']; ?>">
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-2">
			  <label>Cidade</label>
			  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: Recife" name="cidade" maxlength="20" value="<?php echo $linha['cidade']; ?>">
			</div>
			<div class="form-group col-md-1">
			  <label>Número</label>
			  <input type="int" id="cxtxt" class="texto" placeholder="0000" name="numero" maxlength="6" value="<?php echo $linha['numero']; ?>">
			</div>
			<div class="form-group col-md-1">
			  <label>Estado</label>
			  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: PE" name="estado" maxlength="2"value="<?php echo $linha['estado']; ?>">
			</div>
			<div class="form-group col-md-6">
			  <label>Complemento</label>
			  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: próximo ao supermercado" name="complemento" maxlength="35" value="<?php echo $linha['complemento']; ?>">
			</div>
			<div class="form-group col-md-2">
				<label>Valor</label>
				<input type="text" id="cxtxt" class="texto" placeholder="Ex.: R$ 1.000,00" name="valor_imovel"value="<?php echo $linha['valor_imovel']; ?>">
			</div>	
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
				  <label>Tipo de imóvel</label>
				  <select type="text" name="tipo_imovel" class="form-control" id="cxtxt">
					<option><?php echo $linha['tipo_imovel']; ?></option>
					<option>Casa</option>
					<option>Apartamento</option>
					<option>Flat</option>
					<option>Kitnet</option>
					<option>Galpão</option>
					<option>Loja</option>
					<option>Sala Comercial</option>
					<option>Terreno</option>
					<option>Lote</option>
				  </select>
				</div>
				<div class="form-group col-md-2">
				  <label>Situação</label>
				  <select id="inputState" class="form-control" id="cxtxt" name="situacao_imovel">
					<option> <?php echo $linha['situacao_imovel']; ?></option>
					<option>Venda</option>
					<option>Aluguel</option>
				  </select>
				</div>
				<div class="form-group col-md-2">
				  <label>Posição do sol</label>
				  <select id="inputState" class="form-control" id="cxtxt" name="posicao_do_sol">
					<option> <?php echo $linha['posicao_do_sol']; ?></option>
					<option>Nascente</option>
					<option>Poente</option>
				  </select>
				</div>
				<div class="form-group col-md-2">
				  <label>Estadia</label>
				  <select id="inputState" class="form-control" id="cxtxt" name="imovel">
					<option selected> <?php echo $linha['imovel']; ?></option>
					<option>Residencial</option>
					<option>Comercial</option>
				  </select>
					</div>
					<div class="form-group col-md-2">
					  <label>Chaves</label>
					  <select name="chaves" class="form-control" id="cxtxt">
						<option><?php echo $linha['chaves_imovel']; ?></option>
						<option>Proprietário</option>
						<option>Imóvel</option>
						<option>Corretor</option>
						<option>Imobiliária</option>
					  </select>
					</div>	
				<div class="form-group col-md-1">
				  <label>Tamanho</label>
				  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: 12x20" name="tamanho_imovel" value="<?php echo $linha['tamanho_imovel']; ?>">
				</div>
				<div class="form-group col-md-1">
				  <label>Ano</label>
				  <input type="text" id="cxtxt" name="ano_de_contrucao" class="texto" placeholder="Ex.: 1900" value="<?php echo $linha['ano_de_construcao']; ?>">
				</div>	
				</div>
				</br>
				<h6>No imóvel</h6>
			  <div class="form-row">
				<div class="form-group col-md-1">
					<label>Quartos</label>
					<input type="number" name="quarto" id="cxtxt" min="1" max="10"value="<?php echo $linha['quarto']; ?>"/>
				</div>
				<div class="form-group col-md-1">
					<label>Suíte</label>
					<input type="number" name="suite" id="cxtxt" min="0" max="10" value="<?php echo $linha['suite']; ?>"/>
				</div>
				<div class="form-group col-md-1">
					<label>Wc Social</label>
					<input type="number" name="wc_social" id="cxtxt" min="0" max="10" value="<?php echo $linha['WC_social']; ?>"/>
				</div>
				<div class="form-group col-md-1">
					<label>Garagem</label>
					<input type="number" name="Garagem" id="cxtxt" min="0" max="10" value="<?php echo $linha['Garagem']; ?>"/>
				</div>
				<div class="form-group col-md-1">
					<label>Salas</label>
					<input type="number" name="sala" id="cxtxt" min="0" max="10"value="<?php echo $linha['sala']; ?>"/>
				</div>
			  </div>
				
					 <div id="espaco"></div>
					  
						  <div class="buttons">
							<button class="btnsalvar" type="submit" name="btn-salvar">Salvar</button> &nbsp; 
							<button type="reset" class="btnlimpar" name="limpa">Limpar</button>
							<a href="gerenciar.php"><button type="button"class="btnvoltar" name="voltapag">sair</button></a>
						  </div>
					  </form>
					 
					  </br><div id="espaco">
					  
					  </div>
			

					 
						<footer><label id="rodape">S.C.I - Versão: 1.0.0 - &copy;Copyright 2018</label></footer>
					
				  </body>
				</html>