<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$id = 0;
$campista = null;

if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = $_GET['id'];
}
$campista = buscarRegistroPorId(CAMPISTA, $id);
$id_responsavel = $campista[0]['id_responsavel'];
$responsavel = buscarMembros($id_responsavel);
$nome_responsavel = $responsavel[0]['nome'];

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    
    $dados = $_POST;
    
    update(CAMPISTA, $id, $dados);
    header("Location: lista.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="col-md-12">
       		<header>
        		<script>
            		jQuery(function($){
            			correios.init( '6CTKkcmHuqSnl90jz58KxXe5DMDld9gi', 'Z6Urr77Dz3H9UXv6j6buyC1FsLV8kPoobq8ho1LqXB4yEVyh' );
            			$('#loading').hide();
            			$('#cep').correios( '#rua', '#bairro', '#cidade', '#uf', '#loading', '#numero' );
            			$("#cpf").mask("999.999.999-99");
            			$("#cep").mask("99999-999");
            			$("#telefone").mask("(99) 99999-9999");
                        $('#telefone_responsavel').mask("(99) 99999-9999");
                        
            		});

    			</script>
    			
    			
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-warning">

        		
            		<div class="panel-heading">Editar</div>
        			<div class="panel-body">
        			
        				<form method="POST" data-toggle="validator">
         					
         					<div class="row">
         					
         						<div class="form-group col-md-4">
                                  <label for="nome_responsavel">Respons&agrave;vel pela Inscri&ccedil;&atilde;o</label>
                                  <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" disabled value="<?php echo $nome_responsavel?>">
                            	</div>
                        	</div>
                        	<?php foreach ($campista as $dado) {?>
         					
             					<div class="row">
                            		<div class="col-md-8">
                                    	<div class="panel panel-default">
                                    		<div class="panel-heading">Dados Pessoais</div>
                                			<div class="panel-body">
                                            	
                                            	
                                            	<div class="row">
                             						<div class="form-group col-md-6">
                                                     	<label for="cpf">CPF</label>
                                                      	<input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $dado['cpf']?>" disabled>
                                                	</div>
                             						<div class="form-group col-md-6">
                                                      <label for="nome">Nome</label>
                                                      <input id="nome" name="nome" type="text" class="form-control"  value="<?php echo $dado['nome']?>">
                                                	</div>
                                            	</div>
                                            	<div class="row">
                                            		<div class="form-group col-md-4">
                                                        <label for="dtp_input" class="control-label">Data de Nascimento</label>
                                    					<input class="form-control" size="16" type="text" value="<?php echo $dado['data_nascimento']?>" readonly disabled>
                                        					
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <label for="idade">Idade</label>
                                    					<input id="idade" name="idade" type="text" class="form-control" value="<?php echo $dado['idade']?>" disabled/>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="rg">RG</label>
                                    					<input id="rg" name="rg" type="text" class="form-control" value="<?php echo $dado['rg']?>">
                                                    </div>
                                            	</div>
                                            	
                                            	<div class="row">
                                            		<div class="form-group col-md-4">
                                                      	<label for="sexo">Sexo</label>
                                                    	<?php selected_sexo($dado['sexo'])?>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="peso">Peso</label>
                                    					<input id="peso" name="peso" type="text" class="form-control" value="<?php echo $dado['peso']?>">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-3">
                                                        <label for="altura">Altura</label>
                                    					<input id="altura" name="altura" type="text" class="form-control" value="<?php echo $dado['altura']?>" />
                                                    </div>
                                            		
                                                    
                                                    <div class="form-group col-md-3">
                                                      	<label for="camisa">Camisa</label>
                                                    	<?php selected_camisa($dado['camisa'])?>
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
                                    					<input id="paroquia" name="paroquia" type="text" class="form-control" value="<?php echo $dado['paroquia']?>" />
                                                    </div>
                                            	</div>
                                            	<div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="paroco">P&aacute;roco</label>
                                    					<input id="paroco" name="paroco" type="text" class="form-control" value="<?php echo $dado['paroco']?>" />
                                                    </div>
                                                </div>
                                            	<div class="row">
                                                    <div class="form-group col-md-12" style="margin-top: 20px">
                                                      	<label for="sacramento">Sacramento</label>
                                                    	<?php selected_sacramento($dado['sacramento'])?>
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
                                    					<input id="cep" name="cep" type="text" class="form-control" value="<?php echo $dado['cep']?>" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="rua">Logradouro</label>
                                    					<input id="rua" name="rua" type="text" class="form-control" value="<?php echo $dado['rua']?>" />
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <label for="numero">N&uacute;mero</label>
                                    					<input id="numero" name="numero" type="text" class="form-control" value="<?php echo $dado['numero']?>" />
                                                    </div>
                                            	</div>
                                            	<div class="row">
                                            		<div class="form-group col-md-6">
                                                        <label for="bairro">Bairro</label>
                                    					<input id="bairro" name="bairro" type="text" class="form-control" value="<?php echo $dado['bairro']?>" />
                                                	</div>
                                                	<div class="form-group col-md-6">
                                                        <label for="complemento">Complemento</label>
                                    					<input id="complemento" name="complemento" type="text" class="form-control" value="<?php echo $dado['complemento']?>" >
                                                    </div>
                            					</div>
                            					<div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="cidade">Cidade</label>
                                    					<input id="cidade" name="cidade" type="text" class="form-control" value="<?php echo $dado['cidade']?>" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      	<label for="uf">UF</label>
                                                    	<?php selected_UF($dado['uf']); ?> 
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
                                    					<input id="telefone" name="telefone" type="text" class="form-control" value="<?php echo $dado['telefone']?>" />
                                                    </div>
    											</div>
                                               	<div class="row">
                                                    <div class="form-group col-md-12">
                                                      	<label for="email">E-mail</label>
                                    					<input id="email" name="email" type="email" class="form-control" value="<?php echo $dado['email']?>" />
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
                                    					<input id="problema_saude" name="problema_saude" placeholder="Sim? Qual?" type="text" class="form-control" value="<?php echo $dado['problema_saude']?>" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                      	<label for="remedio">Toma algum medicamento?</label>
                                    					<input id="remedio" name="remedio" type="text" placeholder="Sim? Qual?" class="form-control" value="<?php echo $dado['remedio']?>" />
                                                  	</div>
                                                  	<div class="form-group col-md-3">
                                                      	<label for="plano_saude">Possui plano de sa&uacute;de?</label>
                                    					<input id="plano_saude" name="plano_saude" type="text" placeholder="Sim? Qual?" class="form-control" value="<?php echo $dado['plano_saude']?>" />
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
                                    					<input id="conhece_acampamento" name="conhece_acampamento" type="text" class="form-control" value="<?php echo $dado['conhece_acampamento']?>" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      	<label for="porque_parcicipar">Por que quer participar?</label>
                                    					<input id="porque_parcicipar" name="porque_parcicipar" type="text" class="form-control" value="<?php echo $dado['porque_parcicipar']?>" />
                                                  	</div>
                                              	</div>
                                            	
                                            	<div class="row">
                                                  	<div class="form-group col-md-6">
                                                      	<label for="conhece_campista">Conhece algum campista?</label>
                                    					<input id="conhece_campista" name="conhece_campista" type="text" placeholder="Sim? Quem?" class="form-control" value="<?php echo $dado['conhece_campista']?>" />
                                                  	</div>
                                                  	<div class="form-group col-md-6">
                                                      	<label for="conhece_equipe">Conhece alguem da equipe?</label>
                                    					<input id="conhece_equipe" name="conhece_equipe" type="text" placeholder="Sim? Quem?" class="form-control" value="<?php echo $dado['conhece_equipe']?>" />
                                                  	</div>
                                          		</div>
                                          		<div class="row">
                                                  	<div class="form-group col-md-12">
                                                      	<label for="observacoes_sobre_acampamento">Observa&ccedil;&otilde;es</label>
                                    					<input  id="observacoes_sobre_acampamento" name="observacoes_sobre_acampamento" type="text" class="form-control" value="<?php echo $dado['observacoes_sobre_acampamento']?>"/>
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
                                    					<input id="responsavel" name="responsavel" type="text" class="form-control" value="<?php echo $dado['responsavel']?>" />
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                      	<label for="telefone_responsavel">Telefone respons&aacute;vel</label>
                                    					<input id="telefone_responsavel" name="telefone_responsavel" type="text" class="form-control"value="<?php echo $dado['telefone_responsavel']?>" />
                                                  	</div>
                                              	</div>
                                                <div class="row">
                                                  	<div class="form-group col-md-12">
                                                      	<label for="grau_parentesco">Grau de parentesco</label>
                                    					<input id="grau_parentesco" name="grau_parentesco" type="text" class="form-control" value="<?php echo $dado['grau_parentesco']?>" />
                                                  	</div>
                                              	</div>
                                			</div>
                            			</div>
                        			</div>
                    			</div>
                    			
                    			
                           <div class=row>
                				<div class="form-group col-md-4">
                					<input type="submit" value="&#10003 Salvar" class="btn btn-primary" /> 
                					<a href="lista.php" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                					
                               	</div>
                           	</div>
        				</form>
        			</div>
        		</div>
        		<?php }?>
    		</div>
        </div>
   </body>
</html>
       
      