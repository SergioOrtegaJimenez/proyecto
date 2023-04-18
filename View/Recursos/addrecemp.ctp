<div class="panel panel-primary">
<div class="panel-heading"><h3>Añadir un Recurso</h3></div>
<div class="panel-body">

<?php
    echo $this->Form->create('Recurso', array(
												'type' => 'file',
												'inputDefaults' => array(
																			'error' => false,
																			'div' => array(
																							'class' => 'form-group'
																						  ),
																			'class'=>'form-control',
																		)
											)
							);
	echo $this->Form->input('descripcion',array('class' => 'form-control'));
	echo $this->Form->input('tipo_gasto', array(
												'class' => 'form-control',
												'type' => 'select',
												'options' => array('Albarán' => 'Albarán','Factura' => 'Factura','Oficio de Remisión de facturas' => 'Oficio de Remisión de facturas','Escrito' => 'Escrito'),
												'default' => 'Factura'
												)
							);
    echo $this->Form->file('Recurso.direccionArchivo', array(
																'label'=> 'Solicitud: *',
																'required' => false,
																'placeholder' =>'Seleccione una solicitud...'
															)
						  );
?>

</div>
<!-- PIE DEL CUADRO -->
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?=  $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						array(
								'controller' => $controllador,
								'action' => 'viewemp',
								$idpadre
							 ),
						array('class' => 'btn btn-danger','escape' => false));
?>
 
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
</div>
</div>
</div>
</div>

<?= $this->Form->end(); ?>