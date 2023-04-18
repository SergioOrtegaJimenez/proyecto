<?php

class Seguimiento extends AppModel
{
   public $belongsTo = array(
    'Accion' => array(
      'className' => 'Accion',
      'foreignKey' => 'id_accion'
    )
  );
}

?>
