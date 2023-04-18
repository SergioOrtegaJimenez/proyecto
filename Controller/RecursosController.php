<?php
App::uses('AppController', 'Controller');


class RecursosController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Recurso','Pedido','Empresa');

    
	
	
	
	
	public function add($id = null) 
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			$tmp = $this->data['Recurso']['direccionArchivo']['tmp_name'];
			$ficherodestino = $this->data['Recurso']['direccionArchivo']['name'];
			if(!empty($tmp))
			{
				$datos= array(
								'Recurso'=> array(
													'direccionArchivo' => $ficherodestino,
													'id_pedido' => $id,
													'descripcion' => $this->request->data['Recurso']['descripcion'],
													'tipo_archivo' => $this->request->data['Recurso']['tipo_gasto']
												  )
							 );
				if ($this->Recurso->save($datos)) 
				{
					if ($this->request->data['Recurso']['tipo_gasto'] == 'Oficio de Remisión de facturas')
					{
						$tipo = 'RemisionFacturas';
					} 
					else
					{
						$tipo = $this->request->data['Recurso']['tipo_gasto'];
					}
					move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'pedidos'.DS.'Pedido'.$id.'Recurso'.$this->Recurso->id.$tipo);
					$this->Session->setFlash('Recurso creado correctamente.', 'exito');
					return $this->redirect(array('controller' => 'pedidos','action' => 'view', $id));
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
		$this->set('idpadre',$id);
		$this->set('controllador','pedidos');
    }
	
	
	
	
	
	
    public function addrnc($id = null)
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			$tmp = $this->data['Recurso']['direccionArchivo']['tmp_name'];
			$ficherodestino = $this->data['Recurso']['direccionArchivo']['name'];
			if(!empty($tmp))
			{
				$datos= array(
								'Recurso'=> array(
													'direccionArchivo' => $ficherodestino,
													'id_rnc' => $id,
													'descripcion' => $this->request->data['Recurso']['descripcion'],
													'tipo_archivo' => $this->request->data['Recurso']['tipo_gasto']
												 )
							 );
				if ($this->Recurso->save($datos)) 
				{
					if ($this->request->data['Recurso']['tipo_gasto'] == 'Oficio de Remisión de facturas')
					{
						$tipo = 'RemisionFacturas';
					}
					else 
					{
						$tipo = $this->request->data['Recurso']['tipo_gasto'];
					}
					move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'rnc'.DS.'RNC'.$id.'Recurso'.$this->Recurso->id.$tipo);
					$this->Session->setFlash('Recurso creado correctamente.', 'exito');
					return $this->redirect(array('controller' => 'reclamaciones','action' => 'view', $id));
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
		$this->set('idpadre',$id);
		$this->set('controllador','reclamaciones');
		$this->render('/Recursos/add');
    }






    public function addaccion($id = null) 
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			$tmp = $this->data['Recurso']['direccionArchivo']['tmp_name'];
			$ficherodestino = $this->data['Recurso']['direccionArchivo']['name'];
			if(!empty($tmp))
			{
				$datos= array(
								'Recurso'=> array(
													'direccionArchivo' => $ficherodestino,
													'id_accion' => $id,
													'descripcion' => $this->request->data['Recurso']['descripcion'],
													'tipo_archivo' => $this->request->data['Recurso']['tipo_gasto']
												 )
							 );
				if ($this->Recurso->save($datos)) 
				{
					if ($this->request->data['Recurso']['tipo_gasto'] == 'Oficio de Remisión de facturas')
					{
						$tipo = 'RemisionFacturas';
					} 
					else
					{
						$tipo = $this->request->data['Recurso']['tipo_gasto'];
					}
					move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'accion'.DS.'Accion'.$id.'Recurso'.$this->Recurso->id.$tipo);
					$this->Session->setFlash('Recurso creado correctamente.', 'exito');
					return $this->redirect(array('controller' => 'acciones','action' => 'view', $id));
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
		$this->set('idpadre',$id);
		$this->set('controllador','acciones');
		$this->render('/Recursos/add');
    }

    
	
	
	
	
	public function addemp($id = null)
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			$tmp = $this->data['Recurso']['direccionArchivo']['tmp_name'];
			$ficherodestino = $this->data['Recurso']['direccionArchivo']['name'];
			if(!empty($tmp))
			{
				$datos= array(
								'Recurso'=> array(
													'direccionArchivo' => $ficherodestino,
													'idemp' => $id,
													'descripcion' => $this->request->data['Recurso']['descripcion'],
													'tipo_archivo' => $this->request->data['Recurso']['tipo_gasto']
												 )
							 );
				if ($this->Recurso->save($datos)) 
				{
					if ($this->request->data['Recurso']['tipo_gasto'] == 'Oficio de Remisión de facturas')
					{
						$tipo = 'RemisionFacturas';
					}
					else 
					{
						$tipo = $this->request->data['Recurso']['tipo_gasto'];
					}
					move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'empresa'.DS.'Empresa'.$id.'Recurso'.$this->Recurso->id.$tipo);
					$this->Session->setFlash('Recurso creado correctamente.', 'exito');
					return $this->redirect(array('controller' => 'Empresas','action' => 'viewemp', $id));
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
		$this->set('idpadre',$id);
		$this->set('controllador','empresas');
		$this->render('/Recursos/addrecemp');
    }
	
	
	
	
	
	
	public function addreclamacion($id = null) 
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			$tmp = $this->data['Recurso']['direccionArchivo']['tmp_name'];
			$ficherodestino = $this->data['Recurso']['direccionArchivo']['name'];
			if(!empty($tmp))
			{
				$datos= array(
								'Recurso'=> array(
													'direccionArchivo' => $ficherodestino,
													'id_reclamacion' => $id,
													'descripcion' => $this->request->data['Recurso']['descripcion'],
													'tipo_archivo' => $this->request->data['Recurso']['tipo_gasto']
												 )
							 );
				if ($this->Recurso->save($datos)) 
				{
					if ($this->request->data['Recurso']['tipo_gasto'] == 'Oficio de Remisión de facturas')
					{
						$tipo = 'RemisionFacturas';
					} 
					else 
					{
						$tipo = $this->request->data['Recurso']['tipo_gasto'];
					}
					move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'reclamacion'.DS.'Reclamacion'.$id.'Recurso'.$this->Recurso->id.$tipo);
					$this->Session->setFlash('Recurso creado correctamente.', 'exito');
					return $this->redirect(array('controller' => 'reclamaciones','action' => 'viewre', $id));
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
		$this->set('idpadre',$id);
		$this->set('controllador','reclamaciones');
		$this->render('/Recursos/add');
    }






    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar este recurso'));
		}
		$recurso = $this->Recurso->findById($id);
		if (!$recurso) 
		{
			throw new NotFoundException(__('Error al editar este recurso'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Recurso->id = $id;
			if ($this->Recurso->save($this->request->data)) 
			{
				$this->Session->setFlash('Recurso modificado correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el Recurso', 'peligro');
		}

		if (!$this->request->data) 
		{
			$this->request->data = $recurso;
        }
    }






	function delete($id, $clave) 
	{
		$vista = 'view';
		if ($clave == 'pedidos')
		{
			$nombre = 'Pedido';
			$idr = 'id_pedido';
			$controlador = 'pedidos';
			$buscar = 'Pedido';
		}
		if ($clave == 'rnc')
		{
			$nombre = 'RNC';
			$idr = 'id_rnc';
			$controlador = 'reclamaciones';
			$buscar = 'RegistroNoConformidad';
		}
		if ($clave == 'accion')
		{
			$nombre = 'Accion';
			$idr = 'id_accion';
			$controlador = 'acciones';
			$buscar = 'Accion';
		}
		if ($clave == 'reclamacion')
		{
			$nombre = 'Reclamacion';
			$idr = 'id_reclamacion';
			$controlador = 'reclamaciones';
			$buscar = 'Reclamacion';
			$vista = 'viewre';
		}
		if ($clave == 'empresa')
		{
			$nombre = 'Empresa';
			$idr = 'idemp';
			$controlador = 'empresas';
			$buscar = 'Empresa';
			$vista = 'viewemp';	
		}
		$this->Recurso->recursive = 0;
		$recurso = $this->Recurso->findById($id);
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Recurso->delete($id)) 
		{
			if ($recurso['Recurso']['tipo_archivo'] == 'Oficio de Remisión de facturas')
			{
				$tipo = 'RemisionFacturas';
			} 
			else 
			{
				$tipo = $recurso['Recurso']['tipo_archivo'];
			}
			$dir = WWW_ROOT.'files'.DS.$clave;
			$file = new File($dir.DS.$nombre.$recurso['Recurso'][$idr].'Recurso'.$id.$tipo);
			$file->delete();
			$this->Session->setFlash('Recurso eliminado correctamente', 'exito');
			$this->redirect(array('controller'=>$controlador, 'action' => $vista, $recurso['Recurso'][$idr]));
		}
	}






	public function downloadrec($id=null,$clave) 
	{
		if ($clave == 'pedidos')
		{
			$nombre = 'Pedido';
			$idr = 'id_pedido';
		}
		if ($clave == 'rnc')
		{
			$nombre = 'RNC';
			$idr = 'id_rnc';
		}
		if ($clave == 'accion')
		{
			$nombre = 'Accion';
			$idr = 'id_accion';
		}
		if ($clave == 'reclamacion')
		{
			$nombre = 'Reclamacion';
			$idr = 'id_reclamacion';
		}
		if ($clave == 'empresa')
		{
			$nombre = 'Empresa';
			$idr = 'idemp';
		}
		$rec = $this->Recurso->findById($id);
		if ($rec['Recurso']['tipo_archivo'] == 'Oficio de Remisión de facturas')
		{
			$tipo = 'RemisionFacturas';
		} 
		else
		{
			$tipo = $rec['Recurso']['tipo_archivo'];
		}
		$path='webroot'.DS.'files'.DS.$clave.DS.$nombre.$rec['Recurso'][$idr].'Recurso'.$rec['Recurso']['id'].$tipo;
		$this->response->file($path, array('download' => true, 'name' => $rec['Recurso']['direccionArchivo']));
		return $this->response;
	}
}