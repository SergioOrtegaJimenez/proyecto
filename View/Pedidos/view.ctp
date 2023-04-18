<div class="panel panel-primary">
<div class="panel-heading">
<h3>Información del pedido Nº <?php echo $pedido['Pedido']['id']?>
</h3>
</div>
<div class="panel-body">




<!-------------------------------------------------------RESUMEN DEL PEDIDO------------------------------------------------------------------------------------->
<div class="panel-body">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
    Resumen del Pedido
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<div class="tab-content">




<div id="menu1" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">

<?php
	echo	$this->Html->link(
								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Pedido',
								array(	'action' => 'edit',
										$pedido['Pedido']['id']
									),
								array(
										'class' => 'btn btn-primary', 
										'escape'=>false
									)
							);
?>
<?php
	if($pedido['Pedido']['finalizado'] == NULL) 
	{
		echo   $this->Html->link(
									'<i class="fa fa-floppy-o" aria-hidden="true"></i>  Finalizar Pedido',
									array(	'action' => 'finalizar',
											$pedido['Pedido']['id']
										),
									array(
											'class' => $botones,'escape'=>false
										)
								);
	}
	
	if($pedido['Pedido']['finalizado'] == 'S') 
	{
		echo   $this->Html->link(
									'<i class="fa fa-hourglass-start" aria-hidden="true"></i>  En espera',
									array(	'action' => 'espera',
											$pedido['Pedido']['id']
										),
									array(
											'class' => $botones,'escape'=>false
										)
								);
	}
?>

</div>
</div>
<div class="row">
<div class="col-md-6">
<h3> Proveedor: </h3>
<p>

<?= $pedido['Proveedor']['nombre']; 
?>

</p>
<h3>Unidad de Gasto: </h3>
<p>
		
<?= $pedido['Unidad_gasto']['num_unidad']; 
?>
	
</p>
<h3> Tipo de Gasto: </h3>
<p>
		
<?= $pedido['Pedido']['tipo_gasto']; 
?>
	
</p>
</div>
</div>
<div class="row">
<div class="col-md-6">
<h3> Precio Inicial: </h3>
<p>
		
<?= $pedido['Pedido']['precioInicial']; 
?>
	
Euros.</p>
<h3> Fecha de Solicitud: </h3>
<p>
    
<?= $pedido['Pedido']['fecha_solicitud']; 
?>
  
</p>
<h3> Observaciones: </h3><p style='word-wrap: break-word'>
<p>
    
<?= $pedido['Pedido']['observaciones']; 
?>
  
</p>
</div>
<div class="col-md-6">   <!------------------------------------------------------------------------------->
    
<?php
	if(!is_null($pedido['Pedido']['precioInicial']))
	{ 
?>
  
<h3> Precio Final: </h3>
<p>

<?= $pedido['Pedido']['precioFinal'];
?>
      
Euros.</p>
  
<?php 
	} 
?>
<?php
    if(!is_null($pedido['Pedido']['fecha_solicitud']))
	{ 
?>
    
<h3> Fecha de llegada: </h3>
<p>
    
<?= $pedido['Pedido']['fecha_llegada'];
?>
    
</p>
  
<?php 
	} 
?>
<?php
    if(!is_null($pedido['Pedido']['conformidad']))
	{ 
?>
    
<h3> Conformidad: </h3>
<p>
    
<?= $pedido['Pedido']['conformidad'];
?>
    
</p>

<?php 
	} 
?>

</div> 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-------------------------------------------------------MATERIALES--------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	Materiales
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<div id="menu2" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
          
<?php
	if ($pedido['Pedido']['finalizado'] != 'S')
	{
		echo $this->Html->link(
								'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Material</i>',
								array(	'action' => 'addmaterial',
										$pedido['Pedido']['id']
									),
								array(
										'class' => 'btn btn-primary',
										'escape'=>false
									)
							);
    } 
?>
              
</div>
</div>
<br></br>
<table class="table">
<thead>
<tr>
<th>Nombre</th>
<th>Cod. Referencia</th>
<th>Unidades</th>
<th>Opciones</th>
</tr>
</thead>
        
<?php 
	$a=0;
?>
<?php 
	foreach ($pedido['MaterialPedido'] as $mt):
?>
  
<tbody>
          
<?php 
	if ($a%2==0)
		$tabla='info';
    else 
	{
		$tabla='';
    } 
?>

<tr class="<?= $tabla?>">
<td><?= $mt['Material']['nombre']; ?></td>
<td><?= $mt['Material']['cod_referencia']; ?></td>
<td><?= $mt['unidades']; ?></td>
<td><?= $this->Form->postLink(
								'<i class="fa fa-trash"></i>&nbsp; Eliminar',
								array(	'action' => 'deletematerial',
										$pedido['Pedido']['id'],
										$mt['Material']['id']
									),
								array(	'class' => 'btn btn-danger',
										'escape'=>false,
										'confirm' => '¿Estás seguro?'
									)
							);
?>
            
</td>
</tr>
</tbody>
        
<?php 
	$a = $a + 1;
    endforeach;
    unset($mt); 
?>

</table>
<div class="text-center">
          
<?php 
	if(empty($pedido['MaterialPedido']))
		echo "<strong style='color:#B40431'>No hay materiales en este pedido </strong>" 
?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
  
<!-------------------------------------------------------RECURSOS----------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	Recursos
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<div id="menu3" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">

<?php
	echo   $this->Html->link(
								'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Recurso</i>',
								array( 'controller' => 'recursos',
									   'action' => 'add',
										$pedido['Pedido']['id']
									),
								array(
										'class' => 'btn btn-primary',
										'escape'=>false
									)
							);
?>
  
</div>
</div>
<br></br>
<table class="table">
<thead>
<tr>
<th>Recurso</th>
<th>Descripción</th>
<th>Tipo de gasto</th>
<th>Opciones</th>
</tr>
</thead>

<?php 
	$a=0;
?>
<?php 
	foreach ($pedido['Recurso'] as $rc):
?>

<tbody>
          
<?php  
	if ($a%2==0)
		$tabla='info';
    else 
	{
		$tabla='';
    } 
?>
          
<tr class="<?= $tabla?>">
<td><?= $rc['id']; ?></td>
<td><?= $rc['descripcion']; ?></td>
<td><?= $rc['tipo_archivo']; ?></td>
<td>
<div class="text-right">
<div class="btn-group btn-group-sm" >
                    
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Descargar</i>',
						array(	'controller'=>'Recursos',
								'action' => 'downloadrec',
								$rc['id'],'pedidos'
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					); 
?>
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array(	'controller' => 'Recursos', 
									'action' => 'delete', 
									$rc['id'],'pedidos'
								),
							array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que quieres eliminar este recurso?'
								)
						);
?>

</div>
</div>
</td>
</tr>
</tbody>
  
<?php
    $a=$a+1;
    endforeach;
    unset($rc); 
?>
   
</table>
<div class="text-center">
        
<?php 
	if(empty($pedido['Recurso']))
		echo "<strong style='color:#B40431'>No hay recursos en este pedido </strong>" 
?>
  
</div>
</div>
</div>
</div>
</div>
</div>
</div>
	  
	  
<!-------------------------------------------------------HOJA DE PEDIDO----------------------------------------------------------------------------------------->	  
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
	Hoja de Pedido
</a>
</h4>
</div>
<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
<div class="panel-body">
<div id="menu4" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<br>
<div class="col-md-6">
<div class="text-center">
<h4>Hoja de Pedido Inicial</h4>
<br><br>
                
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Pedido Inicial</i>',
						array(
								'controller' => 'pedidos',
								'action' => 'pdf',
								$pedido['Pedido']['id'],
								'ext' => 'pdf'
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					); 
?>

</div>
</div>
<div class="col-md-6">
<div class="text-center">
                
<?php
	if (isset($pedido['Pedido']['archivoPDFsolicitudFirmado']))
	{
?>

<h4> Hoja de Pedido firmado</h4>
<br><br>
              
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Descargar</i>',
						array(	'action' => 'downloadfimado',
								$pedido['Pedido']['id']
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					); 
?>
<?= $this->Html->link(
						'<i class="fa fa-trash" aria-hidden="true"></i> Eliminar',
						array(	'action' => 'eliminarfirmado',
								$pedido['Pedido']['id']
							),
						array(
								'class' => 'btn btn-danger',
								'escape'=>false
							)
					); 
?>
<?php 
	} 
	else 
	{
?>
                
<h4> Adjuntar Pedido Firmado: </h4>
<br>

<?php
	echo $this->Form->create('Pedido', array(
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
    echo $this->Form->file('Pedido.archivoPDFsolicitudFirmado', array(
																		'label'=> 'Solicitud: *',
																		'required' => false,
																		'placeholder' =>'Seleccione una solicitud...',
																		'style' => 'display:inline'
																	)
						);
    echo $this->Form->input('id', array('type' => 'hidden'));
?>
   
<br></br>
        
<?php
    echo $this->Form->submit(
								'Subir PDF', array(
													'name'=>'anadirfirmado',
													'div' => false,
													'class' => 'btn btn-success'
												)
							);
    echo $this->Form->end(); 
	} 
?>
 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
	  

<!-------------------------------------------------------REGISTRO DE NO CONFORMIDAD----------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
	Registro de No Conformidad
</a>
</h4>
</div>
<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
<div class="panel-body">
<div id="menu5" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
              
<?=   $this->Html->link(
							'<i class="fa fa-plus-square" aria-hidden="true"> Añadir RNC</i>',
							array(
									'controller' => 'reclamaciones',
									'action' => 'rnc',
									$pedido['Pedido']['id'], 
									$pedido['Proveedor']['id']
								),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					);
?>
    
</div>
</div>
<br></br>
<table class="table">
<thead>
<tr>
<th>Tipo</th>
<th>Descripción</th>
<th>Fecha de apertura</th>
<th>Finalizado</th>
<th></th>
</tr>
</thead>
    
<?php 
	$a = 0;
?>
<?php 
	foreach ($pedido['RegistroNoConformidad'] as $rnc):
?>

<tbody>
        
<?php  
	if ($a%2==0)
		$tabla='info';
    else 
	{
		$tabla='';
    }
          
	if (is_null($rnc['finalizado']))
	{
		$fin = 'No';
    }
    else 
	{
		$fin = 'Si';
    }
?>

<tr class="<?= $tabla?>">
<td><?= $rnc['tipoNoconformidad']; ?></td>
<td><?= $rnc['descripcion']; ?></td>
<td><?= $rnc['fecha_apertura']; ?></td>
<td><?= $fin; ?></td>
<td style="min-width:250px;">
<div class="text-right">
<div class="btn-group btn-group-sm" >

<?= $this->Html->link(
						'<i class="fa fa-eye" aria-hidden="true"></i> Ver</i>',
						array(
								'controller' => 'reclamaciones',
								'action' => 'view',
								$rnc['id']
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					); 
?>
<?= $this->Html->link(
						'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</i>',
						array(
								'controller' => 'reclamaciones',
								'action' => 'rnc',
								$pedido['Pedido']['id'], 
								$pedido['Proveedor']['id'], 
								$rnc['id']
							),
						array(
								'class' => 'btn btn-warning',
								'escape'=>false
							)
					); 
?>
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array(	'controller' => 'reclamaciones', 
									'action' => 'deleternc', 
									$rnc['id']
								),
							array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que quieres eliminar este RNC?'
								)
						);
?>
  
</div>
</div>
</td>
</tr>
</tbody>
        
<?php
    $a = $a + 1;
    endforeach;
    unset($rc); 
?>
  
</table>
<div class="text-center">
          
<?php 
	if(empty($pedido['RegistroNoConformidad']))
		echo "<strong style='color:#B40431'>No hay registros de no conformidad </strong>" 
?>
  
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<br>
<br>
  
<!-------------------------------------------------------BOTON VOLVER------------------------------------------------------------------------------------------->  
<div class="text-center">

<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array(
								'action' => 'iniciopedido',
								'admin' => false
							),
						array(
								'class' => 'btn btn-danger', 'escape' => false
							)
					);
?>
    
</div>
</div>