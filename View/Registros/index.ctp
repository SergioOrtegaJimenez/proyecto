<div class="well well-lg"><h1><?= $texto ?></h1></div>
<div class="row">
<div class="container-fluid">
<br>
<table class="table table-hover" style="margin-bottom:0px;">
<thead>
<tr>
<th>Fecha</th>
<th>Remitente</th>
<th>Comentario</th>
<th>Nº Ref. OTRI</th>
<th>Clase de documento</th>
<th>Modo Recepción</th>
<th>Usuario Destinatario</th>
<th class="text-center">Opciones</th>
</tr>
</thead>

<?php
	$a = 0;
?>

<tbody>

<?php
	foreach ($registro as $regis):
	
?>

<tr class="<?= $regis['Plantilla']['color']; ?>" style="font-size:1em;">
<td>

<?php
	$date = date_create($regis['RegistroEntrada']['fecha']);
    echo date_format($date, 'Y-m-d');
?>

</td>
<td><?= $regis['RegistroEntrada']['remitente']; ?></td>
<td><?= $regis['RegistroEntrada']['comentario']; ?></td>
<td>

<?php
	$nlong = 8;
	$long = strlen(ereg_replace("[^0-9]", "", substr($regis['RegistroEntrada']['comentario'], -12)));
	if($regis['RegistroEntrada']['clase_documento'] == 'Plan Propio Galileo')
	{
		if($regis['RegistroEntrada']['clase_documento'] == 'Plan Propio Galileo')
		{
			$cadena = $regis['RegistroEntrada']['comentario'];
			$porciones = explode (" . ", $cadena);
			echo substr(stristr($porciones[2], 'OTRI'), 5);
		}
	}
	else
	{
		if($long == $nlong)
		{
			$rest = ereg_replace("[^0-9]", "", substr($regis['RegistroEntrada']['comentario'], -12));
			echo $rest;
		}
		else
		{
			$rest = "No hay referencia";
			echo $rest;
		}
	}
?>

</td>
<td><?= $regis['RegistroEntrada']['clase_documento']; ?></td>
<td><?= $regis['RegistroEntrada']['modoEntrega']; ?></td>
<td>

<?php 
	if(isset($regis['RegistroEntrada']['usuarioReceptor']) AND strlen($usuarios[$regis['RegistroEntrada']['usuarioReceptor']])>0)
	{
		echo $usuarios[$regis['RegistroEntrada']['usuarioReceptor']]. " (" .$estado[$regis['RegistroEntrada']['usuarioReceptor']]. ")"; 
	}
	else
	{
		echo $usuarios[$regis['RegistroEntrada']['usuarioReceptor']]. "(Usuario Eliminado)"; 
	}
?>

</td>
<td class="text-center">

<?php
	if (AuthComponent::user('id') == $regis['RegistroEntrada']['usuarioEjecutor'] || AuthComponent::user('rol') == 'Administrador' || AuthComponent::user('rol') == 'Registrador' )
	{
		echo $this->Form->postLink(
									'<i class="fa fa-trash"></i>Eliminar',
									array(
											'controller' => 'registros',
											'action' => 'eliminarentrada', $regis['RegistroEntrada']['id']
										),
									array(	'class' => 'btn btn-danger',
											'escape'=>false,
											'style'=>'width:120px;',
											'confirm' => '¿Estás seguro que quieres eliminar el registro con fecha de '.$regis['RegistroEntrada']['fecha'].'?'
										)
								);
		echo $this->Html->link(
								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</i>',
								array(
										'controller' => 'registros',
										'action' => 'editar',$regis['RegistroEntrada']['id']
									),
								array(
										'style'=>'width:120px;',
										'class' => 'btn btn-warning','escape'=>false
									)
							);
    }
?>

</td>
</tr>

<?php
	$a=$a+1;
?>
<?php 
	endforeach; 
?>
<?php
	unset($regis);
?>

</tbody>
</table>
</div>
</div>