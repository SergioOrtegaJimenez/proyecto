<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="primero">
<thead>
<tr>
<th style="background-color:false; padding:0px;">Listado de Proveedores</th>
</tr>
</thead>
</table>
<br><br>
<table border="1">
<thead>
<tr>
<th>Nombre</th>
<th>C.I.F</th>
<th>Teléfono</th>
<th>Teléfono 2</th>
<th>Fax</th>
<th>Email</th>
</tr>
</thead>
      
<?php
    $a = 0;
    $b = 0;
    $pagina = 1;
    $contador = count($proveedor)-16;
    $paginas = ceil(($contador/ 19) + 1);
?>
<?php 
	foreach ($proveedor as $pr): 
?>

<tbody>
        
<?php  
	if ($a%2 == 1)
        $tabla='info';
    else 
	{
        $tabla='';
    }
    if (($b%18 == 0 && $b != 0) || ($a == 16) )
	{
?>
          
</tbody>
          
<?php 
	if($pagina == 1)
	{ 
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
        
</table>
<p style="page-break-before: always;"><?=	 $this->element('cabecera'); ?></p>
<table border="1">
<thead>
<tr>
<th>Nombre</th>
<th>C.I.F</th>
<th>Teléfono</th>
<th>Teléfono 2</th>
<th>Fax</th>
<th>Email</th>
</tr>
</thead>
<tbody>

<?php
    } 
?>
        
<tr>
<td class="<?= $tabla?>"><?= $pr['Proveedor']['nombre']; ?></td>
<td class="<?= $tabla?>"><?= $pr['Proveedor']['cif']; ?></td>
<td class="<?= $tabla?>"><?= $pr['Proveedor']['telefono']; ?></td>
<td class="<?= $tabla?>"><?= $pr['Proveedor']['telefono2']; ?></td>
<td class="<?= $tabla?>"><?= $pr['Proveedor']['fax']; ?></td>
<td class="<?= $tabla?>"><?= $pr['Proveedor']['email']; ?></td>
</tr>
</tbody>
        
<?php
    if (($b%18 == 0 && $b != 0) || ($a == 16))
	{
		$pagina += 1;
        $b = 0;
    } 
	else 
	{
        $b += 1;
    }
    $a += 1;
?>
<?php 
	endforeach; 
?>
<?php 
	unset($pr); 
?>
    
</table>
   
<?php 
	$espacio = 705 - $b*39;
?>
    
<div style="height:<?= $espacio;?>px">
</div>
<div class="pie"><?= 'Página '.$paginas.' de '.$paginas; ?></div>
</div>
</div>