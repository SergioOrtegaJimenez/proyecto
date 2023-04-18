<?php
App::uses('AppController', 'Controller');


class EventosController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Evento','RegistroEntrada');






	public function index() 
	{
		$list = array();
		if ($this->request->is(array('get')))  
		{
			$list = $this->Evento->find('all');
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$options = array(
								'conditions' => array(
														'Evento.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
													)
							);
			$list = $this->Evento->find('all', $options);
		}
		$this->set('list',$list);
    }






    public function add() 
	{
        if ($this->request->is('post')) 
		{
        	$this->Evento->create();
            if ($this->Evento->save($this->request->data)) 
			{
      			$this->Session->setFlash('Evento creada correctamente', 'exito');
                $this->redirect(array('action' => 'add'));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema con el Evento', 'peligro');
            }
        }
        $texto = 'Crear un Evento';
        $this->set('texto',$texto);
        $this->render('/Eventos/add');
    }
	
	
	
	
	
	
    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar este evento'));
		}
		$evento = $this->Evento->findById($id);
		$texto = 'Modificar el Evento '.$evento['Evento']['descripcion'];
		$this->set('texto',$texto);
		if (!$evento) 
		{
			throw new NotFoundException(__('Error al editar este evento'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Evento->id = $id;
			if ($this->Evento->save($this->request->data)) 
			{
				$this->Session->setFlash('Evento modificado correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el Evento', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $evento;
        }
    }
	
	
	
	
	
	
	public function view($id = null, $menu = null) 
	{
		$this->Evento->recursive = 2;
        $evento=$this->Evento->findById($id);
        $this->set('evento', $evento);
        $this->set('menu',$menu);
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$options = array(
								'conditions' => array(
														'RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
													)
							);
			$list = $this->RegistroEntrada->find('all', $options);
		}
	}






	function delete($id) 
	{
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Evento->delete($id)) 
		{
			$this->Session->setFlash('Evento eliminada correctamente', 'exito');
			$this->redirect(array('action' => 'index'));
		}
	}
}