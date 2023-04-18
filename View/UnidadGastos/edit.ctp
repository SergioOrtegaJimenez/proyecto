<div class="panel panel-primary">
<div class="panel-heading"><h3>Modificar la Unidad de Gasto: 
<?php
	echo $ug['Unidad_gasto']['num_unidad'];
?>

</h3></div>
<div class="panel-body">

<?php
	echo $this->Form->create('Unidad_gasto');
	echo $this->Form->input('num_unidad',array('class' => 'form-control','label'=>"Número de la Unidad de Gasto"));
	echo $this->Form->input('descripcion',array('class' => 'form-control','label'=>"Descripción de la Unidad de Gasto"));
	echo $this->Form->input('id', array('type' => 'hidden'));
?>

</div>

<?= $this->element('pie_form'); 
?>

</div>

<?= $this->Form->end(); 
?>
