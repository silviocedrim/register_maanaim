<?php
require_once ('../include/header.php');

$valor_total = null;
$valor_pendente = null;
$valor_descontos = null;
$id = null;
$nome_responsavel = null;
$pagamentos = null;

if (isset($_POST['id']) && empty($_POST['id']) == false) {
    $id = $_POST['id'];
    $campista = buscarTodosOsRegistros(CAMPISTA);
    $id_responsavel = $campista[0]['id_responsavel'];
    $responsavel = buscarMembros($id_responsavel);
    $nome_responsavel = $responsavel[0]['nome'];
    $pagamentos = buscarPagamentosPorCampista($id);
    
}



?>
<div class="col-md-12" >
    <div class="row">
    	<div class="panel panel-info">
    		<div class="panel-heading">Detalhes do Campistas</div>
    		<div class="panel-body">
    		
    			<div class="form-group">
                  <label for="nome">Respons&agrave;vel pela Inscri&ccedil;&atilde;o</label>
                  <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" disabled value="<?php echo $nome_responsavel;?>">
            	</div>
    		
    		    <!-- PAGAMENTO -->
        		<div class="form-group">
    				<label>Pagamentos</label>
    				<div class="ui-datatable ui-widget">
    					<div class="ui-datatable-tablewrapper">
                			<!-- TABLE -->
                			<table class="table table-bordered table-striped">
                				<thead>
                    				<tr role="row">
                    					<th class="ui-state-default text-center">Tipo</th>
                    					<th class="ui-state-default text-center">Valor / Parcela</th>
                    					<th class="ui-state-default text-center">Quantidade de parcelas</th>
                    					<th class="ui-state-default text-center">Desconto</th>
                    				</tr>
                				</thead>
                                				
                				<?php
                				if (count($pagamentos) > 0) {
                				    foreach ($pagamentos as $pagamento) {
                				        print_r($pagamento['valor']);
                				        $valor_total += (double)$pagamento['valor'];
                				        $valor_descontos += (double)$pagamento['desconto'];?>
                				     
                                				
                				<tbody>
                					<tr>
                						<td class="ui-state-default text-center"><?php echo $pagamento['tipo']; ?></td>
                						<td class="ui-state-default text-center">R$ <?php echo $pagamento['valor']; ?></td>
                						<td class="ui-state-default text-center"><?php echo $pagamento['quantidade_parcelas']; ?></td>
                						<td class="ui-state-default text-center">R$ <?php echo $pagamento['desconto']; ?></td>
                					</tr>
                				</tbody>
                                				
                                <?php 
                				    }
                                } else { ?>
                            	<tfoot>
                					<tr>
                						<td colspan="10">Ainda n&atildeo h&aacute pagamentos</td>
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
        		<!-- END PAGAMENTO -->
        		<?php if (count($pagamentos) > 0) {
        		    $valor_pendente = 180 - $valor_total - $valor_descontos; 
        		?>
            		<div class="form-group">
        				<label>Valor pago: R$ </label> <?php echo $valor_total; ?>
            		</div>
        		<?php if($valor_pendente > 0){?>
                		<div class="form-group">
            				<label>Falta pagar: R$ </label> <?php echo $valor_pendente; ?>
                		</div>
        		<?php } 
        		}?>
    		</div>
    	</div>
    </div>
</div>