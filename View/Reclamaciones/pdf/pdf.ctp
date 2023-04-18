<?php
	if(isset($rnc['RegistroNoConformidad']['usuario_cierre']))
	{
		$usuario_cierre = $usuarios[$rnc['RegistroNoConformidad']['usuario_cierre']];
	} 
	else 
	{
		$usuario_cierre = '--';
	}
	if(is_null($rnc['RegistroNoConformidad']['cierre']))
	{
		$causa = 'Sin cerrar aún';
	} 
	else 
	{
		$causa = $rnc['RegistroNoConformidad']['cierre'];
	}
	if(is_null($rnc['RegistroNoConformidad']['analisis_causa']))
	{
		$analisis = 'Sin análisis aún';
	} 
	else 
	{
		$analisis = $rnc['RegistroNoConformidad']['analisis_causa'];
	}
?>

<table class="primero">
<!-- CABECERA-->
<thead>
<tr>
<th style="background-color:false; padding:0px;">REGISTRO DE NO CONFORMIDAD</th>
</tr>
</thead>
</table>
<br><br>
<table border="1" class="sinpadding">
<tbody>
<tr>
<td colspan="2">
<b>Nº RNC:</b><?= $rnc['RegistroNoConformidad']['id']; ?> <br><br>
<b>TIPO DE NO CONFORMIDAD</b><br>
          
<?= $rnc['RegistroNoConformidad']['tipoNoconformidad']; 
?>
      
</td>
</tr>
</tbody>
<!-- PRIMER BLOQUE-->
<thead>
<tr>
<th colspan="2">DESCRIPCIÓN DE LA NO CONFORMIDAD</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="2" style="text-align:left;">
        
<?= $rnc['RegistroNoConformidad']['descripcion']; 
?>

</td>
</tr>
<tr>
<td style="text-align:left;">Fecha Apertura R.N.C. <br>
<b>

<?php
    $date = new DateTime($rnc['RegistroNoConformidad']['fecha_apertura']);
    echo $date->format('d-m-Y'); 
?>
	
</b>
</td>
<td style="text-align:left;">Firma Detector de la N.C. <br>
<b><?= $usuarios[$rnc['RegistroNoConformidad']['usuario_apertura']]; ?></b>
</td>
</tr>
</tbody>
<!-- SEGUNDO BLOQUE-->
<thead>
<tr>
<th colspan="2">TRATAMIENTO A APLICAR</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="2" style="text-align:left;">
        
<?= $rnc['RegistroNoConformidad']['tratamiento']; 
?>
      
</td>
</tr>
<tr>
<td colspan="2" style="text-align:left;">
    ¿Es necesario separar o segregar la Zona afectada? <b><?= $rnc['RegistroNoConformidad']['segregar']; ?></b><br>
    Medios a emplear: <?= $rnc['RegistroNoConformidad']['medios']; ?>
</td>
</tr>
<tr>
<td style="text-align:left;">Plazo para su aplicación <br>
<b>

<?php
    $date = new DateTime($rnc['RegistroNoConformidad']['plazo_aplicacion']);
    echo $date->format('d-m-Y'); 
?>

</b>
</td>
<td style="text-align:left;">Firma Responable Tratamiento <br>
<b><?= $usuarios[$rnc['RegistroNoConformidad']['usuario_responsable']]; ?></b>
</td>
</tr>
</tbody>
<!-- TERCER BLOQUE-->
<thead>
<tr>
<th colspan="2">ANÁLISIS DE LA CAUSA</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="2" style="text-align:left;">
        
<?= $analisis; 
?>
      
</td>
</tr>
<tr>
<td colspan="2" style="text-align:left;">
    Acción Correctiva/Preventiva<b style="padding-left:20px;"><?= $rnc['RegistroNoConformidad']['segregar']; ?></b>
</td>
</tr>
<tr>
<th colspan="2">CIERRE DE LA NO CONFORMIDAD</th>
</tr>
<tr>
<td colspan="2" style="text-align:left;">

<?= $causa; 
?>

</td>
</tr>
<tr>
<td style="text-align:left;">Fecha de cierre <br>
<b>

<?php
    $date = new DateTime($rnc['RegistroNoConformidad']['fecha_cierre']);
    echo $date->format('d-m-Y'); 
?>

</b>
</td>
<td style="text-align:left;">Firma Responable Cierre <br>
<b><?= $usuario_cierre; ?></b>
</td>
</tr>
</tbody>
</table>