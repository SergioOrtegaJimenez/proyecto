<div class="panel panel-primary">
<div class="panel-heading"><h3>Información de la Acción Nº <?php echo $accion['Accion']['id']?></h3>
</div>
<div class="panel-body">
<div class="well well-lg"><h4><?php echo $accion['Accion']['descripcion']?></h4>
</div>


<!---------------------------------------------------------DATOS DE LA ACCION----------------------------------------------------------------------------------->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
    Datos de la Acción
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<div class="tab-content">
<div class="tab-content">
<div id="menu1" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-7 col-md-offset-6">
            
<?php 
	if(!is_null($accion['Accion']['id_rnc']))
	{
		echo $this->Html->link(
								'<i class="fa fa-reply" aria-hidden="true"></i> Ver RNC',
								array('controller' => 'reclamaciones', 'action' => 'view', $accion['Accion']['id_rnc']),
								array('class' => 'btn btn-primary','escape'=>false)
							  );
    } 
?>
<?php 
	if(!is_null($accion['Accion']['id_reclamacion']))
	{
		echo $this->Html->link(
								'<i class="fa fa-reply" aria-hidden="true"></i> Ver RC',
								array('controller' => 'reclamaciones', 'action' => 'viewre', $accion['Accion']['id_reclamacion']),
								array('class' => 'btn btn-primary','escape'=>false)
							  );
    } 
?>
&nbsp
<?php 
	if($accion['Accion']['finalizado'] == 'N' or $accion['Accion']['finalizado'] == null) 
	{
		echo   $this->Html->link(
									'<i class="fa fa-plus-square-o" aria-hidden="true"> Editar acción</i>',
									array('controller' => 'Acciones','action' => 'edit',$accion['Accion']['id']),
									array('class' => 'btn btn-primary','escape'=>false)
								); 
?>
&nbsp
<?=  $this->Html->link(
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Cerrar acción</i>',
						array('controller' => 'Acciones','action' => 'finalizar',$accion['Accion']['id']),
						array('class' => 'btn btn-primary','escape'=>false)
					  );
    } 
?>
&nbsp
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Generar PDF</i>',
						array(
								'controller' => 'acciones',
								'action' => 'pdf',
								$accion['Accion']['id'],
								'ext' => 'pdf'
							 ),
						array('class' => 'btn btn-primary','escape'=>false)
					 ); 
?>
              
</div>
</div>
<div class="row">
<div class="col-md-6">
<h3> Tipo de Acción: </h3><p>
             
<?= $accion['Accion']['tipo_accion']; ?>
            
</p>
<h3>Fecha de la acción: </h3><p>
              
<?= $accion['Accion']['fecha_accion']; ?>
            
</p>
<h3> Detalle de la acción: </h3><p>
              
<?= $accion['Accion']['detalle_accion']; ?>
            
</p>
</div>
<div class="col-md-6">
<h3> Plazo de Implantación: </h3><p>
              
<?= $accion['Accion']['plazo_implantacion']; ?>
  
</p>
<h3> Plazo de Cierre: </h3><p>
              
<?= $accion['Accion']['plazo_cierre']; ?>
            
</p>
<h3> Usuario Responsable: </h3><p>
              
<?= $usuarios[$accion['Accion']['usuario_responsable']]; ?>
            
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------SEGUIMIENTO------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	Seguimiento
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
	echo $this->Html->link(
							'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir seguimiento</i>',
							array('controller' => 'Seguimientos','action' => 'add',$accion['Accion']['id']),
							array('class' => 'btn btn-primary','escape'=>false)
						  );
?>

</div>
</div>
<br>
<br>
<div class="row">
<table class="table table-hover">
<thead class="thead-default">
<tr>
<th>Fecha de seguimiento</th>
<th>Estado del seguimiento</th>
<th>Usuario Responsable</th>
<th></th>
</tr>
</thead>

<?php
	$a=0;
?>
<?php 
	foreach ($accion['Seguimiento'] as $sg): 
?>
  
<tbody>
        
<?php  
	if ($a%2 == 0)
		$tabla='info';
    else 
	{
		$tabla='';
    } 
?>

<tr class="<?= $tabla?>">
<td><?= $sg['fecha']; ?></td>
<td><?= $sg['estado']; ?></td>
<td><?= $sg['usuario_responsable']; ?></td>
<td>
              
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('action' => 'delete', $sg['id']),
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
	$a=$a+1;
?>
<?php 
	endforeach; 
?>
<?php 
	unset($sg); 
?>
    
</table>
<div class="text-center">
      
<?php 
	if(empty($accion['Seguimiento']))
		echo "<strong style='color:#B40431'>No hay seguimientos para esta acción</strong>" 
?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->


<!-------------------------------------------------------------------CIERRE------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	Cierre
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
	echo $this->Form->postLink(
								'<i class="fa fa-plus-square-o" aria-hidden="true"> Abrir acción</i>',
								array('controller' => 'Acciones','action' => 'abrir',$accion['Accion']['id']),
								array('class' => 'btn btn-primary','escape'=>false)
							  );
?>
              
</div>
</div>
<div class="row">
<div class="col-md-6">
<h3> Fecha del cierre: </h3><p>
              
<?= $accion['Accion']['fecha_cierre']; ?>
            
</p>
<h3> Conclusión: </h3><p>
              
<?= $accion['Accion']['conclusiones']; ?>
            
</p>
<h3> Usuario responsable de cierre: </h3><p>
              
<?= $usuarios[$accion['Accion']['usuario_cierre']]; ?>
            
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->


<!-------------------------------------------------------------VOLVER-------------------------------------------------------------------------------------------> 
<div class="text-center">

<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array(
								'controller' => 'reclamaciones',
								'action' => 'view', $this->request->params['pass'][0],
								'admin' => false
							 ),
						array('class' => 'btn btn-danger', 'escape' => false)
					 );
?>
    
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

</div>
</div>