<?php

class MaterialPedido extends AppModel
{

  public $belongsTo = array(
    'Material' => array(
      'className' => 'Material',
      'foreignKey' => 'id_material'
    ),
    'Pedido' => array(
      'className' => 'Pedido',
      'foreignKey' => 'id_pedido'
    ));
}