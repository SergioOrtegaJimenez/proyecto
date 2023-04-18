<?php
App::uses('AppController', 'Controller');


class EmpresasController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Empresa','Recurso');






	public function index() 
	{
		$list = array();
		if ($this->request->is(array('get')))  
		{
			$list = $this->Empresa->find('all');
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$options = array(
								'conditions' => array(
														'Empresa.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
													)
							);
			$list = $this->Empresa->find('all', $options);
		}
		$this->set('list',$list);
    }






    public function add() 
	{
        if ($this->request->is('post')) 
		{
        	$this->Empresa->create();
            if ($this->Empresa->save($this->request->data)) 
			{
      			$this->Session->setFlash('Empresa creada correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema con la Empresa', 'peligro');
            }
        }
        $texto = 'Crear nueva Empresa';
        $this->set('texto',$texto);
		$redirigir = array(
							'controller' => 'empresas',
							'action' => 'index',
							'admin' => false    
						);
		$this->set('redirigir',$redirigir);
    }
	
	
	
	
	
	
	public function addcontrato($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar esta Empresa'));
		}
		$empresa = $this->Empresa->findById($id);
		$texto = 'Modificar la empresa '.$empresa['Empresa']['nombre'];
		$this->set('texto',$texto);
		if (!$empresa) 
		{
			throw new NotFoundException(__('Error al editar esta empresa'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Empresa->id = $id;
			if ($this->Empresa->save($this->request->data)) 
			{
				$this->Session->setFlash('Empresa modificada correctamente', 'exito');
				return $this->redirect(array('action' => 'view', $id));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar la Empresa', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $empresa;
        }
		$redirigir = array(
							'controller' => 'empresas',
							'action' => 'viewemp',
							'admin' => false,
							$id
						);
		$this->set('redirigir',$redirigir);
    }
	
	
	
	
	
	
    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar esta Empresa'));
		}
		$empresa = $this->Empresa->findById($id);
		$texto = 'Modificar la empresa '.$empresa['Empresa']['nombre'];
		$this->set('texto',$texto);
		if (!$empresa) 
		{
			throw new NotFoundException(__('Error al editar esta empresa'));
		}
		if ($this->request->is(array('post', 'put'))) {
        $this->Empresa->id = $id;
        if ($this->Empresa->save($this->request->data)) {
            $this->Session->setFlash('Empresa modificada correctamente', 'exito');
            return $this->redirect(array('action' => 'viewemp', $id));
        }
        $this->Session->setFlash('Ocurrió un problema al modificar la Empresa', 'peligro');
    }

    if (!$this->request->data) {
        $this->request->data = $empresa;
        }
		$redirigir = array(
                    'controller' => 'empresas',
                    'action' => 'viewemp',
                    'admin' => false,
                    $id
                );
      $this->set('redirigir',$redirigir);
    }
	
	
	
	
	

	public function viewemp($id = null) 
	{ 
		$this->Empresa->recursive = 2;
        $empresa=$this->Empresa->findById($id);
        $this->set('empresa', $empresa);
		$recursoemp = $this->Recurso->find('all', array(
													'conditions' => array('Recurso.idemp' => $empresa['Empresa']['id'])
												   )
									  );
        $this->set('Recurso',$recursoemp);
	}





	function delete($id) 
	{
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Empresa->delete($id)) 
		{
			$this->Session->setFlash('Empresa eliminada correctamente', 'exito');
			$this->redirect(array('action' => 'index'));
		}
	}
}