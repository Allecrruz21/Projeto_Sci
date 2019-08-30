<?php
include_once '../conexao/conectar.php';
//$caminho = "../php_action/upload/"; //caminho da imagem
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet"  href="../_css/style.css"/>
    <link rel="icon" href="../_images/logoico.png" type= "image/x-icon"/>
	
</head>
<body>
<script>
if ('geolocation', in navigator){
	navigator.geolocation.getCurrentPosition(function (position))
	{ console.log(position)
	function(error){
		console.log(error)
	} ) 
	}
}else{
	alert (' ops não é possivel localizar')
}
	



</script>
	<div id="pagina">
		<header id="cima">
		  <div id="slogan">
			<h2 id="cor">Portal de imóveis SCI</h2>
			<h3 id="cor1">O seu imóvel está aqui.</h3>		
		  </div>
		   <form method="post" action="portal.php#ancora">
				<div id="logo"><img src = "_images\logo128.png"></div>
				

					<div id="imgmenu"><img src = "_images\home.png" id="icone"></div>
					<h2 id="cxpesq">Encontre aqui seu imóvel</h2>

					<div id="cxpesquisa">
						<div id="centralizar">
						<label for="interesse" id="nmselect">Interesse em:</label>
							<select class="interesse" name="interesse">
							<option>-</option>
							<option>Venda</option>
							<option>Aluguel</option>							
							</select>
							&nbsp;
						<label for="tpimovel" id="nmselect">Tipo de imóvel:</label>
							<select class="tpimovel" name="tipo-imovel">
							<option>-</option>
							<option>Casa</option>
							<option>Apartamento</option>
							<option>Flat</option>
							<option>Galpão</option>
							<option>Loja</option>
							<option>Sala comercial</option>
							<option>Terreno</option>
							
							</select>
							&nbsp;
						<label for="imovel" id="nmselect">Imóvel:</label>
							<select class="imovel" name="tipo">
							<option>-</option>
							<option>Residencial</option>
							<option>Comercial</option>
							</select>
							 <button class="btnsearch" type="submit" >&nbsp;&nbsp;Buscar&nbsp;</button>
						</div>
					</div>
		    </form>
	    </header>		
<div id="espaco2"> </div>
<div id="central"></div>
<label id="imoveis">Seu imóvel está aqui!</label>
		  <a name="ancora"></a> <!-- ANCORA -->

<?php	
	$interesse = $_POST['interesse'];
	$tipo = $_POST['tipo-imovel'];
	$imovel = $_POST['tipo'];
?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
	<!-- INDICADORES -->
	<ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="1"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- SLIDES -->
	<div class="carousel-inner">
		<?php 
			$controle_ativo = 2;
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
				if($controle_ativo == 2){ ?>
					<div class="item active" ><?php 
						
					?><p><?php
						?><img src ="<?php echo "$caminho".$linha['imagem'];?>"> <?php
						echo " " .$linha['rua'] ." ";echo " " .$linha['numero'] ." ";echo " " .$linha['bairro'] ." ";echo " " .$linha['cidade'] ." ";echo " " .$linha['estado'] ." <br /><br />";						
						echo "Tipo do Imóvel: " .$linha['tipo_imovel'] ."<br /><br />";
						echo " " .$linha['observacao'] ."<br /><br />"; 
						echo " " .$linha['quarto'] ." ";echo " " .$linha['situacao_imovel'] ."<br /><br />";
						echo "Valor: " .$linha['valor_imovel'] ."<br />";						
					
					?></p> <?php
				    
		             ?>
					</div>
					<?php
					$controle_ativo = 1;
				}else{ ?>
					<div class="item" ><?php 
						?><p><?php
						?><img align="left" src ="<?php echo "$caminho".$linha['imagem'];?>"> <?php
						echo " " .$linha['rua'] ." ";echo " " .$linha['numero'] ." ";echo " " .$linha['bairro'] ." ";echo " " .$linha['cidade'] ." ";echo " " .$linha['estado'] ." <br /><br />";						
						echo "Tipo do Imóvel: " .$linha['tipo_imovel'] ."<br /><br />";
						echo " " .$linha['observacao'] ."<br /><br />"; 
						echo " " .$linha['quarto'] ." ";echo " " .$linha['situacao_imovel'] ."<br /><br />";
						echo "Valor: " .$linha['valor_imovel'] ."<br />";						
					
					?></p> <?php
				    
						
					?>
					</div>
					<?php
				}

			}
		?>
	</div>

	<!-- PASSAR PARA DIREITA E ESQUERDA -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span>
	<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span>
	<span class="sr-only">Next</span>
	</a>
	
	
</body>
</html>