<?= $this->Html->css(array(
							'404'
						)
					);
?>

<p style="font-size: 30px; color:yellow">Error 404 Acción no encontrada</p>
<p style="color:yellow">Has acccedido a la zona oscura de la aplicación, pulse en Yoda para volver a estar a salvo.</p>

<?= $this->Html->Link(
						$this->Html->image(
											'../img/yoda.png',
											array(
													'alt'=> "salida",
													'height'=> '100',
													'class' => 'pull-left'
												)
										),
						array(
								'controller' => 'menus',
								'action' => 'index',
								'admin' => false
							),
						array(
								'class' => 'link','escape'=>false
							)
					);
?>
