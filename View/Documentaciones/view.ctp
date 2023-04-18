<div class="panel panel-primary">
<div class="panel-heading"><h3>Documentación: <?= $documentacion['Documentacion']['nombre']?></h3></div>
<div class="panel-body">
<div class="well well-lg"><h4>Descripción: <?= $documentacion['Documentacion']['descripcion']?></h4></div>
<div class="text-center">
  
<?= $this->Html->Link(
						'<i class="fa fa-plus-circle"> Añadir archivo</i>',
						array(
								'controller' => 'documentaciones',
								'action' => 'archivoview',
								'admin' => false,
								$documentacion['Documentacion']['id']
							),
						array(
								'class' => 'btn btn-primary','escape'=>false
							)
					);
?>

</div>
<br>
<table class="table table-hover">
<thead>
<tr>
<th class="col-md-1">Id</th>
<th class="col-md-4">Nombre</th>
<th class="col-md-4">Descripción</th>
<th></th>
</tr>
</thead>

<?php 
	$a=0;
	$reverso = array_reverse($documentacion['Documento'])
?>
<?php 
	foreach ($reverso as $ls): 
?>
<?php  
	if ($a%2 == 0)
        $tabla='info';
    else 
	{
        $tabla='';
    }
?>
<?php
	if($a == 0)
    {
?>
           	
<tbody>
<tr class="<?= $tabla?>">
<td><?= $ls['id']; ?></td>
<td><?= $ls['nombre']; ?></td>
<td><?= $ls['descripcion']; ?></td>
<td style="min-width:200px">
<div class="text-right">
<div class="btn-group btn-group-sm" >
                     
<?= $this->Html->link(
						'<i class="fa fa-download"></i>&nbsp; Descargar',
						array(
								'action' => 'download',
								'admin' => false,
								$ls['id']),
								array(
										'class' => 'btn btn-primary','escape'=>false
									)
                    )
?>
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('action' => 'eliminar', $ls['id'],$documentacion['Documentacion']['id']
								),
							array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que quieres eliminar el documento con nombre '.$documentacion['Documentacion']['nombre'].'?'
								)
						);
?>
                   
</div>
</div>
</td>
</tr>
</tbody>
</table>
<table class="table table-hover">
<thead>
<tr>
<th class="col-md-1">Id</th>
<th class="col-md-4">Nombre</th>
<th class="col-md-4">Descripción</th>
<th></th>
</tr>
</thead>
        
<?php
    }
    else
    {
?>

<tbody>
<tr class="<?= $tabla?>">
<td><?= $ls['id']; ?></td>
<td><?= $ls['nombre']; ?></td>
<td><?= $ls['descripcion']; ?></td>
<td style="min-width:200px">
<div class="text-right">
<div class="btn-group btn-group-sm" >
                     
<?= $this->Html->link(
						'<i class="fa fa-download"></i>&nbsp; Descargar',
						array(
								'action' => 'download',
								'admin' => false,
								$ls['id']
							),
						array(
								'class' => 'btn btn-primary','escape'=>false
							)
                    )
?>
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('action' => 'eliminar', $ls['id'],$documentacion['Documentacion']['id']),
							array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que quieres eliminar el documento con nombre '.$documentacion['Documentacion']['nombre'].'?'
								)
						);
?>
                   
</div>
</div>
</td>
</tr>
        
<?php
    }
?>
<?php 
	$a=$a+1;
?>
<?php 
	endforeach; 
?>
<?php 
	unset($dc); 
?>
      
</tbody>
</table>
<div class="text-center">
      
<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array(
								'action' => 'index',
								'admin' => false
							),
						array(
								'class' => 'btn btn-danger', 'escape' => false
							)
					);
?>
  
</div>