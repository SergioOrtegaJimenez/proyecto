<div class="panel panel-primary">
<div class="panel-heading"><h3>Información de la empresa: <?php echo $empresa['Empresa']['nombre']?></h3>
</div>
<div class="panel-body">


<!-------------------------------------------------------RESUMEN------------------------------------------------------------------------------------------------>
<div class="panel-body">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
    Resumen
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<div class="tab-content">
<div id="menu1" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">

<?php
	echo $this->Html->link(
							'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Empresa',
							array('action' => 'edit',$empresa['Empresa']['id']),
							array('class' => $botones,'escape'=>false)
						  );
?>

</div>
</div>
<div class="row">
<div class="col-md-6">
<h3> Nombre: </h3><p>
		
<?= $empresa['Empresa']['nombre']; ?>
	
</p>
<h3>Contacto: </h3><p>
		
<?= $empresa['Empresa']['contacto']; ?>

</p>
<h3> Contrato: </h3><p>
		
<?= $empresa['Empresa']['contrato']; ?>

</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



<!-----------------------------------------------------------RECURSOS------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	Recursos
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<div id="menu2" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
                    
<?php
	echo $this->Html->link(
							'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Recurso</i>',
							array( 	'controller' => 'recursos',
									'action' => 'addemp',
									$empresa['Empresa']['id']
								 ),
							array('class' => 'btn btn-primary','escape'=>false)
						  );
?>

</div>
</div>
<br>
</br>
<table class="table">
<thead>
<tr>
<th>Recurso</th>
<th>Descripción</th>
<th>Tipo de gasto</th>
<th class="text-center">Opciones</th>
</tr>
</thead>
   
<?php 
	$a=0;
?>
<?php 
	foreach ($empresa['Recurso'] as $ep):
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
<td><?= $ep['id']; ?></td>
<td><?= $ep['descripcion']; ?></td>
<td><?= $ep['tipo_archivo']; ?></td>
<td>
<div class="text-center">
<div class="btn-group btn-group-sm" >

<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Descargar</i>',
						array('controller'=>'Recursos','action' => 'downloadrec',$ep['id'],'empresa'),
						array('class' => 'btn btn-primary','escape'=>false)
					 ); 
?>

</div>
<div class="btn-group btn-group-sm" >

<?= $this->Form->postLink(
                          '<i class="fa fa-trash"></i>&nbsp; Eliminar',
                          array('controller' => 'Recursos', 'action' => 'delete', $ep['id'],'empresa'),
                          array('class' => 'btn btn-danger',
                          'escape'=>false,
                          'confirm' => '¿Estás seguro que quieres eliminar este recurso?')
						 );
?>

</div>
</div>
</td>
</tr>
</tbody>

<?php
	$a=$a+1;
    endforeach;
    unset($ep); 
?>

</table>
<div class="text-center">
            
<?php 
	if(empty($empresa['Recurso']))
		echo "<strong style='color:#B40431'>No hay recursos en esta empresa </strong>" 
?>

</div>
</div>
</div>
</div> 
</div>
</div>
</div>



<!-------------------------------------------------------CONTRATOS---------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
	Contratos
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<div id="menu3" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-lg-2">
        
<?= $this->Form->create('Empresa');?>
                
<!--<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Selecciona una opción...">
    <option value="nombre">Nombre</option>
    <option value="contacto">Descripción</option>
</select>-->
</div>
<div class="col-lg-4">
<!--<input type="text" class="form-control" name="keyword" placeholder="Escribe los criterios de búsqueda">-->
</div>
<div class="col-lg-2">
<!--<button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>-->
</form>
</div>
<div class="col-lg-4">

<?= $this->Html->link(
						'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir Contrato</i>',
						array('action' => 'addcontrato',$empresa['Empresa']['id']),
						array('class' => 'btn btn-primary','escape'=>false)
					 ); 
?>

</div>
</div>
<br>
</br>
<table class="table">
<thead>
<tr>
<!--<th>Clase de documento</th>-->
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
<!--<td><?= $mt['Material']['nombre']; ?></td>-->
<td><?= $mt['Material']['cod_referencia']; ?></td>
<td><?= $mt['unidades']; ?></td>
<td><?= $this->Form->postLink(
								'<i class="fa fa-trash"></i>&nbsp; Eliminar',
								array('action' => 'deletematerial', $pedido['Pedido']['id'], $mt['Material']['id']), array(	'class' => 'btn btn-danger',
																															'escape'=>false,
																															'confirm' => '¿Estás seguro?')
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
</div>
</div>
</div>
</div>
</div> 



<!-------------------------------------------------------BOTON VOLVER------------------------------------------------------------------------------------------->  
<div class="text-center">
      
<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array('action' => 'index', 'admin' => false),
						array('class' => 'btn btn-danger', 'escape' => false)
				    );
?>

</div>
</div>
</div>