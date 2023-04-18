<?php

class RegistroNoConformidad extends AppModel
{
   public $belongsTo = array(
    'Pedido' => array(
      'className' => 'Pedido',
      'foreignKey' => 'id_pedido'
    ),
    'Proveedor' => array(
      'className' => 'Proveedor',
      'foreignKey' => 'id_proveedor'
    )
  );

  public $hasMany = array(
    'Recurso' => array(
      'className' => 'Recurso',
      'foreignKey' => 'id_rnc',
    ),
    'Accion' => array(
      'className' => 'Accion',
      'foreignKey' => 'id_rnc',
    )
  );
}

?>
