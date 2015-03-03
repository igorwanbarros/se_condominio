<?php
class TarefasController extends AppController{
	public $name		= 'Tarefas';
	public $helpers		= array('Html','Form');
	public $components	= array('Util');
	
	public function index(){
		$this->set('title_for_layout','');
		$this->loadModel('Comentario');
		$this->set('tarefas',$this->Tarefa->find('all'));
		$this->set('comentarios',$this->Comentario->find('all'));//query('SELECT * FROM tarefas Tarefa, comentarios Comentario WHERE Comentario.tarefa_id = Tarefa.id LIMIT 2'));
		if($this->request->is('post')){
			if($this->Tarefa->save($this->request->data)){
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	public function remover($id=null){
		if($this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$this->Tarefa->id = $id;
		if(!$this->Tarefa->exists()){
			$this->Session->setFlash('Esta tarefa não existe');
		}
		if($this->Tarefa->delete()){
			$this->redirect(array('action'=>'index'));
		}
	}
	
	public function editar_tarefa($id=null){
		$this->Tarefa->id = $id;
		$this->set('title_for_layout',' - Editar Tarefa');
		if(!$this->Tarefa->exists()){
			$this->Session->setFlash('Esta Tarefa não existe');
		}
		if($this->request->is('post') || $this->request->is('put')){
			if($this->Tarefa->save($this->request->data)){
				$this->redirect(array('controller'=>'tarefas','action'=>'index'));
			}
		}else{
			$this->request->data = $this->Tarefa->read(null,$id);
		}
	}
}
?>