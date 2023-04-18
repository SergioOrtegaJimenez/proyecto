<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::import('Vendor', 'dompdf');


class ProveedoresController extends AppController 
{
    public $helpers = array('Html', 'Form','Js');
    public $components = array('Session','RequestHandler');
    public $uses = array('Proveedor','Pedido','Servicio','ServicioProveedor','Material','Reclamacion','RegistroNoConformidad','Historico','Usuario');






	public function index() 
	{
		$list = array();
		if ($this->request->is(array('get')))  
		{
			$list = $this->Proveedor->find('all');
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$options = array(
								'conditions' => array('Proveedor.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'));
			$list = $this->Proveedor->find('all', $options);
		}
		$this->set('list',$list);
	}






    public function view($id_proveedor = null, $id_reclamacion = null) 
	{
		$this->Proveedor-> recursive=2;
        $prov=$this->Proveedor->findById($id_proveedor);
		$this->set('proveedor', $prov);
		$this->Reclamacion-> recursive=2;
		$rec=$this->Reclamacion->findById($id_reclamacion);
		$this->set('reclamacion', $rec);
		$material = $this->Material->find('all', array(
														'conditions' => array('Material.id_proveedor' => $prov['Proveedor']['id']),
														'fields'     => array('Material.nombre','Material.cod_referencia'),
														'recursive' => 2
														)
										);
        $this->set('material',$material);
		$servicio = $this->ServicioProveedor->find('all', array(
																'conditions' => array('ServicioProveedor.id_proveedor' => $prov['Proveedor']['id']),
																'fields'     => array('ServicioProveedor.id_servicio', 'ServicioProveedor.id'),
																'recursive' => 2
																)
												);
        $this->set('servicio',$servicio);
		$reclamacion = $this->Reclamacion->find('all', array(
															'conditions' => array('Reclamacion.id_proveedor' => $prov['Proveedor']['id']),
															'fields'     => array('Reclamacion.codigo_reclamacion','Reclamacion.descripcion'),
															'recursive' => 2
															)
											);
        $this->set('reclamacion',$reclamacion);
		$noconf= $this->RegistroNoConformidad->find('all', array(
																'conditions' => array('RegistroNoConformidad.id_proveedor' => $prov['Proveedor']['id']),
																'fields'     => array('RegistroNoConformidad.descripcion','RegistroNoConformidad.id_pedido'),
																'recursive' => 2
																)
												);
        $this->set('noconf',$noconf);
		$hist= $this->Historico->find('all', array(
													'conditions' => array('Historico.id_proveedor' => $prov['Proveedor']['id']),
													'fields'     => array('Historico.fecha','Historico.descripcion','Historico.usuario_ejecutor'),
													'order' => array('fecha' => 'desc')
												)
									);
        $this->set('hist',$hist);
		$criterio = array(	'1' => 'Homologación por histórico',
							'2' => 'Homologación por acuerdo de suministro de la UCO',
							'3' => 'Homologación por análisis de primeras muestras',
							'4' => 'Homologación por certificaciones de calidad y/o medio ambiente',
							'5' => 'Homologación por exclusividad'
						);
        $this->set(compact('criterio'));
		$homologaciones = array(	'1' => 'Tipo A: Homologados',
									'2' => 'Tipo B: Homologados a prueba',
									'3' => 'Tipo C: Rechazados'
								);
        $this->set(compact('homologaciones'));
		$usuarios = $this->Usuario->find('list', array(
														'fields' => array('Usuario.nombre')
													)
										);
        $this->set(compact('usuarios'));
    }






	public function addreclam($proveedor) 
	{
        if ($this->request->is('post')) 
		{
        	$this->Reclamacion->create();
            if ($this->Reclamacion->save($this->request->data))
			{
				$this->Session->setFlash('Reclamacion creada correctamente', 'exito');
				$this->redirect(array('controller' => 'proveedores' ,'action' => 'view', $proveedor, 'menu4'));
			} 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema al crear la reclamación', 'peligro');
			}
			
        }
        $texto = 'Crear reclamación para el proveedor';
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
							'controller' => 'proveedores',
							'action' => 'view',
							'admin' => false,
							$proveedor
						);
		$this->set('redirigir',$redirigir);
        $this->set(compact('options'));
        $this->render('/Proveedores/reclamacion');
    }






	function rnc($proveedor, $id = null) 
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
				$this->redirect(array('controller' => 'proveedores', 'action' => 'view', $proveedor,'menu5'));
			} 
			else
			{
				$this->Session->setFlash('Ocurrió un problema al crear el registro', 'peligro');
			}
		}
		$texto = 'Crear RNC para el proveedor';
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
		$this->set(compact('options'));
		$registro = $this->RegistroNoConformidad->findById($id);
		if (!$this->request->data) 
		{
			$this->request->data = $registro;
		}
		$redirigir = array(
							'controller' => 'proveedores',
							'action' => 'view',
							'admin' => false,
							$proveedor,'menu5'
						);
		$this->set('redirigir',$redirigir);
		$options = array(
							'Compras' => 'Compras'
						);
		$this->set('options',$options);
		$this->render('/Proveedores/rnc');
    }






    public function addproveedor() 
	{
		$opciones = array(
							'1' => 'Homologación por histórico',
							'2' => 'Homologación por acuerdo de suministro de la UCO',
							'3' => 'Homologación por análisis de primeras muestras',
							'4' => 'Homologación por certificaciones de calidad y/o medio ambiente',
							'5' => 'Homologación por exclusividad'
						);
        $this->set('opciones',$opciones);
        if ($this->request->is(array('post','put'))) 
		{
            if (isset($this->request->data['cert'])) 
			{
                $tmp = $this->data['Proveedor']['certificacion']['tmp_name'];
                $ficherodestino = $this->data['Proveedor']['certificacion']['name'];
                $cif = $this->request->data['Proveedor']['cif'];
                if(!empty($tmp) OR empty($tmp))
                {
					$datos= array(
									'Proveedor'=> array(
														'nombre' => $this->request->data['Proveedor']['nombre'],
														'estado' => $this->request->data['Proveedor']['estado'],
														'descripcion' => $this->request->data['Proveedor']['descripcion'],
														'telefono' => $this->request->data['Proveedor']['telefono'],
														'telefono2' => $this->request->data['Proveedor']['telefono2'],
														'fax' => $this->request->data['Proveedor']['fax'],
														'email' => $this->request->data['Proveedor']['email'],
														'cif' => $this->request->data['Proveedor']['cif'],
														'codigo_cliente' => $this->request->data['Proveedor']['codigo_cliente'],
														'tipo_criterio' => $this->request->data['Proveedor']['tipo_criterio'],
														'tipo_homologacion' => $this->request->data['Proveedor']['tipo_homologacion'],
														'certificacion' => $ficherodestino
													)
								);
					if ($this->Proveedor->save($datos)) 
					{
						$nombre = $this->Proveedor->find('all', array('conditions' => array('Proveedor.cif' => $cif)));
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'proveedores'.DS.'Certificado'.$nombre[0]['Proveedor']['nombre']);
						$this->Session->setFlash('Proveedor creado correctamente', 'exito');
						$this->redirect(array('action' => 'index'));
					} 
					else
					{
						$this->Session->setFlash('Ocurrió un problema con la certificación de el proveedor', 'peligro');
					}
				}
				else
				{
					$this->Session->setFlash('Ocurrió un problema con el Proveedor', 'peligro');
				}	
			}
		}
    }
	
	
	
	
	
	
	public function addservicio($id=null) 
	{
        $prov=$this->Proveedor->findById($id);
        $this->set('prov',$prov);
		$listaserv= $this->Servicio->find('list', array(
														'fields' => array('Servicio.nombre')
													)
										);
        $this->set('listaserv', $listaserv);
		if ($this->request->is('post'))
		{
            $this->ServicioProveedor->create();
            $datos= array(
							'ServicioProveedor' => array(
															'id_proveedor' => $prov['Proveedor']['id'],
															'id_servicio' => $this->request->data['Servicio']['nombre_servicio']
														)
						);
            if ($this->ServicioProveedor->save($datos)) 
			{
                $this->Session->setFlash('Servicio añadido correctamente', 'exito');
                $this->redirect(array('action' => 'view', $id));
            }
            else
			{
                $this->Session->setFlash('Ocurrió un problema al añadir el servicio', 'peligro');
            }	
		}
		$redirigir = array(
							'controller' => 'proveedores',
							'action' => 'view',
							'admin' => false,
							$id
						);
		$this->set('redirigir',$redirigir);
	}






    public function downloadcertificacion($id=null) 
	{
        $nombre = $this->Proveedor->find('all', array(
														'conditions' => array('Proveedor.id' => $id)
													)
										);
        $path='webroot'.DS.'files'.DS.'proveedores'.DS.'Certificado'.$nombre[0]['Proveedor']['nombre'];
        $this->response->file($path, array('download' => true, 'name' => $nombre['Proveedor']['certificacion']));
		return $this->response;
    }






    public function getByCategory() 
	{
        $category_id = $this->request->data['Proveedor']['tipo_criterio'];
        if($category_id == 1)
        {
            $subcategories = array('1' => 'Tipo A: Homologados');
        }
        if($category_id == 2)
        {
            $subcategories = array('2' => 'Tipo B: En pruebas');
        }
		if($category_id == 3)
        {
            $subcategories = array('3' => 'Tipo C: Rechazados');
        }
        else
        {
            $subcategories = array('0'=> '-- Selecciona el tipo de homologación --','1' => 'Tipo A: Homologados','2' => 'Tipo B: En pruebas','3' => 'Tipo C: Rechazados' );
        }
        $this->set('subcategories', $subcategories);
        $this->layout = 'ajax';
    }

   




    public function actualizarHistorico($prov = null,$datos= null) 
	{
        $criterio = array(	'1' => 'Homologación por histórico',
							'2' => 'Homologación por acuerdo de suministro de la UCO',
							'3' => 'Homologación por análisis de primeras muestras',
							'4' => 'Homologación por certificaciones de calidad y/o medio ambiente',
							'5' => 'Homologación por exclusividad'
						);
        $this->set(compact('criterio'));
        $homologaciones = array(	'1' => 'Tipo A: Homologados',
									'2' => 'Tipo B: Homologados a prueba',
									'3' => 'Tipo C: Rechazados'
								);
        $this->set(compact('homologaciones'));
        $this->set('prov',$prov);
        $coefAnt = $prov['Proveedor']['coeficiente_calidad'];
        $homAnt = $homologaciones[$prov['Proveedor']['tipo_homologacion']];
        $critAnt = $criterio[$prov['Proveedor']['tipo_criterio']];
        $this->set('datos',$datos);
        $coefNue = $datos['Proveedor']['coeficiente_calidad'];
        $homNue = $homologaciones[$datos['Proveedor']['tipo_homologacion']];
        $critNue = $criterio[$datos['Proveedor']['tipo_criterio']];
        if($homNue!=$homAnt)
        {
            $hist = array(
							'Historico'=> array(
												'fecha' => date('Y-m-d'),
												'id_proveedor' => $prov['Proveedor']['id'],
												'descripcion' => 'Actualización Manual: El tipo de Homologación ha cambiado de '.$homAnt.' a '.$homNue,
												'usuario_ejecutor' => AuthComponent::user('id'))
						);
            $this->Historico->create();
            $this->Historico->save($hist);
        }
        if($coefNue!=$coefAnt)
        {
            $hist = array(
							'Historico'=> array(
												'fecha' => date('Y-m-d'),
												'id_proveedor' => $prov['Proveedor']['id'],
												'descripcion' => 'Actualización Manual: El coeficiente ha cambiado de '.$coefAnt.' a '.$coefNue,
												'usuario_ejecutor' => AuthComponent::user('id'))
						);
            $this->Historico->create();
            $this->Historico->save($hist);
        }
        if($critNue!=$critAnt)
        {
            $hist = array(
							'Historico'=> array(
												'fecha' => date('Y-m-d'),
												'id_proveedor' => $prov['Proveedor']['id'],
												'descripcion' => 'Actualización Manual: El tipo de criterio ha cambiado de '.$critAnt.' a '.$critNue,
												'usuario_ejecutor' => AuthComponent::user('id'))
						);
            $this->Historico->create();
            $this->Historico->save($hist);
        }
    }






    public function actualizarcc($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar este proveedor'));
		}
		$prov = $this->Proveedor->findById($id);
		if (!$prov) 
		{
			throw new NotFoundException(__('Error al editar este proveedor'));
		}
		$this->set('prov', $prov);
		$opciones = array(	'1' => 'Homologación por histórico',
							'2' => 'Homologación por acuerdo de suministro de la UCO',
							'3' => 'Homologación por análisis de primeras muestras',
							'4' => 'Homologación por certificaciones de calidad y/o medio ambiente',
							'5' => 'Homologación por exclusividad');
        $this->set('opciones',$opciones);
		$homologaciones = array(
								'1' => 'Tipo A: Homologados',
								'2' => 'Tipo B: Homologados a prueba',
								'3' => 'Tipo C: Rechazados'
							);
        $this->set('homologaciones',$homologaciones);
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Proveedor->id = $id;
			$datos= array(
							'Proveedor'=> array(
												'id'=> $prov['Proveedor']['id'],
												'tipo_criterio'=> $this->request->data['Proveedor']['tipo_criterio'],
												'tipo_homologacion'=> $this->request->data['Proveedor']['tipo_homologacion'],
												'coeficiente_calidad'=> $this->request->data['Proveedor']['coeficiente_calidad'],
												'bonusCoeficiente'=> $this->request->data['Proveedor']['bonusCoeficiente'],
											)
						);
			if ($this->Proveedor->save($datos)) 
			{
				$this->Session->setFlash('Datos de calidad actualizados correctamente', 'exito');
				$this->actualizarHistorico($prov,$datos);
				return $this->redirect(array('action' => 'view',$prov['Proveedor']['id']));
			}
			$this->Session->setFlash('Ocurrió un problema al actualizar los datos de calidad', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $prov;
        }
		$redirigir = array(
							'controller' => 'proveedores',
							'action' => 'view',
							'admin' => false,
							$id
						);
		$this->set('redirigir',$redirigir);
    }

    
	
	
	
	
	public function edit($id = null, $ids = null) 
	{
		$this->ServicioProveedor->id_servicio = $ids;
		$this->Proveedor->id = $id;
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar este proveedor'));
		}
		$proveedor = $this->Proveedor->findById($id);
		$servicio = $this->ServicioProveedor->findById($ids);
		if (!$proveedor) 
		{
			throw new NotFoundException(__('Error al editar este proveedor'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$datos= array(
							'Proveedor'=> array(
												'id'=> $proveedor['Proveedor']['id'],
												'nombre'=> $this->request->data['Proveedor']['nombre'],
												'estado'=> $this->request->data['Proveedor']['estado'],
												'descripcion'=> $this->request->data['Proveedor']['descripcion'],
												'telefono'=> $this->request->data['Proveedor']['telefono'],
												'telefono2'=> $this->request->data['Proveedor']['telefono2'],
												'fax'=> $this->request->data['Proveedor']['fax'],
												'email' => $this->request->data['Proveedor']['email'],
												'cif'=> $this->request->data['Proveedor']['cif'],
												'codigo_cliente'=> $this->request->data['Proveedor']['codigo_cliente']
				
											),
							'ServicioProveedor' => array(
															'id_servicio' => $servicio['ServicioProveedor']['id_servicio']
														)
						);
			if ($this->Proveedor->save($datos))
			{
				$this->Session->setFlash('Proveedor modificado correctamente', 'exito');
				return $this->redirect(array('action' => 'view',$id));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el Proveedor', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $proveedor;
        }
		$redirigir = array(
							'controller' => 'proveedores',
							'action' => 'view',
							'admin' => false,
							$id
						);
		$this->set('redirigir',$redirigir);
    }
    
	
	
	
	
	
	function delete($id, $idp = null)
	{
		$this->Proveedor->id = $idp;
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Proveedor->delete($id)) 
		{
			$this->Session->setFlash('Proveedor eliminado correctamente', 'exito');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->ServicioProveedor->delete($id)) 
		{
			$url = $_SERVER['HTTP_REFERER'];
			$this->Session->setFlash('Servicio del proveedor eliminado correctamente', 'exito');
			$this->redirect(array('action' => substr($url, 35)));
		}
	}
	
	
	
	
	
	
	function deleteserv($id, $idp = null)
	{
		$this->Proveedor->id = $idp;
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->ServicioProveedor->delete($id)) 
		{
			$url = $_SERVER['HTTP_REFERER'];
			$this->Session->setFlash('Servicio del proveedor eliminado correctamente', 'exito');
			$this->redirect(array('action' => substr($url, 35)));
		}
	}
	
	

	


	public function pdf($id) 
	{
		$this->pdfConfig = array(
									'download' => true,
									'filename' => 'listado_proveedores.pdf'
								);
		$proveedor = $this->Proveedor->find('all');
		$this->set('proveedor',$proveedor);
	}
}