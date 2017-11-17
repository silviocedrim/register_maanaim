<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$id = 0;
$campista = null;
if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = $_GET['id'];
    $campista = buscarRegistroPorId(CAMPISTA, $id);
}

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $dados = $_POST;
    
    update(MEMBRO, $id, $dados);
    
    header("Location: lista.php");
}

$dados = buscarRegistroPorId(MEMBRO, $id);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="container">
       		<header>
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Membros</h2>
            		</div>
        		</div>
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-default">

        		<?php foreach ($campista as $dado) {?>
            		<div class="panel-heading">Editar</div>
        			<div class="panel-body">
        			
        				<form method="POST" id="formInscricao" data-toggle="validator">
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
                                                  	<input type="text" class="form-control" id="cpf" name="cpf" disabled value="<?php echo $dado['cpf'];?>">
                                            	</div>
                         						<div class="form-group col-md-6">
                                                  <label for="nome">Nome</label>
                                                  <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dado['nome']; ?>">
                                            	</div>
                                        	</div>
                                        	<div class="row">
                                        		<div class="form-group col-md-4">
                                                    <label for="dtp_input" class="control-label">Data de Nascimento</label>
                			                    	<div class="input-group date form_date" data-date="" id="dtp_input" data-date-format="dd MM yyyy" data-link-field="data_nascimento" data-link-format="dd-mm-yyyy">
                                					    <input class="form-control" size="16" type="text" value="<?php $dado['data_nascimento'];?>" readonly disabled>
                                    					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" onclick="javascript:showCalendar()"></span></span>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="campo_idade">Idade</label>
                                					<input id="campo_idade" name="campo_idade" value="<?php echo $dado['idade'];?>" type="text" class="form-control" disabled/>
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="rg">RG</label>
                                					<input id="rg" name="rg" type="text" class="form-control" value="<?php echo $dado['rg'];?>"/>
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
                                
                                <div class="form-group col-md-4">
                                  <label for="email">E-mail</label>
                                  <input type="email" class="form-control" placeholder="email@exemplo.com" name="email" required value="<?php echo $dado['email']?>">
                            	</div>
                                
                                <div class="form-group col-md-3">
                                  	<label for="grau_pertenca">Grau de Perten&ccedil;a</label>
                                	<?php selected_grau_pertenca($dado['grau_pertenca'])?>
                                </div>
                            </div>
                            <div class=row>
                				<div class="form-group col-md-4">
                					<input type="submit" value="&#10003 Salvar" class="btn btn-primary" /> 
                					<a href="lista.php" class="btn btn-danger">&#10005 Cancelar</a>
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
       
      