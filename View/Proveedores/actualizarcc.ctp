<div class="panel panel-primary">
<div class="panel-heading"><h3>Actualizar datos de Calidad: 

<?php
	echo $prov['Proveedor']['nombre'];
?>

</h3></div>
<div class="panel-body">

<?php
    echo $this->Form->create('Proveedor');
	echo $this->Form->input(	'tipo_criterio', 
								array(
										'id' => 'tipo_criterio',
										'class' => 'form-control',
										'label'=>'Tipo de criterio',
										'type' => 'select',
										'options' => $opciones
									)
						);
	echo $this->Form->input(	'tipo_homologacion', 
								array(
										'id' => 'tipo_homologacion',
										'class' => 'form-control',
										'label'=>'Tipo de homologación',
										'type' => 'select',
										'options' => $homologaciones
									)
						);
	echo $this->Form->input('coeficiente_calidad',array('class' => 'form-control'));
	echo $this->Form->input('bonusCoeficiente',array('class' => 'form-control'));
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