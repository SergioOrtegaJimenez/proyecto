<?= $this->Html->css(array(
							'pikaday'
						)
					);
?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Modificar ficha</h3>
</div>
<div class="panel-body">
        
<?= $this->Form->create('Docadicional', array(
												'type' => 'file',
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
<?php
    //CAMPO NOMBRE
	if ($this->Form->isFieldError('Docadicional.nombre'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Docadicional.nombre', array(
															'label'=> 'Nombre y apellidos:',
															'type'=> 'text',
															'div'=>array('class'=>$clase)

														)
						);
    echo $this->Form->error('Docadicional.nombre',null,array('class'=>'help-block','escape'=>false)); 
?>
<?php
    //CAMPO DESCRIPCION
    if ($this->Form->isFieldError('Docadicional.descripcion'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Docadicional.descripcion', array(
																'label'=> 'Puesto:',
																'type'=> 'text',
																'div'=>array('class'=>$clase)
															)
						);
    echo $this->Form->error('Docadicional.descripcion',null,array('class'=>'help-block','escape'=>false)); 
?>

<label> Marca para no subir un fichero </label>
<br>
<label class="switch">
<input type="checkbox" name="comprobante" onclick="toggle('.fichero', this)" >
<div class="slider round"></div>
</label>
<div class="fichero">
            
<?= $this->Form->file('Docadicional.fichero', array(
													'label'=> 'Ficha: *',
													'required' => false,
													'placeholder' =>'Seleccione una ficha...'
												)
					); 
?>
          
</div>

<?= $this->Form->input('id', array('type' => 'hidden')); 
?>
<?= $this->Form->input('clasificador', array('type' => 'hidden','value' => 2)); 
?>

</div>
<!-- PIE DEL CUADRO -->
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						array(
								'action' => 'trabajador',
								'admin' => false
							),
						array('class' => 'btn btn-danger','escape' =>false
							)
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
    
</div>
</div>
</div>
<script type="text/javascript">
function toggle(className, obj) {
    var $input = $(obj);
    if ($input.prop('checked')) $(className).hide();
    else $(className).show();
}
</script>