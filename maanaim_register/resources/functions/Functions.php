<?php

function isAdministrador()
{
    if ($_SESSION['administrador'] == 1) {
        return true;
    } else {
        return false;
    }
}

function tituloDaListagem($opcao1, $opcao2)
{
    $titulo = '<div class="col-sm-6">';
    
    if (isAdministrador()) {
        $titulo .= '<h2>' . $opcao1 . '</h2>';
    } else {
        $titulo .= '<h2>' . $opcao2 . '</h2>';
    }
    
    $titulo .= '</div>';
    
    echo $titulo;
}

function botaoNovo($ref, $icon, $tipo, $titulo)
{
    if (isAdministrador()) {
        $botao = '<div class="col-sm-6 text-right h2" align="right">';
        $botao .= '<a href="' . $ref . '" class=" btn btn-' . $tipo . '">' . $icon . ' ' . $titulo . '</a>';
        $botao .= '</div>';
        echo $botao;
    }
}

function formatarGrauDePertencia($grau_pertenca)
{
    $grau = null;
    switch ($grau_pertenca) {
        case 'Irmão':
            $grau = 'Irm&atilde;o';
            break;
        case 'Vocacionado':
            $grau = 'Vocacionado';
            break;
        case 'Missionário':
            $grau = 'Mission&aacute;rio';
            break;
        case 'Consagrado':
            $grau = 'Consagrado';
            break;
    }
    return $grau;
}

function formatarSacrmento($sacramento)
{
    $retorno = null;
    switch ($sacramento) {
        case 'Batizado':
            $retorno = 'Batizado';
            break;
        case 'Primeira Comunhão':
            $retorno = 'Primeira Comunh&atilde;o';
            break;
        case 'Crisma':
            $retorno = 'Crisma';
            break;
    }
    return $retorno;
}

function validaCPF($cpf)
{
   
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);
    
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t ++) {
        for ($d = 0, $c = 0; $c < $t; $c ++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
}

//Máscara Dinâmicas
function Mask($mask,$str){
    
    $str = str_replace(" ","",$str);
    
    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }
    
    return $mask;
}




?>
