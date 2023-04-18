<?php

class Material extends AppModel
{
   public $belongsTo = array(
								'Proveedor' => array(
														'className' => 'Proveedor',
														'foreignKey' => 'id_proveedor'
													)
							);

  public $hasMany = array(
							'MaterialPedido' => array(
														'className' => 'MaterialPedido',
														'foreignKey' => 'id_material',
														'dependent' => true
													)
						);
	/*
    'AsignaturaModulo' => array(
      'className' => 'AsignaturaModulo',
      'foreignKey' => 'asignatura',
      'dependent' => true
    ),
    'AsignaturaGuia' => array(
      'className' => 'AsignaturaGuia',
      'foreignKey' => 'asignatura',
      'dependent' => true
    ),*/

  /*public $validate = array(
    'observaciones' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>',
        'last' => true
      ))
    /*'descripcion' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>'
      )),
    'cif' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>'
      ))*/
    /*'guia' => array(
      'obligatorio' => array(
        'allowEmpty' => true,
        'rule' => 'url',
        'message' => '<span class="label label-danger">Debes introducir una url válida</span>'
      )),*/
  /*);*/



}