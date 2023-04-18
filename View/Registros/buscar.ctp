<div class="well well-lg">
<h1>Búsqueda</h1>
</div>
<div class="row">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2">

<?= $this->Form->create('RegistroEntrada'); 
?>
<?= $this->Html->css(array(
  'pikaday'));
?>

<select id="lunch" name="option" class="selectpicker form-control" data-live-search="true" title="Seleccione una opción...">
	<!--<option value="fecha">Fecha (desde-hasta)</option>-->
	<option value="remitente">Remitente</option>
    <!--<option value="comentario">Comentario</option>-->
    <option value="clase_documento" selected="selected">Clase de documento</option>
    <option value="modoEntrega">Modo Recepción</option>
	<option value="comentario">Nº de Ref. OTRI</option>
</select><br><br><br>
<select id="lunch3" name="option3" class="selectpicker form-control" data-live-search="true" title="Seleccione una opción..." style="-webkit-appearance: none;">
	<option value="comentario" selected="selected">Comentario</option>
</select><br><br><br>
<select id="lunch2" name="option2" class="selectpicker form-control" data-live-search="true" title="Seleccione una opción..." style="-webkit-appearance: none;">
	<option value="fecha" selected="selected">Fecha (desde-hasta)</option>
</select>
</div>
<div class="col-lg-3">
<input type="text" class="form-control" name="keyword" placeholder="Escribe los criterios de búsqueda...">
<br><br><br>



<input type="text" class="form-control" name="keyword4" placeholder="Escribe el comentario a buscar...">
<br><br>
<input type="text" class="form-control" name="keyword2" id="datepicker1" placeholder="Selecciona la fecha(desde)...">
<br>
<input type="text" class="form-control" name="keyword3" id="datepicker2" placeholder="Selecciona la fecha(hasta)...">

<?=	$this->Html->script(array (
								'moment.min',
								'pikaday'
							)
					); 
?>

<script>
var picker = new Pikaday(
{
field: document.getElementById('datepicker1'),
firstDay: 1,
maxDate: new Date(2020, 12, 31),
yearRange: [2000,2020],
format: 'YYYY-MM-DD',
i18n: {
    previousMonth : 'Mes anterior',
    nextMonth     : 'Mes siguiente',
    months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    weekdays      : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
    weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sab']
}
});
</script>
<div class="pika-single is-bound is-hidden" style="position: static; left: auto; top: auto;">
<div class="pika-lendar">
<div id="pika-title-hk" class="pika-title" role="heading" aria-live="assertive">
<div class="pika-label">June
<select class="pika-select pika-select-month" tabindex="-1">
<option value="0" disabled="disabled">January</option>
<option value="1" disabled="disabled">February</option>
<option value="2" disabled="disabled">March</option>
<option value="3" disabled="disabled">April</option>
<option value="4" disabled="disabled">May</option>
<option value="5" selected="selected">June</option>
<option value="6">July</option>
<option value="7">August</option>
<option value="8">September</option>
<option value="9">October</option>
<option value="10">November</option>
<option value="11">December</option>
</select>
</div>
<div class="pika-label">2017
<select class="pika-select pika-select-year" tabindex="-1">
<option value="2017" selected="selected">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
</select>
</div>
<button class="pika-prev is-disabled" type="button">Previous Month</button>
<button class="pika-next" type="button">Next Month</button>
</div>
<table cellpadding="0" cellspacing="0" class="pika-table" role="grid" aria-labelledby="pika-title-hk">
<thead>
<tr>
<th scope="col">
<abbr title="Monday">Mon</abbr>
</th>
<th scope="col">
<abbr title="Tuesday">Tue</abbr>
</th>
<th scope="col">
<abbr title="Wednesday">Wed</abbr>
</th>
<th scope="col"><abbr title="Thursday">Thu</abbr>
</th>
<th scope="col">
<abbr title="Friday">Fri</abbr>
</th>
<th scope="col">
<abbr title="Saturday">Sat</abbr>
</th>
<th scope="col">
<abbr title="Sunday">Sun</abbr>
</th>
</tr>
</thead>
<tbody>
<tr class="pika-row">
<td class="is-empty"></td>
<td class="is-empty"></td>
<td class="is-empty"></td>
<td data-day="1" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="1">1</button>
</td>
<td data-day="2" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="2">2</button>
</td>
<td data-day="3" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="3">3</button>
</td>
<td data-day="4" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="4">4</button>
</td>
</tr>
<tr class="pika-row">
<td data-day="5" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="5">5</button>
</td>
<td data-day="6" class="is-today" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="6">6</button>
</td>
<td data-day="7" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="7">7</button>
</td>
<td data-day="8" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="8">8</button>
</td>
<td data-day="9" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="9">9</button>
</td>
<td data-day="10" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="10">10</button>
</td>
<td data-day="11" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="11">11</button>
</td>
</tr>
<tr class="pika-row"><td data-day="12" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="12">12</button>
</td>
<td data-day="13" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="13">13</button>
</td>
<td data-day="14" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="14">14</button>
</td>
<td data-day="15" class="is-selected" aria-selected="true">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="15">15</button>
</td>
<td data-day="16" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="16">16</button>
</td>
<td data-day="17" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="17">17</button>
</td>
<td data-day="18" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="18">18</button>
</td>
</tr>
<tr class="pika-row"><td data-day="19" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="19">19</button>
</td>
<td data-day="20" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="20">20</button>
</td>
<td data-day="21" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="21">21</button>
</td>
<td data-day="22" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="22">22</button>
</td>
<td data-day="23" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="23">23</button>
</td>
<td data-day="24" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="24">24</button>
</td>
<td data-day="25" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="25">25</button>
</td>
</tr>
<tr class="pika-row">
<td data-day="26" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="26">26</button>
</td>
<td data-day="27" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="27">27</button>
</td>
<td data-day="28" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="28">28</button>
</td>
<td data-day="29" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="29">29</button>
</td>
<td data-day="30" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="30">30</button>
</td>
<td class="is-empty"></td>
<td class="is-empty"></td>
</tr>
</tbody>
</table>
</div>
</div>
<br>

<?=	$this->Html->script(array (
								'moment.min',
								'pikaday'
							)
					); 
?>

<script>
var picker = new Pikaday(
{
field: document.getElementById('datepicker2'),
firstDay: 1,
maxDate: new Date(2020, 12, 31),
yearRange: [2000,2020],
format: 'YYYY-MM-DD',
i18n: {
    previousMonth : 'Mes anterior',
    nextMonth     : 'Mes siguiente',
    months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    weekdays      : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
    weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sab']
}
});
</script>
<div class="pika-single is-bound is-hidden" style="position: static; left: auto; top: auto;">
<div class="pika-lendar">
<div id="pika-title-hk" class="pika-title" role="heading" aria-live="assertive">
<div class="pika-label">June
<select class="pika-select pika-select-month" tabindex="-1">
<option value="0" disabled="disabled">January</option>
<option value="1" disabled="disabled">February</option>
<option value="2" disabled="disabled">March</option>
<option value="3" disabled="disabled">April</option>
<option value="4" disabled="disabled">May</option>
<option value="5" selected="selected">June</option>
<option value="6">July</option>
<option value="7">August</option>
<option value="8">September</option>
<option value="9">October</option>
<option value="10">November</option>
<option value="11">December</option>
</select>
</div>
<div class="pika-label">2017
<select class="pika-select pika-select-year" tabindex="-1">
<option value="2017" selected="selected">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
</select>
</div>
<button class="pika-prev is-disabled" type="button">Previous Month</button>
<button class="pika-next" type="button">Next Month</button>
</div>
<table cellpadding="0" cellspacing="0" class="pika-table" role="grid" aria-labelledby="pika-title-hk">
<thead>
<tr>
<th scope="col">
<abbr title="Monday">Mon</abbr>
</th>
<th scope="col">
<abbr title="Tuesday">Tue</abbr>
</th>
<th scope="col">
<abbr title="Wednesday">Wed</abbr>
</th>
<th scope="col"><abbr title="Thursday">Thu</abbr>
</th>
<th scope="col">
<abbr title="Friday">Fri</abbr>
</th>
<th scope="col">
<abbr title="Saturday">Sat</abbr>
</th>
<th scope="col">
<abbr title="Sunday">Sun</abbr>
</th>
</tr>
</thead>
<tbody>
<tr class="pika-row">
<td class="is-empty"></td>
<td class="is-empty"></td>
<td class="is-empty"></td>
<td data-day="1" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="1">1</button>
</td>
<td data-day="2" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="2">2</button>
</td>
<td data-day="3" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="3">3</button>
</td>
<td data-day="4" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="4">4</button>
</td>
</tr>
<tr class="pika-row">
<td data-day="5" class="is-disabled" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="5">5</button>
</td>
<td data-day="6" class="is-today" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="6">6</button>
</td>
<td data-day="7" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="7">7</button>
</td>
<td data-day="8" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="8">8</button>
</td>
<td data-day="9" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="9">9</button>
</td>
<td data-day="10" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="10">10</button>
</td>
<td data-day="11" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="11">11</button>
</td>
</tr>
<tr class="pika-row"><td data-day="12" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="12">12</button>
</td>
<td data-day="13" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="13">13</button>
</td>
<td data-day="14" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="14">14</button>
</td>
<td data-day="15" class="is-selected" aria-selected="true">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="15">15</button>
</td>
<td data-day="16" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="16">16</button>
</td>
<td data-day="17" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="17">17</button>
</td>
<td data-day="18" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="18">18</button>
</td>
</tr>
<tr class="pika-row"><td data-day="19" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="19">19</button>
</td>
<td data-day="20" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="20">20</button>
</td>
<td data-day="21" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="21">21</button>
</td>
<td data-day="22" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="22">22</button>
</td>
<td data-day="23" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="23">23</button>
</td>
<td data-day="24" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="24">24</button>
</td>
<td data-day="25" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="25">25</button>
</td>
</tr>
<tr class="pika-row">
<td data-day="26" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="26">26</button>
</td>
<td data-day="27" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="27">27</button>
</td>
<td data-day="28" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="28">28</button>
</td>
<td data-day="29" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="29">29</button>
</td>
<td data-day="30" class="" aria-selected="false">
<button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="30">30</button>
</td>
<td class="is-empty"></td>
<td class="is-empty"></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-lg-1">
<button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>
</div>
<br><br>
<table class="table table-hover table-buscar">
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
	$a=0;
?>

<tbody>
        
<?php 
	foreach ($list as $regis):
	
?>

          
<tr class="<?= $regis['Plantilla']['color']; ?>" style="font-size:1em;">
<td><?= $regis['RegistroEntrada']['fecha'];?></td>
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
<td>
<div class="text-right">
                
<?php
    if (AuthComponent::user('id') == $regis['RegistroEntrada']['usuarioEjecutor'] || AuthComponent::user('rol') == 'Administrador' || AuthComponent::user('rol') == 'Registrador')
	{
        echo $this->Form->postLink(
									'<i class="fa fa-trash"></i>Eliminar',
									array(	'action' => 'eliminarentrada', 
											$regis['RegistroEntrada']['id']
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
  
</div>
</div>
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
<div class="text-center">
      
<?php 
	if(empty($list))
		echo "<strong style='color:#B40431'>No hay resultados que mostrar</strong>" 
?>
</div>
</div>
</div>