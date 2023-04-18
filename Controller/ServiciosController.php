<?php
App::uses('AppController', 'Controller');


class ServiciosController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Servicio');






	public function index() 
	{
		$list = array();
		if ($this->request->is(array('get')))  
		{
			$list = $this->Servicio->find('all');
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$options = array(
								'conditions' => array(
														'Servicio.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
													)
							);
			$list = $this->Servicio->find('all', $options);
		}
		$this->set('list',$list);
    }






    public function addServicio() 
	{
        if ($this->request->is('post')) 
		{
        	$this->Servicio->create();
            if ($this->Servicio->save($this->request->data)) 
			{
      			$this->Session->setFlash('Servicio creado correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema el Servicio', 'peligro');
            }
        }
        $texto = 'Crear nuevo servicio';
        $this->set('texto',$texto);
        $this->render('/Servicios/edit');
    }
	
	
	
	
	
	
    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar este servicio'));
		}
		$servicio = $this->Servicio->findById($id);
		$texto = 'Modificar el servicio '.$servicio['Servicio']['nombre'];
		$this->set('texto',$texto);
		if (!$servicio) 
		{
			throw new NotFoundException(__('Error al editar este servicio'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Servicio->id = $id;
			if ($this->Servicio->save($this->request->data)) 
			{
				$this->Session->setFlash('Servicio modificado correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el Servicio', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $servicio;
        }
    }






	function delete($id) 
	{
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Servicio->delete($id)) 
		{
			$this->Session->setFlash('Servicio eliminado correctamente', 'exito');
			$this->redirect(array('action' => 'index'));
		}
	}
}