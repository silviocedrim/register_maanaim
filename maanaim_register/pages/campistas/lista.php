<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$dados = buscarTodosOsRegistros(MEMBRO);
$mensagens = new Mensagens();
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
    				<div class="col-sm-6 text-right h2" align="right">
    					<a href="adicionar.php" class="btn btn-sm btn-primary">&#10010 Nova Inscri&ccedil;&atilde;o</a>
    				</div>
        		</div>
        		
        	</header>
        	<div class="row">
            	<?php $mensagens->imprimirMensagem(); ?>
        	</div>
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Lista de Campistas</div>
            			<div class="panel-body">

                			
                    		<!-- END TABLE -->
            		</div>
        		</div>
    		</div>
    	
    	</div>
    </body>
</html>

