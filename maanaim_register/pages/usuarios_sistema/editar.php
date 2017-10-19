<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$id = 0;

if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = $_GET['id'];
}

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $dados = $_POST;
    
    update(MEMBRO, $id, $dados);
    
    header("Location: lista.php");
}

$dados = buscarUsuarios($id);
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

            		<div class="panel-heading">Editar</div>
        			<div class="panel-body">
        			
        				<form method = "POST" data-toggle="validator">
         					<div class="row">
         					
                        		<?php foreach ($dados as $dado) { ?>
         						<div class="form-group col-md-4">
                                  	<label for="membro">Membro</label>
                                	<input type="text" class="form-control" disabled id="membro" name="membro" required value="<?php echo $dado['nome'];?>">
                                </div>
                
                                <div class="form-group col-md-3">
                                  <label for="login">Login</label>
                                  <input type="text" class="form-control" id="login" name="login" required value="<?php echo $dado['login'];?>">
                            	</div>
                                
                                <div class="form-group col-md-3">
                                  <label for="senha">Senha</label>
                                  <input type="password" class="form-control" name="senha" required value="<?php echo $dado['senha'];?>">
                            	</div>
                            	
                            	<div class=row>
                    				<div class="form-group col-md-4">
                    					<input type="submit" value="&#10003 Salvar" class="btn btn-primary" /> 
                    					<a href="lista.php" class="btn btn-danger">&#10005 Cancelar</a>
                                   	</div>
                           		</div>
                
                    		<?php }?>
                            </div>
        				</form>
        			</div>
        		</div>
    		</div>
        </div>
   </body>
</html>
       
      