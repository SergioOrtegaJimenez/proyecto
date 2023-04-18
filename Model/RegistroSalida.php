<?php

class RegistroSalida extends AppModel
{
   public $belongsTo = array(
    'Plantilla' => array(
      'className' => 'Plantilla',
      'foreignKey' => 'id_plantilla'
    )
  );

  /*
  public $validate = array(
    'observaciones' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>',
        'last' => true
      ))
    'descripcion' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>'
      )),
    'cif' => array(
      'obligatorio' => array(
        'rule' => 'notEmpty',
        'message' => '<span class="label label-danger">Este campo es obligatorio</span>'
      ))*/
    /*'guia' => array(
      'obligatorio' => array(
        'allowEmpty' => true,
        'rule' => 'url',
        'message' => '<span class="label label-danger">Debes introducir una url válida</span>'
      )),
  );
  */
}
