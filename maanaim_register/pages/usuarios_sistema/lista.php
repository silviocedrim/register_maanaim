<?php
require_once ('../../biblioteca/functions/Functions.php');
require_once ('../../biblioteca/functions/DB_Functions.php');
require_once ('../../biblioteca/util/Mensagens.php');
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$dados = buscarTodosOsRegistros(USUARIO);
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
    				<div class="col-sm-6 text-right h2" align="right">
    					<a href="add.php" class="btn btn-primary">&#10010 Novo Usu&aacute;rio</a>
    				</div>
        		</div>
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Lista de Usu&aacute;rios</div>
            			<div class="panel-body">

                			<!-- TABLE -->
                			<table class="table table-bordered">
                				<thead  class="blue-grey lighten-4">
                					<tr>
                						<th>Nome</th>
                						<th>E-mail</th>
                						<th>Login</th>
                						<th>Administrador</th>
                						<th align="center">A&ccedil;&otilde;es</th>
                					</tr>
                				</thead>
                				
                				<?php foreach ($dados as $usuario){ 
                				?>
                				
                				<tbody>
                					<tr>
                						<td><?php echo $usuario['nome']; ?></td>
                						<td><?php echo $usuario['email']; ?></td>
                						<td><?php echo $usuario['login']; ?></td>
                						<td><?php echo $usuario['administrador']; ?></td>
                						<td align="center">
                							<a title="Alterar" class="btn btn-warning" href="editar.php?id="<?php $usuario['id']?>>&#9999; Alterar</a>
                   							<a title="Excluir" href="excluir.php?id=" <?php $usuario['id']?> class="btn btn-danger tooltipBtn">&#10006; Excluir</a>
                   						</td>
                					</tr>
                				</tbody>
                				
                				<?php }?>
                				
                			</table>
                    		<!-- END TABLE -->
            		</div>
        		</div>
    		</div>
    	
    	</div>
    </body>
</html>

