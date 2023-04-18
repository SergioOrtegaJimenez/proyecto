<div class="well well-lg"><h1>Listado de trabajadores</h1></div>
<div class="row">
<div class="col-md-12">
<div class="text-center">
      
<?= $this->Html->Link(
						'<i class="fa fa-plus-circle"> Añadir trabajador</i>',
						array(
								'controller' => 'docadicionales',
								'action' => 'crear2',
								'admin' => false
							),
						array(
								'class' => 'btn btn-primary','escape'=>false,
							)
					); 
?>
    
</div>
<br>
<table class="table">
<thead>
<tr>
<th>Nombre y apellidos</th>
<th>Puesto</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php
    foreach ($eventos as $evento): 
?>

<tbody>
        
<?php
    $ruta = $this->base . '/docadicionales/editar2/' . $evento['Docadicional']['id'].'/trabajador';
    if ($a%2==0)
        $tabla='info';
    else 
	{
        $tabla='';
    }
?>
        
<tr class="<?= $tabla?>">
<td onclick="window.document.location='<?= $ruta ?>';"><?= $evento['Docadicional']['nombre']; ?></td>
<td onclick="window.document.location='<?= $ruta ?>';"><?= $evento['Docadicional']['descripcion']; ?></td>
<td style="min-width:200px">
<div class="text-right">
<div class="btn-group btn-group-sm" >

<?= $this->Html->link(
						'<i class="fa fa-download"></i>&nbsp; Descargar',
						array(
								'action' => 'download',
								'admin' => false,
								$evento['Docadicional']['id']
							),
						array(
								'class' => 'btn btn-primary','escape'=>false,
							)
					)
?>
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array(	'controller' => 'docadicionales', 
									'action' => 'eliminar', $evento['Docadicional']['id'],'trabajador'
								),
							array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que quieres eliminar el evento con descripcion '.$evento['Docadicional']['descripcion'].'?'
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
	unset($evento); 
?>
    
</table>
</div>
</div>