<?php
App::uses('AppController', 'Controller');


class MenusController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Usuario','Ip_permitida','Pedido','Proveedor','Registro_entrada','Registro_salida','Evento','Plantilla');






    public function index() 
	{
        $list = array();
        if ($this->request->is(array('get')))  
		{  
			$this->Pedido->recursive = -1;
			$list = $this->Pedido->find('all',array('limit' => 4, 'order' => array('fecha_solicitud' => 'desc')));
        }
        $this->set('list',$list);
        $this->Registro_entrada->recursive = -1;
        $entrada = $this->Registro_entrada->find('all', array('limit' => 4, 'order' => array('id' => 'desc')));
		$this->set('entrada',$entrada);
		$salida = $this->Registro_salida->find('all', array('limit' => 4, 'order' => array('id' => 'desc')));
     	$this->set('salida',$salida);
        $nombre = $this->Proveedor->find('list', array('fields' => array('Proveedor.nombre')));
        $this->set(compact('nombre'));
        $events = $this->Evento->find('all', array(
													'fields' => array('Evento.fecha','Evento.descripcion','Evento.tipo','Evento.id_tipo'),
													'order' => array('id' => 'asc')
												)
									);
        $this->set('events',$events);
        $this->set(array(
							'eventors' => $events,
							'_serialize' => 'eventors'
						)
				);
        $numeventos =$this->Evento->find('all', array(	'fields' => array('Evento.fecha','Evento.descripcion','Evento.tipo','Evento.id_tipo','COUNT(Evento.fecha) as count'
																		),
														'group' => 'Evento.id,Evento.fecha'
													)
										);
        $this->set('numeventos',$numeventos);
          //$avatar= $this->Session->read('Auth.User.id');
          //$this->set('avatar',$avatar);
    }






	public function admin_panel($menu = null) 
	{
		$usuarios = $this->Usuario->find('all');
		$this->set('usuarios',$usuarios);
		$ips = $this->Ip_permitida->find('all');
		$this->set('ips',$ips);
		$this->Plantilla->recursive = -1;
		$plantillas = $this->Plantilla->find('all');
		$this->set('plantillas',$plantillas);
    }






    public function admin_crear() 
	{
		if ($this->request->is('post')) 
		{
			$this->Ip_permitida->create();
			if ($this->Ip_permitida->save($this->request->data)) 
			{
				$this->Session->setFlash('Nueva IP añadida.', 'exito');
				return $this->redirect(array('controller'=>'menus', 'action' => 'panel','menu2'));
			}
			$this->Session->setFlash('Imposible añadir la nueva IP.', 'peligro');
		}
    }






    public function admin_editar($id = null) 
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		$ip = $this->Ip_permitida->findById($id);
		if (!$ip) 
		{
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Ip_permitida->id = $id;
			if ($this->Ip_permitida->save($this->request->data)) 
			{
				$this->Session->setFlash('Ip modificada correctamente', 'exito');
				return $this->redirect(array('controller'=>'menus', 'action' => 'panel','menu2'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar la Ip', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $ip;
		}
		$this->render('/Menus/admin_crear');
    }






    function admin_delete($id) 
	{
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Ip_permitida->delete($id)) 
		{
			$this->Session->setFlash('Ip eliminada correctamente', 'exito');
			return $this->redirect(array('controller'=>'menus', 'action' => 'panel','menu2'));
		}
    }






    public function admin_plantilla($tipo)
    {
		if ($this->request->is('post')) 
		{
			$this->Plantilla->create();
			$plantilla = $this->request->data;
			$plantilla['Plantilla']['color'] = $this->request->data['opcionEntrada'];
			$plantilla['Plantilla']['tipo_registro'] = $tipo;
			$plantilla['Plantilla']['num_campos'] = 1;
			if ($plantilla['Plantilla']['campo2'] != null)
			{
				$plantilla['Plantilla']['num_campos'] = 2;
				if ($plantilla['Plantilla']['campo3'] != null)
				{
					$plantilla['Plantilla']['num_campos'] = 3;
					if ($plantilla['Plantilla']['campo4'] != null)
					{
						$plantilla['Plantilla']['num_campos'] = 4;
						if ($plantilla['Plantilla']['campo5'] != null)
						{
							$plantilla['Plantilla']['num_campos'] = 5;
						}
					}
				}
			}
			if ($this->Plantilla->save($plantilla)) 
			{
				$this->Session->setFlash('Nueva plantilla añadida.', 'exito');
				return $this->redirect(array('controller'=>'menus', 'action' => 'panel','menu3'));
			}
			$this->Session->setFlash('Imposible añadir la nueva plantilla.', 'peligro');
		}
    }
}