<?php
require_once ('../include/header.php');
require_once ('../menu/menu.php');

$id = 0;

if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = $_GET['id'];
}

$dados = buscarRegistroPorId(CAMPISTA, $id);

?>

<div class="row">
	<div class="panel panel-default">

        		<?php foreach ($dados as $dado) {?>
					<div class="barrazul">
			<div class="titulo">ACAMPAMENTO MAANAIM 2018</div>
		</div>

		<br />
		<div class="inscricao">
			<div class="termo1">NOME</div>
			<div class="resposta"><?php echo $dado['nome']?></div>
			<div class="termo1">RG:</div>
			<div class="resposta"><?php echo $dado['rg']?></div>
			<br />
			<div class="termo1">IDADE</div>
			<div class="resposta"><?php echo $dado['idade']?></div>
		</div>

		<br />
		<div class="inscricao">
			<div class="termo1">ENDEREÇO</div>
			<div class="resposta"><?php echo $dado['rua']?>, N&uacute;mero: <?php echo $dado['numero']?> - <?php echo $dado['complemento']?> - <?php echo $dado['bairro']?></div>
		</div>
		<br />

		<div class="inscricao">
			<div class="termo1">CIDADE-ESTADO</div>
			<div class="resposta"><?php echo $dado['cidade']?> - <?php echo $dado['uf']?></div>
			<div class="termo1">CPF:</div>
			<div class="resposta"><?php echo $dado['cpf']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo1">FONE</div>
			<div class="resposta"><?php echo $dado['telefone']?></div>
		</div>

		<div class="inscricao">
			<div class="termo1">E-MAIL</div>
			<div class="resposta"><?php echo $dado['email']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo1">RESPONS&Aacute;VEL</div>
			<div class="resposta"><?php echo $dado['responsavel']?></div>
			<div class="termo2">FONE RESPONS&Aacute;VEL</div>
			<div class="resposta"><?php echo $dado['telefone_responsavel']?></div>
			<br />
			<div class="termo2">GRAU DE PARENTESCO</div>
			<div class="resposta"><?php echo $dado['grau_parentesco']?></div>

		</div>

		<div class="inscricao">
			<div class="termo1">PARÓQUIA</div>
			<div class="resposta"><?php echo $dado['paroquia']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo1">SACRAMENTO</div>
			<div class="resposta"><?php echo $dado['sacramento']?></div>
		</div>

		<div class="inscricao">
			<div class="termo2">PLANO DE SAÚDE</div>
			<div class="resposta"><?php echo $dado['plano_saude']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo2">CONHECE O ACAMPAMENTO?</div>
			<div class="resposta"><?php echo $dado['conhece_acampamento']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo2">ALGUM PROBLEMA DE SAÚDE?</div>
			<div class="resposta"><?php echo $dado['problema_saude']?></div>
		</div>

		<br />
		<div class="inscricao">
			<div class="termo3">ALGUM REMÉDIO DURANTE O ACAMPAMENTO?</div>
			<div class="resposta"><?php echo $dado['remedio']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo2">EM CASO DE EMERGÊNCIA AVISAR</div>
			<div class="resposta"><?php echo $dado['responsavel']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo2">CONHECE ALGUM CAMPISTA?</div>
			<div class="resposta"><?php echo $dado['conhece_campista']?></div>
		</div>
		<br />
		<div class="inscricao">
			<div class="termo2">CONHECE ALGUÉM DA EQUIPE?</div>
			<div class="resposta"><?php echo $dado['conhece_equipe']?></div>
		</div>

		<div class="inscricao">
			<div class="termo1">VALOR PAGO</div>
			<div class="resposta"><?php echo $dado['nome']?></div>
		</div>

	</div>
        		<?php }?>
    		</div>


<br />
<br />
Estou ciente que o valor pago pela inscrição NÃO SERÁ REEMBOLSÁVEL em
caso de desistência.
<hr>
<br />
<div class="assinatura">
				<?php echo $dado['nome']?>
			</div>

<br />
<?php echo $dado['id_responsavel']?>
<br />
Respons&aacute;vel



<hr>

<div class="barravermelha">
	<div class="titulo">
		COMUNIDADE CAT&Oacute;LICA BENTO XVI MAANAIM <BR /> ACAMPAMENTO
		MAANAIM 2018
	</div>
</div>
<br />
<div class="termo2">Recebemos o Valor de:</div>
<div class="resposta">-</div>
<div class="termo1">Data:</div>
<div class="resposta"><?php echo date("d/m/Y"); ?></div>
<br />
<div class="termo2">Referente a Inscrição de:</div>
<div class="resposta"> <?php echo $dado['nome']?></div>
<br />
<div class="inscricao">
	<div class="termo1">FONE</div>
	<div class="resposta"><?php echo $dado['telefone']?></div>
</div>

<div class="inscricao">
	<div class="termo1">E-MAIL</div>
	<div class="resposta"><?php echo $dado['email']?></div>
</div>
<br />
<br />
Estou ciente que o valor pago pela inscrição NÃO SERÁ REEMBOLSÁVEL em
caso de desistência.
<br />
Estou ciente que caso a pendência não seja resolvida até o prazo, o
valor pago pela inscrição NÃO SERÁ
<br />
REEMBOLSÁVEL E A INSCRIÇÃO SERÁ CANCELADA.
<br />
<br />
<div class="bottomaanaim">
	"Conhecereis a VERDADE e a VERDADE vos libertar&aacute;." <br /> Jo 8,
	32
</div>

<br />
<br />


<form>
	<input type="button" name="imprimir" value="Imprimir"
		onclick="window.print();">
</form>


















