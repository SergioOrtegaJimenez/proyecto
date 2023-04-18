<div class="panel panel-primary">
<div class="panel-heading"><h3><?= $texto ?></h3></div>
<div class="panel-body">

<?php
    echo $this->Form->create('Empresa');
  	echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre de la empresa'));
  	echo $this->Form->input('contacto',array('class' => 'form-control','label'=>'¿Dónde se contactó?'));
	echo $this->Form->input('id', array('type' => 'hidden'));
?>

</div>
  
<?= $this->element('pie_form'); 
?>

</div>

<?= $this->Form->end(); 
?>
