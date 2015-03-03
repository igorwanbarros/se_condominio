<?php
class ComentariosController extends AppController{
	public $name		= 'Comentarios';
	public $helpers		= array('Html','Form');
	
	public function salvar(){
		if($this->request->is('post')){
			if($this->Comentario->save($this->request->data)){
				$this->redirect(array('controller'=>'tarefas','action'=>'index'));
			}
		}
	}
	public function remover($id=null){
		$this->Comentario->id = $id;
		if(!$this->Comentario->exists()){
			$this->Session->setFlash('Este coment&aacute;rio n&atilde;o existe ou j&aacute; foi removido.');
			$this->redirect(array('controller'=>'tarefas','action'=>'index'));
		}
		if($this->request->is('get')){
			if($this->Comentario->delete()){
				$this->redirect(array('controller'=>'tarefas','action'=>'index'));
			}
		}
	}
}
?>