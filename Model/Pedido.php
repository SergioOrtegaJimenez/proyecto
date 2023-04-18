<?php

class Pedido extends AppModel
{
  public $belongsTo = array(
    'Unidad_gasto' => array(
      'className' => 'Unidad_gasto',
      'foreignKey' => 'id_unidadgasto'
    ),

    'Proveedor' => array(
      'className' => 'Proveedor',
      'foreignKey' => 'id_proveedor'
    ));

  public $hasMany = array(
    'MaterialPedido' => array(
      'className' => 'MaterialPedido',
      'foreignKey' => 'id_pedido',
	  'dependent' => true
    ),
    'Recurso' => array(
      'className' => 'Recurso',
      'foreignKey' => 'id_pedido',
	  'dependent' => true
    ),
    'RegistroNoConformidad' => array(
      'className' => 'RegistroNoConformidad',
      'foreignKey' => 'id_pedido'
    ));

  /*public $validate = array(
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
      )),);*/
}
