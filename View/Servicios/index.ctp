<div class="well well-lg"><h1>Gestión de los Servicios </h1></div>
<div class="row">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2">
        
<?= $this->Form->create('Servicio');
?>
                
<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Selecciona una opción...">
    <option value="nombre">Nombre</option>
    <option value="descripcion">Descripción</option>
</select>
</div>
<div class="col-lg-4">
<input type="text" class="form-control" name="keyword" placeholder="Escribe los criterios de búsqueda">
</div>
<div class="col-lg-2">
<button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>
<div class="col-lg-4">
        
<?= $this->Html->link(
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Servicio</i>',
						array(
								'action' => 'addServicio'
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
<th>ID</th>
<th>Nombre del Servicio</th>
<th>Descripción</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($list as $sr): 
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
<td><?= $this->Html->link(	$sr['Servicio']['id'],
							array(	'action' => 'edit', 
									$sr['Servicio']['id']
								),
							array(	'class' => 'btn btn-success',
									'escape'=>false
								)
						);
?>

</td>
<td><?= $sr['Servicio']['nombre'];?></td>
<td><?= $sr['Servicio']['descripcion']; ?></td>
<td>
                
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array(	'action' => 'delete', 
									$sr['Servicio']['id']
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
	unset($sr); 
?>
    
</table>
</div>
</div>