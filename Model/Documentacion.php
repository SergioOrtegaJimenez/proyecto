<?php

class Documentacion extends AppModel
{
  public $useTable = 'documentaciones';
  public $tablePrefix = '';
   /*public $belongsTo = array(
    'Proveedor' => array(
      'className' => 'Proveedor',
      'foreignKey' => 'id_proveedor'
    )
  );*/

  public $hasMany = array(
    'Documento' => array(
      'className' => 'Documento',
      'foreignKey' => 'id_documentacion'));
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
    ),*/

  public $validate = array(
    'nombre' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>',
        'last' => true
      ))
  );
}
