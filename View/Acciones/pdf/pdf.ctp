<?php
	if(is_null($accion['Accion']['usuario_cierre']))
	{
		$usuario_cierre = '--';
	} 
	else 
	{
		$usuario_cierre = $usuarios[$accion['Accion']['usuario_cierre']];
	}
	if(is_null($accion['Accion']['fecha_cierre']))
	{
		$fecha_cierre = '--';
	} 
	else 
	{
		$date = new DateTime($accion['Accion']['fecha_cierre']);
		$fecha_cierre = $date->format('d-m-Y');
	}
	if(isset($accion['Seguimiento'][0]['fecha']))
	{
		$date = new DateTime($accion['Seguimiento'][0]['fecha']);
		$fecha = $date->format('d-m-Y');
	}
	else 
	{
		$fecha = '--';
	}
	if(isset($accion['Seguimiento'][0]['estado']))
	{
		$estado = $accion['Seguimiento'][0]['estado'];
	}
	else 
	{
		$estado = '--';
	}
	if(isset($accion['Seguimiento'][0]['usuario_responsable']))
	{
		$responsable = $usuarios[$accion['Seguimiento'][0]['usuario_responsable']];
	}
	else 
	{
		$responsable = '--';
	}
	if(is_null($accion['Accion']['conclusiones']))
	{
		$conclusiones = 'Sin conclusiones';
	} 
	else 
	{
		$conclusiones = $accion['Accion']['conclusiones'];
	}
	if(is_null($accion['RegistroNoConformidad']['id']))
	{
		$origen = 'Sin R.N.C.';
	} 
	else 
	{
		$origen = 'R.N.C Nº'.$accion['RegistroNoConformidad']['id'];
	}
?>

<table class="primero">
<!-- CABECERA-->
<thead>
<tr>
<th style="background-color:false; padding:0px;">REGISTRO DE ACCIÓN CORRECTIVA/PREVENTIVA</th>
</tr>
</thead>
</table>
<br><br>
<table border="1">
 <!-- PRIMER BLOQUE-->
<tbody>
<tr>
<td colspan="3" style="text-align:left;">
    Nº Reg:</b>
	
<?= $accion['Accion']['id']; 
?>

<span style="padding-left:520px;">Fecha:</b>
          
<?php
    $date = new DateTime($accion['Accion']['fecha_accion']);
    echo $date->format('d-m-Y'); 
?>

</span>
</td>
</tr>
<tr>
<td style="text-align:left;" colspan="3">
<b>ORIGEN DEL ANÁLISIS (Indicar R.N.C. relacionados) </b> 

<?= $origen;
?>

</td>
</tr>
<tr>
<td style="text-align:left;" colspan="3">
<b>DESCRIPCIÓN DE LA CAUSA:</b><br><br>

<?= $accion['Accion']['descripcion']; ?>   

</td>
</tr>
<tr>
<td colspan="3">
<b>ACCIÓN PROPUESTA<br><br>
        
<?= $accion['Accion']['tipo_accion']; 
?>

</b>
<br>
  
<?= $accion['Accion']['detalle_accion']; 
?>
      
</td>
</tr>
<tr>
<td style="text-align:left;" colspan="3">
    Plazo para Implantar la Acción Propuesta:<b style="padding-left:10px;"> 

<?= $accion['Accion']['plazo_implantacion']; 
?>

</b>
</td>
</tr>
<tr>
<td style="text-align:left;" colspan="3">
    Firma Responsable de su Implantación: <b style="padding-left:10px;">
	
<?= $usuarios[$accion['Accion']['usuario_implantacion']]; 
?>

</b>
</td>
</tr>
<tr>
<td style="text-align:left;" colspan="3">
    Plazo para el Cierre de la Acción: <b style="padding-left:10px;">

<?= $accion['Accion']['plazo_cierre']; 
?>

</b>
</td>
</tr>
</tbody>
<!-- SEGUNDO BLOQUE-->
<thead>
<tr>
<th colspan="3">
    SEGUIMIENTO DE LA IMPLANTACIÓN
</th>
</tr>
</thead>
<tbody>
<tr>
<td>Fecha</td>
<td>Estado de la acción</td>
<td>Responsable</td>
</tr>
<tr>
<td><?= $fecha; ?></td>
<td><?= $estado; ?></td>
<td><?= $responsable; ?></td>
</tr>
<tr>
<td style="text-align:left;" colspan="3">
<b>CONCLUSIONES (Sobre la eficacia de la Acción Propuesta):</b><br>
        
<?= $conclusiones; 
?>

</td>
</tr>
<tr>
<td  style="text-align:left;">
    Fecha de Cierre <br>
<b><?= $fecha_cierre; ?></b>
</td>
<td  style="text-align:left;" colspan="2">
    Firma Responsable Cierre <br>
<b><?= $usuario_cierre; ?></b>
</td>
</tr>
</tbody>
</table>