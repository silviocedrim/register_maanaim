<?php
require_once ('../include/header.php');

$dados = buscarTodosOsCampistas(CAMPISTA);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="col-md-12">
       		<header>
       			<script type="text/javascript">

       			</script>
       		
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Campistas</h2>
            		</div>
    				<div class="col-sm-6 text-right h2" align="right">
    					<a href="#" class="btn btn-sm btn-primary" onclick="window.print();"><i class="fa fa-plus" aria-hidden="true"></i> Imprimir</a>
    				</div>
    			</div>
        		
        	</header>
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Lista de Campistas</div>
            			<div class="panel-body">
                        <!-- TABLE -->
                			<table class="table table-bordered table-striped">
                				<thead class="blue-grey lighten-4">
                					<tr>
                						<th>N&ordm; Ficha</th>
                						<th>Nome</th>
                						<th>Idade</th>
                						<th>Altura</th>
                						<th>Peso</th>
                						<th>Conhece outros campistas?</th>
                						<th>Conhece alguem da equipe?</th>
                					</tr>
                				</thead>
                				
                				<?php
                				if(count($dados) > 0){
            				        $i = 1;
                				    foreach ($dados as $campista){ 
                				
                				?>
                				
                				<tbody>
                					<tr>
                						<td><?php echo $i; ?>
                						<td><?php echo $campista['nome']; ?></td>
                						<td><?php echo $campista['idade']; ?></td>
                						<td><?php echo $campista['altura']; ?></td>
                						<td><?php echo $campista['peso']; ?></td>
                						<td><?php echo $campista['conhece_campista']; ?></td>
                						<td><?php echo $campista['conhece_equipe']; ?></td>
                					</tr>
                				</tbody>
                				<?php
                				$i++;
                				    } 
            				    }?>
                			</table>
                    		<!-- END TABLE -->
            		</div>
        		</div>
    		</div>
    	
    	</div>
    	
    	
    </body>
</html>

