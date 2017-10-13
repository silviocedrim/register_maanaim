<?php
require_once ('../../biblioteca/functions/Functions.php');

function selected_UF($uf = null)
{
    $array_uf = array("AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO");
    $select = '<select class="form-control selectpicker" name="uf" id="uf" required>';
    $select .= '<option value="">--Selecione--</option>';
    foreach($array_uf as $val){
        $sel = ($val == $uf)?'selected="selected"':'';
        
        $select .= '<option value="'.$val.'" '.$sel.'>'.$val.'</option>';
    }
    $select .= '</select>';
    echo $select;
}

function selected_grau_pertenca($grau_pertenca)
{
    $array_uf = array("Irmão", "Vocacionado", "Missionário", "Consagrado");
    $select = '<select class="form-control selectpicker" name="grau_pertenca" id="grau_pertenca" required>';
    $select .= '<option value="">--Selecione--</option>';
    foreach($array_uf as $val){
        $sel = ($val == $grau_pertenca)?'selected="selected"':'';
        
        $select .= '<option value="'.$val.'" '.$sel.'>'.formatarGrauDePertencia($val).'</option>';
    }
    $select .= '</select>';
    echo $select;
}


?>