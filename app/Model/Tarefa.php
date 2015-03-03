<?php
class Tarefa extends AppModel{
	public $name		= 'Tarefa';
	public $uses		= 'tarefas';
	public $actsAs		= array('Util');
}
?>