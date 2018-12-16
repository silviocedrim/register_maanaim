<?php
require_once('../include/header.php');

if (isset($_POST['id']) && empty($_POST['id']) == false) {
    $id = $_POST['id'];
    
    $dados = array();
    $dados['situacao'] = DESISTENTE;
    
    update(CAMPISTA, $id, $dados);
}

?>