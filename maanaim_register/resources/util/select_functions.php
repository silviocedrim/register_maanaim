<?php
require_once ('../../resources/functions/Functions.php');

function selected_UF($uf = null)
{
    $array_uf = array("AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO");
    $select = '<select class="form-control selectpicker" name="uf" id="uf">';
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
    $array_grau = array("Irm�o", "Vocacionado", "Mission�rio", "Consagrado");
    $select = '<select class="form-control selectpicker" name="grau_pertenca" id="grau_pertenca">';
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
    $array_sacramento = array("Batizado", "Primeira Comunh�o", "Crisma");
    $select = '<select class="form-control selectpicker" name="sacramento" id="sacramento">';
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

function selected_sexo($sexo=null)
{
    $array_sexo = array("MASCULINO", "FEMININO");
    $select = '<select class="form-control selectpicker" name="sexo" id="sexo">';
    $select .= '<option value="">--SELECIONE--</option>';
    foreach($array_sexo as $val){
        
        if($sexo){
            $sel = ($val == $sexo)?'selected="selected"':'';
            $select .= '<option value="'.$val.'" '.$sel.'>'. $val .'</option>';
        }else{
            $select .= '<option value="'.$val.'">'. $val .'</option>';
        }
        
    }
    $select .= '</select>';
    echo $select;
}


?>