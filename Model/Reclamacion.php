<?php

class Reclamacion extends AppModel
{
  public $belongsTo = array(
   'Proveedor' => array(
     'className' => 'Proveedor',
     'foreignKey' => 'id_proveedor'
   )
 );

  public $hasMany = array(
    'Recurso' => array(
      'className' => 'Recurso',
      'foreignKey' => 'id_reclamacion'
    ),
    'Accion' => array(
      'className' => 'Accion',
      'foreignKey' => 'id_reclamacion',
    )
  );
}
