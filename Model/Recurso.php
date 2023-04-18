<?php

class Recurso extends AppModel
{
   public $belongsTo = array(
								'Pedido' => array(
													'className' => 'Pedido',
													'foreignKey' => 'id_pedido'
												),
								'RegistroNoConformidad' => array(
																	'className' => 'RegistroNoConformidad',
																	'foreignKey' => 'id_rnc'
																),
								'Reclamacion' => array(
														'className' => 'Reclamacion',
														'foreignKey' => 'id_reclamacion'
													),
								'Empresa' => array(
													'className' => 'Empresa',
													'foreignKey' => 'idemp'
												),
								'Accion' => array(
													'className' => 'Accion',
													'foreignKey' => 'id_accion'
												)
							);
}

?>
