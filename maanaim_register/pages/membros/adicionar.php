<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

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
            			<h2>Membros</h2>
            		</div>
        		</div>
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Cadastrar Membros</div>
        			<div class="panel-body">
        			
        				<form method = "POST" data-toggle="validator">
         					<div class="row">
                
                                <div class="form-group col-md-5">
                                  <label for="nome">Nome</label>
                                  <input type="text" class="form-control" id="nome" name="nome" required>
                            	</div>
                                
                                <div class="form-group col-md-4">
                                  <label for="email">E-mail</label>
                                  <input type="email" class="form-control" placeholder="email@exemplo.com" name="email" required>
                            	</div>
                                
                                <div class="form-group col-md-3">
                                  	<label for="grau_pertenca">Grau de Perten&ccedil;a</label>
                                	<select class="form-control selectpicker" name="grau_pertenca" id="grau_pertenca" required>
                                		<option value="">--Selecione--</option>
                                    	<option value="irmao">IRM&Atilde;O</option>
                                    	<option value="vocacionado">VOCACIONADO</option>
                                    	<option value="missionário">MISSION&Aacute;RIO</option>
                                    	<option value="consagrado">CONSAGRADO</option>
                                	</select>
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
       
      