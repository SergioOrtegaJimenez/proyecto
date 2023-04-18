<?php

class Accion extends AppModel
{
  public $hasMany = array(
    'Seguimiento' => array(
      'className' => 'Seguimiento',
      'foreignKey' => 'id_accion',
    ),
    'Recurso' => array(
      'className' => 'Recurso',
      'foreignKey' => 'id_accion',
    )
  );

  public $belongsTo = array(
   'RegistroNoConformidad' => array(
     'className' => 'RegistroNoConformidad',
     'foreignKey' => 'id_rnc'
   ),
   'Reclamacion' => array(
     'className' => 'Reclamacion',
     'foreignKey' => 'id_reclamacion'
   ));
}
?>
