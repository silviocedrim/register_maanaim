<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');
include('detalhes.php');

$dados = buscarTodosOsRegistros(CAMPISTA);
$mensagens = new Mensagens();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="col-md-12">
       		<header>
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
                   							<a title="Excluir" class="btn-sm btn-danger tooltipBtn" href="excluir.php?id=<?php echo $campista['id']?>" id="btn-excluir"><i class="fa fa-trash-o"></i></a>
                   							<a title="Detlahes" class="btn-sm btn-primary tooltipBtn" data-toggle="modal" data-target="#modalDetalhes">
                                              <i class="fa fa-search"></i>
                                            </a>
                   						</td>
                					</tr>
                				</tbody>
                				
                				<?php
                				    } 
            				    }else {?>
            				    <tfoot>
                					<tr>
                						<td colspan="10">Ainda n&atildeo h&aacute campistas inscritos</td>
            						</tr>
        						</tfoot>
            				    <?php
                				} 
            				    ?>
                				
                			</table>
                			
                    		<!-- END TABLE -->
            		</div>
        		</div>
    		</div>
    	
    	</div>
    	 <div class="modal fade" id="modalDetalhes" tabindex="-1" role="dialog" aria-labelledby="modalDetalhes" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
		</div>
    </body>
</html>

