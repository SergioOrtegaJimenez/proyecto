<h1>Listado de tests</h1>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="text-center">
      
<?= $this->Html->Link(
						'Nuevo test',
						array(
								'controller' => 'tests',
								'action' => 'crear'
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false,
							)
					); 
?>
    
</div>
<br>
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Numero de preguntas</th>
<th>Activo</th>
<th></th>
</tr>
</thead>
      
<?php
	$a=0;
?>
<?php 
	foreach ($tests as $test): 
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
<?php
    if($test['Test']['activo'] == 1) 
	{
        $habilitado = 'Sí';
        $hab = $tabla;
    } 
	else 
	{
        $habilitado = 'No';
        $hab = 'danger';
    }
?>

<tr class="<?= $tabla?>">
<td><?= $test['Test']['id']; ?></td>
<td><?= $test['Test']['nombre']; ?></td>
<td><?= $test['Test']['numPregunta']; ?></td>
<td><?= $habilitado; ?></td>
<td>
<div class="text-right">
<div class="btn-group btn-group-sm" >
                  
<?= $this->Html->Link(
						'Ver test',
						array(
								'controller' => 'tests',
								'action' => 'ver', 
								$test['Test']['id']
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false,
							)
					); 
?>
<?php 
	echo $this->Html->link(	'Editar',
							array(	'controller' => 'tests',
									'action' => 'editar', 
									$test['Test']['id']
								),
							array(
									'class' => 'btn btn-warning',
									'escape'=>false,
								)
						); 
?>
<?php 
	echo $this->Form->postLink(
								'Eliminar',
								array(	'controller' => 'tests', 
										'action' => 'eliminar', 
										$test['Test']['id']
									),
								array(	'class' => 'btn btn-danger',
										'escape'=>false,
										'confirm' => '¿Estás seguro que quieres eliminar el test con nombre '.$test['Test']['nombre'].'?'
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
?>
<?php 
	endforeach; 
?>
<?php 
	unset($test); 
?>
    
</table>
</div>
</div>