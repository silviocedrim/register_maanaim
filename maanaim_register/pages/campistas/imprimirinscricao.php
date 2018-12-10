<?php
require_once ('../include/header.php');
require_once ('../../resources/functions/Functions.php');

$id = 0;
$valor_total = null;
$valor_pendente = null;
$valor_descontos = null;
$valor_total_pago = null;
$id = null;
$nome_responsavel = null;
$pagamentos = null;
$valor_descontos_concedidos = null;


if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = $_GET['id'];
    $dados = buscarRegistroPorId(CAMPISTA, $id);
    $id_responsavel = $dados[0]['id_responsavel'];
    $responsavel = buscarMembros($id_responsavel);
    $nome_responsavel = $responsavel[0]['nome'];
    $pagamentos = buscarPagamentosPorCampista($id);
}

?>
<div class="">
	<div class="row">
		<div class="panel panel-default">

			<div class="row">
				<div class="barrazul">
					<div class="titulo">ACAMPAMENTO MAANAIM 2018</div>
				</div>
			</div>

			<br>
    		<?php foreach ($dados as $dado) {?>
    		
    		<div class="row">

				<div class="inscricao">
					<div class="row">
						<div class="form-group col-md-4">
							<label for="nome">REPONS&Aacute;VEL PELA
								INSCRI&Ccedil;&Atilde;O:&nbsp;&nbsp;</label><?php echo $nome_responsavel;?>
                        </div>
					</div>
					<br>
					<div class="row">
						<div class="form-group col-md-3">
							<label>NOME:&nbsp;&nbsp;</label><?php echo $dado['nome']?>
                    	</div>
						<div class="form-group col-md-3">
							<label>CPF:&nbsp;&nbsp;</label><?php echo Mask('###.###.###-##', $dado['cpf']);?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>DATA NASCIMENTO:&nbsp;&nbsp;</label><?php echo $dado['data_nascimento']?>
                    	</div>
						<div class="form-group col-md-1">
							<label>IDADE:&nbsp;&nbsp;</label><?php echo $dado['idade'];?>
                    	</div>
						<div class="form-group col-md-3">
							<label>RG:&nbsp;&nbsp;</label><?php echo $dado['rg'];?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>SEXO:&nbsp;&nbsp;</label><?php echo $dado['sexo']?>
                    	</div>
						<div class="form-group col-md-2">
							<label>PESO:&nbsp;&nbsp;</label><?php echo $dado['peso'];?>&nbsp;Kg
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>ALTURA:&nbsp;&nbsp;</label><?php if($dado['altura'] != '') { echo $dado['altura']; ?>&nbsp;metros <?php } else { echo ''; }?>
                    	</div>
						<div class="form-group col-md-1">
							<label>CAMISA:&nbsp;&nbsp;</label><?php echo $dado['camisa'];?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>ENDERE&Ccedil;O:&nbsp;&nbsp;</label><?php echo $dado['rua']?>,  <?php if($dado['numero'] != 0) { ?>N&uacute;mero: <?php echo $dado['numero']; } if($dado['complemento'] != '') {?> - <?php echo $dado['complemento'];?> - <?php } echo $dado['bairro']?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>CIDADE:&nbsp;&nbsp;</label><?php echo $dado['cidade']; ?>
                    	</div>
						<div class="form-group col-md-2">
							<label>ESTADO:&nbsp;&nbsp;</label><?php echo $dado['uf'];?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>TELEFONE:&nbsp;&nbsp;</label><?php echo $dado['telefone']; ?>
                    	</div>
						<div class="form-group col-md-3">
							<label>EMAIL:&nbsp;&nbsp;</label><?php echo $dado['email'];?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>PAR&Oacute;QUIA:&nbsp;&nbsp;</label><?php echo $dado['paroquia']; ?>
                    	</div>
						<div class="form-group col-md-2">
							<label>PAR&Oacute;CO:&nbsp;&nbsp;</label><?php echo $dado['paroco'];?>
                    	</div>
						<div class="form-group col-md-3">
							<label>SACRAMENTO:&nbsp;&nbsp;</label><?php echo $dado['sacramento'];?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>RESPONS&Aacute;VEL:&nbsp;&nbsp;</label><?php echo $dado['responsavel']; ?>
                    	</div>
						<div class="form-group col-md-2">
							<label>FONE:&nbsp;&nbsp;</label><?php echo $dado['telefone_responsavel'];?>
                    	</div>
						<div class="form-group col-md-3">
							<label>GRAU DE PARENTESCO:&nbsp;&nbsp;</label><?php echo $dado['grau_parentesco'];?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label>PLANO DE SA&Uacute;DE:&nbsp;&nbsp;</label><?php echo $dado['plano_saude']; ?>
                    	</div>
						<div class="form-group col-md-2">
							<label>REM&Eacute;DIO?:&nbsp;&nbsp;</label><?php echo $dado['remedio'];?>
                    	</div>
						<div class="form-group col-md-3">
							<label>PROBLEMA DE SA&Uacute;DE?:&nbsp;&nbsp;</label><?php echo $dado['problema_saude'];?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-5">
							<label>CONHECE ALGUM CAMPISTA?:&nbsp;&nbsp;</label><?php echo $dado['conhece_campista']; ?>
                    	</div>
					</div>
					<div class="row">
						<div class="form-group col-md-5">
							<label>CONHECE ALGU&Eacute;M DA EQUIPE?:&nbsp;&nbsp;</label><?php echo $dado['conhece_equipe']; ?>
                    	</div>
					</div>
				</div>
			</div>

		</div>
    
            		<?php }?>
    </div>
</div>
<div class="row">
	<div class="form-group">
		<div class="form-group col-md-6">

			<label>Pagamentos recebidos</label>
			<div class="ui-datatable ui-widget">
				<div class="ui-datatable-tablewrapper">
					<!-- TABLE -->
					<table class="table table-bordered table-striped">
						<thead>
							<tr role="row">
								<th class="ui-state-default text-center">Forma</th>
								<th class="ui-state-default text-center">Valor Total</th>
								<th class="ui-state-default text-center">Parcelas</th>
							</tr>
						</thead>
                    				
    				<?php
        if (count($pagamentos) > 0) {

            foreach ($pagamentos as $pagamento) {
                if ($pagamento['tipo'] != DESCONTO) {
                    $valor_total_pago += (double)$pagamento['valor'];
                    $parcelas = $pagamento['quantidade_parcelas'];

                    if($parcelas > 1){
                        $valor = $pagamento['valor'];
                        $parcelas = $parcelas . " x R$ " . ($valor/$parcelas);
                    }else{
                        $parcelas = '-';
                    }
                    ?>
                    <tbody>
                    <tr>
                        <td class="ui-state-default text-center"><?php echo $pagamento['tipo']; ?></td>
                        <td class="ui-state-default text-center">R$ <?php echo $pagamento['valor']; ?></td>
                        <td class="ui-state-default text-center"><?php echo $parcelas; ?></td>

                    </tr>
                    </tbody>

                    <?php
                }else{
                    $valor_descontos_concedidos = $pagamento['valor'];
                }
            }
        } else {
            ?>
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
	</div>
</div>
<?php
if($valor_total_pago > 0){?>

    <div class="row">
        <div class="form-group col-md-5">
            <label>VALOR TOTAL PAGO:&nbsp;&nbsp;</label><?php echo "R$ ". $valor_total_pago; ?>
        </div>
    </div>
    <?php
}

if($valor_descontos_concedidos > 0){
    ?>
    <div class="row">
        <div class="form-group col-md-5">
            <label>VALOR DO DESCONTO:&nbsp;&nbsp;</label><?php echo "R$ ". $valor_descontos_concedidos; ?>
        </div>
    </div>
<?php
}
?>



<br />
<br />
<div class="row">
	<div class="form-group col-md-12">
		<label style="padding-left: 7%">Estou ciente que o valor pago pela
			inscri&ccedil&atilde;o N&Atilde;O SER&Aacute; REEMBOLS&Aacute;VEL em
			caso de desist&ecirc;ncia.</label>
	</div>
</div>
<hr>
<br />
<div class="assinatura">
	<?php echo $dado['nome']?>
</div>


<hr>

<div class="barravermelha">
	<div class="row">
		<div class="titulobarravermelha">COMUNIDADE CAT&Oacute;LICA BENTO XVI
			MAANAIM</div>
	</div>
	<div class="row">
		<div class="titulobarravermelha" style="padding-left: 33%">
			ACAMPAMENTO MAANAIM 2018</div>
	</div>
</div>
<br>
<br>
<div class="row">
	<div class="form-group">
		<div class="form-group col-md-6">

			<label>Pagamentos recebidos</label>
			<div class="ui-datatable ui-widget">
				<div class="ui-datatable-tablewrapper">
					<!-- TABLE -->
					<table class="table table-bordered table-striped">
						<thead>
							<tr role="row">
                                <th class="ui-state-default text-center">Forma</th>
                                <th class="ui-state-default text-center">Valor Total</th>
                                <th class="ui-state-default text-center">Parcelas</th>
							</tr>
						</thead>
                    				
    				<?php
        if (count($pagamentos) > 0) {
            foreach ($pagamentos as $pagamento) {
                if ($pagamento['tipo'] != DESCONTO) {
                    $valor_total += (double)$pagamento['valor'];
                    $parcelas = $pagamento['quantidade_parcelas'];

                    if($parcelas > 1){
                        $valor = $pagamento['valor'];
                        $parcelas = $parcelas . " x R$ " . ($valor/$parcelas);
                    }else{
                        $parcelas = '-';
                    }
                    ?>
                    <tbody>
                    <tr>
                        <td class="ui-state-default text-center"><?php echo $pagamento['tipo']; ?></td>
                        <td class="ui-state-default text-center">R$ <?php echo $pagamento['valor']; ?></td>
                        <td class="ui-state-default text-center"><?php echo $parcelas; ?></td>

                    </tr>
                    </tbody>

                    <?php
                }else{
                    $valor_descontos = $pagamento['valor'];
                }
            }
        } else {
            ?>
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
	</div>
</div>
<?php
if($valor_total > 0){?>

    <div class="row">
        <div class="form-group col-md-5">
            <label>VALOR TOTAL PAGO:&nbsp;&nbsp;</label><?php echo "R$ ". $valor_total; ?>
        </div>
    </div>
    <?php
}

if($valor_descontos > 0){
    ?>
    <div class="row">
        <div class="form-group col-md-5">
            <label>VALOR DO DESCONTO:&nbsp;&nbsp;</label><?php echo "R$ ". $valor_descontos; ?>
        </div>
    </div>
    <?php
}
?>

<div class="row">
	<div class="form-group col-md-5">
     	<label>REFERENTE &Agrave; INSCRI&Ccedil&Atilde;O DE?:&nbsp;&nbsp;</label><?php echo $dado['nome']; ?>
	</div>
</div>
<div class="row">
	<div class="form-group col-md-6">
		<label>ENDERE&Ccedil;O:&nbsp;&nbsp;</label><?php echo $dado['rua']?>,  <?php if($dado['numero'] != 0) { ?>N&uacute;mero: <?php echo $dado['numero']; } if($dado['complemento'] != '') {?> - <?php echo $dado['complemento'];?> - <?php } echo $dado['bairro'];?> - <?php echo $dado['cidade']?> - <?php echo $dado['uf']?>
	</div>
</div>
<div class="row">
	<div class="form-group col-md-3">
		<label>TELEFONE:&nbsp;&nbsp;</label><?php echo $dado['telefone']; ?>
	</div>
	<div class="form-group col-md-3">
		<label>EMAIL:&nbsp;&nbsp;</label><?php echo $dado['email'];?>
	</div>
</div>
<br />
<br />
Estou ciente que o valor pago pela inscri&ccedil&atilde;o N&Atilde;O
SER&Aacute; REEMBOLS&Aacute;VEL em caso de desist&ecirc;ncia.
<br />
Estou ciente que caso a pend&ecirc;ncia n&atilde;o seja resolvida
at&eacute; o prazo, o valor pago pela inscri&ccedil&atilde;o N&Atilde;O
SER&Aacute;
<br />
REEMBOLS&Aacute;VEL E A INSCRI&ccedil&Atilde;O SER&Aacute; CANCELADA.
<br />
<br />
<div class="bottomaanaim">
	"Conhecereis a VERDADE e a VERDADE vos libertar&aacute;." <br /> Jo 8,
	32
</div>

<br />
<br />


<form>
	<a type="button" name="imprimir" class="btn btn-primary" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;&nbsp;Imprimir</a>
		
</form>


















