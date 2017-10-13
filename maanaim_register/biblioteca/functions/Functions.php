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
    switch ($grau_pertenca)
    {
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

?>