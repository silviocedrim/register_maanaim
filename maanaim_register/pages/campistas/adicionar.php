<?php
require_once ('../../biblioteca/functions/Functions.php');
require_once ('../../biblioteca/functions/DB_Functions.php');
require_once ('../../biblioteca/util/Mensagens.php');
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$nome_responsavel = $_SESSION['nome'];
$id_responsavel = $_SESSION['id'];



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
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Cadastrar Campista</div>
        			<div class="panel-body">
        			
        				<form method = "POST" data-toggle="validator">
         					<div class="row">
         					
         						<div class="form-group col-md-4">
                                  <label for="nome">Respons&agrave;vel pela Inscri&ccedil;&atilde;o</label>
                                  <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $nome_responsavel;?>">
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
       
      