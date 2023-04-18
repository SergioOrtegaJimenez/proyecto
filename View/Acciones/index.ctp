<div class="well well-lg"><h1>Registro de Acciones </h1></div>
<div class="row">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2">

<?= $this->Form->create('Accion');
?>

<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Selecciona">
    <option value="rnc">No conformidad</option>
    <option value="reclamacion">Reclamación</option>
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
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Acción</i>',
						array('action' => 'add'),
						array('class' => 'btn btn-primary','escape'=>false)
					); 
?>
    
</div>
</div>
<br>
<br>
<table class="table table-hover">
<thead class="thead-default">
<tr>
<th>Nº de Acción</th>
<th>Descripción</th>
<th>Fecha de apertura</th>
<th>Tipo de acción</th>
<th>Usuario responsable</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($accion as $ac): 
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

<?= $this->Html->link($ac['Accion']['id'], 	array(	'action' => 'view', 
													$ac['Accion']['id']
												), 
											array(	'class' => 'btn btn-success',
													'escape'=>false
												)
					);
?>

<td ><?= $ac['Accion']['descripcion']; ?></td>
<td>

<?php
	$date = new DateTime($ac['Accion']['fecha_accion']);
	echo $date->format('Y-m-d');
?>

</td>
<td><?= $ac['Accion']['tipo_accion']; ?></td>
<td><?= $usuarios[$ac['Accion']['usuario_responsable']]; ?></td>
<td>

<?php 
	if (AuthComponent::user('id') == $ac['Accion']['usuario_responsable'] || AuthComponent::user('rol') == 'Administrador' || AuthComponent::user('rol') == 'Calidad') 
		echo $this->Form->postLink(
									'<i class="fa fa-trash"></i>Eliminar',
									array('action' => 'delete', $ac['Accion']['id']),
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
	unset($ac); 
?>
</table>
</div>
</div>