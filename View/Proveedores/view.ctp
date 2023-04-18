<div class="panel panel-primary">
<div class="panel-heading"><h3>Proveedor: <?php echo $proveedor['Proveedor']['nombre']?></h3>
</div>
<div class="panel-body">
<div class="well well-lg"><h4><?php echo $proveedor['Proveedor']['descripcion']?></h4>
</div>



<!-------------------------------------------------------DATOS ADMINISTRATIVOS---------------------------------------------------------------------------------->
<div class="panel-body">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
    Datos Administrativos
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<div class="tab-content">
<div class="tab-content">
<div id="menu1" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
                        
<?php
	echo   $this->Html->link(
								'<i class="fa fa-plus-square-o" aria-hidden="true"> Editar Proveedor</i>',
								array(	'action' => 'edit',
										$proveedor['Proveedor']['id']
									),
								array(
										'class' => 'btn btn-primary',
										'escape'=>false
									)
							);
?>

</div>
</div>
<div class="row">
<div class="col-md-6">
<h4>Teléfono:</h4> <h5><?php echo $proveedor['Proveedor']['telefono']?></h5>
<br><h4>Teléfono alternativo:</h4> <h5><?php echo $proveedor['Proveedor']['telefono2']?></h5>
<br><h4>Fax:</h4> <h5> <?php echo $proveedor['Proveedor']['fax']?></h5>
<br><h4>E-mail:</h4> <h5> <?php echo $proveedor['Proveedor']['email']?></h5>
</div>
<div class="col-md-6">
<h4>Certificación:</h4> <h5> 

<?= $this->Html->link(
						'<i class="fa fa-download" aria-hidden="true"></i> Descargar</i>',
						array(	'action' => 'downloadcertificacion',
								$proveedor['Proveedor']['id']
							),
						array(
								'class' => 'btn btn-primary',
								'escape'=>false
							)
					); 
?> 

</h5>
<br><h4>CIF:</h4> <h5> <?php echo $proveedor['Proveedor']['cif']?></h5>
<br><h4>Cód. Cliente:</h4> <h5> <?php echo $proveedor['Proveedor']['codigo_cliente']?></h5>
<br><h4>Estado:</h4> <h5> <?php echo $proveedor['Proveedor']['estado']?></h5>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------
<h4>Servicio:</h4>
<h5>
				
<?php 
	echo $proveedor['ServicioProveedor'][0]['Servicio']['nombre'];
	?> 
				
</h5>
---------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-------------------------------------------------------CALIDAD------------------------------------------------------------------------------------------------>
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	Calidad
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
    echo   $this->Html->link(
								'<i class="fa fa-plus-square-o" aria-hidden="true"> Actualizar CC</i>',
								array(	'action' => 'actualizarcc',
										$proveedor['Proveedor']['id']
									),
								array(
										'class' => 'btn btn-primary',
										'escape'=>false
									)
							);
?>

</div>
</div>
<div class="row">
<div class="col-md-12">
<h4>Tipo de Criterio: </h4><h5><?php echo $criterio[$proveedor['Proveedor']['tipo_criterio']]?></h5>
<br><h4>Tipo de Homologación: </h4><h5><?php echo $homologaciones[$proveedor['Proveedor']['tipo_homologacion']]?></h5>
<br><h4>Coeficiente de Calidad: </h4><h5><?php echo $proveedor['Proveedor']['coeficiente_calidad']?></h5>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-------------------------------------------------------MATERIALES--------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	Materiales
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<div id="menu3" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<br></br>
<table class="table">
<thead>
<tr>
<th>Nombre</th>
<th>Cod. Referencia</th>
</tr>
</thead>

<?php 
	$a=0;
?>
<?php 
	foreach ($material as $mt):
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
</tr>
</tbody>

<?php
	$a=$a+1;
	endforeach;
    unset($mt); 
?>
    
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-------------------------------------------------------RECLAMACIÓN-------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
	Reclamación
</a>
</h4>
</div>
<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
<div class="panel-body">
<div id="menu4" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
          
<?php
    echo   $this->Html->link(
								'<i class="fa fa-plus-square-o" aria-hidden="true"> Generar Reclamación</i>',
								array(	'controller' => 'proveedores',
										'action' => 'addreclam',
										$proveedor['Proveedor']['id']
									),
								array(
										'class' => 'btn btn-primary','escape'=>false
									)
							);
?>

</div>
</div>
<div class="row">
<br></br>
<table class="table">
<thead>
<tr>
<th>Cod.Reclamación</th>
<th>Descripción</th>
</tr>
</thead>

<?php 
	$a=0;
?>
<?php 
	foreach ($reclamacion as $recpro):
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
<td><?= $recpro['Reclamacion']['codigo_reclamacion']; ?></td>
<td><?= $recpro['Reclamacion']['descripcion']; ?></td>
</tr>
</tbody>

<?php
  	$a=$a+1;
	endforeach;
    unset($recpro); 
?>
   
 </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-------------------------------------------------------REGISTRO DE NO CONFORMIDAD----------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
	No Conformidad
</a>
</h4>
</div>
<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
<div class="panel-body">
<div id="menu5" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
          
<?php
    echo   $this->Html->link(
								'<i class="fa fa-plus-square-o" aria-hidden="true"> Generar No Conformidad</i>',
								array(	'controller' => 'proveedores',
										'action' => 'rnc',
										$proveedor['Proveedor']['id']
									),
								array(
										'class' => 'btn btn-primary','escape'=>false
									)
							);
?>

</div>
</div>
<div class="row">
<br></br>
<table class="table">
<thead>
<tr>
<th>Descripción</th>
<th>Nº RNC</th>
</tr>
</thead>

<?php 
	$a=0;
?>
<?php 
	foreach ($noconf as $nono):
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
<td><?= $nono['RegistroNoConformidad']['descripcion']; ?></td>
<td><?= $nono['RegistroNoConformidad']['id']; ?></td>
</tr>
</tbody>

<?php
	$a=$a+1;
	endforeach;
    unset($nono); 
?>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-------------------------------------------------------HISTÓRICO---------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
	Histórico
</a>
</h4>
</div>
<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
<div class="panel-body">
<div id="menu6" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<br></br>
<table class="table">
<thead>
<tr>
<th>Fecha</th>
<th>Descripción</th>
<th>Usuario</th>
</tr>
</thead>
      
<?php 
	$a=0;
    $i=0;
?>
<?php 
	foreach ($hist as $hs):
?>

<tbody>
        
<?php  
	if ($a%2==0)
        $tabla='info';
    else 
	{
        $tabla='';
    }
    $i++;
?>

<tr class="<?= $tabla?>">
<td><?= $hs['Historico']['fecha']; ?></td>
<td><?= $hs['Historico']['descripcion']; ?></td>
<td><?= $usuarios[$hs['Historico']['usuario_ejecutor']]; ?></td>
</tr>
</tbody>

<?php
    $a=$a+1;
    if($i == 10) 
		break;
	endforeach;
    unset($hs); 
?>
 
</table>
<h5>*Solo muestra los últimos 10</h5>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-------------------------------------------------------SERVICIOS---------------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
	Servicios del proveedor
</a>
</h4>
</div>
<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
<div class="panel-body">
<div id="menu7" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="row">
<div class="col-md-4 col-md-offset-8">

<?php
    echo   $this->Html->link(
								'<i class="fa fa-plus-square-o" aria-hidden="true"> Añadir servicio</i>',
								array(	'action' => 'addservicio',
										$proveedor['Proveedor']['id']
									),
								array(
										'class' => 'btn btn-primary',
										'escape'=>false
									)
							);
?>

</div>
</div>
<br><br>
<table class="table">
<thead>
<tr>
<th>Servicio</th>
<th></th>
</tr>
</thead>
      
<?php 
	$a=0;
?>
<?php 
	foreach ($servicio as $sp):
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
	
<?= $sp['Servicio']['nombre']; 
?> 
	
</td>
<td>
              
<?= $this->Form->postLink(
							'<i class="fa fa-trash"></i>Eliminar',
							array(	'action' => 'deleteserv', 
									$sp['ServicioProveedor']['id']
								),
							array(	'class' => 'btn btn-danger',
									'escape'=>false
								)
						);
?>
            
</td>
</tr>
</tbody>

<?php
    $a=$a+1;
	endforeach;
    unset($sp);
?>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-------------------------------------------------------VOLVER------------------------------------------------------------------------------------------------->
<div class="text-center">

<?= $this->Html->Link(
						'<i class="glyphicon glyphicon-arrow-left"></i> Volver',
						array(
								'action' => 'index',
								'admin' => false
							),
						array(
								'class' => 'btn btn-danger', 
								'escape' => false
							)
					);
?>
    
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div>
</div>
</div>