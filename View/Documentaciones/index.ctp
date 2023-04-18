<div class="well well-lg"><h1>Gestión de la Documentación </h1></div>
<div class="row">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2">
        
<?= $this->Form->create('Documentacion');
?>
                
<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
    <option value="nombre">Nombre</option>
    <option value="descripcion">Descripción</option>
</select>
</div>
<div class="col-lg-3">
<input type="text" class="form-control" name="keyword" placeholder="Escribe los criterios de búsqueda">
</div>
<div class="col-lg-1">
<button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>
<div class="col-lg-3">
      
<?= $this->Html->link(
						'<i class="fa fa-plus-square-o" aria-hidden="true">&nbsp; Añadir Documentación</i>',
						array(
								'action' => 'adddoc'
							),
						array(
								'class' => 'btn btn-primary','escape'=>false
							)
					); 
?>
    
</div>
<div class="col-lg-3">
        
<?= $this->Html->link(
						'<i class="fa fa-file-o" aria-hidden="true">&nbsp; Añadir Archivo</i>',
						array(
								'action' => 'archivo'
							),
						array(
								'class' => 'btn btn-primary','escape'=>false
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
<th>Nombre</th>
<th>Descripción</th>
<th class="text-center">Opciones</th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($list as $dc): 
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

<?= $this->Html->link(	$dc['Documentacion']['id'], 
						array(	'action' => 'view', 
								$dc['Documentacion']['id']
							), 
						array(	'class' => 'btn btn-success',
								'escape'=>false
							)
					);
?>

</td>
<td><?= $dc['Documentacion']['nombre'];?></td>
<td><?= $dc['Documentacion']['descripcion']; ?></td>
<td style="min-width:200px">
<div class="text-right">
<div class="btn-group btn-group-sm" >
                 
<?= $this->Html->link(
						'<i class="fa fa-pencil-square-o"></i>&nbsp; Editar',
						array(
								'action' => 'edit',
								'admin' => false,
								$dc['Documentacion']['id']
							),
						array(
								'class' => 'btn btn-warning',
								'escape'=>false
							)
					)
?>

</div>
<div class="btn-group btn-group-sm" >
                 
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('action' => 'delete', $dc['Documentacion']['id']
								),
							array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que deseas eliminar la documentación con nombre '.$dc['Documentacion']['nombre'].'?'
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
	unset($dc); 
?>
    
</table>
</div>
</div>