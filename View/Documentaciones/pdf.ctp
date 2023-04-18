<?= $this->Html->css('style'); 
?>
<?= $this->element('cabecera'); 
?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="primero">
<thead>
<tr>
<th style="background-color:false; padding:0px;">Documentación: Versiones Actuales</th>
</tr>
</thead>
</table>
<table>
<thead>
<tr>
<th class="sinfondo"><?= $texto; ?></th>
</tr>
</thead>
</table>
<br><br>
      
<?php
    $a = 0;
    $b = 0;
    $altura = 210;
    $pagina = 1;
    $paginas = ceil((count($documentados)/ 3));
?>

<?php 
	foreach ($documentados as $dc):
        if ($a == 3)
		{
?>
<?php 
	if($pagina == 1)
	{
        $altura = 275;
?>
            
<div class="primerpie"><?= 'Página '.$pagina.' de '.$paginas; ?></div>

<?php
	} 
	else
	{ 
?>
            
<div class="pie"><?= 'Página '.$pagina.' de '.$paginas; ?></div>
          
<?php 
	} 
?>
            
<p style="page-break-before: always;"><?=	 $this->element('cabecera'); ?></p>

<?php
    } 
?>

<div id="mainHolder" style="height: <?= $altura ?>px;">
<table border="1" class="actuales">
<thead>
<tr>
<th class="actuales" colspan="3"><?= $dc['Documento']['nombre']; ?></th>
</tr>
<tr>
<th class="actuales" colspan="3" class="info"><?= $dc['Documento']['descripcion']; ?></th>
</tr>
</thead>
<tbody>
<tr>
<td class="actuales" style="width:85%"><?= $dc['Documento']['nombre2']; ?></td>
<td rowspan="2"><?= $dc['Documento']['fecha']; ?></td>
</tr>
<tr>
<td class="actuales"><?= $dc['Documento']['descripcion2']; ?></td>
</tr>
</tbody>
</table>
</div>
<br>
        
<?php
    if ($a == 3)
	{
        $pagina += 1;
        $a = 1;
    } 
	else 
	{
        $a += 1;
    }
?>
<?php 
	endforeach; 
?>
<?php 
	unset($pr); 
?>
<?php 
	$espacio = 735 - $a*225;
?>
    
<div style="height:<?= $espacio;?>px">
</div>
<div class="pie"><?= 'Página '.$paginas.' de '.$paginas; ?></div>
</div>
</div>