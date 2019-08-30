<?php

$host = "localhost";
$user = "id9622460_sci02";
$pass = "tccsci123";
$dbname = "id9622460_sci02"
$conectar = mysqli_connect($host, $user, $pass, $dbname) or trigger_error(mysql_error(), E_USER_ERROR);

if(!$conectar){print "sem conectar";}

$pesquisa = $_POST['pesquisa'];
$pesquisa2 = $_POST['pesquisa2'];



$query_sql2 = "select situacao_imovel from imovel where situacao_imovel ='$pesquisa' or tipo_imovel = '$pesquisa2'";

$salvar = mysqli_query($conectar, $query_sql2);
$salvar2 = mysqli_query($conectar, $query_sql2);
$salvar3 = mysqli_query($conectar, $query_sql2);
$salvar4 = mysqli_query($conectar, $query_sql2);
$salvar5 = mysqli_query($conectar, $query_sql2);
$salvar6 = mysqli_query($conectar, $query_sql2);
$salvar7 = mysqli_query($conectar, $query_sql2);
$salvar8 = mysqli_query($conectar, $query_sql2);

$caminho = "upload/";//caminho da imagem


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8"/>
<title>Portal Imóveis PE - Home</title>
<link rel="stylesheet"  href="_css\style.css"/>
<link rel="icon" href="_images\logoico.png" type= "image/x-icon"/>
</head>
<body>
    <div id="pagina">
		<header id="cima">
		  <div id="slogan">
			<h2 id="cor">Portal de imóveis PE</h2>
			<h3 id="cor1">O seu imóvel está aqui.</h3>		
		  </div>
		   <form method="post">
				<div id="logo"><img src = "_images\logo128.png"></div>
					<div id="options">
						<a href="index.html" onmouseover="mudaFoto('_images/home.png')" onmouseout="mudaFoto('_images/home.png')">Home</a>
						<a href="aluguel.html" onmouseover="mudaFoto('_images/aluguel.png')" onmouseout="mudaFoto('_images/home.png')">Aluguel</a>
						<a href="venda.html" onmouseover="mudaFoto('_images/venda.png')" onmouseout="mudaFoto('_images/home.png')">Venda</a>
						<a href="_app/login.html" onmouseover="mudaFoto('_images/corretor2.png')" onmouseout="mudaFoto('_images/home.png')">Área do Corretor</a>
					</div>

					<div id="imgmenu"><img src = "_images\home.png" id="icone"></div>
					<h2 id="cxpesq">Encontre aqui seu imóvel</h2>

					<div id="cxpesquisa">
						<div id="centralizar">
						<label for="interesse" id="nmselect">Interesse em:</label>
							<select class="interesse" name="pesquisa">
							<option>-</option>
							<option>Venda</option>
							<option>Aluguel</option>							
							</select>
							&nbsp;
						<label for="tpimovel" id="nmselect">Tipo de imóvel:</label>
							<select class="tpimovel" name="pesquisa2">
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
							<select class="imovel" name="pesquisa3">
							<option>-</option>
							<option>Residencial</option>
							<option>Comercial</option>
							</select>
							 <button class="btnsearch" type="submit" ><img src = "_images\pesquisa.png">&nbsp;&nbsp;Buscar&nbsp;</button>
						</div>
					</div>
		    </form>
	    </header>		

		<div id="espaco2"> </div>

		<div id="central"></div>
		<label id="imoveis">Seu imóvel está aqui!</label>

		
		  <a name="ancora"></a> <!-- ANCORA -->
        	
                <div id="locacao">
				  <h4 id="loc">Locação</h4>
					<div id="btnesq1"> <button Type="submit" class="btnesquerdo"  name="acesso"> <img src ="_images\1.back.png"> </button> </div>
					<div id="btndir1"> <button Type="submit" class="btndireito"  name="acesso"> <img src ="_images\2.next.png"> </button> </div>
					<div id="imgloc"> <div class="imgclass"><img src =" <?php while ($arrey = mysqli_fetch_array($salvar2)){
echo "$caminho".$arrey ['imagem'];}?>"></div></a></div> <!-- TENTANDO COLOCAR A IMAGEM -->
					<div id="info1">
						<label id="info">Código:</label>&nbsp;<label class="inf1"><?php while ($arrey = mysqli_fetch_array($salvar8)){
echo $arrey['codigo_base'];}?></label>
						</br></br>
						<label id="info">Valor:</label>&nbsp;<label class="inf2"> <?php while ($arrey = mysqli_fetch_array($salvar3)){
echo $arrey['valor_imovel'];}?> </label>
						</br></br>	
						<label id="info">Tipo:</label>&nbsp;<label class="inf3"><?php while ($arrey = mysqli_fetch_array($salvar4)){
echo $arrey['tipo_imovel'];}?></label>
						</br></br>
						<label id="info">Banheiro:</label>&nbsp;<label class="inf4"><?php while ($arrey = mysqli_fetch_array($salvar5)){
echo $arrey['WC_social'];}?></label>
						</br></br>
						<label id="info">Quartos:</label>&nbsp;<label class="inf5"><?php while ($arrey = mysqli_fetch_array($salvar6)){
echo $arrey['quarto'];}?></label>
						</br></br>
						<label id="info">Imóvel:</label>&nbsp;<label class="inf6"><?php while ($arrey = mysqli_fetch_array($salvar7)){
echo $arrey['imovel'];}?></label>
						</br></br>
					</div>
				</div>
			

			

			
		
		<div id="espaco"> </div>	
		<footer>
		<div id="rdpinf"> 
		<label id="rdp">Integração S.C.I - Portal de Imóveis &copy;Copyright 2019. Todos os direitos reservados ao Grupo SCI&reg;.</label>
		</br>
		</footer> 
        </div>
    </div>
</body>
</html>
<script> 
function mudaFoto (foto)
{
document.getElementById("icone").src = foto;
}
</script>
