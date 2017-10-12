<?php
require_once ('../../biblioteca/functions/Functions.php');
require_once ('../../biblioteca/functions/DB_Functions.php');
require_once ('../../biblioteca/util/Mensagens.php');
require_once ('../include/header.php');
require_once ('../menu/menu.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="container">
       		<header>
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Usu&aacute;rios</h2>
            		</div>
    				<div class="col-sm-6 text-right h2" align="right">
    					<a href="" class="btn btn-primary">&#10010 Novo Usu&aacute;rio</a>
    				</div>
        		</div>
        		
        	</header>
        	
        	<div class="row">
        		<div class="panel panel-default">
            		<div class="panel-heading">Lista de Usu&aacute;rios</div>
            		<div class="panel-body">
            			<table class="table table-hover">
            				<thead>
            					<tr>
            						<th class="ui-state-default">
            							<span class="ui-column-title">Nome</span>
            						</th>
            						<th class="ui-state-default">
            							<span class="ui-column-title">E-mail</span>
            						</th>
            						<th class="ui-state-default">
            							<span class="ui-column-title">Login</span>
            						</th>
            						<th class="ui-state-default">
            							<span class="ui-column-title">Administrador</span>
            						</th>
            						<th class="ui-state-default">
            							<span class="ui-column-title">A&ccedil;&otilde;es</span>
            						</th>
            					</tr>
            				</thead>
            			</table>
            		</div>
        		</div>
    		</div>
    	
    	</div>
    </body>
</html>

