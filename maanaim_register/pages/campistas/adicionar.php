<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$nome_responsavel = $_SESSION['nome'];
$id_responsavel = $_SESSION['id'];
$retorno_cep = null;

if(isset($_POST["action"])){
    if($_POST['action'] == 'validarCPF'){
        $cpf = $_POST['cpf'];
        validaCPF($cpf);
    }elseif($_POST['action'] == 'busca_cep'){
        $cep = $_POST['cep'];
        $retorno_cep = busca_cep($cep);
        
    }
}


if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    
    
    insert(MEMBRO, $_POST);
    
    
    header("Location: lista.php");
}


?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="container">
       		<header>
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Inscri&ccedil;&atilde;o</h2>
            		</div>
        		</div>
	
        		<!-- MASCARA -->
                 <script>
                  
    				jQuery(function($){
                        $("#cpf").mask("999.999.999-99");
                        $("#altura").mask("9,99");
                        $("#cep").mask("99999-999");
                        $("#telefone").mask("(99) 99999-9999");
                        $('#telefone_responsavel').mask("(99) 99999-9999");
                	 });

                 </script>
                 
				<script type="text/javascript">

             		function validarCPF(formName){ // declaro o início do jquery
                    	var cpf = $("input[name='cpf']").val();
                    	cpf = cpf.replace('.', '').replace('.', '').replace('-', '');

                    	
//                     	var hidden = document.getElementById('action');
//                     	var form = document.getElementById(formName);

//                     	hidden.value = 'validarCPF';
                    	
//                     	form.submit();
                    }// fim do jquery

                    function buscarEndereco(formName)
                    {
                    	var cep = $("input[name='cep']").val();
                    	cep = cep.replace('-', '');

                    	$("#mensagem").html(' (Consultando CEP ...)');
        				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+cep, function(){
        			  		if(resultadoCEP["resultado"]){
        						$("#rua").val(unescape(resultadoCEP["logradouro"]));
        						$("#bairro").val(unescape(resultadoCEP["bairro"]));
        						$("#cidade").val(unescape(resultadoCEP["cidade"]));
            					$("#uf").val(unescape(resultadoCEP["uf"]));
        					}
         
        					$("#mensagem").html('');
        					$("#numero").focus();
        					
        				});	
                    }

                	
                    

                   
                </script>
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Cadastrar Campista</div>
        			<div class="panel-body">
        			
        				<form id="formInscricao" method = "POST" data-toggle="validator">
        				<input type="hidden" id="action" name="action" />
         					<div class="row">
         					
         						<div class="form-group col-md-4">
                                  <label for="nome">Respons&agrave;vel pela Inscri&ccedil;&atilde;o</label>
                                  <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $nome_responsavel;?>">
                            	</div>
                        	</div>
                        	<div class="row">
         						<div class="form-group col-md-2">
                                 	<label for="cpf">CPF</label>
                                  	<input type="text" class="form-control" id="cpf" name="cpf" required>
                            	</div>
                            	<div class="form-group col-md-2">
                            		<input type="submit" value="&#10003 Consultar" class="btn btn-sm btn-primary" onclick="javascript:validarCPF('formInscricao')" style="margin-top: 25px"/> 
                        		</div>
                        	</div>
                        	
                        	<div class="row">
         						<div class="form-group col-md-5">
                                  <label for="nome">Nome</label>
                                  <input type="text" class="form-control" id="nome" name="nome" required>
                            	</div>
                        	</div>
                        	<div class="row">
                        		<div class="form-group col-md-2">
                                    <label for="data_nascimento">Data de Nascimento</label>
                					<input id="data_nascimento" name="data_nascimento" type="date" class="form-control" />
                                </div>
                                
                                <div class="form-group col-md-1">
                                    <label for="idade">Idade</label>
                					<input id="idade" name="idade" type="text" class="form-control" disabled/>
                                </div>
                                
                                
                                <div class="form-group col-md-2">
                                    <label for="rg">RG</label>
                					<input id="rg" name="rg" type="text" class="form-control" />
                                </div>
                        	</div>
                        	
                        	<div class="row">
                        		<div class="form-group col-md-3">
                                  	<label for="sexo">Sexo</label>
                                	<select class="form-control selectpicker" name="sexo" id="sexo" required>
                                		<option value="">--SELECIONE--</option>
                                    	<option value="masculino">MASCULINO</option>
                                    	<option value="feminino">FEMININO</option>
                                	</select>
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label for="altura">Altura</label>
                					<input id="altura" name="altura" type="text" class="form-control" />
                                </div>
                        	</div>
                        	<div class="row">
                        		<div class="form-group col-md-1">
                                    <label for="peso">Peso</label>
                					<input id="peso" name="peso" type="text" class="form-control" />
                                </div>
                                
                                <div class="form-group col-md-2">
                                  	<label for="camisa">Camisa</label>
                                	<select class="form-control selectpicker" name="camisa" id="camisa" required>
                                		<option value="">--SELECIONE--</option>
                                    	<option value="pp">PP</option>
                                    	<option value="m">M</option>
                                    	<option value="g">G</option>
                                    	<option value="gg">GG</option>
                                    	<option value="xg">XG</option>
                                	</select>
                                </div>
                                
                                <div class="form-group col-md-3">
                                  	<label for="sacramento">Sacramento</label>
                                	<?php selected_sacramento()?>
                                </div>
                        	</div>
                        	
                        	<div class="row">
                        		<div class="form-group col-md-3">
                                    <label for="paroquia">Par&oacute;quia/Grupo/Comunidade</label>
                					<input id="paroquia" name="paroquia" type="text" class="form-control" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="paroco">P&aacute;roco</label>
                					<input id="paroco" name="paroco" type="text" class="form-control" />
                                </div>
                        	</div>
                        	
                        	<div class="row">
                        		<div class="form-group col-md-3">
                                    <label for="cep">CEP<span id='mensagem'></span></label>
                					<input id="cep" name="cep" type="text" class="form-control" onblur="javascript:buscarEndereco('formInscricao')"/>
                                </div>
                        	</div>
                        	
                        	<div class="row">
                        		<div class="form-group col-md-3">
                                    <label for="rua">Logradouro</label>
                					<input id="rua" name="rua" type="text" class="form-control"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="numero">N&uacute;mero</label>
                					<input id="numero" name="numero" type="text" class="form-control"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="bairro">Bairro</label>
                					<input id="bairro" name="bairro" type="text" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="complemento">Complemento</label>
                					<input id="complemento" name="complemento" type="text" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="cidade">Cidade</label>
                					<input id="cidade" name="cidade" type="text" class="form-control" />
                                </div>
                                <div class="form-group col-md-2">
                                  	<label for="uf">UF</label>
                                	<?php selected_UF(); ?> 
                              	</div>
                          	</div>
                          	<div class="row">
                                <div class="form-group col-md-3">
                                    <label for="telefone">Telefone</label>
                					<input id="telefone" name="telefone" type="text" class="form-control" value=""/>
                                </div>
                                <div class="form-group col-md-4">
                                  	<label for="email">E-mail</label>
                					<input id="email" name="email" type="email" class="form-control" placeholder="exemplo@email.com" value=""/>
                              	</div>
                          	</div>
                          	
                          	<div class="row">
                                <div class="form-group col-md-4">
                                    <label for="responsavel">Nome do respons&aacute;vel</label>
                					<input id="responsavel" name="responsavel" type="text" class="form-control" value=""/>
                                </div>
                                <div class="form-group col-md-3">
                                  	<label for="telefone_responsavel">Telefone respons&aacute;vel</label>
                					<input id="telefone_responsavel" name="telefone_responsavel" type="text" class="form-control" value=""/>
                              	</div>
                              	<div class="form-group col-md-3">
                                  	<label for="grau_parentesco">Grau de parentesco</label>
                					<input id="grau_parentesco" name="grau_parentesco" type="text" class="form-control" value=""/>
                              	</div>
                          	</div>
                          	
                          	<div class="row">
                                <div class="form-group col-md-5">
                                    <label for="problema_saude">Possui algum problema de sa&uacute;de/alergia?</label>
                					<input id="problema_saude" name="problema_saude" placeholder="Sim? Qual?" type="text" class="form-control" value=""/>
                                </div>
                                <div class="form-group col-md-3">
                                  	<label for="remedio">Toma algum medicamento?</label>
                					<input id="remedio" name="remedio" type="text" placeholder="Sim? Qual?" class="form-control" value=""/>
                              	</div>
                              	<div class="form-group col-md-3">
                                  	<label for="plano_saude">Possui plano de sa&uacute;de?</label>
                					<input id="plano_saude" name="plano_saude" type="text" placeholder="Sim? Qual?" class="form-control" value=""/>
                              	</div>
                          	</div>
                        	
                        	<div class="row">
                                <div class="form-group col-md-3">
                                    <label for="conhece_acampamento">Conhece o acampamento?</label>
                					<input id="conhece_acampamento" name="conhece_acampamento" type="text" class="form-control" value=""/>
                                </div>
                                <div class="form-group col-md-3">
                                  	<label for="porque_parcicipar">Por que quer participar?</label>
                					<input id="porque_parcicipar" name="porque_parcicipar" type="text" class="form-control" value=""/>
                              	</div>
                          	</div>
                        	
                        	<div class="row">
                              	<div class="form-group col-md-3">
                                  	<label for="conhece_campista">Conhece algum campista?</label>
                					<input id="conhece_campista" name="conhece_campista" type="text" placeholder="Sim? Quem?" class="form-control" value=""/>
                              	</div>
                              	<div class="form-group col-md-3">
                                  	<label for="conhece_equipe">Conhece alguem da equipe?</label>
                					<input id="conhece_equipe" name="conhece_equipe" type="text" placeholder="Sim? Quem?" class="form-control" value=""/>
                              	</div>
                          	</div>
                          	
                          	<div class="row">
                              	<div class="form-group col-md-3">
                                  	<label for="observacoes">Observa&ccedil;&otilde;es</label>
                					<textarea  id="observacoes" rows="2" cols="50" class="form-control"></textarea>
                              	</div>
                          	</div>
                          	
                          	<div class="row">
                              	<div class="form-group col-md-3">
                                  	<label for="forma_pagamento">Forma de pagamento</label>
                                  	<select class="form-control selectpicker" name="sexo" id="sexo" required>
                                		<option value="">--SELECIONE--</option>
                                    	<option value="dinheiro">Dinheiro</option>
                                    	<option value="cheque">Cheque</option>
                                    	<option value="cartao_avista">Cart&atilde;o &agrave; vista</option>
                                    	<option value="cartao_parcelado">Cart&atilde;o 2X</option>
                                    </select>
                              	</div>
                              	<div class="form-group col-md-3">
                                  	<label for="valor">Valor</label>
                					<input id="valor" name="valor" type="text" class="form-control" value=""/>
                              	</div>
                              	<div class="form-group col-md-4">
                					<input type="submit" value="&#10003 Cadastrar" class="btn btn-primary" /> 
                               	</div>
                          	</div>
                          	
                            <div class=row>
                				<div class="form-group col-md-4">
                					<input type="submit" value="&#10003 Cadastrar" class="btn btn-primary" /> 
                					<a href="lista.php" class="btn btn-danger">&#10005 Cancelar</a>
                               	</div>
                           	</div>
        				</form>
        			</div>
        		</div>
    		</div>
        </div>
   </body>
</html>
       
      