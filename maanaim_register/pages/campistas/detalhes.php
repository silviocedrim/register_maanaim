<?php
require_once('../include/header.php');

$valor_total = null;
$valor_pendente = null;
$valor_descontos = null;
$id = null;
$nome_responsavel = null;
$pagamentos = null;

$keysPagamentos = EnumTipoPagamento::keys();

foreach($keysPagamentos as $key){

    if($key != EnumTipoPagamento::DESCONTO()->getKey()){
        $valor = EnumTipoPagamento::$key()->getValue();
        $tipo_pagamento[$key] = $valor;
    }

}

if (isset($_POST['id']) && empty($_POST['id']) == false) {
    $id = $_POST['id'];
    $campista = buscarRegistroPorId(CAMPISTA, $id);
    $id_responsavel = $campista[0]['id_responsavel'];
    $responsavel = buscarMembros($id_responsavel);
    $nome_responsavel = $responsavel[0]['nome'];
    $pagamentos = buscarPagamentosPorCampista($id);
    
}



?>
<div class="col-md-12" >
    <div class="row">
        <header>
            <script>

                jQuery(function($){
                    $('#valor').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:'.', affixesStay: false});
                    $('#valor_desconto').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:'.', affixesStay: false});

                    $('#div_valor').hide();
                    $('#div_desconto').hide();
                    $('#div_botao_add_pagamento').hide();
                    $('#div_quantidade_parcela').hide();

                    $('#div_tem_desconto').on('change', function() {
                        if($('#check_tem_desconto').is(':checked')) {
                            $('#div_desconto').fadeIn('slow');
                        }else{
                            $('#div_desconto').hide();
                        }
                    });

                    $('#forma_pagamento').on('change', function(){
                        var forma = $('#forma_pagamento').val();
                        if(forma == 'CARTAO_CREDITO_PARCELADO'){
                            $('#div_valor').fadeIn('slow');
                            $('#div_quantidade_parcela').fadeIn('slow');
                            $('#div_botao_add_pagamento').fadeIn('slow');


                        } else {
                            $('#div_valor').fadeIn('slow');
                            $('#div_valor_parcela').hide();
                            $('#div_botao_add_pagamento').fadeIn('slow');
                            $('#div_quantidade_parcela').hide();

                        }
                    });
                });

            </script>

        </header>

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

                            <div class="row">
                                <div id="div_tem_desconto" class="form-group col-md-4">
                                    <input type="checkbox" id="check_tem_desconto" name="check_tem_desconto" style="margin-top: 27px">
                                    <label id="label_tem_desconto">Possui desconto?</label>
                                </div>
                                <div id="div_desconto" class="form-group col-md-4">
                                    <label id="label_valor_desconto" for="valor_desconto">Valor desconto</label>
                                    <input id="valor_desconto" name="valor_desconto" type="text" class="form-control" value="" placeholder="Possui desconto?"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="forma_pagamento">Forma de pagamento</label>
                                    <select class="form-control selectpicker" name="forma_pagamento" id="forma_pagamento">
                                        <option value="">--SELECIONE--</option>
                                        <?php foreach ($tipo_pagamento as $key => $value){?>
                                            <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div id="div_valor" class="form-group col-md-4">
                                    <label id="label_valor" for="valor">Valor</label>
                                    <input id="valor" name="valor" type="text" class="form-control" value=""/>
                                </div>

                                <div id="div_quantidade_parcela" class="form-group col-md-4">
                                    <label id="label_quantidade_parcela" for="quantidade_parcela">Quantidade de parcelas</label>
                                    <input id="quantidade_parcela" name="quantidade_parcela" type="text" class="form-control" value=""/>
                                </div>

                            </div>
                            <div class="row">


                                <div id="div_botao_add_pagamento" class="form-group col-md-1">
                                    <a onclick="javascript:addTableRow()" class="btn btn-sm btn-primary" id="btn_add_pagamento" style="margin-top: 27px">&#10003 Adicionar</a>
                                </div>
                            </div>


                			<!-- TABLE -->
                			<table id="table_forma_pagamento" class="table table-bordered table-striped">
                				<thead>
                    				<tr role="row">
                                        <th class="ui-state-default text-center">Forma</th>
                                        <th class="ui-state-default text-center">Valor Total</th>
                                        <th class="ui-state-default text-center">Parcelas</th>
                                        <th class="ui-state-default text-center">Aç</th>
                    				</tr>
                				</thead>
                                				
                				<?php
                				if (count($pagamentos) > 0) {
                				    foreach ($pagamentos as $pagamento) {

                                if ($pagamento['tipo'] != EnumTipoPagamento::DESCONTO()->getKey()) {
                                    $tipo = $pagamento['tipo'];
                                    $valor_total += (double)$pagamento['valor'];
                                    $parcelas = $pagamento['quantidade_parcelas'];

                                    if ($parcelas > 1) {
                                        $valor = $pagamento['valor'];
                                        $parcelas = $parcelas . " x R$ " . ($valor / $parcelas);
                                    } else {
                                        $parcelas = '-';
                                    }
                                    ?>


                                    <tbody>
                                    <tr>
                                        <td class="ui-state-default text-center"><?php echo EnumTipoPagamento::$tipo()->getValue(); ?></td>
                                        <td class="ui-state-default text-center">R$ <?php echo $pagamento['valor']; ?></td>
                                        <td class="ui-state-default text-center"><?php echo $parcelas; ?></td>
                                        <td class="ui-state-default text-center"><a onclick="removeTableRow(this)" title="Remover" class="btn-sm btn-danger" aria-label="Remover"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    </tbody>

                                    <?php
                                }else{
                                    $valor_descontos = $pagamento['valor'];

                                }
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
        		<?php if (count($pagamentos) > 0) {?>
            		<div class="form-group">
        				<label>Valor total pago: R$ </label> <?php echo $valor_total != '' ? $valor_total : 0; ?>
            		</div>
        		<?php if($valor_descontos > 0){?>
                		<div class="form-group">
            				<label>Valor total de descontos: R$ </label> <?php echo $valor_descontos; ?>
                		</div>
        		<?php } 
        		}?>
    		</div>
    	</div>
    </div>
</div>