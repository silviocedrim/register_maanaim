<?php
require_once ('../../biblioteca/functions/Functions.php');
require_once ('../../biblioteca/functions/DB_Functions.php');
require_once ('../../biblioteca/util/Mensagens.php');
require_once ('../include/header.php');
require_once ('../modal/modal.php');
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
    					<a href="adicionar.php" class="btn btn-primary">&#10010 Novo Membro</a>
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
                			<table class="table table-bordered">
                				<thead  class="blue-grey lighten-4">
                					<tr>
                						<th>Nome</th>
                						<th>E-mail</th>
                						<th>Grau de Perten&ccedil;a</th>
                						<th align="center">A&ccedil;&otilde;es</th>
                					</tr>
                				</thead>
                				
                				<?php foreach ($dados as $dado){ 
                				?>
                				
                				<tbody>
                					<tr>
                						<td><?php echo $dado['nome']; ?></td>
                						<td><?php echo $dado['email']; ?></td>
                						<td><?php echo formatarGrauDePertencia($dado['grau_pertenca']); ?></td>
                						<td align="center">
                							<a title="Alterar" class="btn btn-warning" href="editar.php?id=<?php echo $dado['id']?>">&#9999; Alterar</a>
                   							<a href="#" class="btn btn-sm btn-danger" data-toggle="excluir" data-target="#delete-modal" data-customer="<?php echo $dado['id']; ?>">
                                            	<i class="fa fa-trash"></i> Excluir
                                            </a>
                                           <a title="Excluir" id="btn-excluir" href="excluir.php?id=<?php echo $membro['id']?>" class="btn btn-danger tooltipBtn">&#10006; Excluir</a>
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

