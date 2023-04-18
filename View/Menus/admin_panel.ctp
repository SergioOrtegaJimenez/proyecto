<div class="panel panel-primary">
<div class="panel-heading"><h3>Menú de Administración</h3>
</div>
<div class="panel-body">

<?php
    if(isset($this->request->params['pass'][0]))
		$menu = $this->request->params['pass'][0];
    else 
	{
        $menu = null;
    }
?>

</div>







<!-----------------------------------------------------------------------USUARIOS------------------------------------------------------------------------------->
<div class="panel-body">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
    Usuarios
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
                
<?=   $this->Html->link(
							'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Usuario</i>',
							array( 	'controller' => 'usuarios',
									'action' => 'crear'
								),
							array(
									'class' => 'btn btn-primary','escape'=>false
								)
					);
?>

</div>
</div>
<br><br>
<table class="table">
<thead>
<tr>
<th>Nombre</th>
<th>Login</th>
<th>Estado</th>
<th>IP Ordenador</th>
<th class="text-center">Opciones</th>
</tr>
</thead>
                
<?php 
	$a = 0;
?>
<?php 
	foreach ($usuarios as $usuario):
?>

<tbody>
                  
<?php  
	if ($a%2 == 0)
		$tabla='info';
    else 
	{
        $tabla='';
    } 
?>
                  
<tr class="<?= $tabla?>">
<td><?= $usuario['Usuario']['nombre']; ?></td>
<td><?= $usuario['Usuario']['usuario']; ?></td>
<td><?= $usuario['Usuario']['estado']; ?></td>
<td><?= $usuario['Usuario']['IPOrdenador']; ?></td>
<td>
<div class="text-center">
<div class="btn-group btn-group-sm" >
                        
<?= $this->Html->link(
						'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</i>',
                        array(
								'controller' => 'usuarios',
                                'action' => 'editar',
                                $usuario['Usuario']['id']
							),
                        array(
								'class' => 'btn btn-warning',
								'escape'=>false
                            )
					);
?>
</div>
<div class="btn-group btn-group-sm" >

<?= $this->Html->link(
						'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar contraseña</i>',
                        array(
								'controller' => 'usuarios',
                                'action' => 'editarpass',
                                $usuario['Usuario']['id']
							),
                        array(
								'class' => 'btn btn-warning',
								'escape'=>false
                            )
					);
?>

</div>
<div class="btn-group btn-group-sm" >

<?= $this->Form->postLink(
								'<i class="fa fa-trash"></i>Eliminar',
								array(
										'controller' => 'usuarios',
										'action' => 'eliminar',
										$usuario['Usuario']['id']
									),
								array(	'class' => 'btn btn-danger',
										'escape'=>false,
										'confirm' => '¿Estás seguro?'
									)
							);
?>
                        
</div>
</div>
</td>
</tr>
</tbody>
                
<?php
    $a = $a + 1;
    endforeach;
    unset($usuario);
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
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!--------------------------------------------------------------------- IP PERMITIDAS -------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	IPs Permitidas
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
                
<?=   $this->Html->link(
							'<i class="fa fa-plus-square" aria-hidden="true"> Añadir IP</i>',
							array(	'controller' => 'menus',
									'action' => 'crear'
								),
							array(
									'class' => 'btn btn-primary','escape'=>false
								)
					);
?>
              
</div>
<br><br><br>
<div class="col-md-6 col-md-offset-3">
<table class="table">
<thead>
<tr>
<th>IP</th>
<th></th>
</tr>
</thead>
                    
<?php 
	$a = 0;
?>
<?php 
	foreach ($ips as $ip):
?>

<tbody>
                    
<?php  
	if ($a%2 == 0)
        $tabla='info';
    else 
	{
        $tabla='';
    } 
?>
                      
<tr class="<?= $tabla?>">
<td><?= $ip['Ip_permitida']['direccionIP']; ?></td>
<td>
<div class="text-right">
<div class="btn-group btn-group-sm" >
                              
<?= $this->Html->link(
						'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</i>',
                        array(
                                'controller' => 'menus',
                                'action' => 'editar',
                                $ip['Ip_permitida']['id']
							),
                        array(
								'class' => 'btn btn-warning','escape'=>false
                            )
					);
?>
</div>
<div class="btn-group btn-group-sm" >
<?=
    $this->Form->postLink(
								'<i class="fa fa-trash"></i>Eliminar',
                                array(	'action' => 'delete',
										$ip['Ip_permitida']['id']
									),
								array(	'class' => 'btn btn-danger',
										'escape'=>false,
										'confirm' => '¿Estás seguro?'
									)
							);
?>
                            
</div>
</div>
</td>
</tr>
</tbody>
                    
<?php
    $a = $a + 1;
    endforeach;
    unset($ip);
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
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->






<!------------------------------------------------------------- PLANTILLAS ------------------------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	Plantillas
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<div id="menu3" class="tab-pane fade in active">
<div class="panel-body">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-md-offset-8">
                
<?=   $this->Html->link(
							'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Plantilla Entrada</i>',
							array(	'controller' => 'menus',
									'action' => 'plantilla', 1
								),
							array(
									'class' => 'btn btn-primary','escape'=>false
								)
					);
?>
&nbsp;
<?=   $this->Html->link(
						'<i class="fa fa-plus-square" aria-hidden="true"> Añadir Plantilla Salida</i>',
						array(	'controller' => 'menus',
								'action' => 'plantilla', 2
							),
                        array(
								'class' => 'btn btn-primary','escape'=>false
							)
					);
?>
              
</div>
<br><br><br>
<div class="col-md-6 col-md-offset-3">
<table class="table">
<thead>
<tr>
<th>Clase documento</th>
<th>Número campos</th>
<th>Entrada/Salida</th>
<th>Color</th>
</tr>
</thead>
                    
<?php 
	$a = 0;
?>
<?php 
	foreach ($plantillas as $plantilla):
?>
                    
<tbody>
                      
<?php  
	if ($a%2 == 0)
		$tabla='info';
    else 
	{
        $tabla='';
    }
	if ($plantilla['Plantilla']['tipo_registro'] == 1)
        $tipo = 'Entrada';
    else 
	{
        $tipo = 'Salida';
    }
?>
                     
<tr class="<?= $tabla?>">
<td><?= $plantilla['Plantilla']['clase_documento']; ?></td>
<td><?= $plantilla['Plantilla']['num_campos']; ?></td>
<td><?= $tipo; ?></td>
<td style="background-color:<?= $plantilla['Plantilla']['color']; ?>"></td>
</tr>
</tbody>
                    
<?php
    $a = $a + 1;
    endforeach;
    unset($plantilla);
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