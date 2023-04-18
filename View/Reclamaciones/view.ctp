<div class="panel panel-primary">
<div class="panel-heading"><h3>Información del RNC Nº <?php echo $rnc['RegistroNoConformidad']['id']?></h3>
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
<div class="col-md-7 col-md-offset-6">
                
<?php 
	if(!is_null($rnc['RegistroNoConformidad']['id_pedido']))
	{
		echo $this->Html->link(
								'<i class="fa fa-reply" aria-hidden="true"></i> Ver Pedido',
								array('controller' => 'pedidos', 'action' => 'view',$rnc['RegistroNoConformidad']['id_pedido']),
								array('class' => 'btn btn-primary','escape'=>false)
							  );
    }
?>
                   
&nbsp
<?= $this->Html->link(
						'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar RNC',
    					array('action' => 'editrnc', $rnc['RegistroNoConformidad']['id']),
    				    array('class' => 'btn btn-primary', 'escape'=>false)
					 ); 
?>
&nbsp
<?= $this->Html->link(
						'<i class="fa fa-floppy-o" aria-hidden="true"></i>  Finalizar RNC',
    					array('action' => 'finalizar',$rnc['RegistroNoConformidad']['id']),
    				    array('class' => 'btn btn-primary', 'escape'=>false)
					 );
?>
&nbsp
<?=
     $this->Html->link(
    					    '<i class="fa fa-hourglass-start" aria-hidden="true"></i> Abrir',
							array('action' => 'espera',$rnc['RegistroNoConformidad']['id']),
    					    array('class' => 'btn btn-primary', 'escape'=>false)
						  ); 
?>
&nbsp
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Generar PDF</i>',
						array(
								'controller' => 'reclamaciones',
								'action' => 'pdf',
								$rnc['RegistroNoConformidad']['id'],
								'ext' => 'pdf'),
						array('class' => 'btn btn-primary','escape'=>false)
					 ); 
?>
        			
</div>
</div>
<br>
<br>
<div class="row" style="text-align:center;">
              
<?php
    if(isset($usuarios[$rnc['RegistroNoConformidad']['usuario_cierre']]))
	{
		$usuario_cierre = $usuarios[$rnc['RegistroNoConformidad']['usuario_cierre']];
    } 
	else 
	{
		$usuario_cierre = '--';
    }
    if(is_null($rnc['RegistroNoConformidad']['cierre']))
	{
		$causa = 'Sin cerrar aún';
    } 
	else 
	{
		$causa = $rnc['RegistroNoConformidad']['cierre'];
    }
	if(is_null($rnc['RegistroNoConformidad']['analisis_causa']))
	{
		$analisis = 'Sin análisis aún';
    } 
	else 
	{
		$analisis = $rnc['RegistroNoConformidad']['analisis_causa'];
    }
?>

<b>TIPO DE NO CONFORMIDAD:</b>

<?= $rnc['RegistroNoConformidad']['tipoNoconformidad']; ?>

<br>
<br>
<div class="row">
<!-- Primera tanda -->
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">DESCRIPCIÓN DE LA NO CONFORMIDAD</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $rnc['RegistroNoConformidad']['descripcion']; ?>
<br>
<b>
Apertura
</b>
                          
<?php
    $date = new DateTime($rnc['RegistroNoConformidad']['fecha_apertura']);
    echo $date->format('d-m-Y'); 
?>

<br>
<b>Detector de la N.C.</b>
                        
<?= $usuarios[$rnc['RegistroNoConformidad']['usuario_apertura']]; ?>

</td>
</tr>
</table>
</div>
<!-- Segunda tanda -->
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">TRATAMIENTO A APLICAR</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $rnc['RegistroNoConformidad']['tratamiento']; ?>

<br>
<b>Hay que separar o segregar la zona afectada</b>
                        
<?= $rnc['RegistroNoConformidad']['segregar']; ?>

<br>
<b>Medios a emplear:</b> 

<?= $rnc['RegistroNoConformidad']['medios']; ?>

<br>
<b>Plazo para su aplicación: </b>
                        
<?php
    $date = new DateTime($rnc['RegistroNoConformidad']['plazo_aplicacion']);
    echo $date->format('d-m-Y'); 
?> 

<br>
<b>Firma Responable Tratamiento </b>
                        
<?= $usuarios[$rnc['RegistroNoConformidad']['usuario_responsable']]; ?>
                      
</td>
</tr>
</table>
</div>
</div>
<br>
<br>
<div class="row">
<!-- Tercera tanda -->
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">ANÁLISIS DE LA CAUSA</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $analisis; ?>
                      
</td>
</tr>
</table>
</div>
<!-- Cuarta tanda -->
<div class="col-md-6">
<table style="width:100%; border-radius:4px; border: 1px solid #ddd;border-collapse: inherit; text-align:left;">
<thead>
<th style="text-align:center; padding:5px;">CIERRE DE LA NO CONFORMIDAD</th>
</thead>
<tr>
<td style="padding:10px;">
                        
<?= $causa; ?>

<br>
<b>Fecha de cierre</b>
                        
<?php
    $date = new DateTime($rnc['RegistroNoConformidad']['fecha_cierre']);
    echo $date->format('d-m-Y'); 
?>
                        
<br>
<b>Firma Responable Cierre</b> 

<?= $usuario_cierre; ?>

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
<!------------------------------------------------------------------ Cierra Resumen ---------------------------------------------------------------------------->


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
									'action' => 'addrnc',
									$rnc['RegistroNoConformidad']['id']),
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
<th>Recurso</th>
<th>Descripción</th>
<th>Tipo de gasto</th>
<th class="text-center">Opciones</th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($rnc['Recurso'] as $rc):
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
<div class="text-center">
<div class="btn-group btn-group-sm" >
                        
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Descargar</i>',
						array('controller'=>'Recursos','action' => 'downloadrec',$rc['id'],'rnc'),
						array('class' => 'btn btn-primary','escape'=>false)
					 ); 
?>
</div>
<div class="btn-group btn-group-sm" >
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('controller' => 'Recursos', 'action' => 'delete', $rc['id'],'rnc'),
							array('class' => 'btn btn-danger',
							'escape'=>false,
							'confirm' => '¿Estás seguro que quieres eliminar este recurso?'));
?>
</div>
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
	if(empty($rnc['Recurso']))
		echo "<strong style='color:#B40431'>No hay recursos en este RNC </strong>" 
?>
                    
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
<!--------------------------------------------------------------- Cierra el menu Recursos ---------------------------------------------------------------------->


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
							'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Acción</i>',
							array( 
									'controller' => 'acciones',
									'action' => 'addrnc',
									$rnc['RegistroNoConformidad']['id'], 
									'rnc'
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
<th class="text-center">Opciones</th>
</tr>
</thead>
      
<?php
	$a=0;
?>
<?php 
	foreach ($rnc['Accion'] as $rc):
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
                        array('controller'=>'acciones','action' => 'viewrnc',$rc['id']),
                        array('class' => 'btn btn-primary','escape'=>false)
					  ); 
?>
</div>
<div class="btn-group btn-group-sm" >
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
                            array('controller' => 'acciones', 'action' => 'delete', $rc['id']),
                            array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que quieres eliminar esta acción?'
								 )
						 );
?>
</div>
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
	if(empty($rnc['Accion']))
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
<!----------------------------------------------------- Cierra el menu Acciones -------------------------------------------------------------------------------->
    

<!-------------------------------------------------------------VOLVER-------------------------------------------------------------------------------------------> 
<div class="text-center">

<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array(
								'action' => 'indexrnc',
								'admin' => false
							 ),
						array('class' => 'btn btn-danger', 'escape' => false)
					 );
?>
    
</div> 
<!------------------------------------------------------------Cierra volver-------------------------------------------------------------------------------------> 	
</div>
</div>