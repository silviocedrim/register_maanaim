<?php
require_once '../include/header.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    </head>
    
    <body>
    
    	<div id="wrapper">
    		<div class="panel-body"></div>
    		
        	<div class="container">
    			<div class="row">
				<div class="col-md-3 col-md-offset-2 text-center">
					<img src="../../biblioteca/img/marca_maanaim.png?ln=images" width="170" style="margin-top: 30%;" />
				</div>    			
    			
                	<div class="col-md-4" style="margin-top: 6%;">
                    	<div class="login-panel panel panel-default">
                    		<div class="panel-heading">
                    			<h3 class="panel-title">Login</h3>
                    		</div>
                    		
                    		<form class="col s12" method="POST">
                        		<div class="panel-body">
                    				<div class="form-group input-group">
                    					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> <input id="login" name="login" type="text" placeholder="Informe o email ou nome de usu&aacute;rio" class="form-control" />
                    				</div>
                    
                    				<div class="form-group input-group">
                    					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> <input id="senha" name="senha" type="password" placeholder="Informe a senha" class="form-control" />
                    				</div>
                    				<input tabindex="2" type="submit" value="Entrar" class="btn btn-lg btn-primary btn-block" style="text-transform: uppercase;" />
                        		</div>
                    		</form>
                    		
                    	</div>
                	</div>
        		</div>
        	</div>
        </div>
    </body>
	

</html>
