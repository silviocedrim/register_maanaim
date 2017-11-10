<?php
require 'DB_Connect.php';

$found = null;
$database = open_database();

foreach ($_POST as $cpf => $value) {
    
    $sql = "SELECT * FROM " . CAMPISTA . " WHERE cpf = " . $cpf;
    $result = $database->query($sql);
    
    if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
    }
    
    close_database($database);
    
    echo json_encode($found);
}

?>