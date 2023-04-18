<div class="panel panel-primary">
<div class="panel-heading"><h3><?= $texto ?></h3></div>
<div class="panel-body">

<?php
    echo $this->Form->create('Material');
	echo $this->Form->input('nombre',array('class' => 'form-control'));
	echo $this->Form->input('descripcion',array('class' => 'form-control'));
	echo $this->Form->input('cod_referencia',array('class' => 'form-control'));
	echo $this->Form->input('tipo_material', array(
													'class' => 'form-control',
													'type' => 'select',
													'options' => array('Material Fungible' => 'Material Fungible','Material Inventariable' => 'Material Inventariable','Billete de tren' => 'Billete de tren','Reserva de hotel' => 'Reserva de hotel','Carteleria' => 'Carteleria'),
													'default' => 'Material Fungible'
												)
						);

    echo $this->Form->input('id_proveedor', array(
													'class' => 'form-control',
													'type'    => 'select',
													'options' => $listado,
													'empty'   => false
												)
						);

	echo $this->Form->input('id', array('type' => 'hidden'));
?>

</div>
  
<?= $this->element('pie_form'); 
?>

</div>

<?= $this->Form->end(); 
?>
