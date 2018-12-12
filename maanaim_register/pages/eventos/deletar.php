<?php
require_once('../../biblioteca/functions/Functions.php');

if (isset($_GET['id'])){
    delete($_GET['id']);
} 
?>