<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'dompdf');



class AccionesController extends AppController 
{
	public $helpers = array('Html', 'Form');
    public $components = array('Session','RequestHandler');
    public $uses = array('Accion','Seguimiento','Usuario');

	public function index() 
	{
		$this->Accion->recursive = 2;
		$accion = $this->Accion->find('all',array('order' => array('Accion.id' => 'desc')));
		$this->set('accion',$accion);
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('usuarios'));
    }






    public function add() 
	{
		if ($this->request->is('post')) 
		{
			$this->Accion->create();
            if ($this->Accion->save($this->request->data)) 
			{
				$this->Session->setFlash('Accion creada correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            } 
			else
			{
				$this->Session->setFlash('Ocurrió un problema al crear la accion', 'peligro');
            }
        }
        $options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
        $this->set(compact('options'));
    }






    public function addrnc() 
	{
        if ($this->request->is('post')) 
		{
        	$this->Accion->create();
            if ($this->Accion->save($this->request->data)) 
			{
      			$this->Session->setFlash('Accion creada correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema al crear la accion', 'peligro');
            }
        }
        $options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
        $this->set(compact('options'));
    }
	
	
	
	
	
	
	public function accionre($id = null) 
	{
        if ($this->request->is('post')) 
		{
        	$this->Accion->create();
            if ($this->Accion->save($this->request->data)) 
			{
      			$this->Session->setFlash('Accion creada correctamente', 'exito');
                $this->redirect(array('controller' => 'reclamaciones', 'action' => 'viewre', $this->request->params['pass'][0]));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema al crear la accion', 'peligro');
            }
        }
        $options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
        $this->set(compact('options'));		
    }
	
	
	
	
	
	
	public function view($id = null) 
	{
		$this->Accion->recursive = 2;
        $accion = $this->Accion->findById($id);
        $this->set('accion', $accion);
        $usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
        $this->set(compact('usuarios'));
    }
	
	
	
	
	
	
	public function viewrnc($id = null) 
	{
		$this->Accion->recursive = 2;
        $accion = $this->Accion->findById($id);
        $this->set('accion', $accion);
        $usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
        $this->set(compact('usuarios'));
    }
	
	
	
	
	
	
    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		$accion = $this->Accion->findById($id);
		$this->set('accion',$accion);
		if (!$accion) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Accion->id = $id;
			if ($this->Accion->save($this->request->data)) 
			{
      			$this->Session->setFlash('Acción modificada correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar la acción', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $accion;
        }
    }






    function finalizar($id) 
	{
        if (!$id) 
		{
            throw new NotFoundException(__('Error en la ID al finalizar la acción'));
        }
        $accion = $this->Accion->findById($id);
        $this->set('accion',$accion);
        if (!$accion) 
		{
            throw new NotFoundException(__('Error al finalizar la acción '));
        }
        if ($this->request->is(array('post', 'put'))) 
		{
            $this->Accion->id = $id;
            $datos= array(
							'Accion'=> array(
												'fecha_cierre' => $this->request->data['Accion']['fecha_cierre'],
												'conclusiones' => $this->request->data['Accion']['conclusiones'],
												'usuario_cierre' => $this->request->data['Accion']['usuario_cierre'],
												'id' => $id,
												'finalizado' => 'S'
											)
						);
            if ($this->Accion->save($datos)) 
			{
                $this->Session->setFlash('Acción finalizada correctamente', 'exito');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Ocurrió un problema al modificar la acción', 'peligro');
        }
        if (!$this->request->data) 
		{
            $this->request->data = $accion;
        }
    }






    function abrir($id)
    {
		if (!$id) 
		{
			throw new NotFoundException(__('Error en la ID al finalizar la acción'));
		}
		$accion = $this->Accion->findById($id);
		$this->set('accion',$accion);
		if (!$accion) 
		{
			throw new NotFoundException(__('Error al finalizar la acción '));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Accion->id = $id;
			$datos= array(
							'Accion'=> array(
												'id' => $id,
												'finalizado' => 'N'
											)
						);
			if ($this->Accion->save($datos)) 
			{
                $this->Session->setFlash('Acción abierta correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar la acción', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $accion;
		}
    }






    function delete($id) 
	{
    	if (!$this->request->is('post')) 
		{
        	throw new MethodNotAllowedException();
    	}
    	if ($this->Accion->delete($id)) 
		{
      		$this->Session->setFlash('Acción eliminada correctamente', 'exito');
			$this->redirect($this->referer());
        }
    }






    public function pdf($id) 
	{
		$this->pdfConfig = array(
									'download' => true,
									'filename' => 'Accion_'.$id.'.pdf'
								);
		$accion = $this->Accion->findById($id);
		$this->set('accion',$accion);
		$usuarios = $this->Usuario->find('all');
		$options = array();
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('usuarios'));
    }
}