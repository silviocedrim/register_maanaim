<?php session_start();
require_once ('../../resources/functions/Functions.php');?>

<div class="row" style="margin-left: 2px; margin-right: 2px;">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Maanaim</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php if(isAdministrador()){?>
                        <li><a href="../membros/lista.php">Membros</a></li>
                        <li><a href="../eventos/lista.php">Eventos</a></li>
                    <?php }?>
					<li><a href="../campistas/lista.php">Campistas</a></li>
					<li><a href="../login/login.php">Sair</a></li>
				</ul>

			</div>

			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->

	</nav>
</div>
