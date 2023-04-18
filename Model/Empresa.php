<?php

class Empresa extends AppModel
{
	public $hasMany = array(
								'Recurso' => array(
													'className' => 'Recurso',
													'foreignKey' => 'idemp',
												),
						);
  
  
  
/*  public $belongsTo = array(
    'Master' => array(
      'className' => 'Master',
      'foreignKey' => 'master'
    )
  );*/

  /*public $hasMany = array(
    'ServicioProveedor' => array(
      'className' => 'ServicioProveedor',
      'foreignKey' => 'id_servicio',
      /*'dependent' => true
    ),
    'AsignaturaModulo' => array(
      'className' => 'AsignaturaModulo',
      'foreignKey' => 'asignatura',
      'dependent' => true
    ),
    'AsignaturaGuia' => array(
      'className' => 'AsignaturaGuia',
      'foreignKey' => 'asignatura',
      'dependent' => true
    ),
  ));*/

  public $validate = array(
    'nombre' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>',
        'last' => true
      )),
    'contacto' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>'
      ))
    /*'guia' => array(
      'obligatorio' => array(
        'allowEmpty' => true,
        'rule' => 'url',
        'message' => '<span class="label label-danger">Debes introducir una url válida</span>'
      )),*/
  );
}