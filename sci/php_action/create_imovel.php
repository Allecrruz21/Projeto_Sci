<?php
include_once '../conexao/conectar.php';
?>

<?php
$codigo_base = $_POST ['codigo_base'];
$chaves = $_POST ['chaves'];
$tipo_imovel = $_POST ['tipo_imovel'];
$estado = $_POST ['uf'];
$cep = $_POST ['cep'];
$cidade = $_POST ['cidade'];
$bairro = $_POST ['bairro'];
$numero = $_POST ['numero'];
$rua = $_POST ['rua'];
$complemento = $_POST ['complemento'];
$ano_de_construcao = $_POST ['ano_de_construcao'];
//$estado_imovel = $_POST ['estado_imovel'];2
$tamanho_imovel = $_POST ['tamanho_imovel'];
$quarto = $_POST ['quarto'];
$suite = $_POST ['suite'];
$wc_social = $_POST ['wc_social'];
$garagem = $_POST ['Garagem'];
$sala = $_POST ['sala'];
$situacao_imovel = $_POST ['situacao_imovel'];
$valor_imovel = $_POST ['valor_imovel'];
$imovel = $_POST ['imovel'];
$posicao_do_sol = $_POST ['posicao_do_sol'];
//$observacao = $_POST ['observacao'];
$imagem_banco = $_FILES['imagem']['name'];//imagem

//CLIENTE//
$porcentagem_cliente = $_POST ['porcentagem_cliente'];
$nome_cliente = $_POST ['nome_cliente'];
$cpf_cliente = $_POST ['cpf_cliente'];
$rg_cliente = $_POST ['rg_cliente'];
$telefone_cliente = $_POST ['telefone_cliente'];
$celular_cliente = $_POST ['celular_cliente'];
$email_cliente = $_POST ['email_cliente'];
$estado_cliente = $_POST ['estado_cliente'];
$cidade_cliente = $_POST ['cidade_cliente'];
$bairro_cliente = $_POST ['bairro_cliente'];
$cep_cliente = $_POST ['cep_cliente'];
$endereco_cliente = $_POST ['endereco_cliente'];
$numero_cliente = $_POST ['numero_cliente'];
$complemento_cliente = $_POST ['complemento_cliente'];


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
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/Paginas/cadastro.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['imagem']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/Paginas/cadastro.php'>
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
					
$sql2 = "INSERT INTO cliente(porcentagem, nome, cpf, email, celular, telefone, cidade, bairro, cep, endereco, numero, estado, rg, complemento) VALUES ('$porcentagem_cliente', '$nome_cliente', '$cpf_cliente', '$email_cliente', '$celular_cliente', '$telefone_cliente', '$cidade_cliente', '$bairro_cliente', '$cep_cliente', '$endereco_cliente', '$numero_cliente', '$estado_cliente', '$rg_cliente', '$complemento_cliente')";

                   
					
                    		echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/Paginas/fotos.php'>
						<script type=\"text/javascript\">
							alert(\"Cadastro Realizado com sucesso.\");
						</script>
					";
                  
					
					
				}else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://tccsci.epizy.com/Paginas/cadastro.php'>
						<script type=\"text/javascript\">
							alert(\"Erro no Cadastro.\");
						</script>
					";
				}
			}
			
			
			

if(!empty($_POST['ckbsci']) && count($_POST['ckbsci']) ){
    $checklist = implode(',', $_POST['ckbsci']);

    //sql simulada
$sql = "INSERT INTO imovel(codigo_base, chaves_imovel, tipo_imovel, estado, cidade, bairro, cep, numero, rua, complemento, ano_de_construcao,tamanho_imovel, quarto, suite, WC_social, Garagem, sala, situacao_imovel, valor_imovel,imovel, posicao_do_sol,caracteristicas, imagem) VALUES ('$codigo_base', '$chaves', '$tipo_imovel', '$estado', '$cidade', '$bairro', '$cep', '$numero', '$rua', '$complemento', '$ano_de_construcao', '$tamanho_imovel', '$quarto', '$suite', '$wc_social', '$garagem', '$sala', '$situacao_imovel', '$valor_imovel','$imovel', '$posicao_do_sol', '$checklist', '$imagem_banco')";

	
}



 $sql3 = "INSERT INTO imagem(idimovel,imagem) VALUES ((select id_imovel from imovel im ORDER BY id_imovel DESC limit 1), '$imagem_banco')";


$salvar1 = mysqli_query($conectar, $sql);  
$salvar2 = mysqli_query($conectar, $sql2);
$salvar3 = mysqli_query($conectar, $sql3);





mysqli_close($conectar);



?>