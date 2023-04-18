<div class="well well-lg"><h1>Gestión de la Unidad de Gasto </h1></div>   
<div class="row">
<div class="container-fluid">
<div class="col-md-8 col-md-offset-2">
<div class="text-center">

<?= $this->Html->link(
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Unidad de Gasto</i>',
						array(
								'action' => 'addunidad'
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
<table class="table table-hover">
<thead class="thead-default">
<tr>
<th>Núm. Unidad</th>
<th>Descripción</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($unidadgasto as $ug): 
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
<td>
              
<?= $this->Html->link(
						$ug['Unidad_gasto']['num_unidad'],
						array(	'action' => 'edit', 
								$ug['Unidad_gasto']['id']
							),
						array(	'class' => 'btn btn-success',
								'escape'=>false
							)
					);
?>
  
</td>
<td><?= $ug['Unidad_gasto']['descripcion']; ?></td>
<td>
                
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array(	'action' => 'delete', 
									$ug['Unidad_gasto']['id']
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
	unset($ug); 
?>
    
</table>
</div>
</div>