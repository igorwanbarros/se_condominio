<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Seu Condom&iacute;nio <?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon','seu_condominio_icon.ico');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('esquema de cores');
		
		echo $this->Html->script('jquery-2.1.3.min');
		echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="container-fluid">
	
		<div id="header">
			<div class="row">
				
				<div class="col-md-8">
					<div class="logo"><?php echo $this->Html->image('logo.png',array('class'=>'img-responsive'));?></div>
				</div>
				
				<div class="col-md-4">
					
					<div class="col-md-12 text-right">
						Seu nome
						
						<a href="#" class="link-sair btn">Sair</a>
					</div>
					
					<div class="col-md-12 text-right">
						<div class="btn-group dropdown">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" area-expanded="false">
								Bosque do Cerrado <span class="color-simbol-right"><span class="caret"></span></span>
							</button>
						</div>
					</div>
					
				</div>
				
			</div><!-- fim da div row (header row) -->
			
			
		</div><!-- fim da div header -->
		
		<div id="content">
			<script type="text/javascript">
				$(document).ready(function(){

					$('#panel-form-tarefa .panel-heading').click(function(){
						$('#panel-form-tarefa .panel-body').slideToggle("show");
					});
					
					$('#buttom-cadastrar-tarefa').click(function(){
						$('#panel-form-tarefa').slideToggle("show");
					});
					
				});
			</script>
			
			<div class="row">
				
				<div class="col-md-6 col-md-offset-6 text-right">
					<button id="buttom-cadastrar-tarefa" class="btn btn-default margin-bottom" >
						<span class="color-simbol-left"><span class="glyphicon glyphicon-plus"></span></span> Cadastrar Tarefa
					</button>
				</div>
				
			</div>
			
			<?php echo $this->Session->flash(); ?>
			
			<div class="panel panel-default" id="panel-form-tarefa" style="display: none;">
			<div class="panel-heading"><h4>Nova Tarefa</h4></div>
			<div class="panel-body">
				<?php echo $this->Form->create('Tarefa');?>
					<div class="form-group">
						<label for="TarefaNome">Nome da Tarefa</label>
						<input name="data[Tarefa][nome]" maxlength="80" type="text" id="TarefaNome" class="form-control" />
					</div>
					
					<div class="col-md-6 col-md-offset-3">
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading text-center">Inicio</div>
								<div class="panel-body">
									
									<div class="form-group">
										<input name="data[Tarefa][inicio]" type="date" class="form-control" id="TarefaInicio" />
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading text-center">Conclus&atilde;o</div>
								<div class="panel-body">
									
									<div class="form-group">
										<input name="data[Tarefa][conclusao]" type="date" class="form-control" id="TarefaConclusao" />
									</div>
									
								</div>
							</div>
						</div>
						
					</div>
					
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Custo Estimado (R$)</label>
							<input name="data[Tarefa][custo_estimado]" step="any" type="number" class="form-control" id="TarefaCustoEstimado" />
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Status da Tarefa</label>
							<select class="form-control" name="data[Tarefa][status_da_tarefa]" id="TarefaStatusDaTarefa" >
								<option>Conclu&iacute;do</option>
								<option>Pendente</option>
								<option>Em andamento</option>
							</select>
						</div>
					</div>
					
					<div class="row">
						
						<div class="col-md-6 col-md-offset-3 text-center">
							<button class="btn btn-default dropdown-toggle" onclick="window.history.back();" data-toggle="dropdown" area-expanded="false">
								<span class="color-simbol-left"><span class="glyphicon glyphicon-arrow-left"></span></span> Voltar
							</button>
						
							<?php echo $this->Form->button($this->Html->tag('span',$this->Html->tag('span','',array('class'=>'glyphicon glyphicon-floppy-save')),array('class'=>'color-simbol-left green')).' Salvar',array('class'=>'btn btn-default'));?>
						</div>
						
					</div><!-- fim da linha do formulario -->
				<?php echo $this->Form->end();?>
			</div><!-- fim do panel-body -->
		</div><!-- fim do panel nova tarefa -->
		
			
			<?php echo $this->fetch('content'); ?>
		</div><!-- fim da div Content -->
		
		<div id="footer">
			
		</div><!-- fim da div footer -->
		
	</div><!-- fim da div do container -->
</body>
</html>
