<?php
require 'DB_Connect.php';

function login($table, $login, $senha)
{
    $database = open_database();
    $found = null;
    
    $sql = "SELECT * FROM " . $table . " WHERE login = '" .$login . "' AND senha = '" . $senha . "'";
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
    
    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
    }
    
    // remove a ultima virgula
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');
    
    $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
    try {
        print_r($sql);
        $database->query($sql);
        
        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}


/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function delete( $table = null, $id = null ) 
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
    
function buscarUsuarios($id = null)
{
    $found = null;
    $sql = null;
    try {
        $database = open_database();
        if($id){
            $sql = "select u.id, u.login, u.administrador, u.senha, m.nome, m.email from usuario u join membro m on u.id_membro = m.id WHERE u.id = " . $id;
        }else{
            $sql = "select u.id, u.login, u.administrador, u.senha, m.nome, m.email from usuario u join membro m on u.id_membro = m.id";
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

