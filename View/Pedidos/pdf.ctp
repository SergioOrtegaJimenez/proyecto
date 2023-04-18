<?= $this->Html->css(array('style'));?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="primero">
<thead>
<tr>
<th style="background-color:false; padding:0px;">HOJA DE PEDIDO nº <?= $pedido['Pedido']['id']; ?></th>
</tr>
</thead>
</table>
<br><br>
<table border="1">
<tbody>
<tr>
<td style="text-align:left;">
<div class="tituloPedido">
	Datos del Pedido
</div>
<br>
<b>Fecha de Pedido:</b> <?= $pedido['Pedido']['fecha_solicitud']; ?> <br><br>
<b>Persona que realiza el Pedido:</b> <?= $usuario['Usuario']['nombre']; ?><br><br>
<b>Tipo de Gasto:</b> <?= $pedido['Pedido']['tipo_gasto']; ?><br><br>
<b>Unidad de Gasto:</b> <?= $pedido['Unidad_gasto']['num_unidad']; ?><br><br>
<b>Observaciones del Pedido:</b> <?= $pedido['Pedido']['observaciones']; ?><br><br>
<b>Precio Inicial:</b> <?= $pedido['Pedido']['precioInicial']; ?>€<br><br>
</td>
</tr>
</tbody>
</table>
<br>
<table border="1">
<tbody>
<tr>
<td style="text-align:left;">
<div class="tituloPedido">
	Datos del Proveedor
</div>
<br>
<b>Nombre:</b> <?= $pedido['Proveedor']['nombre']; ?> <br><br>
<b>Teléfono:</b> <?= $pedido['Proveedor']['telefono']; ?> <br><br>
<b>Teléfono alternativo:</b> <?= $pedido['Proveedor']['telefono2']; ?> <br><br>
<b>Código Cliente:</b> <?= $pedido['Proveedor']['codigo_cliente']; ?> <br><br>
<b>Observaciones del Proveedor:</b> <?= $pedido['Proveedor']['descripcion']; ?> <br><br>
</td>
</tr>
</tbody>
</table>
<br>
<table border="1">
<tbody>
<tr>
<td style="text-align:left;">
<div class="tituloPedido">
    Datos de Materiales
</div>
<br>
<table border="1">
<thead>
<tr>
<th>Unidades</th>
<th>Nombre</th>
<th>Código de Referencia</th>
</tr>
</thead>
<tbody>
                
<?php 
	foreach ($pedido['MaterialPedido'] as $pedi): 
?>
                  
<tr>
<td><?= $pedi['unidades'] ?></td>
<td><?= $pedi['Material']['nombre'] ?></td>
<td><?= $pedi['Material']['cod_referencia'] ?></td>
</tr>
                
<?php 
	endforeach; 
?>
<?php 
	unset($pedi); 
?>

</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<br><br>

<?php
    if($pedido['Pedido']['fecha_llegada'] == null)
		$fecha = '--';
    else 
	{
        $fecha = $pedido['Pedido']['fecha_llegada'];
    }
    ?>
	
<table>
<tbody>
<tr>
<td style="text-align:left;"><b>Fecha de Entrega de Pedido:</b> <?= $fecha; ?></td>
<td><b>VºBº:</b></td>
</tr>
</tbody>
</table>
<br><br>
<div class="pieFirma">
<b>Fdo:</b>
</div>
</div>
</div>