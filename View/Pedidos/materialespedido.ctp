<div class="panel panel-primary">
<div class="panel-heading"><h3>Materiales del pedido Nº <?php echo $pedido['Pedido']['id']?></h3></div>
<div class="panel-body">

<?php
    $menu2 = 'active';
    $menu22 = 'in active';
    $botones = 'btn btn-primary';
    $botones2 = 'hide';
?>

<div class="tab-content">
<div id="menu2" class="tab-pane fade <?= $menu22; ?>">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
          
<?php
    if ($pedido['Pedido']['finalizado'] != 'S')
	{
		echo $this->Html->link(
								'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Material</i>',
								array('action' => 'addmaterial',$pedido['Pedido']['id']
									),
								array(
										'class' => 'btn btn-primary','escape'=>false,
									)
							);
    } 
?>

</div>
</div>
<br>
</br>
<table class="table">
<thead>
<tr>
<th>Nombre</th>
<th>Cod. Referencia</th>
<th>Unidades</th>
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
<td><?= $this->Form->postLink(
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
		echo "<strong style='color:#B40431'>No hay materiales en este pedido </strong>" 
?>

</div>
</div>
</div>
</div>
<div class="text-center">
      
<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array(
								'action' => 'iniciopedido',
								'admin' => false
							),
						array(
								'class' => 'btn btn-danger', 'escape' => false,
							)
					);
?>

</div>
</div>