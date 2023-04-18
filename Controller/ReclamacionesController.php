<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'dompdf');



class ReclamacionesController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session','RequestHandler');
    public $uses = array('Reclamacion','Usuario','RegistroNoConformidad','Proveedor');






	public function index() 
	{
		$this->Reclamacion-> recursive=2;
		$reclamacion = $this->Reclamacion->find('all');
		$this->set('reclamacion',$reclamacion);
    }






	public function indexrnc() 
	{
		$this->RegistroNoConformidad->recursive = -1;
		$registro = $this->RegistroNoConformidad->find('all', array('order' => array('id' => 'desc')));
		$this->set('registro',$registro);
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$keyword2 = $this->request->data['keyword2'];
			if($this->request->data['keyword'])
			{
				$options = array(
									'conditions' => array(
															'OR' => array(
																			'RegistroNoConformidad.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		)
														)
								);
			}
			if($this->request->data['keyword2'])
			{
				$options = array(
									'order' => array(	'RegistroNoConformidad.fecha_apertura' => 'desc',  'RegistroNoConformidad.id' => 'desc'),
														'conditions' => array(
																				'OR' => array(
																								'RegistroNoConformidad.fecha_apertura LIKE' => '%'. $keyword2 . '%'
																							)	
																			)
								);
			}
			if($this->request->data['keyword'] AND $this->request->data['keyword2'])
			{
				$options = array(
									'order' => array('RegistroNoConformidad.fecha_apertura' => 'desc',  'RegistroNoConformidad.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroNoConformidad.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroNoConformidad.fecha_apertura LIKE' => '%'. $keyword2 . '%'
																		)	
														)
								);
			}
			$list = $this->RegistroNoConformidad->find('all', $options);
		} 
		else
		{
			$list = $this->RegistroNoConformidad->find('all', array('limit' => 10, 'order' => array('id' => 'desc')));
		}
		$this->set('registro',$list);
	}






    public function add() 
	{
        if ($this->request->is('post')) 
		{
        	$this->Reclamacion->create();
            if ($this->Reclamacion->save($this->request->data)) 
			{
      			$this->Session->setFlash('Reclamacion creada correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema al crear la reclamación', 'peligro');
            }
        }
        $texto = 'Crear reclamación';
        $this->set('texto',$texto);
		$listado = $this->Proveedor->find('list', array(
														'fields'     => array('Proveedor.id', 'Proveedor.nombre')	
														)
										);
        $this->set(compact('listado'));
        $options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$redirigir = array(
							'controller' => 'reclamaciones',
							'action' => 'index',
							'admin' => false
						);
		$this->set('redirigir',$redirigir);
        $this->set(compact('options'));
        $this->render('/Reclamaciones/reclamacion');
    }
	
	
	
	


    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		$recla = $this->Reclamacion->findById($id);
		$texto = 'Modificar la Reclamación '.$recla['Reclamacion']['codigo_reclamacion'];
		$this->set('texto',$texto);
		$options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('options'));
		$listado = $this->Proveedor->find('list', array(
														'fields'     => array('Proveedor.id', 'Proveedor.nombre')	
													)
										);
        $this->set(compact('listado'));
		if (!$recla) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Reclamacion->id = $id;
			if ($this->Reclamacion->save($this->request->data)) 
			{
      			$this->Session->setFlash('Reclamación modificada correctamente', 'exito');
				return $this->redirect(array('action' => 'viewre', $this->request->params['pass'][0]));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar la reclamación', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $recla;
        }
		$redirigir = array(
							'controller' => 'reclamaciones',
							'action' => 'viewre', $this->request->params['pass'][0],
							'admin' => false 
						);
		$this->set('redirigir',$redirigir);
    }
	
	
	
	
	
	
    function delete($id) 
	{
    	if (!$this->request->is('post')) 
		{
        	throw new MethodNotAllowedException();
    	}
    	if ($this->Reclamacion->delete($id)) 
		{
      		$this->Session->setFlash('Reclamación eliminada correctamente', 'exito');
        	$this->redirect(array('action' => 'index'));
    	}
    }






    function deleternc($id) 
	{
      if (!$this->request->is('post')) 
	  {
        throw new MethodNotAllowedException();
      }
      if ($this->RegistroNoConformidad->delete($id)) 
	  {
		$this->Session->setFlash('RNC eliminado correctamente', 'exito');
        $this->redirect($this->referer());
      }
    }

   
   
   
   
   
	function rnc($pedido, $proveedor,$id = null) 
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			if($id == null)
				$this->RegistroNoConformidad->create();
			else 
			{
				$this->RegistroNoConformidad->id = $id;
			}
			if ($this->RegistroNoConformidad->save($this->request->data)) 
			{
				$this->Session->setFlash('Registro de No Conformidad creado correctamente', 'exito');
				$this->redirect(array('controller' => 'pedidos', 'action' => 'view', $pedido,'menu5'));
			} 
			else
			{
				$this->Session->setFlash('Ocurrió un problema al crear el registro', 'peligro');
			}
		}
		$texto = 'Añadir Registro de No Conformidad';
		$this->set('texto',$texto);
		$options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('options'));
		$registro = $this->RegistroNoConformidad->findById($id);
		if (!$this->request->data) 
		{
			$this->request->data = $registro;
		}
		$redirigir = array(
							'controller' => 'pedidos',
							'action' => 'view',
							'admin' => false,
							$pedido,'menu5'
						);
		$this->set('redirigir',$redirigir);
		$options = array(
							'Compras' => 'Compras'
						);
		$this->set('options',$options);
    }

	
   
   
   
   
	public function editrnc($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		$registronc = $this->RegistroNoConformidad->findById($id);
		$texto = 'Modificar el RNC '.$registronc['RegistroNoConformidad']['id'];
		$this->set('texto',$texto);
		$options = array(
							'Ejecución de proceso' => 'Ejecución de proceso',
							'Auditorías Sistema' => 'Auditorías Sistema',
							'Análisis de Datos' => 'Análisis de Datos'                    
						);
		$this->set('options',$options);
		$options2 = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('options2', $options2));
		if (!$registronc) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->RegistroNoConformidad->id = $id;
			if ($this->RegistroNoConformidad->save($this->request->data)) 
			{
      			$this->Session->setFlash('RNC modificado correctamente', 'exito');
				return $this->redirect(array('action' => 'viewre', $this->request->params['pass'][0]));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el RNC', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $registronc;
        }
		$redirigir = array(
							'controller' => 'reclamaciones',
							'action' => 'view', $this->request->params['pass'][0],
							'admin' => false 
						);
		$this->set('redirigir',$redirigir);
    }
   
   
   
   
   
	
    function rncgeneral($id = null) 
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			if($id == null)
				$this->RegistroNoConformidad->create();
			else 
			{
				$this->RegistroNoConformidad->id = $id;
			}
			if ($this->RegistroNoConformidad->save($this->request->data)) 
			{
				$this->Session->setFlash('Registro de No Conformidad creado correctamente', 'exito');
				$this->redirect(array('controller' => 'reclamaciones', 'action' => 'indexrnc'));
			} 
			else
			{
                $this->Session->setFlash('Ocurrió un problema al crear el registro', 'peligro');
			}
		}
		$texto = 'Añadir Registro de No Conformidad';
		$this->set('texto',$texto);
		$options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
									);
		$this->set(compact('options'));
		$registro = $this->RegistroNoConformidad->findById($id);
		if (!$this->request->data) 
		{
			$this->request->data = $registro;
		}
		$redirigir = array(
							'controller' => 'reclamaciones',
							'action' => 'indexrnc',
							'admin' => false
                );
		$this->set('redirigir',$redirigir);
		$options = array(
							'Ejecución de proceso' => 'Ejecución de proceso',
							'Auditorías Sistema' => 'Auditorías Sistema',
							'Análisis de Datos' => 'Análisis de Datos'                    
						);
		$this->set('options',$options);
		$this->render('/Reclamaciones/rnc');
    }






    public function view($id) 
	{
		$rnc = $this->RegistroNoConformidad->findById($id);
		$this->set('rnc',$rnc);
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('usuarios'));
    }






    public function viewre($id) 
	{
		$reclamacion = $this->Reclamacion->findById($id);
		$this->set('reclamacion',$reclamacion);
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('usuarios'));
    }






    public function finalizar($id) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al finalizar este pedido'));
		}
		$rnc = $this->RegistroNoConformidad->findById($id);
		if (!$rnc) 
		{
			throw new NotFoundException(__('Error al finalizar este pedido'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->RegistroNoConformidad->id = $id;
			$datos= array(
							'RegistroNoConformidad'=> array(
															'fecha_cierre' => $this->request->data['RegistroNoConformidad']['fecha_cierre'],
															'usuario_cierre' => $this->request->data['RegistroNoConformidad']['usuario_cierre'],
															'cierre' => $this->request->data['RegistroNoConformidad']['cierre'],
															'finalizado' => $this->request->data['RegistroNoConformidad']['finalizado']
														)
						);
			if ($this->RegistroNoConformidad->save($datos)) 
			{
				$this->Session->setFlash('RNC finalizado correctamente', 'exito');
				return $this->redirect(array('action' => 'view', $this->RegistroNoConformidad->id));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el RNC', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $rnc;
		}
    }






    public function cierre($id) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al finalizar este pedido'));
		}
		$rnc = $this->Reclamacion->findById($id);
		if (!$rnc) 
		{
			throw new NotFoundException(__('Error al finalizar este pedido'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Reclamacion->id = $id;
			$datos= array(
							'Reclamacion'=> array(
													'fecha_cierre' => $this->request->data['Reclamacion']['fecha_cierre'],
													'usuario_cierre' => $this->request->data['Reclamacion']['usuario_cierre'],
													'cierre' => $this->request->data['Reclamacion']['cierre'],
													'finalizado' => $this->request->data['Reclamacion']['finalizado']
												)					
						);
			if ($this->Reclamacion->save($datos)) 
			{
				$this->Session->setFlash('Reclamación finalizada correctamente', 'exito');
				return $this->redirect(array('action' => 'viewre', $id));
			}
			$this->Session->setFlash('Ocurrió un problema al cerrar la Reclamación', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $rnc;
		}
    }






    public function espera($id)
	{
		$rnc = $this->RegistroNoConformidad->find('first', array(
																	'conditions' => array(	'RegistroNoConformidad.id' => $id),
																							'fields' => array('RegistroNoConformidad.id', 'RegistroNoConformidad.finalizado')
																)
												);
		$rnc['RegistroNoConformidad']['finalizado'] = 'N';
		if ($this->RegistroNoConformidad->save($rnc)) 
		{
			$this->Session->setFlash('Registro abierto de nuevo', 'exito');
			return $this->redirect(array('action' => 'view', $id));
		}
    }






    public function abrir($id)
	{
		$rnc = $this->Reclamacion->find('first', array(
														'conditions' => array(	'Reclamacion.id' => $id),
														'fields' => array('Reclamacion.id', 'Reclamacion.finalizado')
													)
									);
		$rnc['Reclamacion']['finalizado'] = 'N';
		if ($this->Reclamacion->save($rnc)) 
		{
			$this->Session->setFlash('Reclamacion abierta de nuevo', 'exito');
			return $this->redirect(array('action' => 'viewre', $id));
		}
    }






    public function pdf($id) 
	{
		$this->pdfConfig = array(
									'download' => true,
									'filename' => 'RNC_'.$id.'.pdf'
								);
		$rnc = $this->RegistroNoConformidad->findById($id);
		$this->set('rnc',$rnc);
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('usuarios'));
    }






    public function pdfrec($id) 
	{
		$this->pdfConfig = array(
									'download' => true,
									'filename' => 'RC_'.$id.'.pdf'
								);
		$rc = $this->Reclamacion->findById($id);
		$this->set('rc',$rc);
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
		$this->set(compact('usuarios'));
    }
}