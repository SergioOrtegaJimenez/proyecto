<table class="primeroPedido">
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
<br><br>
<b>Fecha de Solicitud del Pedido:</b>
            
<?php
    $date = new DateTime($pedido['Pedido']['fecha_solicitud']);
    echo $date->format('d-m-Y');
?> 

<br>
<b>Persona que realiza el Pedido:</b> <?= $usuario['Usuario']['nombre']; ?><br>
<b>Tipo de Gasto:</b> <?= $pedido['Pedido']['tipo_gasto']; ?><br>
<b>Unidad de Gasto:</b> <?= $pedido['Unidad_gasto']['num_unidad']; ?><br>
<b>Observaciones del Pedido:</b> <?= $pedido['Pedido']['observaciones']; ?><br>
<b>Precio Inicial:</b> <?= $pedido['Pedido']['precioInicial']; ?>€<br>
<b>Precio Final:</b> <?= $pedido['Pedido']['precioFinal']; ?>€<br>
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
<br><br>
<b>Nombre:</b> <?= $pedido['Proveedor']['nombre']; ?> <br>
<b>Teléfono:</b> <?= $pedido['Proveedor']['telefono']; ?> <br>
<b>Código Cliente:   &nbsp;</b><span> </span>  <?= $pedido['Proveedor']['codigo_cliente']; ?> <br>
</td>
</tr>
</tbody>
</table>
    
<?php 
	if (count($pedido['MaterialPedido']) > 3){ 
?>
      
<p style="page-break-before: always;"><?=	 $this->element('cabecera'); ?></p>
      
<?php
	} 
?>

<table border="1">
<tbody>
<tr>
<td style="text-align:left;">
<div class="tituloPedido">
    Datos de Materiales
</div>
<br><br>
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
        $date = new DateTime($pedido['Pedido']['fecha_llegada']);
        $fecha = $date->format('d-m-Y');
    }
?>

<table>
<tbody>
<tr>
<td style="text-align:left;"><b>Fecha de Llegada del Pedido:</b> <?= $fecha; ?></td>
<td><b>VºBº:</b></td>
</tr>
</tbody>
</table>
<br><br>
<div class="pieFirma">
<b>Fdo:</b>
</div>