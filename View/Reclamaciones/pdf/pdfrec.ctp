<?php
	if(is_null($rc['Reclamacion']['usuario_cierre']))
	{
		$usuario_cierre = '--';
	} 
	else
	{
		$usuario_cierre = $usuarios[$rc['Reclamacion']['usuario_cierre']];
	}
	if(is_null($rc['Reclamacion']['cierre']))
	{
		$cierre = 'La reclamación no está cerrada aún';
	} 
	else 
	{
		$cierre = $rc['Reclamacion']['cierre'];
	}
	if(is_null($rc['Reclamacion']['fecha_cierre']))
	{
		$fecha_cierre = '--';
	} 
	else 
	{
		$date = new DateTime($rc['Reclamacion']['fecha_cierre']);
		$fecha_cierre = $date->format('d-m-Y');
	}
	if(is_null($rc['Reclamacion']['causas']))
	{
		$causas = 'Sin causas';
	} 
	else 
	{
		$causas = $rc['Reclamacion']['causas'];
	}
	if(is_null($rc['Accion']))
	{
		$accion = 'Si';
	} 
	else 
	{
		$accion = 'No';
	}
?>

<table class="primero">
<!-- CABECERA-->
<thead>
<tr>
<th style="background-color:false; padding:0px;">REGISTRO DE RECLAMACIÓN</th>
</tr>
</thead>
</table>
<br>
<table border="1" class="sinpadding">
<tbody>
<tr>
<td colspan="2">
<b>Nº RRC:</b><?= $rc['Reclamacion']['codigo_reclamacion']; ?> <br><br>
<b>TIPO DE RECLAMACION</b><br>

<?= $rc['Reclamacion']['tipo_reclamacion']; 
?>
     
</td>
</tr>
</tbody>
<!-- PRIMER BLOQUE-->
<thead>
<tr>
<th colspan="2">DESCRIPCIÓN DE LA RECLAMACIÓN</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="2" style="text-align:left;">
        
<?= $rc['Reclamacion']['descripcion']; 
?>
      
</td>
</tr>
<tr>
<td style="text-align:left;"><b>Reclamación Registrada por:</b> <br>
        
<?= $usuarios[$rc['Reclamacion']['usuario_insercion']]; 
?>
      
</td>
<td style="text-align:left;"><b>Fecha Insercción </b><br>
        
<?php
    $date = new DateTime($rc['Reclamacion']['fecha_insercion']);
        echo $date->format('d-m-Y'); 
?>
      
</td>
</tr>
</tbody>
<!-- SEGUNDO BLOQUE-->
<thead>
<tr>
<th colspan="2">POSIBLES CAUSAS QUE LA ORIGINARON</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="2" style="text-align:left;">
        
<?= $causas; 
?>
      
</td>
</tr>
<tr>
<td colspan="2" style="text-align:left;">
<b>Acción Correctiva/Preventiva: </b><span style="padding-left:10px;"><?= $accion; ?></span><br>
</td>
</tr>
</tbody>
<!-- TERCER BLOQUE-->
<thead>
<tr>
<th colspan="2">TRATAMIENTO</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="2" style="text-align:left;">
        
<?= $rc['Reclamacion']['tratamiento']; 
?>
      
</td>
</tr>
<tr>
<td style="text-align:left;">
<b>Responable Asignado:</b><br>
        
<?= $usuarios[$rc['Reclamacion']['usuario_responsable']]; 
?>
      
</td>
<td style="text-align:left;">
<b>Plazo previsto:</b><br>
        
<?= $rc['Reclamacion']['plazo_previsto']; 
?>
      
</td>
</tr>
</tbody>
<!-- CUARTO BLOQUE-->
<thead>
<tr>
<th colspan="2">SEGUIMIENTO</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="2" style="text-align:left;">
        
<?= $rc['Reclamacion']['seguimiento']; 
?>
      
</td>
</tr>
<tr>
<td style="text-align:left;"><b>Firma Responsable Asignado: </b> <br>
        
<?= $usuarios[$rc['Reclamacion']['usuario_responsable']]; 
?>
      
</td>
<td style="text-align:left;"><b>Fecha Real Resolución: </b><br>
        
<?php
    $date = new DateTime($rc['Reclamacion']['fecha_resolucion']);
        echo $date->format('d-m-Y'); 
?>
      
</td>
</tr>
</tbody>
<tr>
<th colspan="2">CIERRE DE LA RECLAMACIÓN</th>
</tr>
<tr>
<td colspan="2" style="text-align:left;">

<?= $cierre; 
?>
      
</td>
</tr>
<tr>
<td style="text-align:left;"><b>Firma Responable Cierre</b> <br>
        
<?= $usuario_cierre; 
?>
      
</td>
<td style="text-align:left;"><b>Fecha Cierre </b><br>
        
<?= $fecha_cierre; 
?>
    
</td>
</tr>
</tbody>
</table>