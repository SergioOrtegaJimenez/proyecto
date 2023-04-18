<div class="panel panel-primary">
<div class="panel-heading"><h3>Añadir una Unidad de Gasto</h3></div>
<div class="panel-body">
    
<?php
    echo $this->Form->create('Unidad_gasto');
    echo $this->Form->input('num_unidad',array('class' => 'form-control','label'=>'Número de Unidad'));
    echo $this->Form->input('descripcion',array('class' => 'form-control','label'=>'Descripción de la Unidad'));
?>
  
</div>
  
<?= $this->element('pie_form'); 
?>

</div>

<?= $this->Form->end(); 
?>
