<?php
App::uses('AppController', 'Controller');


class UnidadGastosController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Unidad_gasto','Pedido');






	public function index() 
	{
		$this->Unidad_gasto-> recursive=2;
		$unidadgasto = $this->Unidad_gasto->find('all');
		$this->set('unidadgasto',$unidadgasto);
    }






    public function addunidad() 
	{
        if ($this->request->is('post')) 
		{
        	$this->Unidad_gasto->create();
            if ($this->Unidad_gasto->save($this->request->data)) 
			{
      			$this->Session->setFlash('Unidad de Gasto creada correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema al crear la Unidad de Gasto', 'peligro');
            }
        }
    }






    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		$ugasto = $this->Unidad_gasto->findById($id);
		$this->set('ug',$ugasto);
		if (!$ugasto) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Unidad_gasto->id = $id;
			if ($this->Unidad_gasto->save($this->request->data)) 
			{
      			$this->Session->setFlash('Unidad de Gasto modificada correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar la Unidad de Gasto', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $ugasto;
        }
    }
	
	
	
	
	
	
    function delete($id) 
	{
    	if (!$this->request->is('post')) 
		{
        	throw new MethodNotAllowedException();
    	}
    	if ($this->Unidad_gasto->delete($id)) 
		{
      		$this->Session->setFlash('Unidad de Gasto eliminada correctamente', 'exito');
        	$this->redirect(array('action' => 'index'));
    	}
	}
}