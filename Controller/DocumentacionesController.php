<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::import('Vendor', 'dompdf');




class DocumentacionesController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session','RequestHandler');
    public $uses = array('Documentacion','Documento');






	public function index() 
	{
		$this->Documentacion->recursive = 2;
		$list = array();
		if ($this->request->is(array('get')))  
		{
			$list = $this->Documentacion->find('all');
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			$options = array(
								'conditions' => array('Documentacion.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%')
							);
			$list = $this->Documentacion->find('all', $options);
		}
        $this->set('list',$list);
    }
	
	
	
	
	
	
	public function adddoc() 
	{
        if ($this->request->is('post')) 
		{
            $this->Documentacion->create();
            if ($this->Documentacion->save($this->request->data)) 
			{
                $this->Session->setFlash('Unidad de Gasto creada correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            }
			else
			{
                $this->Session->setFlash('Ocurrió un problema al crear la Unidad de Gasto', 'peligro');
            }
        }
        $texto = 'Crear documentación';
        $this->set('texto',$texto);
        $this->render('/Documentaciones/edit');
    }






    public function view($id = null) 
	{
		$this->Documentacion->recursive = 2;
        $this->set('documentacion', $this->Documentacion->findById($id));
    }






    public function edit($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		$doc = $this->Documentacion->findById($id);
		$texto = 'Modificar la Documentación '.$doc['Documentacion']['nombre'];
		$this->set('texto',$texto);
		if (!$doc) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Documentacion->id = $id;
			if ($this->Documentacion->save($this->request->data)) 
			{
      			$this->Session->setFlash('Unidad de Gasto modificada correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar la Unidad de Gasto', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $doc;
        }
    }
	
	
	
	
	
	
    function delete($id) 
	{
    	if (!$this->request->is('post')) 
		{
        	throw new MethodNotAllowedException();
    	}
    	if ($this->Documentacion->delete($id)) 
		{
      		$this->Session->setFlash('Documentación eliminada correctamente', 'exito');
        	$this->redirect(array('action' => 'index'));
    	}
    }
	
	
	
	
	
	
    function eliminar($id, $idpadre) 
	{
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Documento->delete($id)) 
		{
			$this->Session->setFlash('Documento eliminado correctamente', 'exito');
			$this->redirect(array('action' => 'view',$idpadre));
		}
    }






    public function archivo() 
	{
		if ($this->request->is('post')) 
		{
			$this->Documento->create();
			if(isset($this->request->data['comprobante']))
			{
				if ($this->Documento->save($this->request->data)) 
				{
					$this->Session->setFlash('El documento ha sido guardado.', 'exito');
					return $this->redirect(array('action' => 'index'));
				} 
				else
				{
					$this->Session->setFlash('Imposible añadir el documento.', 'peligro');
				}
			} 
			else 
			{
				$tmp = $this->data['Documento']['fichero']['tmp_name'];
				$ficherodestino = $this->data['Documento']['fichero']['name'];
				if(!empty($tmp))
				{
					$datos= array(
									'Documento'=> array(
														'nombre'=> $this->request->data['Documento']['nombre'],
														'descripcion'=> $this->request->data['Documento']['descripcion'],
														'almacenamiento'=> $ficherodestino,
														'id_documentacion' => $this->request->data['Documento']['id_documentacion']
													)
								);
					if ($this->Documento->save($datos)) 
					{
						$this->Documento->recursive = 0;
						$nombre = $this->Documento->find('first', array(
																			'order' => array('Documento.id' => 'desc')
																		)
														);
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'documentos'.DS.'Documento '.$nombre['Documento']['id']);
						$this->Session->setFlash('El documento ha sido guardado.', 'exito');
						return $this->redirect(array('action' => 'view', $this->request->data['Documento']['id_documentacion']));
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
		if ($id == null)
		{
			$options = $this->Documentacion->find('list', array(
																'fields' => array('Documentacion.nombre')
																)
												);
			$this->set(compact('options'));
		}
		$this->set('documentacion',$id);
    }
	
	
	
	
	
	
	public function archivoview($id = null) 
	{
		if ($this->request->is('post')) 
		{
			$this->Documento->create();
			if(isset($this->request->data['comprobante']))
			{
				if ($this->Documento->save($this->request->data)) 
				{
					$this->Session->setFlash('El documento ha sido guardado.', 'exito');
					return $this->redirect(array('action' => 'view', $id));
				} 
				else
				{
					$this->Session->setFlash('Imposible añadir el documento.', 'peligro');
				}
			} 
			else 
			{
				$tmp = $this->data['Documento']['fichero']['tmp_name'];
				$ficherodestino = $this->data['Documento']['fichero']['name'];
				if(!empty($tmp))
				{
					$datos= array(
									'Documento'=> array(
														'nombre'=> $this->request->data['Documento']['nombre'],
														'descripcion'=> $this->request->data['Documento']['descripcion'],
														'almacenamiento'=> $ficherodestino,
														'id_documentacion' => $this->request->data['Documento']['id_documentacion']
													)
								);
					if ($this->Documento->save($datos)) 
					{
						$this->Documento->recursive = 0;
						$nombre = $this->Documento->find('first', array(
																		'order' => array('Documento.id' => 'desc')
																		)
														);
						move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.'documentos'.DS.'Documento '.$nombre['Documento']['id']);
						$this->Session->setFlash('El documento ha sido guardado.', 'exito');
						return $this->redirect(array('action' => 'view', $this->request->data['Documento']['id_documentacion']));
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
		if ($id == null)
		{
			$options = $this->Documentacion->find('list', array(
																'fields' => array('Documentacion.nombre')
															)
												);
			$this->set(compact('options'));
		}
		$this->set('documentacion',$id);
	}
	
	
	
	
	
	
    public function download($id) 
	{
		$fichero = $this->Documento->findById($id);
		$path = 'webroot'.DS.'files'.DS.'documentos'.DS.'Documento '.$fichero['Documento']['id'];
		$this->response->file(
								$path,
								array('download' => true, 'name' => $fichero['Documento']['almacenamiento'])
							);
        return $this->response;
    }
	
	
	
	
	
	
    public function redigerir()
	{
		$documentos = $this->Documento->find('all', array(
															'fields' => array('Documento.id', 'Documento.almacenamiento')
														)
											);
		foreach ($documentos as $documento) 
		{
			$dir = new Folder('files'.DS.'documentos'.DS.$documento['Documento']['id'], true);
			$dirDestino = new Folder('files'.DS.'documentos', true);
			$cadena = $dir->find();
			$file = new File('files'.DS.'documentos'.DS.$documento['Documento']['id'].DS.$cadena[0]);
			if ($file->exists())
			{
				$file->copy($dirDestino->path . DS . 'Documento '.$documento['Documento']['id']);
				$file->close();
				$size = strlen('./documentacion/'.$documento['Documento']['id'].'/');
				$cadena = $documento['Documento']['almacenamiento'];
				$cadena = substr($cadena, $size);
				$documento['Documento']['almacenamiento'] = $cadena;
				$this->Documento->save($documento);
			}
		}
		$this->render('/Docadicionales/eventos');
    }
    
	
	
	
	
	
	public function pdf($id) 
	{
		$this->pdfConfig = array(
									'download' => true,
									'filename' => 'listado_actuales.pdf'
								);
		$documentos = $this->Documentacion->find('all');
		$documentados = array();
		foreach ($documentos as $dc) 
		{
			$nombre = $dc['Documentacion']['nombre'];
			$descripcion = $dc['Documentacion']['descripcion'];
			if (count($dc['Documento']) != 0)
			{
				$ultimo = count($dc['Documento']) - 1;
				$nombre2 = $dc['Documento'][$ultimo]['nombre'];
				$descripcion2 = $dc['Documento'][$ultimo]['descripcion'];
				$fecha = $dc['Documento'][$ultimo]['fecha'];
			}
			$datos= array(
							'Documento'=> array(
													'nombre'=> $nombre,
													'descripcion'=> $descripcion,
													'nombre2'=> $nombre2,
													'descripcion2' => $descripcion2,
													'fecha' => $fecha
											)
						);
			array_push($documentados , $datos);
		}
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$texto = 'Fecha del Listado: '.date("j").' de '.$meses[date('n')-1]. ' del '.date('Y');
		$this->set('texto', $texto);
		$this->set('documentados',$documentados);
    }
}