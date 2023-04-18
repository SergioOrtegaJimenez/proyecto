<div class="panel panel-primary">
<div class="panel-heading"><h3>Registro Reclamación Nº <?php echo $reclamacion['Reclamacion']['id']?></h3>
</div>
<div class="panel-body">


<!------------------------------------------------------------RESUMEN------------------------------------------------------------------------------------------->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
    Resumen
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
<div class="col-md-7 col-md-offset-5">

<?php 
	if(!is_null($reclamacion['Reclamacion']['id_proveedor']))
	{
		echo $this->Html->link(
								'<i class="fa fa-reply" aria-hidden="true"></i> Ver Proveedor',
								array('controller' => 'proveedores', 'action' => 'view',$reclamacion['Reclamacion']['id_proveedor']),
								array('class' => 'btn btn-primary','escape'=>false)
							  );
    }
?>

&nbsp

<?= $this->Html->link(
    				  '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar RC',
						array('action' => 'edit',$reclamacion['Reclamacion']['id']),
    				    array('class' => 'btn btn-primary','escape'=>false)
					 ); 
?>

&nbsp

<?= $this->Html->link(
						'<i class="fa fa-floppy-o" aria-hidden="true"></i>  Finalizar RC',
    					array('action' => 'cierre',$reclamacion['Reclamacion']['id']),
    				    array('class' => 'btn btn-primary','escape'=>false)
					 );
?>

&nbsp

<?=    
	$this->Html->link(
    					   '<i class="fa fa-hourglass-start" aria-hidden="true"></i> Abrir RC',
    						array('action' => 'abrir',$reclamacion['Reclamacion']['id']),
    					    array('class' => 'btn btn-primary','escape'=>false)
						  ); 
?>

&nbsp
    
<?= $this->Html->link(
					   '<i class="fa fa-download" aria-hidden="true"></i> Generar PDF</i>',
						array(
								'controller' => 'reclamaciones',
								'action' => 'pdfrec',
								$reclamacion['Reclamacion']['id'],
								'ext' => 'pdf'
							 ),
						array(
								'class' => 'btn btn-primary','escape'=>false,
							 )
					); 
?>

</div>
</div>
<br>
<br>
<div class="row" style="text-align:center;">

<?php
	if(isset($usuarios[$reclamacion['Reclamacion']['usuario_cierre']]))
	{
		$usuario_cierre = $usuarios[$reclamacion['Reclamacion']['usuario_cierre']];
    } 
	else 
	{
		$usuario_cierre = '--';
    }
    
	if(is_null($reclamacion['Reclamacion']['finalizado']))
	{
		$finalizado = 'Sin cerrar aún';
    } 
	else 
	{
		$finalizado = $reclamacion['Reclamacion']['finalizado'];
    }

    if(is_null($reclamacion['Reclamacion']['cierre']))
	{
		$analisis = 'Sin causa de cierre aún';
    } 
	else 
	{
		$analisis = $reclamacion['Reclamacion']['cierre'];
    }

    if(is_null($reclamacion['Reclamacion']['seguimiento']))
	{
		$seguimiento = 'Sin seguimiento';
    } 
	else 
	{
		$seguimiento = $reclamacion['Reclamacion']['seguimiento'];
    }

    if(is_null($reclamacion['Reclamacion']['tratamiento']))
	{
		$tratamiento = 'Sin tratamiento';
    } 
	else 
	{
		$tratamiento = $reclamacion['Reclamacion']['tratamiento'];
    }

    if(is_null($reclamacion['Reclamacion']['causas']))
	{
		$causas = 'Sin causas';
    } 
	else 
	{
		$causas = $reclamacion['Reclamacion']['causas'];
    }
?>

<b>TIPO DE RECLAMACIÓN:</b>

<?= $reclamacion['Reclamacion']['tipo_reclamacion']; ?>

<br>
<br>
<div class="row">
<!--------------------- Primera tanda ------------------------>
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">DESCRIPCIÓN DE LA RECLAMACIÓN</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $reclamacion['Reclamacion']['descripcion']; ?>

<br>
<b>Apertura:</b>
                          
<?php
	$date = new DateTime($reclamacion['Reclamacion']['fecha_insercion']);
    echo $date->format('d-m-Y'); 
?>

<br>
<b>Abierto por:</b>
                        
<?= $usuarios[$reclamacion['Reclamacion']['usuario_insercion']]; ?>

</td>
</tr>
</table>
</div>
<!--------------------- Segunda tanda ---------------------->
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">POSIBLES CAUSAS DE ORIGEN</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $causas; ?>
                      
</td>
</tr>
</table>
</div>
</div>
<br>
<br>
<div class="row">
<!----------------------- Tercera tanda ---------------------->
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">TRATAMIENTO</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $tratamiento; ?>

<br>
<b>Usuario Responsable:</b>
                        
<?= $usuarios[$reclamacion['Reclamacion']['usuario_responsable']]; ?>
                        
<br>
<b>Plazo previsto:</b>
                        
<?= $reclamacion['Reclamacion']['plazo_previsto']; ?>
                        
<br>
<b>Autorización:</b>
                        
<?= $reclamacion['Reclamacion']['autorizacion']; ?>
                      
</td>
</tr>
</table>
</div>
<!---------------------------- Cuarta tanda ------------------------->
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">SEGUIMIENTO</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $seguimiento; ?>
                        
<br>
<b>Usuario Responsable:</b>
                        
<?= $usuarios[$reclamacion['Reclamacion']['usuario_responsable']]; ?>
                        
<br>
<b>Fecha real de resolución</b>
                        
<?php
	$date = new DateTime($reclamacion['Reclamacion']['fecha_resolucion']);
    echo $date->format('d-m-Y'); 
?>

</td>
</tr>
</table>
</div>
</div>
<br>
<br>
</div>
</div>
</div>
</div> 
</div>
</div>
</div>
</div>
</div>

<!------------------------------------------------------------------ Cierra Menú 1 ----------------------------------------------------------------------------->


<!-----------------------------------------------------------RECURSOS------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	Recursos
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
							'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Recurso</i>',
							array( 	'controller' => 'recursos',
									'action' => 'addreclamacion',
									$reclamacion['Reclamacion']['id']
								 ),
							array('class' => 'btn btn-primary','escape'=>false
								)
						);
?>

</div>
</div>
<br>
</br>
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
	foreach ($reclamacion['Recurso'] as $rc):
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
						array('controller'=>'Recursos','action' => 'downloadrec',$rc['id'],'reclamacion'),
						array('class' => 'btn btn-primary','escape'=>false)
					 ); 
?>
<?= $this->Form->postLink(
                          '<i class="fa fa-trash"></i>&nbsp; Eliminar',
                          array('controller' => 'Recursos', 'action' => 'delete', $rc['id'],'reclamacion'),
                          array('class' => 'btn btn-danger',
                          'escape'=>false,
                          'confirm' => '¿Estás seguro que quieres eliminar este recurso?')
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
	if(empty($reclamacion['Recurso']))
		echo "<strong style='color:#B40431'>No hay recursos en este RNC </strong>" 
?>

</div>
</div>
</div>
</div> 
</div>
</div>
</div>
<!------------------------------------------------------ Cierra el menu 2 -------------------------------------------------------------------------------------->


<!------------------------------------------------------ACCIONES------------------------------------------------------------------------------------------------>
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	Acciones
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
	echo $this->Html->link(
                           '<i class="fa fa-plus-square" aria-hidden="true"> Añadir C/P</i>',
							array( 	'controller' => 'acciones',
									'action' => 'accionre',
									$reclamacion['Reclamacion']['id']
									
								 ),
							array('class' => 'btn btn-primary','escape'=>false)
						  );
?>

</div>
</div>
<br>
</br>
<table class="table">
<thead>
<tr>
<th>Nº Acción</th>
<th>Acción</th>
<th>Descripción</th>
<th>Fecha</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($reclamacion['Accion'] as $rc):
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
<td><?= $rc['tipo_accion']; ?></td>
<td><?= $rc['descripcion']; ?></td>
<td><?= $rc['fecha_accion']; ?></td>
<td style="min-width:200px">
<div class="text-right">
<div class="btn-group btn-group-sm" >

<?= $this->Html->link(
                      '<i class="fa fa-eye" aria-hidden="true"></i> Ver</i>',
                      array('controller'=>'acciones','action' => 'view',$rc['id']),
                      array('class' => 'btn btn-primary','escape'=>false)
					  ); 
?>
<?= $this->Form->postLink(
                          '<i class="fa fa-trash"></i>&nbsp; Eliminar',
                          array('controller' => 'acciones', 'action' => 'delete', $rc['id']),
                          array('class' => 'btn btn-danger',
								'escape'=>false,
								'confirm' => '¿Estás seguro que quieres eliminar esta acción?'
								)
						);
?>

</div>
</div>
</td>
</tr>
</tbody>
      
<?php
	$a += 1;
    endforeach;
    unset($rc); 
?>
  
</table>
<div class="text-center">
            
<?php 
	if(empty($reclamacion['Accion']))
		echo "<strong style='color:#B40431'>No hay acciones correctivas</strong>" 
?>

</div>
</div>
</div>
</div> 
</div>
</div>
</div>
</div>
<!------------------------------------------------------------- Cierra el menu 3 ------------------------------------------------------------------------------->


<!-------------------------------------------------------------VOLVER-------------------------------------------------------------------------------------------> 
<div class="text-center">

<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array(
								'action' => 'index',
								'admin' => false
							 ),
						array('class' => 'btn btn-danger', 'escape' => false)
					 );
?>
    
</div> 
<!------------------------------------------------------------Cierra volver-------------------------------------------------------------------------------------> 
</div>
</div>