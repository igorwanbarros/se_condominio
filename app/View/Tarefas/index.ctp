<script type="text/javascript">

	$(document).ready(function(){
		$('div.panel-body-accordion').hide();

		$('div.accordion').click(function(){
			$('div.panel-body-accordion:visible').slideUp();
			$(this).parent().find('div.panel-body-accordion').stop().slideToggle("show");
		});
	});

</script>

<div class="row">
	<div class="col-md-12">
		
		<?php
			foreach ($tarefas as $tarefa):
		?>
				<div class="panel panel-default">
					<div class="panel-heading accordion">
						<div class="row">
							<div class="col-md-10">
								<h4><span class="glyphicon glyphicon-chevron-down"></span> 
									<?php echo $tarefa['Tarefa']['nome'];?>
								</h4>
							</div>
							<div class="col-md-2 text-right">
								<a href="<?php echo $this->here.'/editar_tarefa/'.$tarefa['Tarefa']['Id']?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
							</div>
						</div>
					</div>
					<div class="panel-body-accordion">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 padding-top">
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading text-center"><h5>Inicio</h5></div>
										<div class="panel-body">
											<p class="text-center">
												<?php echo date("d/m/Y", strtotime($tarefa['Tarefa']['inicio']))?>
											</p>
										</div>
									</div>
								</div><!-- fim da primeira coluna-->
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading text-center"><h5>Conclus&atilde;o</h5></div>
										<div class="panel-body">
											<p class="text-center">
												<?php echo date("d/m/Y", strtotime($tarefa['Tarefa']['conclusao']));?>
											</p>
										</div>
									</div>
								</div><!-- fim da segunda coluna -->
							</div><!-- fim do tamanho para o periodo -->
							<div class="col-md-6">
								<h4 class="text-center">Custo Estimado (R$)</h4>
								<p class="text-center"><strong>R$</strong> 
									<?php echo number_format($tarefa['Tarefa']['custo_estimado'],2, ',', '.')?>
								</p>
							</div><!-- fim do tamanho -->
							<div class="col-md-6 padding-bottom">
								<h4 class="text-center">Status da Tarefa</h4>
								<p class="text-center">
									<?php echo $tarefa['Tarefa']['status_da_tarefa']?>
								</p>
							</div><!-- fim do tamanho -->
						</div><!-- fim da linha do corpo do panel -->
						<h3 class="col-md-10 col-md-offset-1 padding-top padding-bottom"><span class="glyphicon glyphicon-comment"></span> Coment&aacute;rios</h3>
					<?php 
						$maisComentarios=0;
						foreach ($comentarios as $comentario):
							if($comentario['Comentario']['tarefa_id'] == $tarefa['Tarefa']['Id']){
								$maisComentarios++;
					?>
						<div class="row comentario">
							<div class="col-md-2 col-md-offset-1">
								<?php echo $this->Html->image('perfil.jpg',array('class'=>'img-responsive'));?>
							</div><!-- fim da div da imagem do comentario -->
							<div class="col-md-8 text-justify">
								<div class="row">
									<div class="col-md-8"><h4>Nome do Usu&aacute;rio Logado</h4></div>
									<div class="col-md-4 text-right">
										<?php echo $this->Html->link(
											$this->Html->tag('span','',array('class'=>'glyphicon glyphicon-trash')),
											array('controller'=>'comentarios','action'=>'remover',$comentario['Comentario']['id']),
											array('escape'=>false,'class'=>'btn btn-default color-red')
										);?>
										<!-- <a href="#" class="btn btn-default color-red"><span class="glyphicon glyphicon-trash"></span></a>-->
									</div>
								</div><!-- fim do titulo do comentario -->
								<p><?php echo $comentario['Comentario']['mensagem'];?></p>
								<div class="">
									<em class="esmaecido">comentado em <?php echo date("d/m/Y", strtotime($comentario['Comentario']['salvo_em']))?></em>
								</div><!-- fim da data do comentario -->
							</div><!-- fim do texto do comentario -->
						</div><!-- fim da row do painel de comentarios -->
						<hr />
					<?php 
							}
						endforeach;
					?>
						<?php 
							if($maisComentarios > 1){
								echo '<div class="row col-md-6 col-md-offset-3 text-center padding-bottom">
										<a href="#" class="btn btn-default btn-lg">Mais coment&aacute;rios <span class="glyphicon glyphicon-chevron-down"></span></a>
									</div><!-- fim da div row de mais comentarios -->';
							}
						?>
						
						<div class="row padding-top">
							
							<?php echo $this->Form->create('Comentario',array('controller'=>'comentarios','action'=>'salvar'));?>
								<div class="form-group col-md-10 col-md-offset-1">
									<?php echo $this->Form->textarea('mensagem',array('rows'=>10,'cols'=>20,'class'=>'form-control'));?>
									<input type="hidden" value="<?php echo $tarefa['Tarefa']['Id'];?>" name="data[Comentario][tarefa_id]" />
									<input type="hidden" value="<?php echo date('Y-m-d');?>" name="data[Comentario][salvo_em]" />
								</div>
								
								<div class="form-group col-md-10 col-md-offset-1 text-right">
									<?php echo $this->Form->button($this->Html->tag('span',$this->Html->tag('span','',array('class'=>'glyphicon glyphicon-envelope')),array('class'=>'color-simbol-left')).' Enviar Coment&aacute;rio',array('class'=>'btn btn-default'));?>
								</div>
							</form>
							
						</div><!--  fim da row do form de inclusao de comentarios -->
						
					</div><!-- fim do corpo do panel -->
				</div><!-- fim do panel -->
			<?php endforeach;?>
		<!-- fim da lista de tarefas -->
	</div><!-- fim do tamanho da tela -->
</div><!-- fim da linha -->