var formas_pagamento = [];

function calcularIdade(dia_aniversario, mes_aniversario, ano_aniversario)
{
	var d = new Date,
	ano_atual = d.getFullYear(),
	mes_atual = d.getMonth() + 1,
	dia_atual = d.getDate(),

	ano_aniversario = +ano_aniversario,
	mes_aniversario = +mes_aniversario,
	dia_aniversario = +dia_aniversario,

	quantos_anos = ano_atual - ano_aniversario;

	if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
		quantos_anos--;
	}

	return quantos_anos < 0 ? 0 : quantos_anos;
}



function addTableRow()
{

	var valor =  $('#valor').val();
	var forma = $('#forma_pagamento').find(":selected").val();
	var texto_forma = $('#forma_pagamento').find(":selected").text();
	var parcelas = $('#quantidade_parcela').val();
	var pagamento = [];

	var newRow = $("<tr>");
	var cols = "";
	pagamento.push(forma);
	pagamento.push(valor);
	pagamento.push(parcelas);
    formas_pagamento.push(pagamento);

   if(forma == 'CARTAO_CREDITO_PARCELADO'){
		parcelas = parcelas + " x R$ " + (valor/parcelas);
	}else{
		valor = 'R$ ' + valor;
	}
	
	if(!valor){
		valor = '-';
	}
	
	if(!parcelas){
		parcelas = ' - ';
	}

	cols += '<td class="ui-state-default text-center">' + texto_forma + '</td>';
	cols += '<td class="ui-state-default text-center valor">' + valor + '</td>';
	cols += '<td class="ui-state-default text-center valor">' + parcelas + '</td>';
	cols += '<td class="text-center">';
	cols += '<a onclick="removeTableRow(this)" title="Remover" class="btn-sm btn-danger" aria-label="Remover"><i class="fa fa-trash-o"></i></a>';
	cols += '</td>';

	newRow.append(cols);
	$("#table_forma_pagamento").append(newRow);
	
	
	valor = '';
	$('#valor').val('');
	$('#quantidade_parcela').val('');
	$('#valor_parcela').val('');
	$('#forma_pagamento').val('selecione');


	return false;
}


function removeTableRow(item)
{
	var tr = $(item).closest('tr');

	tr.fadeOut(400, function() {
		tr.remove();  
	});

	return false;
}

