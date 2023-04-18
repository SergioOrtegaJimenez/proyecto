<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Generar plantilla</h3>
</div>
<div class="panel-body">

<?= $this->Html->css(array(
							'mystyle'
						)
					); 
?>
<?php
	echo $this->Form->create('RegistroSalida', array(
														'inputDefaults' => array(
																					'error' => false,
																					'div' => array(
																									'class' => 'form-group'
																								),
																					'class'=>'form-control'
																				)
													)
							);
?>

<label for="">Tipo de documento</label>
<select name="opcionEntrada" class="form-control" size="1" style="color:black;">
	<option value="0">Selecciona una Plantilla</option>
	<option style="font-size: 1.4em; background-color:deepskyblue"       value="15">Cheque (art. 83)</option>
	<option style="font-size: 1.4em; background-color:khaki;"            value="24">Dietas Gestión Económica</option>
	<option style="font-size: 1.4em; background-color:lightgrey"         value="14">Factura (art. 83)</option>
	<option style="font-size: 1.4em; background-color:mistyrose;"        value="23">Factura Gestión Económica</option>
	<option style="font-size: 1.4em; background-color:Goldenrod;"     value="31">Plan Propio Galileo</option>
	<option style="font-size: 1.4em; background-color:yellow;"           value="2">Genérico</option>
	<option style="font-size: 1.4em; background-color:PaleTurquoise;"      value="28">Genérico Documentos (art. 83)</option>
	<option style="font-size: 1.4em; background-color:greenyellow;"      value="17">Informe (art. 83)</option>
	<option style="font-size: 1.4em; background-color:bisque;"           value="18">Prórroga (art. 83)</option>
	<option style="font-size: 1.4em; background-color:green;"            value="13">SAC Profesor (art. 83)</option>
	<option style="font-size: 1.4em; background-color:red;"              value="12">SAC Rector (art. 83)</option>
</select>
</div>
<!-- PIE DEL CUADRO -->
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'Cancelar',
						array(
								'action' => 'indexSalida',
								'admin' => false
							),
						array('class' => 'btn btn-danger'
							)
					); 
?>
    
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success">Seleccionar plantilla</button>
</div>
</div>
</div>

<?= $this->Form->end(); 
?>

</div>
</div>
</div>