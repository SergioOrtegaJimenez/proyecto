<div class="panel panel-primary">
<div class="panel-heading"><h3>Añadir el material</h3></div>
<div class="panel-body">

<?= $this->Form->create('MaterialPedido', array('inputDefaults' => array('error' => false, 'div' => array('class' => 'form-group'),'class'=>'form-control'
																		)
											   )
					   );
	echo $this->Form->input('id_material', array(
													'class' => 'form-control',
													'label' => 'Material',
													'type' => 'select',
													'options' => $material,
													'empty'   => false
												)
							);
    echo $this->Form->input('unidades', array('maxlength' => "4"));
?>

</div>
<div class="panel-footer">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'Cancelar',
						array(
								'controller' => 'pedidos',
								'action' => 'view',
								'admin' => false,
								$pedido['Pedido']['id'],
								'menu2'
							 ),
						array(
								'escape' => false,
								'class' => 'btn btn-danger'
							)
					);
?>

</div>
<div class="col-md-6 text-left">

<?php
	echo $this->Form->submit(
								'Guardar Material', array(
															'name'=>'finpedido',
															'div' => false,
															'class' => 'btn btn-primary'
														)
							);

    echo $this->Form->end();
?>

</div>
</div>
</div>