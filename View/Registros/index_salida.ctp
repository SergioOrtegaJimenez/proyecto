<div class="well well-lg"><h1><?= $texto ?></h1></div>
<div class="row">
<div class="container-fluid">
<br>
<table class="table table-hover" style="margin-bottom:0px;">
<thead>
<tr>
<th class="text-center">Fecha</th>
<th >Destino</th>
<th >Comentario</th>
<th>Nº Ref. OTRI</th>
<th >Clase de documento</th>
<th >Modo Envío</th>
<th >Usuario Emisor</th>
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
	$date = date_create($regis['RegistroSalida']['fecha']);
    echo date_format($date, 'Y-m-d');
?>

</td>
<td><?= $regis['RegistroSalida']['destino']; ?></td>
<td><?= $regis['RegistroSalida']['comentario']; ?></td>
<td>

<?php
	$nlong = 8;
	$long = strlen(ereg_replace("[^0-9]", "", substr($regis['RegistroSalida']['comentario'], -12)));
	if($regis['RegistroSalida']['clase_documento'] == 'Factura Gestión Económica' OR $regis['RegistroSalida']['clase_documento'] == 'Dietas Gestión Económica' OR $regis['RegistroSalida']['clase_documento'] == 'Plan Propio Galileo')
	{
		if($regis['RegistroSalida']['clase_documento'] == 'Factura Gestión Económica')
		{
			/*código para extraer cadena que esté entre el caracter '(' y el caracter ')' 
			$cadena1 = substr($regis['RegistroSalida']['comentario'],-45);
			$parte1 = explode('(',$cadena1);
			$parte2 = explode(')',$parte1[1]);
			$rest = $parte2[0];
			*/
			
			/*código para extraer cadena que esté a partir del caracter ' . '
			$cadena2 = $regis['RegistroSalida']['comentario'];
			$partes = explode (" . ", $cadena2);
			$rest2 = substr(stristr($partes[1], 'OTRI'), 5);
			*/
			
			$nlongfge = 0;
			$longuitudreffge = 17;
			$mystringfge = substr($regis['RegistroSalida']['comentario'],-31);
			$devueltafge = rtrim(stristr($mystringfge, 'REF'));
			if($nlongfge == strlen($devueltafge) OR strlen($devueltafge) < $longuitudreffge)
			{
				echo "No hay referencia";
			}
			else
			{
				if(strlen($devueltafge)<=19)
				{
					$deffge = substr ($devueltafge, 0, strlen($devueltafge));
				}
				if(strlen($devueltafge)>19)
				{
					$deffge = substr ($devueltafge, 0, strlen($devueltafge) - 1);
				}
				if(strlen($devueltafge)==18)
				{
					$deffge = substr ($devueltafge, 0, strlen($devueltafge) - 1);
				}
				if(strlen($devueltafge)==19 AND substr($devueltafge, -1) == ')')
				{
					$deffge = substr ($devueltafge, 0, strlen($devueltafge) - 1);
				}
				echo $deffge;
			}
		}
		
		if($regis['RegistroSalida']['clase_documento'] == 'Dietas Gestión Económica')
		{
			$nlongdge = 0;
			$longuitudrefdge = 17;
			$mystringdge = substr($regis['RegistroSalida']['comentario'],-31);
			$devueltadge = rtrim(stristr($mystringdge, 'REF'));
			if($nlongdge == strlen($devueltadge) OR strlen($devueltadge) < $longuitudrefdge)
			{
				echo "No hay referencia";
			}
			else
			{
				if(strlen($devueltadge)<=19)
				{
					$defdge = substr ($devueltadge, 0, strlen($devueltadge));
				}
				if(strlen($devueltadge)>19)
				{
					$defdge = substr ($devueltadge, 0, strlen($devueltadge));
				}
				if(strlen($devueltadge)>19 AND substr($devueltadge, -1) == ')')
				{
					$defdge = substr ($devueltadge, 0, strlen($devueltadge) - 1);
				}
				if(strlen($devueltadge)==19 AND substr($devueltadge, -1) == ')')
				{
					$defdge = substr ($devueltadge, 0, strlen($devueltadge) - 1);
				}
				echo $defdge;
			}
		}
		if($regis['RegistroSalida']['clase_documento'] == 'Plan Propio Galileo')
		{
			$cadena = $regis['RegistroSalida']['comentario'];
			$porciones = explode (" . ", $cadena);
			echo substr(stristr($porciones[2], 'OTRI'), 5);
		}
		
	}
	else
	{
		if($long == $nlong)
		{
			$rest = ereg_replace("[^0-9]", "", substr($regis['RegistroSalida']['comentario'], -12));
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
<td><?= $regis['RegistroSalida']['clase_documento']; ?></td>
<td><?= $regis['RegistroSalida']['modoEntrega']; ?></td>
<td>

<?php 
	if(isset($regis['RegistroSalida']['usuarioEmisor']) AND strlen($usuarios[$regis['RegistroSalida']['usuarioEmisor']])>0)
	{
		echo $usuarios[$regis['RegistroSalida']['usuarioEmisor']]. " (" .$estado[$regis['RegistroSalida']['usuarioEmisor']]. ")"; 
	}
	else
	{
		echo $usuarios[$regis['RegistroSalida']['usuarioEmisor']]. "(Usuario Eliminado)"; 
	}
?>

</td>
<td class="text-center">

<?php
	if (AuthComponent::user('id') == $regis['RegistroSalida']['usuarioEjecutor'] || AuthComponent::user('rol') == 'Administrador' || AuthComponent::user('rol') == 'Registrador' )
	{
		echo $this->Form->postLink(
									'<i class="fa fa-trash"></i> Eliminar',
									array(
											'controller' => 'registros',
											'action' => 'eliminarsalida', $regis['RegistroSalida']['id']
										),
									array(	'class' => 'btn btn-danger',
											'escape'=>false,
											'style'=>'width:120px;',
											'confirm' => '¿Estás seguro que quieres eliminar el registro con fecha de '.$regis['RegistroSalida']['fecha'].'?'
										)
								);
		echo $this->Html->link(
								'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</i>',
								array(
										'controller' => 'registros',
										'action' => 'editarSalida',$regis['RegistroSalida']['id']
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