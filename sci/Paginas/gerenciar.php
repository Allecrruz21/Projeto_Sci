<?php
include_once '../conexao/conectar.php';

session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../_src\_img\favicon.png" type= "image/x-icon"/>
		<title>gerenciar</title>
		


		<link href="../_css/bootstrap.css" rel="stylesheet">
		<link href="../_css/estilo.css" rel="stylesheet">
		
		
	</head>

	<body>
	<header>
	<h1>Sistema de Captação de Imóveis</h1>	
	</header>
	</br>
	
	</br></br>
	<div id="filtro"></br>
          <div id="texto_menu_mensg">
           <?php 
	if(isset($_SESSION['msg'])){ 
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
		}
		?>
			</div>
	
		<form id="relatorio" method="post" action="gerenciar.php">
	<div class="container" id="frmbranco">
		<div class="page-header">
			<h4>Gerencie seus imóveis</h4>
		</div>
		
		<div class="row opcoes">
			<div class="col-md-12">
				
				<label>Tipo de imóvel:&nbsp;</label><table class="table">
					<thead>
					<tr>
					<select name="tipo-imovel">
<option>-</option>
<option>Casa</option>
<option>Apartamento</option>
<option>Flat</option>
<option>Galpão</option>
<option>Loja</option>
<option>Sala comercial</option>
<option>Terreno</option>
<option>Lote</option>
<option>Kitnet</option>
</select> 

<label for="tpsit">Situação do imóvel:&nbsp;</label>
<select name="interesse">
<option>-</option>
<option>Aluguel</option>
<option>Venda</option>
</select>

<label for="imovel">Imóvel:&nbsp;</label>
<select name="tipo">
<option>-</option>
<option>Residencial</option>
<option>Comercial</option>
</select>
</br></br>
						</tr>
					</thead>
					<tbody>
					</form>
						
			</div>				
							<?php 
		if(isset($_POST['acao']) && $_POST['acao'] == 'enviar'){
		$interesse = $_POST['interesse'];
		$tipo = $_POST['tipo-imovel'];
		$imovel = $_POST['tipo'];
		
		
			if($interesse != '-' && $tipo =='-' && $imovel =='-'){
				$query = "SELECT * FROM imovel WHERE situacao_imovel = '$interesse' ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}elseif ($interesse != '-' && $tipo !='-' && $imovel =='-'){
				$query = "SELECT * FROM imovel WHERE situacao_imovel = '$interesse' and tipo_imovel = '$tipo' ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}elseif ($interesse != '-' && $tipo =='-' && $imovel !='-'){
				$query = "SELECT * FROM imovel WHERE situacao_imovel = '$interesse' and imovel = '$imovel' ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}elseif ($interesse != '-' && $tipo !='-' && $imovel !='-'){
				$query = "SELECT * FROM imovel WHERE situacao_imovel = '$interesse' and tipo_imovel = '$tipo' and imovel = '$imovel' ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}elseif ($interesse == '-' && $tipo !='-' && $imovel =='-'){
				$query = "SELECT * FROM imovel WHERE tipo_imovel = '$tipo' ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}elseif ($interesse == '-' && $tipo !='-' && $imovel !='-'){
				$query = "SELECT * FROM imovel WHERE tipo_imovel = '$tipo' and imovel = '$imovel' ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}elseif ($interesse == '-' && $tipo =='-' && $imovel !='-'){
			    $query = "SELECT * FROM imovel WHERE imovel = '$imovel' ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}elseif ($interesse == '-' && $tipo =='-' && $imovel =='-'){
			    $query = "SELECT * FROM imovel ORDER BY codigo_base";
				$seleciona_imovel = mysqli_query($conectar, $query);
			}	
			while($linha = mysqli_fetch_array($seleciona_imovel)){
						?><div id="filtro"> 
						<form method="post" action="../php_action/delete.php" enctype="multipart/form-data"><?php
						echo "Codigo: " .$linha['codigo_base'] ."<br />";
						echo "Valor: " .$linha['valor_imovel'] ."<br />";
						echo "Tipo: " .$linha['tipo_imovel'] ."<br />";
						echo "Banheiros: " .$linha['WC_social'] ."<br />";
						echo "Quartos: " .$linha['quarto'] ."<br />";
						echo "Imóvel: " .$linha['imovel'] ."<br />";
						echo "Situação do Imóvel: " .$linha['situacao_imovel'] ."<br />" ."<br /><hr>";
						
						
						
					?>
					
					<?php	
						?>
						
						<input type="hidden" name="id" value="<?php echo $linha['codigo_base']; ?>">
					    <button id="excluir" name="exclui" class="btn btn-xs btn-danger"><img src = "../_sources/Deletar.png">&nbsp;&nbsp;Excluir&nbsp;</button>	
						<a href="atualiza_cadastro.php?id=<?php echo $linha['codigo_base']; ?>" class="btn btn-primary" role="button"><i class="material-icons""btn btn-xs btn-danger"><img src = "../_sources/Atualizar.png">&nbsp;&nbsp;Atualizar&nbsp;
						</a>						
                        </form>
						</div>
						
						<?php
	        }

		}	
?>							
							<input type="hidden" name="acao" value="enviar">
								<button type="submit" class="btn btn-xs btn-primary">Visualizar</button>
								<a href="menu.php"><button type="button" class="btn btn-xs  btn-danger">Voltar</button></a>
								
							</td>
						</tr>              
					</tbody>
				</table>
			</div>
		</div>
		
	</div>


	</br>
	<div id="espaco2"></div>
	<footer><label id="rodape">S.C.I - Versão: 1.0.0 - &copy;Copyright 2018</label></footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

