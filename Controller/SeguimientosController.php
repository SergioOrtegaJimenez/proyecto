<?php
App::uses('AppController', 'Controller');


class SeguimientosController extends AppController 
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('Seguimiento','Accion');






	public function index() 
	{
		$this->Seguimiento-> recursive=2;
		$seguimiento = $this->Seguimiento->find('all');
		$this->set('seguimiento',$seguimiento);
    }






    public function add($id=null) 
	{
        $accion=$this->Accion->findById($id);
        $this->set('accion', $accion);
        if ($this->request->is('post','put')) 
		{
            $datos= array(
							'Seguimiento'=> array(
													'fecha' => $this->request->data['Seguimiento']['fecha'],
													'estado' => $this->request->data['Seguimiento']['estado'],
													'usuario_responsable' => $this->request->data['Seguimiento']['usuario_responsable'],
													'id_accion' => $accion['Accion']['id']
												)
						); 
            if ($this->Seguimiento->save($datos)) 
			{
      			$this->Session->setFlash('Seguimiento creado correctamente', 'exito');
                $this->redirect(array('controller' => 'acciones','action' => 'view',$id));
            } 
			else
			{
            	$this->Session->setFlash('Hay un problema para crear el seguimiento', 'peligro');
            }
        }
    }
}