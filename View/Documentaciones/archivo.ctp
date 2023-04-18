<?= $this->Html->css(array(
							'pikaday'
						)
					);
?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Añadir archivo</h3>
</div>
<div class="panel-body">
        
<?= $this->Form->create('Documento', array(
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
	if ($this->Form->isFieldError('Documento.nombre'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Documento.nombre', array(
														'label'=> 'Nombre/Título:',
														'type'=> 'text',
														'required' => true,
														'div'=>array('class'=>$clase)

													)
						);
    echo $this->Form->error('Documento.nombre',null,array('class'=>'help-block','escape'=>false)); 
?>
<?php
    //CAMPO DESCRIPCION
	if ($this->Form->isFieldError('Documento.descripcion'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Documento.descripcion', array(
															'label'=> 'Descripción:',
															'type'=> 'textarea',
															'div'=>array('class'=>$clase)

														)
						);
    echo $this->Form->error('Documento.descripcion',null,array('class'=>'help-block','escape'=>false)); 
?>

<label> Marca para no subir un fichero </label>
<br>
<label class="switch">
<input type="checkbox" name="comprobante" onclick="toggle('.fichero', this)" >
<div class="slider round"></div>
</label>
<div class="fichero">
      
<?= $this->Form->file('Documento.fichero', array(
													'label'=> 'Ficha: *',
													'required' => false,
													'placeholder' =>'Seleccione un documento...'
												)
					); 
?>
    
</div>

<?= $this->Form->input('id', array('type' => 'hidden')); 
?>
<?php 
	if ($documentacion == null)
	{
		//CAMPO DESTINATARIO
		if ($this->Form->isFieldError('Documento.id_documentacion'))
			$clase='form-group has-error';
        else 
		{
			$clase='form-group';
        }
        echo $this->Form->input('Documento.id_documentacion', array(
																		'label'=> 'Archivo:',
																		'type'=> 'select',
																		'options' => $options,
																		'div'=>array('class'=>$clase)

																)
							);
        echo $this->Form->error('Documento.id_documentacion',null,array('class'=>'help-block','escape'=>false));
    } 
	else 
	{
		echo $this->Form->input('id_documentacion', array('type' => 'hidden','value' => $documentacion));
    }
?>

</div>
<!-- PIE DEL CUADRO -->
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						array(
								'action' => 'index',
								'admin' => false,
								$documentacion
							),
						array('class' => 'btn btn-danger','escape' => false
							)
					); 
?>
          
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar archivo</button>
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