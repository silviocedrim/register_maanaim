<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$dados = buscarTodosOsRegistros(MEMBRO);
$mensagens = new Mensagens();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="col-md-12">
       		<header>
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Membros</h2>
            		</div>
    				<div class="col-sm-6 text-right h2" align="right">
    					<a href="adicionar.php" class="btn btn-sm btn-primary">&#10010 Novo Membro</a>
    				</div>
        		</div>
        		
        	</header>
        	<div class="row">
            	<?php $mensagens->imprimirMensagem(); ?>
        	</div>
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Lista de Membros</div>
            			<div class="panel-body">

                			<!-- TABLE -->
                			<table class="table table-bordered table-striped">
                				<thead  class="blue-grey lighten-4">
                					<tr>
                						<th>Nome</th>
                						<th>E-mail</th>
                						<th>Grau de Perten&ccedil;a</th>
                						<th>Login</th>
                						<th class="ui-state-default text-center">A&ccedil;&otilde;es</th>
                					</tr>
                				</thead>
                				
                				<?php foreach ($dados as $membro){ 
                				?>
                				
                				<tbody>
                					<tr>
                						<td><?php echo $membro['nome']; ?></td>
                						<td><?php echo $membro['email']; ?></td>
                						<td><?php echo formatarGrauDePertencia($membro['grau_pertenca']); ?></td>
                						<td><?php echo $membro['login']; ?></td>
                						<td align="center">
                							<a title="Alterar" class="btn-sm btn-warning" href="editar.php?id=<?php echo $membro['id']?>"><i class="fa fa-pencil-square-o"></i></a>
<!--                   							<a title="Excluir" id="btn-excluir" href="excluir.php?id=--><?php //echo $membro['id']?><!--" class="btn-sm btn-danger tooltipBtn"><i class="fa fa-trash-o"></i></a>-->
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

