<div class="panel panel-primary">
<div class="panel-heading"><h3>Editar un Proveedor</h3></div>
<div class="panel-body">

<?php
	echo $this->Form->create(	'Proveedor', array(
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
	echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre del proveedor'));
	echo $this->Form->input('estado',array('class' => 'form-control','type' => 'select','options' => array('Proveedor Activo' => 'Proveedor Activo','Proveedor Inactivo' => 'Proveedor Inactivo'),
        'label'=> 'Estado del proveedor:',
        'required' => true,
        'error' => false
      ));
	echo $this->Form->input('descripcion',array('class' => 'form-control','label'=>'Descripción'));
	echo $this->Form->input('telefono',array('class' => 'form-control','label'=>'Número de teléfono'));
	echo $this->Form->input('telefono2',array('class' => 'form-control','label'=>'Número de teléfono alternativo'));
	echo $this->Form->input('fax',array('class' => 'form-control','label'=>'Fax'));
	echo $this->Form->input('email',array('class' => 'form-control','label'=>'Correo electrónico'));
	echo $this->Form->input('cif',array('class' => 'form-control','label'=>'CIF'));
	echo $this->Form->input('codigo_cliente',array('class' => 'form-control','label'=>'Código Cliente')); 
?>
	
</div>
<div class="panel-footer">
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						$redirigir,
						array(	'class' => 'btn btn-danger',
								'escape' => false
							)
					); 
?>

</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
</div>
</div>
</div>
  
<?php
	echo $this->Form->end();
?>

</div>
</div>
</div>