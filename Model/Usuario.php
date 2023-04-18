<?php

App::uses('Usuario', 'Idep.Model');
App::uses('IdepPasswordHasher', 'Idep.Controller/Component/Auth');

class Usuario extends AppModel
{
  public $useTable = 'usuarios';
  public $tablePrefix = '';

  public $validate = array(
        'usuario' => array(
            'required' => array(
              'rule' => 'notEmpty',
              'message'=> '<span class="label label-danger">Introduce un nombre de usuario</span>',
              'last' => true
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message'=> '<span class="label label-danger">Introduce una contraseña</span>'
            )
        ),
		'estado' => array(
            'valid' => array(
                'rule' => array('inList', array('Usuario Activo','Usuario Inactivo')),
                'message'=> '<span class="label label-danger">Introduce un estado válido</span>',
                'allowEmpty' => false
            )
        ),
        'rol' => array(
            'valid' => array(
                'rule' => array('inList', array('Administrador','Otrero','Registrador','Calidad')),
                'message'=> '<span class="label label-danger">Introduce un rol válido</span>',
                'allowEmpty' => false
            )
        )
    );

  public function beforeSave($options = array())
  {
    if (!empty($this->data['Usuario']['password'])) {
      $passwordHasher = new IdepPasswordHasher();
      $this->data['Usuario']['password'] = $passwordHasher->hash($this->data['Usuario']['password']);
    }
    return true;
  }
}
