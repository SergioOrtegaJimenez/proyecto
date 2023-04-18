<div class="panel panel-primary">
<div class="panel-heading"><h3>Añadir un contrato</h3></div>
<div class="panel-body">
  
<?php
	echo $this->Form->create('Empresa');
  	echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre de la empresa'));
  	echo $this->Form->input('contacto',array('class' => 'form-control','label'=>'¿Dónde se contactó?'));
?>
  
</div>
<div class="panel-footer">
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						$redirigir,
						array('class' => 'btn btn-danger','escape' => false)
					); 
?>
      
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
</div>
</div>
</div>

<?= $this->Form->end(); 
?>
