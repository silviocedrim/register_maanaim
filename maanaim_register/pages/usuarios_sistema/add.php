<?php
require_once ('../../biblioteca/functions/Functions.php');
require_once ('../../biblioteca/functions/DB_Functions.php');
require_once ('../../biblioteca/util/Mensagens.php');
require_once ('../include/header.php');
require_once ('../menu/menu.php');

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    
    
    insert(USUARIO, $_POST);
    
    
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
                
                                <div class="form-group col-md-3">
                                  <label for="nome">Nome</label>
                                  <input type="text" class="form-control" id="nome" name="nome" required>
                            	</div>
                                
                                <div class="form-group col-md-3">
                                  <label for="email">E-mail</label>
                                  <input type="email" class="form-control" placeholder="email@exemplo.com" name="email" required>
                            	</div>
                                
                                <div class="form-group col-md-3">
                                  <label for="login">login</label>
                                  <input type="text" class="form-control" name="login" required>
                            	</div>
                            	
                            	<div class="form-group col-md-3">
                                  <label for="senha">Senha</label>
                                  <input type="password" class="form-control" name="senha" required>
                            	</div>
                            </div>
                            <div class=row>
                				<div class="form-group col-md-4">
                					<input type="submit" value="&#10003 Cadastrar" class="btn btn-primary" /> 
                					<a href="list.php" class="btn btn-danger">&#10005 Cancelar</a>
                               	</div>
                           	</div>
        				</form>
        			</div>
        		</div>
    		</div>
        </div>
   </body>
</html>
       
      