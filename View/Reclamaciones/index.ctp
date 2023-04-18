<div class="well well-lg"><h1>Gestión de las Reclamaciones </h1></div>
<div class="row">
<div class="container-fluid">
<div class="col-md-8 col-md-offset-2">
<div class="text-center">
      
<?= $this->Html->link(
						'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Reclamación</i>',
						array(
								'action' => 'add'
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					); 
?>
    
</div>
</div>
<br>
<br>
<br>
<table class="table table-hover">
<thead class="thead-default">
<tr>
<th>Cód. Reclamación</th>
<th>Descripción</th>
<th>Fecha de apertura</th>
<th>Proveedor</th>
<th>Tipo de Reclamación</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($reclamacion as $re): 
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
<td style="width:200px;">
							
<?= $this->Html->link(	$re['Reclamacion']['codigo_reclamacion'], 
						array(	'action' => 'viewre', 
								$re['Reclamacion']['id']
							), 
						array(	'class' => 'btn btn-success',
								'escape'=>false
							)
					);
?>
						
</td>
<td><?= $re['Reclamacion']['descripcion']; ?></td>
<td>
							
<?php
	$date = date_create($re['Reclamacion']['fecha_insercion']);
	echo date_format($date, 'Y-m-d');
?>

</td>
<td><?= $re['Proveedor']['nombre']; ?></td>
<td><?= $re['Reclamacion']['tipo_reclamacion']; ?></td>
<td style="width:100px;">
							
<?php 
	if (AuthComponent::user('id') == $re['Reclamacion']['usuario_responsable'] || AuthComponent::user('rol') == 'Administrador' || AuthComponent::user('rol') == 'Calidad') 
		echo $this->Form->postLink(
									'<i class="fa fa-trash"></i>&nbsp; Eliminar',
									array('action' => 'delete', $re['Reclamacion']['id']
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
	$a=$a+1;
?>
<?php 
	endforeach; 
?>
<?php 
	unset($re); 
?>
    
</table>
<div class="text-center">
      
<?php 
	if(empty($reclamacion))
       echo "<strong style='color:#B40431'>No hay resultados que mostrar</strong>" 
?>

</div>
</div>
</div>