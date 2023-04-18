<div class="well well-lg"><h1>Gestión de los Proveedores </h1></div>
<div class="row">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2">
        
<?= $this->Form->create('Proveedor');
?>

<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Selecciona una opción....">
    <option value="nombre">Nombre</option>
    <option value="descripcion">Descripción</option>
    <option value="cif">CIF</option>
    <option value="email">Email</option>
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
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Proveedor</i>',
						array(
								'action' => 'addproveedor'
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					); 
?>
      
</div>
<div class="col-lg-3">
          
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Listado Pdf</i>',
						array(
								'action' => 'pdf', 1,
								'ext' => 'pdf'
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
<th>Nombre</th>
<th>Estado</th>
<th>Descripción</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($list as $pr): 
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

<?= $this->Html->link(	$pr['Proveedor']['id'], 
						array(	'action' => 'view', 
								$pr['Proveedor']['id']
							),
						array(	'class' => 'btn btn-success',
								'escape'=>false
							)
					);
?>

</td>
<td><?= $pr['Proveedor']['nombre']; ?></td>
<td><?= $pr['Proveedor']['estado']; ?></td>
<td><?= $pr['Proveedor']['descripcion']; ?></td>
<td>
              
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('action' => 'delete', $pr['Proveedor']['id']
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
	unset($pr); 
?>
    
</table>
</div>
</div>