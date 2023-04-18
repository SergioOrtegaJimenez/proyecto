<div class="panel panel-primary">
<div class="panel-heading"><h3>Información de la empresa: <?php echo $empresa['Empresa']['nombre']?></h3></div>
<div class="panel-body">

<?php
    $menu1 = 'active';
    $menu11 = 'in active';
    $menu2 = '';
    $menu22 = '';
    $menu3 = '';
    $menu33 = '';
    $botones = 'btn btn-primary';
    $botones2 = 'hide';
	if (isset($menu))
	{
        if ($menu == 'menu2')
		{
			$menu2 = 'active';
			$menu22 = 'in active';
			$menu1 = '';
			$menu11 = '';
        }
        if ($menu == 'menu3')
		{
			$menu3 = 'active';
			$menu33 = 'in active';
			$menu1 = '';
			$menu11 = '';
        }
    }
?>

<ul class="nav nav-pills">
<li role="presentation" class="<?= $menu1; ?>"><a data-toggle="tab"  href="#menu1">Resumen</a></li>
<li role="presentation"><a data-toggle="tab"  href="#menu2">Contratos</a></li>
<li role="presentation" class="<?= $menu3; ?>"><a data-toggle="tab"  href="#menu3">Recursos</a></li>
</ul>
<div class="tab-content">
<div id="menu1" class="tab-pane fade <?= $menu11; ?>">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">

<?php
	echo   $this->Html->link(
								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Empresa',
								array('action' => 'edit',$empresa['Empresa']['id']
									),
								array(
										'class' => $botones,'escape'=>false
									)
							);
?>

</div>
</div>
<div class="row">
<div class="col-md-6">
<h3> Nombre: </h3><p>
		
<?= $empresa['Empresa']['nombre']; 
?>
	
</p>
<h3>Contacto: </h3><p>
		
<?= $empresa['Empresa']['contacto']; 
?>
	
</p>
<h3> Ver: </h3><p>
		
<?= $empresa['Empresa']['contrato']; 
?>
	
</p>
</div>
</div>
</div>
</div>
</div>
<div id="menu2" class="tab-pane fade <?= $menu22; ?>">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-lg-2">

<?= $this->Form->create('Empresa');
?>
                
<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Selecciona una opción...">
    <option value="nombre">Nombre</option>
    <option value="contacto">Descripción</option>
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
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Empresa</i>',
						array(
								'action' => 'add'
							),
						array(
								'class' => 'btn btn-primary','escape'=>false
							)
					); 
?>
 
</div>
</div>
<br></br>
<table class="table">
<thead>
<tr>
<th>Clase de documento</th>
<th>Nº Referencia</th>
<th>Nombre</th>
<th>Opciones</th>
</tr>
</thead>
        
<?php 
	$a=0;
?>
<?php 
	foreach ($pedido['MaterialPedido'] as $mt):
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
<td><?= $mt['Material']['nombre']; ?></td>
<td><?= $mt['Material']['cod_referencia']; ?></td>
<td><?= $mt['unidades']; ?></td>
<td>

<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array(	'action' => 'deletematerial',
									$pedido['Pedido']['id'],
									$mt['Material']['id']
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
	$a = $a + 1;
    endforeach;
    unset($mt); 
?>

</table>
<div class="text-center">
          
<?php 
	if(empty($pedido['MaterialPedido']))
        echo "<strong style='color:#B40431'>No hay contratos disponibles </strong>" 
?>

</div>
</div>
</div>
</div>
<div id="menu3" class="tab-pane fade <?= $menu33; ?>">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">

<?php
	echo   $this->Html->link(
								'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Recurso</i>',
								array( 	'controller' => 'recursos',
										'action' => 'add',
										$pedido['Pedido']['id']
									),
								array(
										'class' => 'btn btn-primary','escape'=>false
									)
							);
?>
      
</div>
</div>
<br></br>
<table class="table">
<thead>
<tr>
<th>Recurso</th>
<th>Descripción</th>
<th>Tipo de gasto</th>
<th>Opciones</th>
</tr>
</thead>
  
<?php 
	$a=0;
?>
<?php 
	foreach ($pedido['Recurso'] as $rc):
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
<td><?= $rc['id']; ?></td>
<td><?= $rc['descripcion']; ?></td>
<td><?= $rc['tipo_archivo']; ?></td>
<td>
<div class="text-right">
<div class="btn-group btn-group-sm" >
                    
<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Descargar</i>',
						array(	'controller'=>'Recursos',
								'action' => 'downloadrec',$rc['id'],'pedidos'
							),
						array(
								'class' => 'btn btn-primary','escape'=>false
							)
					); 
?>
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>&nbsp; Eliminar',
							array(	'controller' => 'Recursos', 
									'action' => 'delete', $rc['id'],'pedidos'
								),
							array(	'class' => 'btn btn-danger',
									'escape'=>false,
									'confirm' => '¿Estás seguro que quieres eliminar este recurso?'
								)
						);
?>

</div></div></td>
</tr>
</tbody>
  
<?php
    $a=$a+1;
    endforeach;
    unset($rc); 
?>
      
</table>
<div class="text-center">
        
<?php 
	if(empty($pedido['Recurso']))
        echo "<strong style='color:#B40431'>No hay recursos en este pedido </strong>" 
?>
      
</div>
</div>
</div>
</div> 
<!-- Cierra el menu 3 -->
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
</div>