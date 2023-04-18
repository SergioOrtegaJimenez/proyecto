<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Crear test</h3>
</div>
<div class="panel-body">

<?php
	echo $this->Form->create('Test', array(
											'inputDefaults' => array(
																		'error' => false,
																		'div' => array(
																						'class' => 'form-group'
																					),
																		'class'=>'form-control'
																	)
										)
							);
	//CAMPO NOMBRE
	if ($this->Form->isFieldError('Test.nombre'))
		$clase='form-group has-error';
	else 
	{
		$clase='form-group';
	}
	echo $this->Form->input('Test.nombre', array(
													'label'=> 'Enunciado:<span style="color:red">*</span>',
													'type'=> 'text',
													'placeholder' =>'Introduzca el nombre del test...',
													'div'=>array('class'=>$clase)
												)
						);
	echo $this->Form->error('Test.nombre',null,array('class'=>'help-block','escape'=>false));
	//CAMPO NUMERO PREGUNTAS
	if ($this->Form->isFieldError('Test.numPregunta'))
		$clase='form-group has-error';
	else 
	{
		$clase='form-group';
	}
	echo $this->Form->input('Test.numPregunta', array(
														'label'=> 'Numero de preguntas:<span style="color:red">*</span>',
														'type'=> 'text',
														'placeholder' =>'Introduzca el número de preguntas...',
														'div'=>array('class'=>$clase)
													)
						);
	echo $this->Form->error('Test.numPregunta',null,array('class'=>'help-block','escape'=>false));
	//CAMPO ACTIVO
?>

<div class="text-center">
  
<?php
	if ($this->Form->isFieldError('Test.activo'))
	{
		$clase = 'form-group has-error';
	}
	else 
	{
		$clase = 'form-group';
	}
?>

<div class = 'form-group'>
<div class = 'checkbox'>
<label>
      
<?= $this->Form->checkbox(	'Test.activo',
							array(	'label' => false,
									'div' => false,
									'class' => false
								)
						);
?> 

Activo
</label>
</div>
</div>

<?php
	echo $this->Form->error(	'Test.activo',
								null,
								array(	'class' => 'help-block',
										'escape'=>false
									)
						);
?>

</div>

<?= $this->Form->input('id', array('type' => 'hidden')); 
?>

</div>
<!--PIE DEL CUADRO-->
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'Cancelar',
						array(
								'action' => 'index'
							),
						array(	'class' => 'btn btn-danger'
							)
					); 
?>
    
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success">Guardar test</button>
</div>
</div>
</div>
</div>

<?= $this->Form->end();
?>

</div>
</div>