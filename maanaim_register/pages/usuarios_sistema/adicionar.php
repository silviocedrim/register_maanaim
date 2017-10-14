<?php
require_once ('../../biblioteca/functions/Functions.php');
require_once ('../../biblioteca/functions/DB_Functions.php');
require_once ('../../biblioteca/util/Mensagens.php');
require_once ('../include/header.php');
require_once ('../menu/menu.php');

if (isset($_POST['id_membro']) && empty($_POST['id_membro']) == false) {
    
    insert(USUARIO, $_POST);
    
    
    header("Location: lista.php");
}

$membros = buscarTodosOsRegistros(MEMBRO);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="container">
       		<header>
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Usu&aacute;rios</h2>
            		</div>
        		</div>
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Cadastrar Usu&aacute;rios</div>
        			<div class="panel-body">
        			
        				<form method = "POST" data-toggle="validator">
         					<div class="row">
                                <div class="form-group col-md-4">
                                  	<label for="membro">Membros</label>
                                	<select class="form-control selectpicker" name="id_membro" id="id_membro" required>
                                		<option value="">--SELECIONE--</option>
                                		<?php foreach ($membros as $membro){
                                		      echo '<option value="' . $membro['id']. '">'. $membro['nome'] .'</option>';
                                		}?>
                                	</select>
                                </div>
                
                                <div class="form-group col-md-3">
                                  <label for="login">Login</label>
                                  <input type="text" class="form-control" id="login" name="login" required>
                            	</div>
                                
                                <div class="form-group col-md-3">
                                  <label for="senha">Senha</label>
                                  <input type="password" class="form-control" name="senha" required>
                            	</div>
                            	
                            	<div class="form-group col-md-2">
                            	<div class="checkbox">
                                   <label><input type="checkbox" id="administrador" name="administrador">Administrador</label>
                            	</div>
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
       
      