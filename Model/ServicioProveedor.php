<?php

class ServicioProveedor extends AppModel
{

  public $belongsTo = array(
    'Servicio' => array(
      'className' => 'Servicio',
      'foreignKey' => 'id_servicio',
    ),
    'Proveedor' => array(
      'className' => 'Proveedor',
      'foreignKey' => 'id_proveedor',
    ));
}