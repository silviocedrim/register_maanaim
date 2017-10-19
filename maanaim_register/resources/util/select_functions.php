<?php
require_once ('../../resources/functions/Functions.php');

function selected_UF($uf = null)
{
    $array_uf = array("AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO");
    $select = '<select class="form-control selectpicker" name="uf" id="uf" required>';
    $select .= '<option value="">--SELECIONE--</option>';
    foreach($array_uf as $val){
        if($uf){
            $sel = ($val == $uf)?'selected="selected"':'';
            $select .= '<option value="'.$val.'" '.$sel.'>'.$val.'</option>';
        }else{
            $select .= '<option value="'.$val.'">'.$val.'</option>';
        }
        
    }
    $select .= '</select>';
    echo $select;
}

function selected_grau_pertenca($grau_pertenca)
{
    $array_grau = array("Irmão", "Vocacionado", "Missionário", "Consagrado");
    $select = '<select class="form-control selectpicker" name="grau_pertenca" id="grau_pertenca" required>';
    $select .= '<option value="">--Selecione--</option>';
    foreach($array_grau as $val){
        $sel = ($val == $grau_pertenca)?'selected="selected"':'';
        
        $select .= '<option value="'.$val.'" '.$sel.'>'.formatarGrauDePertencia($val).'</option>';
    }
    $select .= '</select>';
    echo $select;
}

function selected_sacramento($sacramento=null)
{
    $array_sacramento = array("Batizado", "Primeira Comunhão", "Crisma");
    $select = '<select class="form-control selectpicker" name="sacramento" id="sacramento" required>';
    $select .= '<option value="">--SELECIONE--</option>';
    foreach($array_sacramento as $val){
        
        if($sacramento){
            $sel = ($val == $sacramento)?'selected="selected"':'';
            $select .= '<option value="'.$val.'" '.$sel.'>'.formatarSacrmento($val).'</option>';
        }else{
            $select .= '<option value="'.$val.'">'.formatarSacrmento($val).'</option>';
        }
        
    }
    $select .= '</select>';
    echo $select;
}


?>