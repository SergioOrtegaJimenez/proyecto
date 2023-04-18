<script type="text/javascript">
	function toggle(className, obj) 
	{
		var $input = $(obj);
		if ($input.prop('checked'))
		{ 
			$(className).show();
		}
		else 
		{
			$(className).hide();
		}
	}
</script>

<?php 
	echo $this->Html->script('//code.jquery.com/jquery-2.2.4.min.js');
	echo $this->Js->writeBuffer(); 
?>

<div class="panel panel-primary">
<div class="panel-heading"><h3>Añadir un Proveedor</h3></div>
<div class="panel-body">

<?php
	echo $this->Form->create(	'Proveedor', array(
													'type' => 'file',
													'inputDefaults' => array(
																				'error' => false,
																				'div' => array(
																								'class' => 'form-group'
																							),
																				'class'=>'form-control',
																			)
												)
							);
	echo $this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre del proveedor'));
	echo $this->Form->input('estado',array('class' => 'form-control','type' => 'select','options' => array('Proveedor Activo' => 'Proveedor Activo','Proveedor Inactivo' => 'Proveedor Inactivo'),
        'label'=> 'Estado del proveedor:',
        'required' => true,
        'error' => false
      ));
	echo $this->Form->input('descripcion',array('class' => 'form-control','label'=>'Descripción'));
	echo $this->Form->input('telefono',array('class' => 'form-control','label'=>'Número de teléfono'));
	echo $this->Form->input('telefono2',array('class' => 'form-control','label'=>'Número de teléfono alternativo'));
	echo $this->Form->input('fax',array('class' => 'form-control','label'=>'Fax'));
	echo $this->Form->input('email',array('class' => 'form-control','label'=>'Correo electrónico'));
	echo $this->Form->input('cif',array('class' => 'form-control','label'=>'CIF'));
	echo $this->Form->input('codigo_cliente',array('class' => 'form-control','label'=>'Código Cliente'));
?>
<?php
	echo $this->Form->input(	'tipo_criterio', array(
														'id' => 'tipo_criterio',
														'class' => 'form-control',
														'label' =>'Tipo de criterio',
														'type' => 'select',
														'options' => $opciones,
														'empty' => array(0 => '-- Selecciona el tipo de criterio --')
													)
						);
	echo $this->Form->input(	'tipo_homologacion', array(
															'id' => 'tipo_homologacion',
															'label'=>'Tipo de homologación',
															'type' => 'select'
														)
						);
?>
  
<label> Desmarca para no subir una certificación / Marca para subir una certificación </label>
<br>
<label class="switch">
<input type="checkbox" name="comprobante" onclick="toggle('.certificacion', this)" checked>
<div class="slider round"></div>
</label>
<div class="certificacion">

<?= $this->Form->file(	'Proveedor.certificacion', array(
															'label'=> 'Certificación: *',
															'required' => false,
															'placeholder' =>'Seleccione una ficha...'
														)
					); 
?>

</div>
</div>
<div class="panel-footer">
<div class="row">
<div class="col-md-6 text-right">

<?php
	echo $this->Html->link(
							'Cancelar',
							array('action' => 'index'
								),
							array('class' => 'btn btn-danger'
								)
						);
?>
	
</div>
<div class="col-md-6 text-left">

<?php
	echo $this->Form->submit(
								'Guardar', 
								array(	'name'=>'cert',
										'div' => false, 
										'class' => 'btn btn-primary'
									)
							);
    echo $this->Form->end();
?>

</div>
</div>
</div>

<?php
	$this->Js->get('#tipo_criterio')->event(	'change',
												$this->Js->request(	array(
																			'controller'=>'Proveedores',
																			'action'=>'getByCategory'
																		), 
																	array(
																			'update'=>'#tipo_homologacion',
																			'async' => true,
																			'method' => 'post',
																			'dataExpression'=>true,
																			'data'=> $this->Js->serializeForm(	array(
																														'isForm' => true,
																														'inline' => true
																													)
																											)
																		)
																)
										);
	echo $this->Js->writeBuffer(); // Write cached scripts 
?>