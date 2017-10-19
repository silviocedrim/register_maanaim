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

        		<?php foreach ($dados as $dado) {?>
            		<div class="panel-heading">Editar</div>
        			<div class="panel-body">
        			
        				<form method = "POST" data-toggle="validator">
         					<div class="row">
                
                                <div class="form-group col-md-5">
                                  <label for="nome">Nome</label>
                                  <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $dado['nome']?>">
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
       
      