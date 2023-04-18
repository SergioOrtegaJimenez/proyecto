<?php

class Plantilla extends AppModel
{

  public $hasMany = array(
    'RegistroEntrada' => array(
      'className' => 'RegistroEntrada',
      'foreignKey' => 'id_plantilla'
    ),
    'RegistroSalida' => array(
      'className' => 'RegistroSalida',
      'foreignKey' => 'id_plantilla',
    )
  );
}
