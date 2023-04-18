<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsuariosController extends AppController
{
	public $uses=array('Usuario','TestUsuario','CasoUsuario');
  
  
  
  
  
  
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('logout','crear');
	}






	public function login()
	{
		if ($this->request->is('post')) 
		{
			if ($this->Auth->login()) 
			{
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('Usuario o contraseña errónea, pruebe otra vez.', 'peligro');
		}
	}






	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}






	public function admin_index()
	{
		$this->set('usuarios', $this->Usuario->find('all', array(
																	'conditions' => array('rol' => array('Administrador')
																						)
																)
												)
				);
	}






	public function admin_crear()
	{
		if ($this->request->is('post')) 
		{
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) 
			{
				$this->Session->setFlash('El usuario ha sido guardado.', 'exito');
				return $this->redirect(array('controller'=>'menus', 'action' => 'panel'));
			}
			$this->Session->setFlash('Imposible añadir el usuario.', 'peligro');
		}
	}






	public function admin_editar($id = null)
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid username'));
		}
		$username = $this->Usuario->findById($id);
		if (!$username) 
		{
			throw new NotFoundException(__('Invalid id'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Usuario->id = $id;
			if ($this->Usuario->save($this->request->data)) 
			{
				$this->Session->setFlash('El usuario ha sido actualizado.', 'exito');
				return $this->redirect(array('controller'=>'menus', 'action' => 'panel'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible modificar el usuario.', 'peligro');
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $username;
		}
		$this->render('/Usuarios/admin_editar');
	}
	
	
	
	
	
	
	public function admin_editarpass($id = null)
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid username'));
		}
		$username = $this->Usuario->findById($id);
		if (!$username) 
		{
			throw new NotFoundException(__('Invalid id'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Usuario->id = $id;
			if ($this->Usuario->save($this->request->data)) 
			{
				$this->Session->setFlash('La contraseña ha sido actualizada.', 'exito');
				return $this->redirect(array('controller'=>'menus', 'action' => 'panel'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible modificar la contraseña.', 'peligro');
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $username;
		}
		$this->render('/Usuarios/admin_editarpass');
	}





	public function admin_eliminar($id)
	{
		if ($this->request->is('get')) 
		{
			throw new MethodNotAllowedException();
		}
		$usuario = $this->Usuario->findById($id);
		if ($this->Usuario->delete($id)) 
		{
			$this->Session->setFlash('El usuario ' . $usuario['Usuario']['usuario'] . ' ha sido eliminado.', 'exito');
		} 
		else 
		{
			$this->Session->setFlash('El usuario ' . $usuario['Usuario']['usuario'] . ' no ha podido ser eliminado.', 'peligro');
		}
		return $this->redirect(array('controller'=>'menus', 'action' => 'panel'));
	}






	public function admin_importar()
	{
		if ($this->request->is('post')) 
		{
			$this->Usuario->create();
			if ($this->controlerrores())
			{
				$tipo=$this->data['Usuario']['fichero']['type'];
				$nombre=$this->data['Usuario']['fichero']['name'];
				$tamano=$this->data['Usuario']['fichero']['size'];
				$tmp=$this->data['Usuario']['fichero']['tmp_name'];
				if(move_uploaded_file ($tmp , WWW_ROOT.'files'.DS.$nombre)) 
				{
					App::import('Vendor', 'phpexcel', array('file' => 'phpexcel' . DS . 'PHPExcel.php'));
					$objPHPExcel = PHPExcel_IOFactory::load(WWW_ROOT.'files'.DS.$nombre);
					$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
					$datos = array();
					$i = 0;
					foreach ($sheetData as $elemento) 
					{
						if ($i == 0) 
						{
							$datos[$i]['usuario'] = $sheetData[1]['A'];
							$datos[$i]['password'] = 1234;
							$datos[$i]['rol'] = 'Alumno';
							$datos[$i] = array('Usuario' => $datos[$i]);
							$i++;
						} 
						else 
						{
							$datos[$i]['usuario'] = $elemento['A'];
							$datos[$i]['password'] = 1234;
							$datos[$i]['rol'] = 'Alumno';
							$datos[$i] = array('Usuario' => $datos[$i]);
							$i++;
						}
					}
					if ($this->Usuario->validateMany($datos,array('atomic' => true))) 
					{
						if ($this->data['Usuario']['borrar'] == 1) 
						{
							$this->Usuario->deleteAll(array('Usuario.rol' => 'Alumno'), false);
						}
						if ($this->Usuario->saveAll($datos)) 
						{
							$this->Session->setFlash('Se han importado los usuarios con éxito','exito');
						} 
						else 
						{
							$this->Session->setFlash('No ha sido posible importar los usuarios.','peligro');
						}
					}
					else 
					{
						$this->Session->setFlash('El formato de los datos introducidos es erróneo.','peligro');
					}
					return $this->redirect(array('controller'=>'usuarios','action' => 'index'));
				}
			}
		}
	}






	private function controlerrores()
	{
		if(!empty($_FILES))
		{
			switch ($_FILES['data']['error']['Usuario']['fichero']) 
			{
				case 0:
					return true;
				case 1:
				case 2:
					$this->Session->setFlash('Tamaño de fichero mayor de lo permitido.','peligro');
					return false;
				default:
					$this->Session->setFlash('Error al subir al fichero.','peligro');
					return false;
			}
		}
		else
		{
			return false;
		}
    }






	public function perfil()
	{
		$this->set('usuario', $this->Usuario->findById(AuthComponent::user('id')));
	}






	public function contrasena()
	{
		$username = $this->Usuario->findById(AuthComponent::user('id'));
		if (!$username) 
		{
			throw new NotFoundException(__('Invalid username'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Usuario->id = $id;
			if ($this->Usuario->save($this->request->data)) 
			{
				$this->Session->setFlash('El usuario ha sido actualizado.', 'exito');
				return $this->redirect(array('action' => 'perfil'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible modificar el usuario.', 'peligro');
			}
		}
		if (!$this->request->data) 
		{
			$this->request->data = $username;
		}
	}






	public function resultados()
	{
		$this->set('resultadosSimulacion', $this->CasoUsuario->find('all', array(
																					'conditions' => array('usuario' => AuthComponent::user('usuario')
																										)
																				)
																)
				);
		$this->set('resultadosTest', $this->TestUsuario->find('all', array(
																			'conditions' => array('usuario' => AuthComponent::user('usuario')
																								)
																		)
															)
				);
	}






	public function admin_resultados()
	{
		$this->set('resultadosSimulacion', $this->CasoUsuario->find('all'));
		$this->set('resultadosTest', $this->TestUsuario->find('all'));
	}






	public function admin_observacion($id)
	{
		if ($this->request->is(array('post', 'put'))) 
		{
			if ($this->CasoUsuario->save($this->request->data)) 
			{
				$this->Session->setFlash('Se ha puesto una observación.', 'exito');
				return $this->redirect(array('action' => 'resultados'));
			} 
			else 
			{
				$this->Session->setFlash('Ha sido imposible poner la observación.', 'peligro');
			}
		}
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid username'));
		}
		$this->set('resultado', $this->CasoUsuario->findById($id));
	}






	public function notificarProblema()
	{
		if ($this->request->is('post')) 
		{
			$Email = new CakeEmail();
			$Email->from('manuel.aguilar@uco.es');
			$Email->to('i52agpam@uco.es');
			$Email->subject('Error aplicación RIGECA');
			$Email->send($this->request->data['Problema']['mensaje']);
			return $this->redirect(array('action' => 'perfil'));
		}
	}






	public function download() 
	{
		$path='webroot'.DS.'files'.DS.'Manual_Usuario.pdf';
		$this->response->file($path, array('download' => true, 'name' => 'Manual de Usuario.pdf'));
        return $this->response;
	}






	public function subiravatar()
	{
		$username = $this->Usuario->findById(AuthComponent::user('id'));
		if ($this->request->is(array('post', 'put'))) 
		{
			if (isset($this->request->data['subiravatar'])) 
			{
				$tmp = $this->data['Usuario']['avatar']['tmp_name'];
				$ficherodestino = $this->data['Usuario']['avatar']['name'];
				if(!empty($tmp))
				{
					$datos= array(
									'Usuario'=> array(
														'id' => $username['Usuario']['id'],
														'avatar'=> $ficherodestino
													)
								);
					if ($this->Usuario->save($datos)) 
					{
						move_uploaded_file ($tmp , WWW_ROOT.'img'.DS.'avatars'.DS.'Usuario'.$username['Usuario']['id']);
						$this->Session->setFlash('El avatar ha sido guardado.', 'exito');
						return $this->redirect(array('action' => 'perfil'));
					} 
					else
					{
						$this->Session->setFlash('Imposible añadir el avatar.', 'peligro');
					}
				}
				else 
				{
					$this->Session->setFlash('Selecciona un fichero.', 'peligro');
				}
			}
			else 
			{
				$this->Session->setFlash('Ha sido imposible modificar el avatar.', 'peligro');
			}
		}
	}
}