<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'dompdf');



class MaterialesController extends AppController 
{
    public $helpers = array('Html','Form','Js');
    public $components = array('Session','RequestHandler');
    public $uses = array('Material','Proveedor','Pedido','MaterialPedido');






	public function index() 
	{
		$this->Material-> recursive=2;
		$list = array();
		if ($this->request->is(array('get')))  
		{
			$list = $this->Material->find('all');
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$keyword = $this->request->data['keyword'];
			if($this->request->data['option'] == 'proveedor')
			{
				$options = array(
									'conditions' => array('Proveedor.nombre LIKE' => '%'. $keyword . '%'));
			}
			else
			{
				$options = array(
									'conditions' => array('Material.'.$this->request->data['option'].' LIKE' => '%'. $keyword . '%'));
			}
			$list = $this->Material->find('all', $options);
		}
		$this->set('list',$list);
    }






    public function getByCategory() 
	{
		$valor = $this->request->data['Pedido']['id_proveedor'];
		$listadomaterial = $this->Material->find('list', array(
																'conditions' => array('Material.id_proveedor' => $valor),
																'fields'     => array('Material.nombre'),
																'recursive' => -1
															)
												);
		$this->set('listadomaterial', $listadomaterial);
		$this->layout = 'ajax';
    }







    public function addmaterial() 
	{
        if ($this->request->is('post')) 
		{
        	$this->Material->create();
            if ($this->Material->save($this->request->data)) 
			{
      			$this->Session->setFlash('Material añadido correctamente', 'exito');
                $this->redirect(array('action' => 'index'));
            } 
			else
			{
            	$this->Session->setFlash('Ocurrió un problema al añadir el material', 'peligro');
            }
        }
        $listado = $this->Proveedor->find('list', array(
														'fields'     => array('Proveedor.id', 'Proveedor.nombre')
													)
										);
        $this->set(compact('listado'));
        $texto = 'Crear nuevo material';
        $this->set('texto',$texto);
        $this->render('/Materiales/edit');
    }






    public function edit($id = null)
	{
		if (!$id) 
		{
			throw new NotFoundException(__('Error al editar este material'));
		}
		$mater = $this->Material->findById($id);
		$texto = 'Modificar el material '.$mater['Material']['nombre'];
		$this->set('texto',$texto);
		if (!$mater) 
		{
			throw new NotFoundException(__('Error al editar este material'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			$this->Material->id = $id;
			if ($this->Material->save($this->request->data)) 
			{
				$this->Session->setFlash('Material modificado correctamente', 'exito');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Ocurrió un problema al modificar el Material', 'peligro');
		}
		if (!$this->request->data) 
		{
			$this->request->data = $mater;
        }
        $listado = $this->Proveedor->find('list', array(
														'fields'     => array('Proveedor.id', 'Proveedor.nombre')
													)
										);
        $this->set(compact('listado'));
    }






	function delete($id) 
	{
		if (!$this->request->is('post')) 
		{
			throw new MethodNotAllowedException();
		}
		if ($this->Material->delete($id)) 
		{
    		$this->Session->setFlash('Material eliminado correctamente', 'exito');
			$this->redirect(array('action' => 'index'));
		}
	}
}