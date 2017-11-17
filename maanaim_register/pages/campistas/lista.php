<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');
include('../include/modal.php');

$dados = buscarTodosOsRegistros(CAMPISTA);
$mensagens = new Mensagens();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="col-md-12">
       		<header>
       			<script>

       			
					$('#modalDetalhes').on('show.bs.modal', function (event) {
       			  
                        var button = $(event.relatedTarget);
                        var id_campista = button.data('campista');
                        var modal = $(this);
                        
                        $.ajax({
                        	type: "POST",
                        	url: "detalhes.php",
                        	data: "id="+id_campista,
                        	success: function(message){
                        		$("#modal-body").html(message);
                        		$("#modalDetalhes").modal({ backdrop: 'static' });  
                        	},
                        		error: function(){
                        	alert("Error");
                        	}
                    	});
       				});
           				

       			</script>
       		
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Campistas</h2>
            		</div>
    				<div class="col-sm-6 text-right h2" align="right">
    					<a href="adicionar.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nova Inscri&ccedil;&atilde;o</a>
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
                        <!-- TABLE -->
                			<table class="table table-bordered table-striped">
                				<thead  class="blue-grey lighten-4">
                					<tr>
                						<th>N&ordm; Ficha</th>
                						<th>Nome</th>
                						<th>CPF</th>
                						<th>Data nascimento</th>
                						<th>Idade</th>
                						<th>Altura</th>
                						<th>Peso</th>
                						<th>Telefone</th>
                						<th>Respons&aacutevel</th>
                						<th>Telefone respons&aacutevel</th>
                						<th class="ui-state-default text-center">A&ccedil;&otilde;es</th>
                					</tr>
                				</thead>
                				
                				<?php
                				if(count($dados) > 0){
                				    foreach ($dados as $campista){ 
                				
                				?>
                				
                				<tbody>
                					<tr>
                						<td><?php echo $campista['id']; ?>
                						<td><?php echo $campista['nome']; ?></td>
                						<td><?php echo Mask('###.###.###-##', $campista['cpf']); ?></td>
                						<td><?php echo $campista['data_nascimento']; ?></td>
                						<td><?php echo $campista['idade']; ?></td>
                						<td><?php echo $campista['altura']; ?></td>
                						<td><?php echo $campista['peso']; ?></td>
                						<td><?php echo $campista['telefone']; ?></td>
                						<td><?php echo $campista['responsavel']; ?></td>
                						<td><?php echo $campista['telefone_responsavel']; ?></td>
                						
                						<td align="center">
                							<a title="Alterar" class="btn-sm btn-warning tooltipBtn" href="editar.php?id=<?php echo $campista['id']?>"><i class="fa fa-pencil-square-o"></i></a>
                   							<?php if(isAdministrador()) { ?><a title="Excluir" class="btn-sm btn-danger tooltipBtn" href="excluir.php?id=<?php echo $campista['id']?>" id="btn-excluir"><i class="fa fa-trash-o"></i></a><?php }?>
                   							<a title="Detlahes" class="btn-sm btn-primary tooltipBtn" href="#" data-toggle="modal" data-target="#modalDetalhes" data-campista="<?php echo $campista['id']; ?>" >
                                              <i class="fa fa-search"></i>
                                            </a>
                   						</td>
                					</tr>
                				</tbody>
                				<?php
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

