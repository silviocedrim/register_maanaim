<?php
require 'DB_Connect.php';

function login($table, $login, $senha)
{
    $database = open_database();
    $found = null;
    
    $sql = "SELECT * FROM " . $table . " WHERE login = '" . $login . "' AND senha = '" . $senha . "'";
    $result = $database->query($sql);
    
    if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
    }
    
    close_database($database);
    
    return $found;
}

function buscarTodosOsRegistros($table = null)
{
    $found = null;
    try {
        $database = open_database();
        
        $sql = "SELECT * FROM " . $table;
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

function buscarTodosOsCampistas($table = null)
{
    $found = null;
    try {
        $database = open_database();
        
        $sql = "SELECT * FROM " . $table . " WHERE situacao = '" . INSCRITO . "'";
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

function buscarRegistroPorId($table = null, $id = null)
{
    $found = null;
    try {
        $database = open_database();
        
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

function buscarMembroPorEmail($email)
{
    $found = null;
    try {
        $database = open_database();
        
        $sql = "SELECT * FROM " . MEMBRO . " WHERE email = " . $id;
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

function buscarUsuarioPorLogin($login)
{
    $found = null;
    try {
        $database = open_database();
        
        $sql = "SELECT * FROM " . USUARIO . " WHERE login = " . $id;
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

function update($table = null, $id = 0, $data = null)
{
    $items = null;
    $database = open_database();
    
    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }
    
    // remove a ultima virgula
    $items = rtrim($items, ',');
    $sql = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id = " . $id . ";";
    try {
        
        $database->query($sql);
        
        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

function insert($table = null, $data = null)
{
    $columns = null;
    $values = null;
    
    $database = open_database();
    
    $insert_id = null;
    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
    }
    
    // remove a ultima virgula
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');
    
    $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
    try {
        $database->query($sql);
        $insert_id = $database->insert_id;
        
        
        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
 
    return $insert_id;
}

function insertFormasDePagamento($input_data, $codCampista)
{
    $columns = null;
    $values = null;
    
    $database = open_database();
    $i = 0;
    foreach ($input_data as $key => $forma_pagamento) {
        foreach ($forma_pagamento as $key => $value) {
            $columns .= trim($key, "'") . ",";
            $values .= "'$value',";
        }
        
        $columns .= trim('id_campista', "'") . ",";
        $values .= "'$codCampista',";
        
        // remove a ultima virgula
        $columns = rtrim($columns, ',');
        $values = rtrim($values, ',');
        
        $sql = "INSERT INTO " . PAGAMENTOS . "(" . $columns . ") VALUES (" . $values . ");";
        $teste = $database->query($sql);
        
        $columns = null;
        $values = null;
        $sql = null;
    }
    
    close_database($database);
}

function consultaIdUltimoCampista()
{
    $id_campista = null;
    $sql = "SELECT MAX(id) as ID FROM " . CAMPISTA;
    $database = open_database();
    
    $result = $database->query($sql);
    
    if ($result->num_rows > 0) {
        $id_campista = $result->fetch_assoc()['ID'];
    }
    
    return $id_campista;
}

/**
 * Remove uma linha de uma tabela pelo ID do registro
 */
function delete($table = null, $id = null)
{
    $database = open_database();
    
    try {
        if ($id) {
            
            $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
            $result = $database->query($sql);
            
            if ($result = $database->query($sql)) {
                $_SESSION['message'] = "Registro Removido com Sucesso.";
                $_SESSION['type'] = 'success';
            }
        }
    } catch (Exception $e) {
        
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    
    close_database($database);
}

function buscarMembros($id = null)
{
    $found = null;
    $sql = null;
    try {
        $database = open_database();
        if ($id) {
            $sql = "select * from membro m WHERE m.id = " . $id;
        } else {
            $sql = "select * from membro";
        }
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

function buscarPagamentosPorCampista($id)
{
    $found = null;
    try {
        $database = open_database();
        
        $sql = "SELECT * FROM " . PAGAMENTOS . " WHERE id_campista = " . $id;
        $result = $database->query($sql);
      
        if($result){
            if ($result->num_rows > 0) {
                $found = $result->fetch_all(MYSQLI_ASSOC);
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return $found;
}

