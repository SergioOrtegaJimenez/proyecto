<div class="well well-lg"><h1>Gestión de los Pedidos </h1></div>   
<div class="row">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2">
        
<?= $this->Form->create('Pedido');
?>

<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Seleccione una opción....">
	<option value="proveedor">Proveedor</option>
    <option value="unidadgasto">Unidad de Gasto</option>
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
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Pedido</i>',
						array(
								'action' => 'addpedido'
							),
						array(
								'class' => 'btn btn-primary','escape'=>false,
							)
					); 
?>
  
</div>
</div>
<br></br>
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Fecha de Solicitud</th>
<th>Fecha de Llegada</th>
<th>Proveedor</th>
<th>Unidad de Gasto</th>
<th>Materiales</th>
<th>Opciones</th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($list as $pd): 
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
						$pd['Pedido']['id'],
						array('action' => 'view', $pd['Pedido']['id']
							),
						array('class' => 'btn btn-success',
							  'escape'=>false,
							  )
					);
?>
  
</td>
            
<?php
	if (!empty($pd['Pedido']['fecha_solicitud']))
	{
?>
            
<td><?= $pd['Pedido']['fecha_solicitud']; ?></td>

<?php 
	} 
	else 
	{ 
?>
             
<td>No ha sido realizado</td>
                       
<?php 
	}  
?>

<?php
	if (isset($pd['Pedido']['fecha_llegada']))
	{
?>
            
<td><?= $pd['Pedido']['fecha_llegada']; ?></td>

<?php 
	} 
	else 
	{ 
?>
             
<td>No ha sido entregado</td>
                       
<?php 
	}  
?>
 
<td>

<?php
	if (isset($pd['Proveedor']['nombre']) AND strlen($pd['Proveedor']['nombre'])>0)
	{
		echo $pd['Proveedor']['nombre']. " (" .$pd['Proveedor']['estado']. ")"; 
	} 
	else 
	{ 
		echo "Proveedor eliminado";
	}  
?>

</td>
<td><?= $pd['Unidad_gasto']['num_unidad']; ?></td>
<td>
              
<?= $this->Html->link(
						'<i class="fa fa-search"></i>&nbsp; Ver',
						array('action' => 'materialespedido', $pd['Pedido']['id'],'menu2',
							),
						array('class' => 'btn btn-warning',
							  'escape'=>false,
							  )
					);
?>

</td>
<td>

<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array('action' => 'delete', $pd['Pedido']['id']
								),
							array('class' => 'btn btn-danger',
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
	unset($pd); 
?>
  
</table>
</div>
</div>