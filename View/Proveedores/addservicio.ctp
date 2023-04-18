<div class="panel panel-primary">
<div class="panel-heading"><h3>Añadir servicio del proveedor</h3></div>
<div class="panel-body">

<?php
    echo $this->Form->create('Servicio');
	echo $this->Form->input(	'nombre_servicio', array(
															'id' => 'nombre_servicio',
															'class' => 'form-control',
															'label' =>'Servicio',
															'type' => 'select',
															'options' => $listaserv,
															'empty' => array(0 => '-- Selecciona el servicio del proveedor --')
														)
						);
	echo $this->Form->input('id', array('type' => 'hidden'));
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
</div>

<?= $this->Form->end(); 
?>