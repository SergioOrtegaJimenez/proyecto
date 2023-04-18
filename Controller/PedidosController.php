<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::import('Vendor', 'dompdf');



class PedidosController extends AppController 
{
    public $helpers = array('Html', 'Form', 'Js');
    public $components = array('Session','RequestHandler');
    public $uses = array('Pedido','Material','MaterialPedido','Unidad_gasto','Proveedor','Recurso','Reclamacion','RegistroNoConformidad','Usuario','Historico','Evento');

    
	
	
	

	
	public function iniciopedido() 
	{
        $this->Pedido->recursive = 3;
        $list = array();
	

        if ($this->request->is(array('get')))  
		{
			$list = $this->Pedido->find('all',array(
														'order' => array('fecha_solicitud DESC'),
														'limit' => 20
													)
										);
			
		}

        if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			if($this->request->data['option'] == 'unidadgasto')
            {
                $options = array(
									'conditions' => array(
															'OR' => array(
																			'Unidad_gasto.num_unidad '.' LIKE' => '%'. $keyword . '%'
																		)
														)
								);
				
			}
            
			if($this->request->data['option'] == 'proveedor')
            {
                $options = array(
									'conditions' => array(
															'OR' => array(
																			'Proveedor.nombre '.' LIKE' => '%'. $keyword . '%'
																		)
														)
								);
            
			}

			$list = $this->Pedido->find('all', $options);
			
		}
		$estado = $this->Proveedor->find('list', array(
														'fields' => array('Proveedor.estado')
													)
										);
		$this->set(compact('estado'));
		$this->set('list',$list);
	}







    public function view($id = null, $menu = null) 
	{
		$this->Pedido->recursive = 2;
		$pedido=$this->Pedido->findById($id);
        $this->set('pedido', $pedido);
        $this->set('menu',$menu);
		$material= $this->MaterialPedido->find('all', array(
																'conditions' => array('MaterialPedido.id_pedido' => $pedido['Pedido']['id']),
																'fields'     => array('MaterialPedido.id_material','MaterialPedido.unidades'),
																'recursive' => 2
															)
											);
        $this->set('material',$material);
        $recurs=$this->Recurso->find('all', array(
													'conditions' => array('Recurso.id_pedido' => $pedido['Pedido']['id'])
												)
									);
        $this->set('recurs',$recurs);
		if ($this->request->is(array('post','put'))) 
		{
			$this->Pedido->id = $id;
			if (isset($this->request->data['anadirsolicitud'])) 
			{
				$tmp = $this->data['Pedido']['archivoPDFsolicitud']['tmp_name'];
				$ficherodestino = $this->data['Pedido']['archivoPDFsolicitud']['name'];
				if(!empty($tmp))
				{
					$datos= array(
									'Pedido'=> array(
														'id' => $id,
														'archivoPDFsolicitud'=> $ficherodestino
													)
								);
					if ($this->Pedido->save($datos)) 
					{
						$nombre = $this->Pedido->find('all', array(
																	'conditions' => array('Pedido.id' => $id)
																)
													);
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'pedidos'.DS.'Pedido '.$nombre[0]['Pedido']['id']);
						$this->Session->setFlash('El documento ha sido guardado.', 'exito');
						return $this->redirect(array('action' => 'view', $this->Pedido->id));
					} 
					else
					{
						$this->Session->setFlash('Imposible añadir el documento.', 'peligro');
					}
				} 
				else 
				{
					$this->Session->setFlash('Selecciona un fichero.', 'peligro');
				}
			}
			else if (isset($this->request->data['anadirfirmado'])) 
			{
				$tmp = $this->data['Pedido']['archivoPDFsolicitudFirmado']['tmp_name'];
				$ficherodestino = $this->data['Pedido']['archivoPDFsolicitudFirmado']['name'];
				if(!empty($tmp))
				{
					$datos= array(
									'Pedido'=> array(
														'id' => $id,
														'archivoPDFsolicitudFirmado'=> $ficherodestino
													)
								);
					if ($this->Pedido->save($datos)) 
					{
						$nombre = $this->Pedido->find('all', array(
																	'conditions' => array('Pedido.id' => $id)
																)
													);
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'pedidos'.DS.'Pedido '.$nombre[0]['Pedido']['id'].' firmado');
						$this->Session->setFlash('El documento ha sido guardado.', 'exito');
						return $this->redirect(array('action' => 'view', $this->Pedido->id));
					} 
					else
					{
						$this->Session->setFlash('Imposible añadir el documento.', 'peligro');
					}
				}
				else 
				{
					$this->Session->setFlash('Selecciona un fichero.', 'peligro');
				}
			}
			else 
			{
				$this->Session->setFlash('Ocurrió un problema al subir el documento', 'peligro');
			}
		}
	}






	public function materialespedido($id = null, $menu = null) 
	{
		$this->Pedido->recursive = 2;
        $pedido=$this->Pedido->findById($id);
        $this->set('pedido', $pedido);
        $this->set('menu',$menu);
        $material= $this->MaterialPedido->find('all', array(
																'conditions' => array(	'MaterialPedido.id_pedido' => $pedido['Pedido']['id']),
																'fields'     => array('MaterialPedido.id_material','MaterialPedido.unidades'),
																'recursive' => 2
															)
											);
        $this->set('material',$material);
        $recurs=$this->Recurso->find('all', array(
													'conditions' => array('Recurso.id_pedido' => $pedido['Pedido']['id'])
												)
									);
        $this->set('recurs',$recurs);
		if ($this->request->is(array('post','put'))) 
		{
			$this->Pedido->id = $id;
			if (isset($this->request->data['anadirsolicitud'])) 
			{
				$tmp = $this->data['Pedido']['archivoPDFsolicitud']['tmp_name'];
				$ficherodestino = $this->data['Pedido']['archivoPDFsolicitud']['name'];
				if(!empty($tmp))
				{
					$datos= array(
									'Pedido'=> array(
														'id' => $id,
														'archivoPDFsolicitud'=> $ficherodestino
													)
								);
					if ($this->Pedido->save($datos)) 
					{
						$nombre = $this->Pedido->find('all', array(
																	'conditions' => array('Pedido.id' => $id)
																)
													);
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'pedidos'.DS.'Pedido '.$nombre[0]['Pedido']['id']);
						$this->Session->setFlash('El documento ha sido guardado.', 'exito');
						return $this->redirect(array('action' => 'view', $this->Pedido->id));
					} 
					else
					{
						$this->Session->setFlash('Imposible añadir el documento.', 'peligro');
					}
				} 
				else 
				{
					$this->Session->setFlash('Selecciona un fichero.', 'peligro');
				}
			}
			else if (isset($this->request->data['anadirfirmado'])) 
			{
				$tmp = $this->data['Pedido']['archivoPDFsolicitudFirmado']['tmp_name'];
				$ficherodestino = $this->data['Pedido']['archivoPDFsolicitudFirmado']['name'];
				if(!empty($tmp))
				{
					$datos= array(
									'Pedido'=> array(
														'id' => $id,
														'archivoPDFsolicitudFirmado'=> $ficherodestino
													)
								);
					if ($this->Pedido->save($datos)) 
					{
						$nombre = $this->Pedido->find('all', array(
																	'conditions' => array('Pedido.id' => $id)
																)
													);
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'pedidos'.DS.'Pedido '.$nombre[0]['Pedido']['id'].' firmado');
						$this->Session->setFlash('El documento ha sido guardado.', 'exito');
						return $this->redirect(array('action' => 'view', $this->Pedido->id));
					} 
					else
					{
						$this->Session->setFlash('Imposible añadir el documento.', 'peligro');
					}
				} 
				else 
				{
					$this->Session->setFlash('Selecciona un fichero.', 'peligro');
				}
			}
			else 
			{
				$this->Session->setFlash('Ocurrió un problema al subir el documento', 'peligro');
			}
		}
	}
	
	
	
	

    public function download($id=null) 
	{
		$pedido=$this->Pedido->findById($id);
        $path='webroot'.DS.'files'.DS.'pedidos'.DS.'Pedido '.$pedido['Pedido']['id'];
        $this->response->file($path, array('download' => true, 'name' => $pedido['Pedido']['archivoPDFsolicitud']));
		return $this->response;
	}






    public function downloadfimado($id=null) 
	{
        $pedido=$this->Pedido->findById($id);
        $path='webroot'.DS.'files'.DS.'pedidos'.DS.'Pedido '.$pedido['Pedido']['id'].' firmado';
        $this->response->file($path, array('download' => true, 'name' => $pedido['Pedido']['archivoPDFsolicitudFirmado']));
		return $this->response;
	}






    public function addpedido() 
	{
        if ($this->request->is('post')) 
		{
            $this->Pedido->create();
            if ($this->Pedido->save($this->request->data)) 
			{
                $this->redirect(array('action' => 'addmaterial', $this->Pedido->id));
            } 
			else
			{
                    $this->Session->setFlash('Ocurrió un problema al crear el Pedido', 'peligro');
            }
        }

        $listadoug = $this->Unidad_gasto->find('list', array(
																'fields'     => array('Unidad_gasto.id', 'Unidad_gasto.num_unidad')
															)
											);
        $this->set(compact('listadoug'));
        $listado = $this->Proveedor->find('list', array(
															'fields'     => array('Proveedor.nombre')
														)
										);
        $this->set(compact('listado'));
	}







    public function addmaterial($id=null) 
	{
        $this->Pedido-> recursive=2;
        $pedido=$this->Pedido->findById($id);
        $material= $this->Material->find('list', array(
														'conditions' => array('Material.id_proveedor' => $pedido['Pedido']['id_proveedor']),
														'fields'     => array('Material.nombre')
													)
										);
        $this->set(compact('material'));
        $this->set(compact('pedido'));
        if ($this->request->is('post')) 
		{
            $this->MaterialPedido->create();
            $datos= array(
							'MaterialPedido'=> array(
														'id_material'=> $this->request->data['MaterialPedido']['id_material'],
														'unidades'=> $this->request->data['MaterialPedido']['unidades'],
														'id_pedido'=> $pedido['Pedido']['id']
													)
						);
            if (isset($this->request->data['finpedido'])) 
			{
                $this->MaterialPedido->save($datos);
                $this->Session->setFlash('Pedido creado correctamente', 'exito');
                $this->redirect(array('action' => 'view', $id));
            }
            elseif (isset($this->request->data['anadirmateriales'])) 
			{
                $this->MaterialPedido->save($datos);
                $this->Session->setFlash('Material añadido correctamente', 'peligro');
                $this->redirect(array('action' => 'addmaterial', $pedido['Pedido']['id']));
            }
            else
			{
                    $this->Session->setFlash('Ocurrió un problema al crear el Pedido', 'peligro');
            }
		}
	}






   public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar este pedido'));
		}

		$pedido = $this->Pedido->findById($id);
		$this->set('id',$id);
		if (!$pedido) 
		{
			throw new NotFoundException(__('Error al editar este pedido'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Pedido->id = $id;
			$datos= array(
							'Pedido'=> array(
												'id' => $id,
												'fecha_solicitud'=> $this->request->data['Pedido']['fecha_solicitud'],
												'fecha_llegada'=> $this->request->data['Pedido']['fecha_llegada'],
												'tipo_gasto'=> $this->request->data['Pedido']['tipo_gasto'],
												'observaciones'=> $this->request->data['Pedido']['observaciones'],
												'precioInicial'=> $this->request->data['Pedido']['precioInicial'],
												'precioFinal'=> $this->request->data['Pedido']['precioFinal'],
												'id_unidadgasto'=> $this->request->data['Pedido']['id_unidadgasto']
											)
						);
			if ($this->Pedido->save($datos)) 
			{
				$this->Session->setFlash('Pedido modificado correctamente', 'exito');
				return $this->redirect(array('action' => 'view', $this->Pedido->id));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el Pedido', 'peligro');
		}

        if (!$this->request->data) 
		{
			$this->request->data = $pedido;
        }

        $listadoug = $this->Unidad_gasto->find('list', array(
																'fields'     => array('Unidad_gasto.id', 'Unidad_gasto.num_unidad')
															)
											);
        $this->set(compact('listadoug'));
        $listado = $this->Proveedor->find('list', array(
															'fields'     => array('Proveedor.nombre')
														)
										);
        $this->set(compact('listado'));

    }







    public function finalizar($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al finalizar este pedido'));
		}
		
		$pedido = $this->Pedido->findById($id);
		if (!$pedido) 
		{
			throw new NotFoundException(__('Error al finalizar este pedido'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Pedido->id = $id;
			$datos= array(
							'Pedido'=> array(
												'fecha_llegada' => $this->request->data['Pedido']['fecha_llegada'],
												'precioFinal' => $this->request->data['Pedido']['precioFinal'],
												'conformidad' => $this->request->data['Pedido']['conformidad'],
												'finalizado' => $this->request->data['Pedido']['finalizado']
											)
						);
			$eventos= array(
								'Evento' => array(
													'fecha'=> $this->request->data['Pedido']['fecha_llegada'],
													'descripcion'=> 'Llegada de un pedido',
													'tipo'=> 'Pedido',
													'id_tipo' => $id
												)
						);
			$comprobacion= $this->Evento->find('list', array(
																'conditions' => array('Evento.id_tipo' => $eventos['Evento']['id_tipo']),
																'fields'     => array('Evento.id')
															)
											);
			if ($this->Pedido->save($datos)) 
			{
				$this->Session->setFlash('Pedido finalizado correctamente', 'exito');
				$this->autoActualizarCC($pedido['Pedido']['id_proveedor']);
				if($comprobacion == NULL)
				{
					$this->Evento->save($eventos);
				}
				return $this->redirect(array('action' => 'view', $this->Pedido->id));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el Pedido', 'peligro');
		}
        if (!$this->request->data) 
		{
			$this->request->data = $pedido;
        }
    }






    public function espera($id)
	{
		$pedido = $this->Pedido->find('first', array(
														'conditions' => array('Pedido.id' => $id),
														'fields' => array('Pedido.id', 'Pedido.finalizado')
													)
									);
		$pedido['Pedido']['finalizado'] = NULL;
		if ($this->Pedido->save($pedido)) 
		{
			$this->Session->setFlash('Pedido abierto de nuevo', 'exito');
			return $this->redirect(array('action' => 'view', $id));
		}
    }






    function delete($id) 
	{
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Pedido->delete($id)) 
		{
			$this->Session->setFlash('Pedido eliminado correctamente', 'exito');
			return $this->redirect(array('action' => 'iniciopedido'));
		}
    }






    function deletematerial($idped=null,$id=null) 
	{
		$this->Pedido-> recursive=2;
		$this->Material-> recursive=2;
		$ped=$this->Pedido->findById($idped);
		$mat=$this->Material->findById($id);
		$conditions = array(
								'AND' => array(
												'MaterialPedido.id_material' => $mat['Material']['id'],
												'MaterialPedido.id_pedido' => $ped['Pedido']['id']
											)
						);

		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->MaterialPedido->deleteAll($conditions)) 
		{
			$this->Session->setFlash('Material eliminado correctamente', 'exito');
			$this->redirect(array('action' => 'view', $idped));
		}
	}
	
	
	
	
	
	
    public function eliminarsolicitud($id=null) 
	{
		$pedido = $this->Pedido->findById($id);
		debug($pedido);

		if ($this->request->is(array('get'))) 
		{
			$this->Pedido->id = $id;
			$datos= array(
							'Pedido'=> array(
												'archivoPDFsolicitud' => null,
										)
						);
			if ($this->Pedido->save($datos)) 
			{
				$dir = WWW_ROOT.'files'.DS.'pedidos';
				$file = new File($dir.DS.'Pedido '.$pedido['Pedido']['id']);
				$file->delete();
				$this->Session->setFlash('La solicitud con nombre: '.$pedido['Pedido']['archivoPDFsolicitud'].' ha sido eliminado.','exito');
			}
			else
			{
				$this->Session->setFlash('La solicitud nombre: '.$pedido['Pedido']['archivoPDFsolicitud'].' no ha podido ser eliminado.','peligro');
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $pedido;
		}
    
		$this->redirect(array('action' => 'view',$id));
	}






    public function eliminarfirmado($id=null) 
	{
		$pedido = $this->Pedido->findById($id);
		debug($pedido);
		if ($this->request->is(array('get'))) 
		{
			$this->Pedido->id = $id;
			$datos= array(
							'Pedido'=> array(
												'archivoPDFsolicitudFirmado' => null,
											)
						);
			if ($this->Pedido->save($datos)) 
			{
				$dir = WWW_ROOT.'files'.DS.'pedidos';
				$file = new File($dir.DS.'Pedido '.$pedido['Pedido']['id']);
				$file->delete();
				$this->Session->setFlash('La solicitud con nombre: '.$pedido['Pedido']['archivoPDFsolicitudFirmado'].' ha sido eliminado.','exito');
			}
			else
			{
				$this->Session->setFlash('La solicitud con nombre: '.$pedido['Pedido']['archivoPDFsolicitudFirmado'].' no ha podido ser eliminado.','peligro');
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $pedido;
		}
		
		$this->redirect(array('action' => 'view',$id));
	}






    public function autoActualizarCC($idProveedor)
    {
		$prov=$this->Proveedor->findById($idProveedor);
        $coeficienteAntiguo = $prov['Proveedor']['coeficiente_calidad'];
        $numrec= $this->Reclamacion->find('count', array(
															'conditions' => array('Reclamacion.id_proveedor' => $prov['Proveedor']['id'])
														)
										);
        $numrnc= $this->RegistroNoConformidad->find('count', array(
																	'conditions' => array('RegistroNoConformidad.id_proveedor' => $prov['Proveedor']['id'])
																)
												);
        $numped= $this->Pedido->find('count', array(
														'conditions' => array(	'Pedido.id_proveedor' => $prov['Proveedor']['id'],
																				'Pedido.finalizado LIKE' => '%'. 'S' . '%'
																			)
													)
									);
        if($numped ==0)
			$coeficienteNuevo = 0;
        else
			$coeficienteNuevo = ($numped - $numrec - $numrnc) / $numped;

        if ($coeficienteNuevo > 0)
			$coeficienteNuevo = $coeficienteNuevo * 100;
        else
			$coeficienteNuevo = 0;

        $coeficienteNuevo = abs(round($coeficienteNuevo,3));

        $datos= array(
						'Proveedor'=> array(
												'coeficiente_calidad' => $coeficienteNuevo,
										)
					);
        $this->Proveedor->id = $idProveedor;
        if($this->Proveedor->save($datos) and $coeficienteNuevo!=$coeficienteAntiguo)
        {
			$hist = array(
							'Historico'=> array(
													'fecha' => date('Y-m-d'),
													'id_proveedor' => $prov['Proveedor']['id'],
													'descripcion' => 'Autoactualización: El coeficiente ha cambiado de '.$coeficienteAntiguo.' a '.$coeficienteNuevo,
													'usuario_ejecutor' => AuthComponent::user('id')
												)
						);
            $this->Historico->create();
            $this->Historico->save($hist);
        }

		if (!$this->request->data) 
		{
			$this->request->data = $prov;
		}
        $this->calcularHomologacion($idProveedor);
    }







    public function calcularHomologacion($idProveedor=null)
    {
		$prov=$this->Proveedor->findById($idProveedor);
        $coeficiente = $prov['Proveedor']['coeficiente_calidad']+$prov['Proveedor']['bonusCoeficiente'];
        $tipocriterio = $prov['Proveedor']['tipo_criterio'];
        $homologantigua = $prov['Proveedor']['tipo_homologacion'];
        $hist = array();
        if($coeficiente >= 80)
        {
			$datos= array(
							'Proveedor'=> array(
													'tipo_homologacion' => 1,
											   )
						);
            if($homologantigua != 1)
            {
				$hist = array(
								'Historico'=> array(
													'fecha' => date('Y-m-d'),
													'id_proveedor' => $prov['Proveedor']['id'],
													'descripcion' => 'El tipo de homologación ha cambiado a Tipo A: Homologados',
													'usuario_ejecutor' => AuthComponent::user('id')
													)
							);
            }
        }
        if ($coeficiente < 80 AND $coeficiente >= 60)
        {
            if($tipocriterio != 2)
            {
                $datos= array(
								'Proveedor'=> array(
													'tipo_homologacion' => 2,
												)
							);
                if($homologantigua != 2)
                {
                    $hist = array(
									'Historico'=> array(
														'fecha' => date('Y-m-d'),
														'id_proveedor' => $prov['Proveedor']['id'],
														'descripcion' => 'El tipo de homologación ha cambiado a Tipo B: Homologación a Prueba',
														'usuario_ejecutor' => AuthComponent::user('id'))
								);
                }
            }
            else
            {
                $datos= array(
								'Proveedor'=> array(
													'tipo_homologacion' => 2,
													'tipo_criterio' => 3
													)
							);
                $hist = array(
								'Historico'=> array(
													'fecha' => date('Y-m-d'),
													'id_proveedor' => $prov['Proveedor']['id'],
													'descripcion' => 'El criterio de homologación ha cambiado a Homologación por análisis de primeras muestras',
													'usuario_ejecutor' => AuthComponent::user('id')
													)
							);
            }
        }
        if($coeficiente < 60)
        {
            if($tipocriterio != 2)
            {
                $datos= array(
								'Proveedor'=> array(
													'tipo_homologacion' => 3
													)
							);
                if($homologantigua != 3)
                {
                    $hist = array(
									'Historico'=> array(
														'fecha' => date('Y-m-d'),
														'id_proveedor' => $prov['Proveedor']['id'],
														'descripcion' => 'El tipo de homologación ha cambiado a Tipo C: Rechazado',
														'usuario_ejecutor' => AuthComponent::user('id'))
								);
                }
            }
            else
            {
                $datos= array(
								'Proveedor'=> array(
													'tipo_homologacion' => 2
													)
							);
            }
        }

        $this->Proveedor->id = $idProveedor;
        if($this->Proveedor->save($datos) and $hist != null)
        {
            $this->Historico->create();
            $this->Historico->save($hist);
        }

        if (!$this->request->data) 
		{
            $this->request->data = $prov;
        }
    }







    public function pdf($id) 
	{
		$this->Pedido->recursive = 3;
		$this->pdfConfig = array(
									'download' => true,
									'filename' => 'pedido_'.$id.'.pdf'
								);
		$pedido = $this->Pedido->findById($id);
		$usuario = $this->Usuario->findById($pedido['Pedido']['usuario_solicitante']);
		$this->set('pedido',$pedido);
		$this->set('usuario',$usuario);
	}
}
