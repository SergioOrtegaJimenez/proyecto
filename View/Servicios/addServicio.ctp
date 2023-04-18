<div class="panel panel-primary">
<div class="panel-heading"><h3>Añadir un Servicio</h3></div>
<div class="panel-body">
  
<?php
	echo $this->Form->create('Servicio');
  	echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre del Servicio'));
  	echo $this->Form->input('descripcion',array('class' => 'form-control','label'=>'Descripción'));
?>
  
</div>

<?= $this->element('pie_form'); 
?>

</div>

<?= $this->Form->end(); 
?>
