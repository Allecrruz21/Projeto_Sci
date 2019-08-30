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
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" href="../_sources\icon2.png" type= "image/x-icon"/>
		<script type="text/javascript" src="../_js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../_js/jquery.mask.min.js"></script>
		<script type="text/javascript">
		//FUNÇÃO PARA APLICAR FORMATAÇÃO NOS CAMPOS//
		$(document).ready(function(){
			$("#cep").mask("00.000-000")
			$("#cxtxtcep1").mask("00.000-000")
			$("#cxtxtvalor").mask("999.999.990,00", {reverse: true})
			$("#cxtxttelprop").mask("(00) 0000-0000")
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
		 <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
		
    <title>Captação - SCI2</title>
	
  </head>
  <body>
    
	<header>
	<h1>Sistema de Captação de Imóveis</h1>	
	</header>
	</br></br>

	<h4>Dados do imóvelimóvel imóvel</h4>
	
	<form action="../php_action/create_imovel.php" method="post" class="envio" enctype="multipart/form-data">
		  <div class="form-row">
			<div class="form-group col-md-2">
			  <i class="material-icons">group_work</i><label> Código base</label>
			  <input type="int" id="cxtxt" class="texto" placeholder="Ex.: CS-0000" name="codigo_base" id="codigo" maxlength="7">
			</div>
			<div class="form-group col-md-2">
			  <i class="material-icons">home</i> <label>CEP</label>
			  <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" placeholder="Ex.: 00.000-000" onblur="pesquisacep(this.value);" /></label><br />
			 </div>
		  <div class="form-group col-md-5">
			<i class="material-icons">home</i> <label>Endereço</label>
			<input name="rua" type="text" id="rua" size="60" placeholder="Ex.: Rua do Brasil" maxlength="80"/></label><br />
		  </div>
		  <div class="form-group  col-md-3">
			<i class="material-icons">home</i> <label>Bairro</label>
			<input name="bairro" type="text" id="bairro" size="40" placeholder="Ex.: Jardim das Acácias" /></label><br />
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md-2">
			 <i class="material-icons">home</i> <label>Cidade</label>
			  <input name="cidade" type="text" id="cidade" size="40" placeholder="Ex.: Recife" /></label><br />
			</div>
			<div class="form-group col-md-1">
			 <i class="material-icons">home</i> <label>Número</label>
			  <input type="int" id="cxtxt" id="numero" class="texto" placeholder="0000" name="numero" maxlength="6">
			</div>
			<div class="form-group col-md-1">
			 <i class="material-icons">home</i> <label>Estado</label>
			  <input name="uf" type="text" id="uf" size="2" placeholder="Ex.: PE" /></label><br />

			</div>
			<div class="form-group col-md-6">
			  <i class="material-icons">home</i> <label>Complemento</label>
			  <input type="text" id="cxtxt" id="complemento"class="texto" placeholder="Ex.: próximo ao supermercado" name="complemento" maxlength="35">
			</div>
			<div class="form-group col-md-2">
				<i class="material-icons">attach_money</i> <label>Valor</label>
				<input type="text" id="cxtxtvalor" id="valor" class="texto" placeholder="Ex.: R$ 1.000,00" name="valor_imovel">
			</div>	
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
				  <i class="material-icons">home</i><label>Tipo de imóvel</label>
				  <select type="text" name="tipo_imovel" class="form-control" id="cxtxt">
					<option>-</option>
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
				  <i class="material-icons">home</i><label>Situação</label>
				  <select id="inputState" class="form-control" id="cxtxt" name="situacao_imovel">
					<option>-</option>
					<option>Venda</option>
					<option>Aluguel</option>
				  </select>
				</div>
				<div class="form-group col-md-2">
				  <i class="material-icons">wb_sunny</i> <label>Posição do sol</label>
				  <select id="inputState" class="form-control" id="cxtxt" name="posicao_do_sol">
					<option>-</option>
					<option>Nascente</option>
					<option>Poente</option>
				  </select>
				</div>
				<div class="form-group col-md-2">
				  <i class="material-icons">home</i><label>Estadia</label>
				  <select id="inputState" class="form-control" id="cxtxt" name="imovel">
					<option selected>-</option>
					<option>Residencial</option>
					<option>Comercial</option>
				  </select>
				</div>
					<div class="form-group col-md-2">
					  <i class="material-icons">vpn_key</i> <label>Chaves</label>
					  <select type="text" name="chaves" class="form-control" id="cxtxt">
						<option>-</option>
						<option>Proprietário</option>
						<option>Imóvel</option>
						<option>Corretor</option>
						<option>Imobiliária</option>
					  </select>
					</div>	
				<div class="form-group col-md-1">
				  <i class="material-icons">home</i><label>Tamanho</label>
				  <input type="text" id="cxtxt" id="tamanho" class="texto" placeholder="Ex.: 12x20" name="tamanho_imovel" size="10" maxlength="9"/>
				</div>
				<div class="form-group col-md-1">
				  <i class="material-icons">insert_invitation</i> <label>Ano</label>
				  <input type="cxtxt" name="ano_de_construcao" id="cxtxt" id="codigo" class="texto" placeholder="Ex.: 1900" />
				</div>	
			</div>
				</br>
				<h6>No imóvel</h6>
			<div class="form-row">
				<div class="form-group col-md-1">
					<label>Quartos</label>
					<input type="number" name="quarto" id="cxtxt" min="1" max="10"/>
				</div>
				<div class="form-group col-md-1">
					<label>Suíte</label>
					<input type="number" name="suite" id="cxtxt" min="0" max="10"/>
				</div>
				<div class="form-group col-md-1">
					<label>Wc Social</label>
					<input type="number" name="wc_social" id="cxtxt" min="0" max="10"/>
				</div>
				<div class="form-group col-md-1">
					<label>Garagem</label>
					<input type="number" name="Garagem" id="cxtxt" min="0" max="10"/>
				</div>
				<div class="form-group col-md-1">
					<label>Salas</label>
					<input type="number" name="sala" id="cxtxt" min="0" max="10"/>
				</div>
			</div>
		<div class="form-row">
			<div id="um">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="garagem" Name= "ckbsci[]" value="Garagem"><label class="form-check-label" for="garagem">Garagem</label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="churrasqueira" Name= "ckbsci[]" value="Churrasqueira"><label class="form-check-label" for="churrasqueira">Churrasqueira</label>
			</div>
			</div>
			<div id="dois">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="piscina" Name= "ckbsci[]" value="Piscina"><label class="form-check-label" for="piscina">Piscina</label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="quadra" Name= "ckbsci[]" value="Quadra Poliesportiva"><label class="form-check-label" for="quadra">Quadra poliesportiva</label>
			</div>
			</div>
			<div id="tres">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="rua2" Name= "ckbsci[]" value="Rua calçada"><label class="form-check-label" for="rua">Rua calçada</label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="mezanino" Name= "ckbsci[]" value="Mezanino"><label class="form-check-label" for="mezanino">Mezanino</label>
			</div>
			</div>
			<div id="quatro">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="quintal" Name= "ckbsci[]" value="Quintal"><label class="form-check-label" for="quintal">Quintal</label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="quarto" Name= "ckbsci[]" value="Box no banheiro"><label class="form-check-label" for="quarto">Box no banheiro</label>
			</div>
			</div>
			<div id="cinco">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="poco" Name= "ckbsci[]" value="Poço Artesiano"><label class="form-check-label" for="poco">Poço Artesiano</label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="terraco" Name= "ckbsci[]" value="Terraço"><label class="form-check-label" for="terraco">Terraço</label>
			</div>
			</div>
		</div>
				<div id="espaco"></div>
				
					<div class="form-group" id="fotosimovel">
						<label id="lblfoto">Foto do imóvel</label>&nbsp;<input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagem">
					</div>	
					
					<div id="espaco2"></div>
					
					<h6>Dados do proprietário</h6>
					
				<div class="form-row">
					<div class="form-group col-md-1">
					  <i class="material-icons"> account_balance_wallet</i><label>Porcentagem</label>
					  <input type="int" class="texto" id="cxtxt" placeholder="Ex.:100%" name="porcentagem_cliente" maxlength="4"/>
					</div>
					<div class="form-group col-md-6">
					  <i class="material-icons">assignment_ind</i><label>Nome</label>
					  <input type="text" class="texto" id="cxtxt" placeholder="Ex.: João da Silva" name="nome_cliente" maxlength="40"/>
					</div>
					  <div class="form-group col-md-3">
						<i class="material-icons">assignment_ind</i><label>CPF</label>
						<input type="text" class="texto" id="cxtxtcpfprop" placeholder="Ex.: 000.000.000-00" name="cpf_cliente" maxlength="14"/>
					  </div>
					  <div class="form-group col-md-2">
						<i class="material-icons">assignment_ind</i><label>RG</label>
						<input type="text" class="texto" id="cxtxtrgprop" placeholder="Ex.: 0.000.000" name="rg_cliente" maxlength="9"/>
					  </div>
				</div>
				<div class="form-row">
						<div class="form-group col-md-3">
						  <i class="material-icons">call</i> <label>Telefone</label>
						  <input type="int" class="texto" id="cxtxttelprop" placeholder="Ex.: (00) 0000.0000" name="telefone_cliente" maxlength="14"/>
						</div>
						<div class="form-group col-md-3">
						  <i class="material-icons">phone_iphone</i> <label>Celular</label>
						  <input type="int" class="texto" id="cxtxtcelprop" placeholder="Ex.: (00) 00000.0000" name="celular_cliente" maxlength="14"/>
						</div>
						<div class="form-group col-md-5">
						  <i class="material-icons">contact_mail</i> <label>E-mail</label>
						  <input type="text" class="texto" id="cxtxt" placeholder="Ex.: email@dominio.com" name="email_cliente" maxlength="40"/>
						</div>
			    </div>
				<div class="form-row">
					  <div class="form-group col-md-2">
					  <i class="material-icons">home</i><label>CEP</label>
					  <input type="int" id="cxtxtcep1" class="texto" placeholder="Ex.: 00.000-000" name="cep_cliente" maxlength="10">
					</div>
				  <div class="form-group col-md-5">
					<i class="material-icons">home</i><label>Endereço</label>
					<input type="text" id="cxtxt" class="texto" placeholder="Ex.: Rua da República" name="endereco_cliente" maxlength="30">
				  </div>
				  <div class="form-group  col-md-3">
					<i class="material-icons">home</i><label>Bairro</label>
					<input type="text" id="cxtxt" class="texto" placeholder="Ex.: Jardim Primavera" name="bairro_cliente" maxlength="20">
					</div>
					<div class="form-group col-md-1">
					  <i class="material-icons">home</i><label>Número</label>
					  <input type="int" id="cxtxt" class="texto" placeholder="1111" name="numero_cliente" maxlength="6">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
					  <i class="material-icons">home</i><label>Cidade</label>
					  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: Recife" name="cidade_cliente" maxlength="80">
					</div>
					
					<div class="form-group col-md-1">
					  <i class="material-icons">home</i><label>Estado</label>
					  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: PE" name="estado_cliente" maxlength="2">
					</div>
					 <div class="form-group col-md-6">
					  <i class="material-icons">home</i><label>Complemento</label>
					  <input type="text" id="cxtxt" class="texto" placeholder="Ex.: próximo ao Shopping" name="complemento_cliente" maxlength="35">
					</div>
				</div>
					 <div id="espaco"></div>
					  
						  <div class="buttons">
							<button class="btnsalvar" type="submit" value="OK">Salvar</button> &nbsp; 
							<button type="reset" class="btnlimpar" name="limpa">Limpar</button>
							<a href="menu.php"><button type="button"class="btnvoltar" name="voltapag">sair</button></a>
						  </div>
					  </form>
					 
					  </br>
					  <div id="espaco"> </div>
			

					 
						<footer><label id="rodape">S.C.I - Versão: 1.0.0 - &copy;Copyright 2018</label></footer>

					
				  </body>
				</html>