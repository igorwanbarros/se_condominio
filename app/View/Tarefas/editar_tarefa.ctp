<script type="text/javascript">
	$(document).ready(function(){
		$('.btn-excluir').click(function(){
			$('.mensagem-excluir').show();
		});
		$('.btn-excluir-nao').click(function(){
			$('.mensagem-excluir').slideToggle('show');
		});
	});
</script>
		<div class="panel panel-default" >
			<div class="panel-heading"><h4>Editar Tarefa</h4></div>
			<div class="panel-body">
				<?php echo $this->Form->create('Tarefa');?>
					<div class="form-group">
						<?php echo $this->Form->input('nome',array('class'=>'form-control','label'=>'Nome da Tarefa'));?>
					</div>
					
					<div class="col-md-6 col-md-offset-3">
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading text-center">Inicio</div>
								<div class="panel-body">
									
									<div class="form-group">
										<input type="date" class="form-control" id="TarefaInicio" name="data[Tarefa][inicio]" value="<?php echo $this->data['Tarefa']['inicio']?>" />
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading text-center">Conclus&atilde;o</div>
								<div class="panel-body">
									
									<div class="form-group">
										<input type="date" class="form-control" id="TarefaConclusao" name="data[Tarefa][conclusao]" value="<?php echo $this->data['Tarefa']['conclusao']?>" />
									</div>
									
								</div>
							</div>
						</div>
						
					</div>
					
					
					<div class="col-md-6">
						<div class="form-group">
							<?php echo $this->Form->input('custo_estimado',array('class'=>'form-control','label'=>'Custo Estimado (R$)'))?>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Status da Tarefa</label>
							<?php 
							echo $this->Form->select('status_da_tarefa',array('Concluido'=>'Concluído','Em andamento'=>'Em andamento','Pendente'=>'Pendente'),array('class'=>'form-control'));
							?>
						</div>
					</div>
					
					<div class="row">
						
						<div class="col-md-6 col-md-offset-3 text-center">
							<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" area-expanded="false" onclick="window.history.back()">
								<span class="color-simbol-left"><span class="glyphicon glyphicon-arrow-left"></span></span> Voltar
							</button>
							<button class="btn btn-default btn-excluir" data-toggle="dropdown" area-expanded="false">
								<span class="color-simbol-left background-red"><span class="glyphicon glyphicon-trash"></span></span> Excluir
							</button>
							<?php echo $this->Form->button($this->Html->tag('span',$this->Html->tag('span','',array('class'=>'glyphicon glyphicon-floppy-save')),array('class'=>'color-simbol-left green')).' Salvar',array('class'=>'btn btn-default'));?>
							<!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" area-expanded="false">
								<span class="color-simbol-left green"><span class="glyphicon glyphicon-floppy-save"></span></span> Salvar
							</button>-->
						</div>
						
					</div><!-- fim da linha do button do formulario -->
					<div class="col-md-8 col-md-offset-2 padding-top mensagem-excluir" style="display: none;">
							<div class="alert alert-danger text-center">
								
								<div class="float glyphicon glyphicon-info-sign font-size-2"></div> <div class="float text-alert">Deseja realmente remover este registro?</div>
								<?php echo $this->Html->link(
										$this->Html->tag(
											'span',
											$this->Html->tag(
												'span',
												null,
												array('class'=>'glyphicon glyphicon-ok')
											),
											array('class'=>'color-simbol-left green')
											).'</span> Sim',
										array('controller'=>'tarefas','action'=>'remover',$this->request->data['Tarefa']['Id']),
										array('escape'=>false,'class'=>'btn btn-default'));?>
								
								<button class="btn btn-default btn-excluir-nao" data-toggle="dropdown" area-expanded="false">
									<span class="color-simbol-left background-red"><span class="glyphicon glyphicon-remove"></span></span> Não
								</button>
								
							</div>
						</div>
				<?php echo $this->Form->end();?>
			</div><!-- fim do panel-body -->
		</div><!-- fim do panel nova tarefa -->