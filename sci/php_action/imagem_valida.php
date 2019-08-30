<?php
include_once '../conexao/conectar.php';
?>

<?php

$imagem_banco = $_FILES['imagem']['name'];//imagem



//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = 'upload/';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb
			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
			
			//Renomeiar
			$_UP['renomeia'] = false;
			 
			
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['imagem']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imagem']['error']]);
                
				//exit; //Para a execução do script
			}
			
			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/imagem_imovel.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['imagem']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/imagem_imovel.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				 if($_UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$imagem_banco = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$imagem_banco = $_FILES['imagem']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $imagem_banco)){
					//Upload efetuado com sucesso, exibe a mensagem
					
$sql = "INSERT INTO imagem(idimovel,imagem) VALUES ((select idimovel from imagem im ORDER BY im.idimovel DESC limit 1), '$imagem_banco')";
$salvar1 = mysqli_query($conectar, $sql);  
             
					
                   		echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/Paginas/fotos.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem Cadastrada Com Sucesso.\");
						</script>
					";
                  
					
					
				}else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/Paginas/fotos.php'>
						<script type=\"text/javascript\">
							alert(\"Erro no Cadastro.\");
						</script>
					";
				}
			}
			





mysqli_close($conectar);



?>