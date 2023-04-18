<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');


class DocadicionalesController extends AppController 
{
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	public $uses = array('Docadicional');
	
	
	
	
	
	
	public function eventos() 
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$keyword2 = $this->request->data['keyword2'];
			if($this->request->data['keyword'])
			{
				$options = array(
									'conditions' => array(
															'Docadicional.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%',
															'clasificador' => 1
														)
								);
			}
			if($this->request->data['keyword2'])
			{
				$options = array(
									'order' => array('Docadicional.fecha' => 'desc',  'Docadicional.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'Docadicional.fecha LIKE' => '%'. $keyword2 . '%'
																		)
														
														)
								);
			}
			if($this->request->data['keyword'] AND $this->request->data['keyword2'])
			{
				$options = array(
									'order' => array('Docadicional.fecha' => 'desc',  'Docadicional.id' => 'desc'),
									'conditions' => array(
															'OR' => array(
																			'Docadicional.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'
																		),
															'AND' => array(
																			'Docadicional.fecha LIKE' => '%'. $keyword2 . '%'
																		)
														)
								);
			}
			$eventos = $this->Docadicional->find('all', $options);
		} 
		else
		{
			$eventos = $this->Docadicional->find('all', array('conditions' => array('clasificador' => 1), 'order' => array('fecha' => 'desc')));
		}
		$this->set('eventos',$eventos);
	}






	public function trabajador() 
	{
		$eventos = $this->Docadicional->find('all', array('conditions' => array('clasificador' => 2), 'order' => array('id' => 'desc')));
		$this->set('eventos',$eventos);
	}
	
	
	
	
	
	
	public function actas() 
	{
		$eventos = $this->Docadicional->find('all', array('conditions' => array('clasificador' => 3), 'order' => array('id' => 'desc')));
		$this->set('eventos',$eventos);
	}






	public function eliminar($id,$ruta)
	{
		if ($this->request->is('get')) 
		{
			throw new MethodNotAllowedException();
		}
		$file = new File('files'.DS.'docadicionales'.DS.'Documento '.$id);
		if ($file->exists())
		{
			$file->delete();
			$file->close();
		}
		if ($this->Docadicional->delete($id)) 
		{
			$this->Session->setFlash('La ficha ha sido eliminada.', 'exito');
		} 
		else 
		{
			$this->Session->setFlash('No ha posido ser eliminada la ficha.', 'peligro');
		}
		return $this->redirect(array('action' => $ruta));
	}






	public function editar($id = null, $ruta) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid registro'));
		}
		$registro = $this->Docadicional->findById($id);
		if (!$registro) 
		{
			throw new NotFoundException(__('Invalid id'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Docadicional->id = $id;
			if(isset($this->request->data['comprobante']))
			{
				if ($this->Docadicional->save($this->request->data)) 
				{
					$this->Session->setFlash('El documento ha sido modificados.', 'exito');
					return $this->redirect(array('action' => $ruta));
				} 
				else
				{
					$this->Session->setFlash('Imposible modificar el documento.', 'peligro');
				}
			} 
			else 
			{
				$tmp = $this->data['Docadicional']['fichero']['tmp_name'];
				$ficherodestino = $this->data['Docadicional']['fichero']['name'];
				if(!empty($tmp))
				{
					if(isset($this->request->data['Docadicional']['nombre']))
						$nombre = $this->request->data['Docadicional']['nombre'];
					else 
					{
						$nombre = null;
					}
					if(isset($this->request->data['Docadicional']['fecha']))
						$fecha = $this->request->data['Docadicional']['fecha'];
					else 
					{
						$fecha = null;
					}
					if(isset($this->request->data['Docadicional']['duracion']))
						$duracion = $this->request->data['Docadicional']['duracion'];
					else 
					{
						$duracion = null;
					}
					$datos= array(
									'Docadicional'=> array(
															'id' => $id,
															'clasificador'=> $this->request->data['Docadicional']['clasificador'],
															'nombre'=> $nombre,
															'descripcion'=> $this->request->data['Docadicional']['descripcion'],
															'fecha'=> $fecha,
															'duracion'=> $duracion,
															'almacenamiento'=> $ficherodestino
														)
								);
					if ($this->Docadicional->save($datos)) 
					{
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'docadicionales'.DS.'Documento '.$id);
						$this->Session->setFlash('El documento ha sido modificado.', 'exito');
						return $this->redirect(array('action' => $ruta));
					} 
					else
					{
						$this->Session->setFlash('Ha sido imposible modificar el documento.', 'peligro');
					}
				} 
				else 
				{
					$this->Session->setFlash('Selecciona un fichero.', 'peligro');
					return $this->request->data;
				}
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $registro;
			return $this->request->data;
		}
	}
	
	
	
	
	
	
	public function editar2($id = null)
	{
		$this->request->data = $this->requestAction('/docadicionales/editar/'.$id.'/trabajador');
	}
	
	
	
	
	
	
	public function editar3($id = null)
	{
		$this->request->data = $this->requestAction('/docadicionales/editar/'.$id.'/actas');
	}






	public function crear($ruta) 
	{
		if ($this->request->is('post')) 
		{
			$this->Docadicional->create();
			if(isset($this->request->data['comprobante']))
			{
				if ($this->Docadicional->save($this->request->data)) 
				{
					$this->Session->setFlash('El documento ha sido guardado.', 'exito');
					return $this->redirect(array('action' => $ruta));
				} 
				else
				{
					$this->Session->setFlash('Imposible añadir el documento.', 'peligro');
				}
			} 
			else 
			{
				$tmp = $this->data['Docadicional']['fichero']['tmp_name'];
				$ficherodestino = $this->data['Docadicional']['fichero']['name'];
				if(!empty($tmp))
				{
					if(isset($this->request->data['Docadicional']['nombre']))
						$nombre = $this->request->data['Docadicional']['nombre'];
					else 
					{
						$nombre = null;
					}
					if(isset($this->request->data['Docadicional']['fecha']))
						$fecha = $this->request->data['Docadicional']['fecha'];
					else 
					{
						$fecha = null;
					}
					if(isset($this->request->data['Docadicional']['duracion']))
						$duracion = $this->request->data['Docadicional']['duracion'];
					else 
					{
						$duracion = null;
					}
					$datos= array(
									'Docadicional'=> array(
															'clasificador'=> $this->request->data['Docadicional']['clasificador'],
															'nombre'=> $nombre,
															'descripcion'=> $this->request->data['Docadicional']['descripcion'],
															'fecha'=> $fecha,
															'duracion'=> $duracion,
															'almacenamiento'=> $ficherodestino
														)
								);
					if ($this->Docadicional->save($datos)) 
					{
						$nombre = $this->Docadicional->find('first', array(
																			'order' => array('id' => 'desc')));
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'docadicionales'.DS.'Documento '.$nombre['Docadicional']['id']);
						$this->Session->setFlash('El documento ha sido guardado.', 'exito');
						return $this->redirect(array('action' => $ruta));
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
		}
		$this->render('/Docadicionales/editar');
	}






	public function crear2()
	{
		$this->requestAction('/Docadicionales/crear/trabajador');
		$this->render('/Docadicionales/editar2');
	}
	
	
	
	
	
	
	public function crear3()
	{
		$this->requestAction('/Docadicionales/crear/actas');
		$this->render('/Docadicionales/editar3');
	}






	public function download($id) 
	{
		$fichero = $this->Docadicional->findById($id);
		$path='webroot'.DS.'files'.DS.'docadicionales'.DS.'Documento '.$fichero['Docadicional']['id'];
		$this->response->file(
								$path,
								array('download' => true, 'name' => $fichero['Docadicional']['almacenamiento'])
							);
		return $this->response;
	}






	public function redigerir()
	{
		$documentos = $this->Docadicional->find('all', array(
																'fields' => array('Docadicional.id', 'Docadicional.almacenamiento')));

		foreach ($documentos as $documento) 
		{
			$dir = new Folder('files'.DS.'docadicionales'.DS.$documento['Docadicional']['id'], true);
			$dirDestino = new Folder('files'.DS.'docadicionales', true);
			$cadena = $dir->find();
			$file = new File('files'.DS.'docadicionales'.DS.$documento['Docadicional']['id'].DS.$cadena[0]);
			if ($file->exists())
			{
				$file->copy($dirDestino->path . DS . 'Documento '.$documento['Docadicional']['id']);
				$file->close();
				$size = strlen('./docAdicional/'.$documento['Docadicional']['id'].'/');
				$cadena = $documento['Docadicional']['almacenamiento'];
				$cadena = substr($cadena, $size);
				$documento['Docadicional']['almacenamiento'] = $cadena;
				$this->Docadicional->save($documento);
			}
		}
		$this->render('/Docadicionales/eventos');
	}
}