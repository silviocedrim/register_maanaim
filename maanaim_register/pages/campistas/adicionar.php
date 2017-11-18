<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$nome_responsavel = $_SESSION['nome'];
$id_responsavel = $_SESSION['id'];



if (isset($_POST['cpf']) && empty($_POST['cpf']) == false) {
    
    $caracters = array("/", "-", ".", "(", ")");
    $caracters_valores = array("R", "$", " ");
    
    
    $inserir = $_POST;
    $formas_pagamento;
    $formas = array();
    
    
    unset($inserir['action']);
    unset($inserir['valor_desconto']);
    unset($inserir['quantidade_parcela']);
    unset($inserir['valor_parcela']);
    unset($inserir['valor']);
    unset($inserir['forma_pagamento']);
   
    foreach ($inserir as $key => $value) {
        if($key == 'cpf' || $key == 'cep'){
            $inserir[$key] = str_replace($caracters, "", $value);
            
        }
        
        if($key == 'formas_pagamentos'){
            $formas_temp = explode(",", $value);
            
            for($i = 0; $i < count($formas_temp); $i = $i + 4){
                $formas[] = array('tipo' => $formas_temp[$i], 'valor' => str_replace($caracters_valores, "", $formas_temp[$i+1]), 'quantidade_parcelas' => $formas_temp[$i+2], 'desconto' => str_replace($caracters_valores, "",$formas_temp[$i+3]));
            }
        }
        
        
    }
    unset($inserir['formas_pagamentos']);
    $inserir['id_responsavel'] = $_SESSION['id'];
    
    
    $id_campista = insert(CAMPISTA, $inserir);
    insertFormasDePagamento($formas, $id_campista);
    
	
	$id_campista = consultaIdUltimoCampista();
	
	echo "<script>window.open('imprimirinscricao.php?id=".$id_campista."')</script>";
 
    
}


?>

<!DOCTYPE html>
<html lang="pt-br">
            					
    <body>
    	<div class="col-md-12">
       		<header>
        		
        		<!-- MASCARA -->
                 <script>
                  
    				jQuery(function($){
    					correios.init( '6CTKkcmHuqSnl90jz58KxXe5DMDld9gi', 'Z6Urr77Dz3H9UXv6j6buyC1FsLV8kPoobq8ho1LqXB4yEVyh' );
    					$('#loading').hide();
    					$('#loading_cpf').hide();
    					$('#mensagem_cpf').hide();
    					$('#mensagem_obrigatorio').hide();
        				$('#cep').correios( '#rua', '#bairro', '#cidade', '#uf', '#loading', '#numero' );
                        $("#cpf").mask("999.999.999-99");
                        $("#altura").mask("9.99");
                        $("#cep").mask("99999-999");
                        $("#telefone").mask("(99) 99999-9999");
                        $('#telefone_responsavel').mask("(99) 99999-9999");
                        $('#valor').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:'.', affixesStay: false}); 
						$('#valor_desconto').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:'.', affixesStay: false});
						$('#valor_parcela').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:'.', affixesStay: false});

						$('#div_valor').hide();
						$('#div_desconto').hide();
						$('#div_valor_parcela').hide();
						$('#div_botao_add_pagamento').hide();
						$('#div_quantidade_parcela').hide();

						$('#forma_pagamento').on('change', function(){
							var forma = $('#forma_pagamento').val();
							if(forma == 'cartao_credito_parcelado'){
								$('#div_valor').hide();
								$('#div_desconto').fadeIn('slow');
								$('#div_valor_parcela').fadeIn('slow');
								$('#div_quantidade_parcela').fadeIn('slow');
								$('#div_botao_add_pagamento').fadeIn('slow');
								
								
							} else if(forma == "bolsa"){
								$('#div_valor').hide();
								$('#div_desconto').hide();
								$('#div_valor_parcela').hide();
								$('#div_quantidade_parcela').hide();
								$('#div_botao_add_pagamento').fadeIn('slow');

							} else {
								$('#div_valor').fadeIn('slow');
								$('#div_desconto').fadeIn('slow');
								$('#div_valor_parcela').hide();
								$('#div_botao_add_pagamento').fadeIn('slow');
								$('#div_quantidade_parcela').hide();
							}
						});
                   	 });

                 	 $('#btn_salvar').on('click', function(){
						beforeSave();
                     });

    				
                 </script>
                 
				<script type="text/javascript">
				
    				function showCalendar(){
    
        			    $('#dtp_input').datetimepicker({
        			        language:  'pt-BR',
        			        weekStart: 1,
        			        todayBtn:  1,
        					autoclose: 1,
        					todayHighlight: 1,
        					startView: 2,
        					minView: 2,
        					forceParse: 0
        			    });
    
    					$('#dtp_input').datetimepicker('show');


        				$('#dtp_input').datetimepicker()
        				.on('changeDate', function(ev){

        					var dia = ev.date.getDate();
            				var mes = ev.date.getMonth() + 1;
            				var ano = ev.date.getFullYear();
            				
        				    var data =  dia + '/' + mes + '/' + ano;
        				    document.getElementById("data_nascimento").value = data;
        				    var idade = calcularIdade(dia, mes, ano);

        				    $('#campo_idade').val(idade);
        				    $('#idade').val(idade);
        				    $('#data_nascimento').val(data);

        				    
        				});
    				}


    			
             		function validarCPF(){ // declaro o início do jquery
                    	var cpf = $("input[name='cpf']").val();
                    	cpf = cpf.replace('.', '').replace('.', '').replace('-', '');

                    	
                            var dados = $('#formInscricao').serialize();

							$.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: '../../resources/functions/valida_cpf.php',
                                async: true,
                                data: cpf,
                                success: function(response) {
                                    if(response){
                                    	$('#mensagem_cpf').show();
                                    	$('#cpf').val('');
                                    	$('#cpf').css({"border-color" : "#F00", "padding": "2px"});
                                    	$('#cpf').focus();
                                    	
                                	}else{
                                		$('#mensagem_cpf').hide();
                                		$('#mensagem_obrigatorio').hide();
                                    	
                                	}
                                }
                            });

                            return false;
                        

                    }// fim do jquery


                    function confirmar(){
                    	$('#myModal').on('shown.bs.modal', function () {
                    		  $('#myInput').trigger('focus')
                    	});
                    }

                    var pagamentos = new Array();
                    
                    function beforeSave()
                    {
                    	var table = $('#table_forma_pagamento tbody');
                    	
                    	table.find('tr').each(function() {
                    	  $.each($(this).find('td'), function(index,item){
                    		  if(index != 4){
                    			  pagamentos.push($(item).text());
                    		  }
                    		  
                    	  });
                    	});
                    	
                    	var hidden = document.getElementById('formas_pagamentos');
                     	var form = document.getElementById('formInscricao');
                     	var nomeNaoPreenchido = ($('#nome').val() == '');
                     	var cpfNaoPreenchido = ($('#cpf').val() == '');
                     	
                     	if(cpfNaoPreenchido){
                     		$('#cpf').css({"border-color" : "#F00", "padding": "2px"});
                         	$('#cpf').focus();
                     	}
                     	
                     	if(nomeNaoPreenchido){
                     		$('#nome').css({"border-color" : "#F00", "padding": "2px"});
                         	$('#nome').focus();
                         	
                     	}
                     	
                     	
                     	if(nomeNaoPreenchido || cpfNaoPreenchido){
                     		$('#mensagem_obrigatorio').show();
                     		return;
                     	}
                     	
                     	hidden.value = pagamentos;
                     	form.submit();
                    }

            	</script>
        		
        	</header>
        	<div id="mensagem_cpf" class="row">
        		<div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>J&aacute; existe um campista inscrito com este CPF.
                </div>
        	</div>
        	<div id="mensagem_obrigatorio" class="row">
        		<div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Campo(s) obrigat&oacuterio(s)
                </div>
        	</div>
        	<div class="row">
        		<div class="panel panel-info">
            		<div class="panel-heading">Cadastrar Campista</div>
        			<div class="panel-body">
        			
        				<form id="formInscricao" method = "POST" data-toggle="validator">
        					<input type="hidden" id="action" name="action" />
        					<input type="hidden" id="data_nascimento" name="data_nascimento" />
        					<input type="hidden" id="formas_pagamentos" name="formas_pagamentos"/>
        					<input type="hidden" id="idade" name="idade"/>
         					<div class="row">
         					
         						<div class="form-group col-md-4">
                                  <label for="nome">Respons&agrave;vel pela Inscri&ccedil;&atilde;o</label>
                                  <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" disabled value="<?php echo $nome_responsavel;?>">
                            	</div>
                        	</div>
                        	
                        	<div class="row">
                        	
                            	<div class="col-md-8">
                                	<div class="panel panel-default">
                                		<div class="panel-heading">Dados Pessoais</div>
                            			<div class="panel-body">
                                        	<div class="row">
                         						<div class="form-group col-md-6">
                                                 	<label for="cpf">CPF<img id="loading_cpf" width="80" height="50" src="../../resources/img/loading.gif" /></label>
                                                  	<input type="text" class="form-control" id="cpf" name="cpf" onblur="javascript:validarCPF()">
                                            	</div>
                         						<div class="form-group col-md-6">
                                                  <label for="nome">Nome</label>
                                                  <input type="text" class="form-control" id="nome" name="nome">
                                            	</div>
                                        	</div>
                                        	<div class="row">
                                        		<div class="form-group col-md-4">
                                                    <label for="dtp_input" class="control-label">Data de Nascimento</label>
                			                    	<div class="input-group date form_date" data-date="" id="dtp_input" data-date-format="dd MM yyyy" data-link-field="data_nascimento" data-link-format="dd-mm-yyyy">
                                					    <input class="form-control" size="16" type="text" value="" readonly disabled>
                                    					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" onclick="javascript:showCalendar()"></span></span>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="campo_idade">Idade</label>
                                					<input id="campo_idade" name="campo_idade" type="text" class="form-control" disabled/>
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="rg">RG</label>
                                					<input id="rg" name="rg" type="text" class="form-control" />
                                                </div>
                                        	</div>
                                        	
                                        	<div class="row">
                                        		<div class="form-group col-md-4">
                                                  	<label for="sexo">Sexo</label>
                                                	<select class="form-control selectpicker" name="sexo" id="sexo">
                                                		<option value="">--SELECIONE--</option>
                                                    	<option value="masculino">MASCULINO</option>
                                                    	<option value="feminino">FEMININO</option>
                                                	</select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="peso">Peso</label>
                                					<input id="peso" name="peso" type="text" class="form-control" placeholder="Kg" />
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="altura">Altura</label>
                                					<input id="altura" name="altura" type="text" class="form-control" placeholder="Em metros"/>
                                                </div>
                                        		
                                                
                                                <div class="form-group col-md-3">
                                                  	<label for="camisa">Camisa</label>
                                                	<select class="form-control selectpicker" name="camisa" id="camisa">
                                                		<option value="">--SELECIONE--</option>
                                                    	<option value="pp">PP</option>
                                                    	<option value="p">P</option>
                                                    	<option value="m">M</option>
                                                    	<option value="g">G</option>
                                                    	<option value="gg">GG</option>
                                                    	<option value="xg">XG</option>
                                                	</select>
                                                </div>
                                            </div>
                            			</div>
                        			</div>
                    			</div>
                        	
                            	<div class="col-md-4">
                                	<div class="panel panel-default">
                                		<div class="panel-heading">Dados Espirituais</div>
                            			<div class="panel-body">
                                        	
                                        	<div class="row">
                                        		<div class="form-group col-md-12">
                                                    <label for="paroquia">Par&oacute;quia/Grupo/Comunidade</label>
                                					<input id="paroquia" name="paroquia" type="text" class="form-control" />
                                                </div>
                                        	</div>
                                        	<div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="paroco">P&aacute;roco</label>
                                					<input id="paroco" name="paroco" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        	<div class="row">
                                                <div class="form-group col-md-12" style="margin-top: 20px">
                                                  	<label for="sacramento">Sacramento</label>
                                                	<?php selected_sacramento()?>
                                                </div>
                                        	</div>
                            			</div>
                        			</div>
                    			</div>
                			</div>
                			
                			<!-- ENDERECO -->
                			<div class="row">
                    			<div class="col-md-8">
                                	<div class="panel panel-default">
                                		<div class="panel-heading">Endere&ccedil;o</div>
                            			<div class="panel-body">
                            			
                            				<div class="row">
                                        		<div class="form-group col-md-6">
                                                    <label for="cep">CEP<img id="loading" width="80" height="50" src="../../resources/img/loading.gif" /></label>
                                					<input id="cep" name="cep" type="text" class="form-control"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="rua">Logradouro</label>
                                					<input id="rua" name="rua" type="text" class="form-control"/>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="numero">N&uacute;mero</label>
                                					<input id="numero" name="numero" type="text" class="form-control"/>
                                                </div>
                                        	</div>
                                        	<div class="row">
                                        		<div class="form-group col-md-6">
                                                    <label for="bairro">Bairro</label>
                                					<input id="bairro" name="bairro" type="text" class="form-control"/>
                                            	</div>
                                            	<div class="form-group col-md-6">
                                                    <label for="complemento">Complemento</label>
                                					<input id="complemento" name="complemento" type="text" class="form-control" value=""/>
                                                </div>
                        					</div>
                        					<div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="cidade">Cidade</label>
                                					<input id="cidade" name="cidade" type="text" class="form-control" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  	<label for="uf">UF</label>
                                                	<?php selected_UF(); ?> 
                                              	</div>
                                          	</div>
                            			</div>
                            		</div>
                				</div>
                				<div class="col-md-4">
                                	<div class="panel panel-default">
                                		<div class="panel-heading">Contato</div>
                            			<div class="panel-body">
                            				<div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="telefone">Telefone</label>
                                					<input id="telefone" name="telefone" type="text" class="form-control" value=""/>
                                                </div>
											</div>
                                           	<div class="row">
                                                <div class="form-group col-md-12">
                                                  	<label for="email">E-mail</label>
                                					<input id="email" name="email" type="email" class="form-control" placeholder="exemplo@email.com" value=""/>
                                              	</div>
                                          	</div>
                            			</div>
                        			</div>
                    			</div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-md-12">
                                	<div class="panel panel-default">
                                		<div class="panel-heading">Sa&uacute;de</div>
                            			<div class="panel-body">
                            				<div class="row">
                                                <div class="form-group col-md-5">
                                                    <label for="problema_saude">Possui algum problema de sa&uacute;de/alergia?</label>
                                					<input id="problema_saude" name="problema_saude" placeholder="Sim? Qual?" type="text" class="form-control" value=""/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                  	<label for="remedio">Toma algum medicamento?</label>
                                					<input id="remedio" name="remedio" type="text" placeholder="Sim? Qual?" class="form-control" value=""/>
                                              	</div>
                                              	<div class="form-group col-md-3">
                                                  	<label for="plano_saude">Possui plano de sa&uacute;de?</label>
                                					<input id="plano_saude" name="plano_saude" type="text" placeholder="Sim? Qual?" class="form-control" value=""/>
                                              	</div>
                                          	</div>
                            			
                            			</div>
                            			
                        			</div>
                    			</div>
                			</div>
                            
                            <div class="row">
                            	<div class="col-md-8">
                                	<div class="panel panel-default">
                                		<div class="panel-heading">Sobre Acampamento</div>
                            			<div class="panel-body">
                            			
                                			<div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="conhece_acampamento">Conhece o acampamento?</label>
                                					<input id="conhece_acampamento" name="conhece_acampamento" type="text" class="form-control" value=""/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  	<label for="porque_parcicipar">Por que quer participar?</label>
                                					<input id="porque_parcicipar" name="porque_parcicipar" type="text" class="form-control" value=""/>
                                              	</div>
                                          	</div>
                                        	
                                        	<div class="row">
                                              	<div class="form-group col-md-6">
                                                  	<label for="conhece_campista">Conhece algum campista?</label>
                                					<input id="conhece_campista" name="conhece_campista" type="text" placeholder="Sim? Quem?" class="form-control" value=""/>
                                              	</div>
                                              	<div class="form-group col-md-6">
                                                  	<label for="conhece_equipe">Conhece alguem da equipe?</label>
                                					<input id="conhece_equipe" name="conhece_equipe" type="text" placeholder="Sim? Quem?" class="form-control" value=""/>
                                              	</div>
                                      		</div>
                                      		<div class="row">
                                              	<div class="form-group col-md-12">
                                                  	<label for="observacoes_sobre_acampamento">Observa&ccedil;&otilde;es</label>
                                					<input  id="observacoes_sobre_acampamento" type="text" class="form-control"/>
                                              	</div>
                                          	</div>
                            			
                            			</div>
                        			</div>
                    			</div>
                    			<div class="col-md-4">
                                	<div class="panel panel-default">
                                		<div class="panel-heading">Respons&aacute;vel</div>
                            			<div class="panel-body">
                            				<div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="responsavel">Nome do respons&aacute;vel</label>
                                					<input id="responsavel" name="responsavel" type="text" class="form-control" value=""/>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                  	<label for="telefone_responsavel">Telefone respons&aacute;vel</label>
                                					<input id="telefone_responsavel" name="telefone_responsavel" type="text" class="form-control" value=""/>
                                              	</div>
                                          	</div>
                                            <div class="row">
                                              	<div class="form-group col-md-12">
                                                  	<label for="grau_parentesco">Grau de parentesco</label>
                                					<input id="grau_parentesco" name="grau_parentesco" type="text" class="form-control" placeholder="Pai / M&atilde;e / Irm&atilde;o / Amigo" value=""/>
                                              	</div>
                                          	</div>
                            			</div>
                        			</div>
                    			</div>
                			</div>
                			
                			<div class="row">
                            	<div class="col-md-12">
                                	<div class="panel panel-success">
                                		<div class="panel-heading">Pagamento</div>
                            			<div class="panel-body">
                                          	<div class="row">
                                              	<div class="form-group col-md-3">
                                                  	<label for="forma_pagamento">Forma de pagamento</label>
                                                  	<select class="form-control selectpicker" name="forma_pagamento" id="forma_pagamento">
                                                		<option value="selecione">--SELECIONE--</option>
                                                    	<option value="dinheiro">Dinheiro</option>
                                                    	<option value="cheque">Cheque</option>
                                                    	<option value="cartao_debito">Cart&atilde;o d&eacute;bito</option>
                                                    	<option value="cartao_credito">Cart&atilde;o cr&eacute;dito</option>
                                                    	<option value="cartao_credito_parcelado">Cart&atilde;o cr&eacute;dito parcelado</option>
                                                    	<option value="bolsa">Bolsa</option>
                                                    </select>
                                              	</div>
                                          	</div>
                                          	<div class="row">
                                              	<div id="div_valor" class="form-group col-md-2">
                                                  	<label id="label_valor" for="valor">Valor</label>
                                					<input id="valor" name="valor" type="text" class="form-control" value=""/>
                                              	</div>
                                              	<div id="div_valor_parcela" class="form-group col-md-2">
                                                  	<label id="label_valor_parcela" for="valor_parcela">Valor da parcela</label>
                                					<input id="valor_parcela" name="valor_parcela" type="text" class="form-control" value=""/>
                                              	</div>
                                              	
                                              	<div id="div_quantidade_parcela" class="form-group col-md-2">
                                                  	<label id="label_quantidade_parcela" for="quantidade_parcela">Quantidade de parcelas</label>
                                					<input id="quantidade_parcela" name="quantidade_parcela" type="text" class="form-control" value=""/>
                                              	</div>
                                              	
                                           	</div>
                                           	<div class="row">
                                              	<div id="div_desconto" class="form-group col-md-2">
                                                  	<label id="label_valor_desconto" for="valor_desconto">Valor desconto</label>
                                					<input id="valor_desconto" name="valor_desconto" type="text" class="form-control" value="" placeholder="Possui desconto?"/>
                                              	</div>
                                              	<div id="div_botao_add_pagamento" class="form-group col-md-1">
                                					<a onclick="javascript:addTableRow()" class="btn btn-sm btn-primary" id="btn_add_pagamento" style="margin-top: 27px">&#10003 Adicionar</a> 
                                               	</div>
                                           	</div>
                                           	<div class="row">
                                               	<div class="col-md-7">
                                               		<div class="form-group">
                										<label>Formas de pagamento</label>
                										<div class="ui-datatable ui-widget">
                											<div class="ui-datatable-tablewrapper">
                												<table role="grid" id="table_forma_pagamento">
                													<thead>
                														<tr role="row">
                															<th class="ui-state-default text-center" >
																				Tipo
                															</th>
                															<th class="ui-state-default text-center" >
																				Valor / Parcela
                															</th>
                															<th class="ui-state-default text-center" >
																				Quantidade de parcelas
                															</th>
                															<th class="ui-state-default text-center" >
																				Desconto
                															</th>
                															<th class="ui-state-default text-center" >
																				A&ccedil;&otilde;es	
                															</th>
                														</tr>
                													</thead>
                													 <tfoot>
                                                                      
                                                                    </tfoot>
                													<tbody class="ui-datatable-data ui-widget-content">
<!--                 														<tr class="ui-widget-content ui-datatable-empty-message"> -->
<!--                     													</tr> -->
                													</tbody>
                												</table>
                											</div>
                										</div>
                									</div>
                                               	</div>
                                          	</div>
                                          	<div class="row">
                                              	<div class="form-group col-md-7">
                                                  	<label for="observacoes_pagamento">Observa&ccedil;&otilde;es de Pagamento</label>
                                					<textarea id="observacoes_pagamento" cols="40" rows="2" class="form-control"></textarea>
                                              	</div>
                                          	</div>
                            			
                            			</div>
                        			</div>
                    			</div>
                			</div>
                        			 
                          	
                          	
                            <div class=row>
                				<div class="form-group col-md-4">
                					<a id="btn_salvar" onclick="javascript:beforeSave()" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Salvar</a> 
                					<a href="lista.php" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                					
                               	</div>
                           	</div>
        				</form>
        			</div>
        		</div>
    		</div>
        </div>
        
      
   </body>
   
    
</html>
       
      