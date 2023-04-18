<?php
App::uses('AppController', 'Controller');



class RegistrosController extends AppController 
{
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	public $uses = array('RegistroSalida','RegistroEntrada','Usuario','Plantilla');
	
	
	
	
	
	
	public function index() 
	{
		$registro = $this->RegistroEntrada->find('all', array('limit' => 10, 'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc')));
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
										);
		$this->set(compact('usuarios'));
		$estado = $this->Usuario->find('list', array(
														'fields' => array('Usuario.estado')
													)
										);
		$this->set(compact('estado'));
		$this->set('registro',$registro);
		$this->set('texto','Últimos registros de entrada');
		
    }
	
	
	
	
	
	
    public function indexSalida() 
	{
		$registro = $this->RegistroSalida->find('all', array('limit' => 10, 'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc')));
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
										);
		$this->set(compact('usuarios'));
		$estado = $this->Usuario->find('list', array(
														'fields' => array('Usuario.estado')
													)
										);
		$this->set(compact('estado'));
		$this->set('registro',$registro);
		$this->set('texto','Últimos registros de salida');
    }
	
	
	
	
	
	
	public function crear() 
	{
		if ($this->request->is('post')) 
		{
			return $this->redirect(array('action' => 'plantillaEntrada', $this->request->data['opcionEntrada']));
		}
	}
	
	
	
	
	
	
	public function crearSalida() 
	{
		if ($this->request->is('post')) 
		{
			return $this->redirect(array('action' => 'plantillaSalida', $this->request->data['opcionEntrada']));
		}
	}






	public function plantillaEntrada($plantilla) 
	{
		$this->Plantilla->recursive = -1;
		$datosPlantilla = $this->Plantilla->findById($plantilla);
		$this->set('datosPlantilla',$datosPlantilla);
		$options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
									);
		$this->set(compact('options'));
		if ($this->request->is('post')) 
		{
			$this->RegistroEntrada->create();
			for ($i = 1; $i <= 5; $i++)
			{
				if ($datosPlantilla['Plantilla']['campo'.$i] == 'Contenido:')
					$datosPlantilla['Plantilla']['campo'.$i] = null;
			}
			$comentario =
							$datosPlantilla['Plantilla']['campo1'] .' '. $this->request->data['RegistroEntrada']['campo1'] .' '.
							$datosPlantilla['Plantilla']['campo2'] .' '. $this->request->data['RegistroEntrada']['campo2'] .' '.
							$datosPlantilla['Plantilla']['campo3'] .' '. $this->request->data['RegistroEntrada']['campo3'].' '.
							$datosPlantilla['Plantilla']['campo4'] .' '. $this->request->data['RegistroEntrada']['campo4'];
							
			
			
			
			$entrada = $this->request->data;
			//$entrada['RegistroEntrada']['fecha'] = date("y-m-d" ,$entrada['RegistroEntrada']['fecha']);
			$dia = substr($entrada['RegistroEntrada']['fecha'], 0, -8);
			$mes = substr($entrada['RegistroEntrada']['fecha'], 3, -5);
			$ano = substr($entrada['RegistroEntrada']['fecha'], -4);
			
			$entrada['RegistroEntrada']['fecha'] = $ano.'-'.$mes.'-'.$dia;
			$entrada['RegistroEntrada']['comentario'] = $comentario;
	
			if ($this->RegistroEntrada->save($entrada)) 
			{
				$this->Session->setFlash('El registro ha sido guardado.', 'exito');
				return $this->redirect(array('action' => 'index'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible guardar el registro.', 'peligro');
			}
		}
	}






	public function plantillaSalida($plantilla) 
	{
		$this->Plantilla->recursive = -1;
		$datosPlantilla = $this->Plantilla->findById($plantilla);
		$this->set('datosPlantilla',$datosPlantilla);
		$options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
									);
		$this->set(compact('options'));
		if ($this->request->is('post')) 
		{
			$this->RegistroSalida->create();
			for ($i = 1; $i <= 5; $i++)
			{
				if ($datosPlantilla['Plantilla']['campo'.$i] == 'Contenido:')
					$datosPlantilla['Plantilla']['campo'.$i] = null;
			}
			if(!isset($datosPlantilla['Plantilla']['campo2']))
				$datosPlantilla['Plantilla']['campo2'] = null;
			if(!isset($datosPlantilla['Plantilla']['campo3']))
				$datosPlantilla['Plantilla']['campo3'] = null;
			if(!isset($datosPlantilla['Plantilla']['campo4']))
				$datosPlantilla['Plantilla']['campo4'] = null;
			if(!isset($datosPlantilla['Plantilla']['campo5']))
				$datosPlantilla['Plantilla']['campo5'] = null;
			$comentario =
							$datosPlantilla['Plantilla']['campo1'] .' '. $this->request->data['RegistroSalida']['campo1'] .' '.
							$datosPlantilla['Plantilla']['campo2'] .' '. $this->request->data['RegistroSalida']['campo2'] .' '.
							$datosPlantilla['Plantilla']['campo3'] .' '. $this->request->data['RegistroSalida']['campo3'].' '.
							$datosPlantilla['Plantilla']['campo4'] .' '. $this->request->data['RegistroSalida']['campo4'].' '.
							$datosPlantilla['Plantilla']['campo5'] .' '. $this->request->data['RegistroSalida']['campo5'];
			$entrada = $this->request->data;
			//$entrada['RegistroEntrada']['fecha'] = date("y-m-d" ,$entrada['RegistroEntrada']['fecha']);
			$dia = substr($entrada['RegistroSalida']['fecha'], 0, -8);
			$mes = substr($entrada['RegistroSalida']['fecha'], 3, -5);
			$ano = substr($entrada['RegistroSalida']['fecha'], -4);
			$entrada['RegistroSalida']['fecha'] = $ano.'-'.$mes.'-'.$dia;
			$entrada['RegistroSalida']['comentario'] = $comentario;
			if ($this->RegistroSalida->save($entrada)) 
			{
				$this->Session->setFlash('El registro ha sido guardado.', 'exito');
				return $this->redirect(array('action' => 'indexSalida'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible guardar el registro.', 'peligro');
			}
		}
	}






	public function editar($id = null)
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid registro'));
		}
		$registro = $this->RegistroEntrada->findById($id);
		$options = $this->Usuario->find('list', array('fields' => array('Usuario.nombre')));
		$this->set(compact('options'));
		if (!$registro) 
		{
			throw new NotFoundException(__('Invalid id'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->RegistroEntrada->id = $id;
			if ($this->RegistroEntrada->save($this->request->data)) 
			{
				$this->Session->setFlash('El registro ha sido actualizado.', 'exito');
				return $this->redirect(array('action' => 'index'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible modificar el registro.', 'peligro');
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $registro;
		}
	}
  
  
  
  
  
  
	public function eliminarentrada($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid registro'));
		}
		$registro = $this->RegistroEntrada->findById($id);
		$options = $this->Usuario->find('list', array('fields' => array('Usuario.nombre')));
		$this->set(compact('options'));
		if (!$registro) 
		{
			throw new NotFoundException(__('Invalid id'));
		}
		if($this->request->is(array('post', 'put'))) 
		{
			$this->RegistroEntrada->id = $id;
			// La función delete, busca el id en la base de datos y lo elimina.
			if ($this->RegistroEntrada->delete($id)) 
			{
				// Muestra un mensaje informando lo sucedido
				$this->Session->setFlash('El registro ha sido eliminado.', 'exito');
				// Una vez eliminado redirecciona a la vista listar, en la cual ya no
				// aparecerá el nombre seleccionado previamente.
				return $this->redirect(array('action' => 'index'));
			}	 
			else 
			{
				// Muestra un mensaje informando lo sucedido
				$this->Session->setFlash('El registro no se ha podido eliminar');
			}
		}
	}
  
  
  
  
  
  
	public function eliminarSalida($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid registro'));
		}
		$registro = $this->RegistroSalida->findById($id);
		$options = $this->Usuario->find('list', array('fields' => array('Usuario.nombre')));
		$this->set(compact('options'));
		if (!$registro) 
		{
			throw new NotFoundException(__('Invalid id'));
		}
		if($this->request->is(array('post', 'put'))) 
		{
			$this->RegistroSalida->id = $id;
			// La función delete, busca el id en la base de datos y lo elimina.
			if ($this->RegistroSalida->delete($id)) 
			{
				// Muestra un mensaje informando lo sucedido
				$this->Session->setFlash('El registro ha sido eliminado.', 'exito');
				// Una vez eliminado redirecciona a la vista listar, en la cual ya no
				// aparecerá el nombre seleccionado previamente.
				return $this->redirect(array('action' => 'indexSalida'));
			} 
			else 
			{
				// Muestra un mensaje informando lo sucedido
				$this->Session->setFlash('El registro no se ha podido eliminar');
			}
		}
	}
  
  




	public function editarSalida($id = null)
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid registro'));
		}
		$registro = $this->RegistroSalida->findById($id);
		$options = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
									);
		$this->set(compact('options'));
		if (!$registro) 
		{
			throw new NotFoundException(__('Invalid id'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->RegistroSalida->id = $id;
			if ($this->RegistroSalida->save($this->request->data)) 
			{
				$this->Session->setFlash('El registro ha sido actualizado.', 'exito');
				return $this->redirect(array('action' => 'indexSalida'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible modificar el registro.', 'peligro');
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $registro;
		}
	}
  
  




	public function verMes() 
	{
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$mes  = mktime(0, 0, 0, date("m"), date(1),   date("Y"));
		$mes_siguiente  = mktime(0, 0, 0, date("m")+1, date(0),   date("Y"));
		$conditions = array(
							'conditions' => array(
													'RegistroEntrada.fecha >= ' => date('Y/m/d',$mes),
													'RegistroEntrada.fecha <= ' => date('Y/m/d',$mes_siguiente)
												),
							'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc')
						);
		$registro = $this->RegistroEntrada->find('all', $conditions);
		$this->set('registro',$registro);
		$texto = 'Registros de entrada del mes de '.$meses[date('n')-1]. ' del '.date('Y',$mes);
		$this->set('texto', $texto);
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
										);
		$this->set(compact('usuarios'));
		$estado = $this->Usuario->find('list', array(
														'fields' => array('Usuario.estado')
													)
										);
		$this->set(compact('estado'));
		$this->render('/Registros/index');
    }






	public function verMesSalida() 
	{
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$mes  = mktime(0, 0, 0, date("m"), date(1),   date("Y"));
		$mes_siguiente  = mktime(0, 0, 0, date("m")+1, date(0),   date("Y"));
		$conditions = array(
							'conditions' => array(
													'RegistroSalida.fecha >= ' => date('Y/m/d',$mes),
													'RegistroSalida.fecha <= ' => date('Y/m/d',$mes_siguiente)
												),
                            'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc')
						);
		$registro = $this->RegistroSalida->find('all', $conditions);
		$this->set('registro',$registro);
		$texto = 'Registros de salida del mes de '.$meses[date('n')-1]. ' del '.date('Y',$mes);
		$this->set('texto', $texto);
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
										);
		$this->set(compact('usuarios'));
		$estado = $this->Usuario->find('list', array(
														'fields' => array('Usuario.estado')
													)
										);
		$this->set(compact('estado'));
		$this->render('/Registros/index_salida');
    }






	public function buscar()
	{
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
										);
		$this->set(compact('usuarios'));
		$estado = $this->Usuario->find('list', array(
														'fields' => array('Usuario.estado')
													)
										);
		$this->set(compact('estado'));
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$keyword2 = $this->request->data['keyword2'];
			$keyword3 = $this->request->data['keyword3'];
			$keyword4 = $this->request->data['keyword4'];
			
//////////////////////////////////////////////////////////BUSCAR POR UN CAMPO//////////////////////////////////////////////////////////////////////////////////			
			if($this->request->data['keyword'])
			{
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		)
														)
								);
			}
			if($this->request->data['keyword2'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroEntrada.fecha between ? and ?' => array($keyword2, $fechaactual))
														
														)
								);
			}
			if($this->request->data['keyword3'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroEntrada.fecha between ? and ?' => array($fechainicio, $keyword3))
														)
								);
			}
			if($this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%')
														)
								);
			}
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////BUSCAR POR 2 CAMPOS///////////////////////////////////////////////////////////////////////////////////			
			if($this->request->data['keyword'] AND $this->request->data['keyword2'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ?' => array($keyword2, $fechaactual)
																		)
														
														)
								);
			}
			if($this->request->data['keyword'] AND $this->request->data['keyword3'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ?' => array($fechainicio, $keyword3)
																		)
														
														)
								);
			}
			if($this->request->data['keyword'] AND $this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%', 'RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		)	
														)
								);
			}
			
			if($this->request->data['keyword2'] AND $this->request->data['keyword3'])
			{
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ? ' => array($keyword2, $keyword3)
																		)
														)
								);
			}
			if($this->request->data['keyword2'] AND $this->request->data['keyword4'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%', 'RegistroEntrada.fecha between ? and ?' => array($keyword2, $fechaactual)
																		)
														)
								);
			}
			
			if($this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%', 'RegistroEntrada.fecha between ? and ?' => array($fechainicio, $keyword3)
																		)
														)
								);
			}
			
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////BUSCAR POR 3 CAMPOS////////////////////////////////////////////////////////////////////////////////////
			if($this->request->data['keyword'] AND $this->request->data['keyword2'] AND $this->request->data['keyword3'])
			{
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ? ' => array($keyword2, $keyword3)
																		)
														)
								);
			}
			if($this->request->data['keyword2'] AND $this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ? ' => array($keyword2, $keyword3),
																			'RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%'
																		)
														)
								);
			}
			
			if($this->request->data['keyword'] AND $this->request->data['keyword2'] AND $this->request->data['keyword4'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'),
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ?' => array($keyword2, $fechaactual), 
																			'RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%'
																		)																		
														)
								);
			}
			
			if($this->request->data['keyword'] AND $this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'),
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ?' => array($fechainicio, $keyword3),
																			'RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%'
																		)																		
														)
								);
			}
			
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////BUSCAR POR 4 CAMPOS///////////////////////////////////////////////////////////////////////////////////			
			if($this->request->data['keyword'] AND $this->request->data['keyword2'] AND $this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroEntrada.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroEntrada.fecha between ? and ? ' => array($keyword2, $keyword3),
																			'RegistroEntrada.comentario LIKE' => '%'. $keyword4 . '%'
																		)
														)
								);
			}
			
			
			
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			$this->Plantilla->recursive = -1;  
			$list = $this->RegistroEntrada->find('all', $options);
		} 
		else
		{
			$this->Plantilla->recursive = -1;  
			$list = $this->RegistroEntrada->find('all', array(	'limit' => 10,
																'order' => array('RegistroEntrada.fecha' => 'desc',  'RegistroEntrada.id' => 'desc')
															)
												);
		}
		$this->set('list',$list);
	}






    public function buscarSalida()
	{
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.usuario')
													)
										);
		$this->set(compact('usuarios'));
		$estado = $this->Usuario->find('list', array(
														'fields' => array('Usuario.estado')
													)
										);
		$this->set(compact('estado'));
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$keyword2 = $this->request->data['keyword2'];
			$keyword3 = $this->request->data['keyword3'];
			$keyword4 = $this->request->data['keyword4'];
			
//////////////////////////////////////////////////////////BUSCAR POR UN CAMPO//////////////////////////////////////////////////////////////////////////////////			
			if($this->request->data['keyword'])
			{
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		)
														)
								);
			}
			if($this->request->data['keyword2'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroSalida.fecha between ? and ?' => array($keyword2, $fechaactual))
														
														)
								);
			}
			if($this->request->data['keyword3'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroSalida.fecha between ? and ?' => array($fechainicio, $keyword3))
														)
								);
			}
			if($this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%')
														)
								);
			}
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////BUSCAR POR 2 CAMPOS///////////////////////////////////////////////////////////////////////////////////			
			if($this->request->data['keyword'] AND $this->request->data['keyword2'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroSalida.fecha between ? and ?' => array($keyword2, $fechaactual)
																		)
														
														)
								);
			}
			if($this->request->data['keyword'] AND $this->request->data['keyword3'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroSalida.fecha between ? and ?' => array($fechainicio, $keyword3)
																		)
														
														)
								);
			}
			if($this->request->data['keyword'] AND $this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%', 'RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		)	
														)
								);
			}
			
			if($this->request->data['keyword2'] AND $this->request->data['keyword3'])
			{
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroSalida.fecha between ? and ? ' => array($keyword2, $keyword3)
																		)
														)
								);
			}
			if($this->request->data['keyword2'] AND $this->request->data['keyword4'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%', 'RegistroSalida.fecha between ? and ?' => array($keyword2, $fechaactual)
																		)
														)
								);
			}
			
			if($this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%', 'RegistroSalida.fecha between ? and ?' => array($fechainicio, $keyword3)
																		)
														)
								);
			}
			
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////BUSCAR POR 3 CAMPOS////////////////////////////////////////////////////////////////////////////////////
			if($this->request->data['keyword'] AND $this->request->data['keyword2'] AND $this->request->data['keyword3'])
			{
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroSalida.fecha between ? and ? ' => array($keyword2, $keyword3)
																		)
														)
								);
			}
			if($this->request->data['keyword2'] AND $this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'AND' => array(
																			'RegistroSalida.fecha between ? and ? ' => array($keyword2, $keyword3),
																			'RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%'
																		)
														)
								);
			}
			
			if($this->request->data['keyword'] AND $this->request->data['keyword2'] AND $this->request->data['keyword4'])
			{
				$fechaactual = date('Y-m-d');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'),
															'AND' => array(
																			'RegistroSalida.fecha between ? and ?' => array($keyword2, $fechaactual), 
																			'RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%'
																		)																		
														)
								);
			}
			
			if($this->request->data['keyword'] AND $this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$fechainicio = date('0000-00-00');
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array('RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'),
															'AND' => array(
																			'RegistroSalida.fecha between ? and ?' => array($fechainicio, $keyword3),
																			'RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%'
																		)																		
														)
								);
			}
			
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////BUSCAR POR 4 CAMPOS///////////////////////////////////////////////////////////////////////////////////			
			if($this->request->data['keyword'] AND $this->request->data['keyword2'] AND $this->request->data['keyword3'] AND $this->request->data['keyword4'])
			{
				$options = array(
									'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'RegistroSalida.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'RegistroSalida.fecha between ? and ? ' => array($keyword2, $keyword3),
																			'RegistroSalida.comentario LIKE' => '%'. $keyword4 . '%'
																		)
														)
								);
			}
			
			
			
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			$this->Plantilla->recursive = -1;  
			$list = $this->RegistroSalida->find('all', $options);
		} 
		else
		{
			$this->Plantilla->recursive = -1;  
			$list = $this->RegistroSalida->find('all', array(	'limit' => 10,
																'order' => array('RegistroSalida.fecha' => 'desc',  'RegistroSalida.id' => 'desc')
															)
												);
		}
		$this->set('list',$list);
    }






	public function redigerir()
	{
		$entradas = $this->RegistroEntrada->find('all');
		$salidas = $this->RegistroSalida->find('all');
		foreach ($entradas as $entrada) 
		{
			$entrada['RegistroEntrada']['remitente'] = $entrada['RegistroEntrada']['proc_rem'];
			$this->RegistroEntrada->save($entrada);
		}
		foreach ($salidas as $salida) 
		{
			$salida['RegistroSalida']['destinatario'] = $salida['RegistroSalida']['des_des'];
			$this->RegistroSalida->save($salida);
		}
		$this->render('/Registros/indexSalida');
    }






    public function redigerir2()
	{
		$entradas = $this->RegistroEntrada->find('all');
		$salidas = $this->RegistroSalida->find('all');
		foreach ($entradas as $entrada)
		{
			$pos = strpos($entrada['RegistroEntrada']['comentario'], '120');
			if ($pos != false)
			{
				$tamano = strlen($entrada['RegistroEntrada']['comentario']);
				$cortar = -($tamano - $pos)+ 8;
				$referencia = substr($entrada['RegistroEntrada']['comentario'],$pos,$cortar);
				if(strlen($referencia) == 8)
				{
					$entrada['RegistroEntrada']['referencia'] = $referencia;
					$this->RegistroEntrada->save($entrada);
				}
			}
			$pos = strpos($entrada['RegistroEntrada']['comentario'], '220');
			if ($pos != false)
			{
				$tamano = strlen($entrada['RegistroEntrada']['comentario']);
				$cortar = -($tamano - $pos)+ 8;
				$referencia = substr($entrada['RegistroEntrada']['comentario'],$pos,$cortar);
				if(strlen($referencia) == 8)
				{
					$entrada['RegistroEntrada']['referencia'] = $referencia;
					$this->RegistroEntrada->save($entrada);
				}
			}
		}
		$this->render('/Registros/index');
		foreach ($salidas as $salida)
		{
			$pos = strpos($salida['RegistroSalida']['comentario'], '120');
			if ($pos != false)
			{
				$tamano = strlen($salida['RegistroSalida']['comentario']);
				$cortar = -($tamano - $pos)+ 8;
				$referencia = substr($salida['RegistroSalida']['comentario'],$pos,$cortar);
				if(strlen($referencia) == 8)
				{
					$salida['RegistroSalida']['referencia'] = $referencia;
					$this->RegistroSalida->save($salida);
				}
			}
			$pos = strpos($salida['RegistroSalida']['comentario'], '220');
			if ($pos != false)
			{
				$tamano = strlen($salida['RegistroSalida']['comentario']);
				$cortar = -($tamano - $pos)+ 8;
				$referencia = substr($salida['RegistroSalida']['comentario'],$pos,$cortar);
				if(strlen($referencia) == 8)
				{
					$salida['RegistroSalida']['referencia'] = $referencia;
					$this->RegistroSalida->save($salida);
				}
			}
		}
		/*$this->render('/Registros/indexSalida');*/
    }
}