<?php

class Documento extends AppModel
{
   public $belongsTo = array(
    'Documentacion' => array(
      'className' => 'Documentacion',
      'foreignKey' => 'id_documentacion'
    )
  );
  public $validate = array(
        'nombre' => array(
            'required' => array(
              'rule' => 'notEmpty',
              'message'=> '<span class="label label-danger">Introduce un nombre</span>',
              'last' => true
            )
        ),
        'descripcion' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message'=> '<span class="label label-danger">Introduce una descripcion</span>'
            )
        ),
    );
}

?>
