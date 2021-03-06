<?php
require_once('../include/header.php');
require_once('../menu/menu.php');

$id = 0;

if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = $_GET['id'];
}

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $dados = $_POST;

    update(EVENTO, $id, $dados);
    
    header("Location: lista.php");
}

$dados = buscarRegistroPorId(EVENTO, $id);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <body>
    	<div class="col-sm-12">
       		<header>
                <script type="text/javascript">
                    function showCalendarInicio(){

                        $('#dp_inicio').datetimepicker({
                            language:  'pt-BR',
                            weekStart: 1,
                            todayBtn:  1,
                            autoclose: 1,
                            todayHighlight: 1,
                            startView: 2,
                            minView: 2,
                            forceParse: 0
                        });

                        $('#dp_inicio').datetimepicker('show');


                        $('#dp_inicio').datetimepicker()
                            .on('changeDate', function(ev){

                                var dia = ev.date.getDate();
                                var mes = ev.date.getMonth() + 1;
                                var ano = ev.date.getFullYear();

                                var data =  ano + '-' + mes + '-' + dia;
                                document.getElementById("data_inicio").value = data;

                                $('#data_inicio').val(data);



                            });
                    }

                    function showCalendarFim(){

                        $('#dp_fim').datetimepicker({
                            language:  'pt-BR',
                            weekStart: 1,
                            todayBtn:  1,
                            autoclose: 1,
                            todayHighlight: 1,
                            startView: 2,
                            minView: 2,
                            forceParse: 0
                        });

                        $('#dp_fim').datetimepicker('show');


                        $('#dp_fim').datetimepicker()
                            .on('changeDate', function(ev){

                                var dia = ev.date.getDate();
                                var mes = ev.date.getMonth() + 1;
                                var ano = ev.date.getFullYear();

                                var data =  ano + '-' + mes + '-' + dia;
                                document.getElementById("data_fim").value = data;
                                $('#data_fim').val(data);
                            });
                    }

                </script>
        		<div class="row">
            		<div class="col-sm-6">
            			<h2>Editar Evento</h2>
            		</div>
        		</div>
        		
        	</header>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Eventos</div>
                    <div class="panel-body">

                        <form method = "POST" data-toggle="validator">


                            <?php foreach ($dados as $dado) {?>
                                <input type="hidden" id="data_inicio" name="data_inicio" value="<?php echo $dado['data_inicio'];?>"/>
                                <input type="hidden" id="data_fim" name="data_fim" value="<?php echo $dado['data_inicio'];?>"/>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $dado['nome'];?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="dt_inicio" class="control-label">Data de In&iacutecio</label>
                                    <div class="input-group date form_date" data-date="" id="dp_inicio" data-date-format="dd MM yyyy" data-link-field="dt_inicio" data-link-format="dd-mm-yyyy">
                                        <input class="form-control" size="16" type="text" value="<?php echo $dado['data_inicio'];?>">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" onclick="javascript:showCalendarInicio()"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="dt_fim" class="control-label">Data de Fim</label>
                                    <div class="input-group date form_date" data-date="" id="dp_fim" data-date-format="dd MM yyyy" data-link-field="dt_fim" data-link-format="dd-mm-yyyy">
                                        <input class="form-control" size="16" type="text" value="<?php echo $dado['data_inicio'];?>">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" onclick="javascript:showCalendarFim()"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="vagas">Quantidade de Vagas</label>
                                    <input type="text" class="form-control" name="vagas" required value="<?php echo $dado['vagas'];?>">
                                </div>
                            </div>
                            <div class=row>
                                <div class="form-group col-md-4">
                                    <input type="submit" value="&#10003 Salvar" class="btn btn-primary" />
                                    <a href="lista.php" class="btn btn-danger">&#10005 Cancelar</a>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </body>
</html>
       
      