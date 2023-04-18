<?php

class Proveedor extends AppModel
{
/*  public $belongsTo = array(
    'Master' => array(
      'className' => 'Master',
      'foreignKey' => 'master'
    )
  );*/

  public $hasMany = array(
    'ServicioProveedor' => array(
      'className' => 'ServicioProveedor',
      'foreignKey' => 'id_proveedor'
    ),
    'RegistroNoConformidad' => array(
      'className' => 'RegistroNoConformidad',
      'foreignKey' => 'id_proveedor',
      'dependent' => false
    ),
    'Reclamacion' => array(
      'className' => 'Reclamacion',
      'foreignKey' => 'id_proveedor',
      'dependent' => false
    )
  );

  public $validate = array(
    'nombre' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>',
        'last' => true
      )),
    'descripcion' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>'
      )),
    'cif' => array(
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
