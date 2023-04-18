<div class="well well-lg"><h1>Gestión de los Materiales </h1></div>
<div class="row">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2">

<?= $this->Form->create('Material');
?>

<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
    <option value="nombre">Nombre</option>
    <option value="descripcion">Descripción</option>
    <option value="proveedor">Proveedor</option>
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
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Materiales</i>',
						array(
								'action' => 'addmaterial'
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
<th>Nombre de Proveedor</th>
<th></th>
</tr>
</thead>
      
<?php
	$a=0;
?>
<?php 
	foreach ($list as $mt): 
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
<td><?= $this->Html->link($mt['Material']['id'], array(	'action' => 'edit', 
														$mt['Material']['id']
													), 
												array(	'class' => 'btn btn-success',
														'escape'=>false
													)
						);
?>

</td>
<td><?= $mt['Material']['nombre'];?></td>
<td><?= $mt['Material']['descripcion']; ?></td>
<td>

<?php
	if (isset($mt['Proveedor']['nombre']) AND strlen($mt['Proveedor']['nombre'])>0)
	{
		echo $mt['Proveedor']['nombre']. " (" .$mt['Proveedor']['estado']. ")"; 
	} 
	else 
	{ 
		echo "Proveedor eliminado";
	}  
?>

</td>
<td>
                
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('action' => 'delete', $mt['Material']['id']
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
	unset($mt); 
?>

</table>
</div>
</div>