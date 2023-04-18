<?= $this->Html->css(array(
							'pikaday'
						)
					);
?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Nueva salida: <?= $datosPlantilla['Plantilla']['clase_documento']?></h3>
</div>
<div class="panel-body">
        
<?= $this->Form->create('RegistroSalida', array(
													'inputDefaults' => array(
																				'error' => false,
																				'div' => array(
																								'class' => 'form-group'
																							),
																				'class'=>'form-control'
																			)
											)
					);
?>
<?=  $this->Form->input('RegistroSalida.fecha', array(
														'label'=> 'Fecha: ',
														'type'=> 'text',
														'value' => date("d/ m/ Y"),
														'placeholder' =>'Introduzca la fecha...',
														'id' => 'datepicker'
													)
					);
?>
<?=	$this->Html->script(array(
								'moment.min',
								'pikaday'
							)
					); 
?>

<script>
var picker = new Pikaday(
{
field: document.getElementById('datepicker'),
firstDay: 1,
maxDate: new Date(2020, 12, 31),
yearRange: [2000,2020],
format: 'DD/MM/YYYY',
i18n: {
    previousMonth : 'Mes anterior',
    nextMonth     : 'Mes siguiente',
    months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    weekdays      : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
    weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sab']
}
});
</script><div class="pika-single is-bound is-hidden" style="position: static; left: auto; top: auto;"><div class="pika-lendar"><div id="pika-title-hk" class="pika-title" role="heading" aria-live="assertive"><div class="pika-label">June<select class="pika-select pika-select-month" tabindex="-1"><option value="0" disabled="disabled">January</option><option value="1" disabled="disabled">February</option><option value="2" disabled="disabled">March</option><option value="3" disabled="disabled">April</option><option value="4" disabled="disabled">May</option><option value="5" selected="selected">June</option><option value="6">July</option><option value="7">August</option><option value="8">September</option><option value="9">October</option><option value="10">November</option><option value="11">December</option></select></div><div class="pika-label">2017<select class="pika-select pika-select-year" tabindex="-1"><option value="2017" selected="selected">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option></select></div><button class="pika-prev is-disabled" type="button">Previous Month</button><button class="pika-next" type="button">Next Month</button></div><table cellpadding="0" cellspacing="0" class="pika-table" role="grid" aria-labelledby="pika-title-hk"><thead><tr><th scope="col"><abbr title="Monday">Mon</abbr></th><th scope="col"><abbr title="Tuesday">Tue</abbr></th><th scope="col"><abbr title="Wednesday">Wed</abbr></th><th scope="col"><abbr title="Thursday">Thu</abbr></th><th scope="col"><abbr title="Friday">Fri</abbr></th><th scope="col"><abbr title="Saturday">Sat</abbr></th><th scope="col"><abbr title="Sunday">Sun</abbr></th></tr></thead><tbody><tr class="pika-row"><td class="is-empty"></td><td class="is-empty"></td><td class="is-empty"></td><td data-day="1" class="is-disabled" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="1">1</button></td><td data-day="2" class="is-disabled" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="2">2</button></td><td data-day="3" class="is-disabled" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="3">3</button></td><td data-day="4" class="is-disabled" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="4">4</button></td></tr><tr class="pika-row"><td data-day="5" class="is-disabled" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="5">5</button></td><td data-day="6" class="is-today" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="6">6</button></td><td data-day="7" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="7">7</button></td><td data-day="8" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="8">8</button></td><td data-day="9" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="9">9</button></td><td data-day="10" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="10">10</button></td><td data-day="11" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="11">11</button></td></tr><tr class="pika-row"><td data-day="12" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="12">12</button></td><td data-day="13" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="13">13</button></td><td data-day="14" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="14">14</button></td><td data-day="15" class="is-selected" aria-selected="true"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="15">15</button></td><td data-day="16" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="16">16</button></td><td data-day="17" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="17">17</button></td><td data-day="18" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="18">18</button></td></tr><tr class="pika-row"><td data-day="19" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="19">19</button></td><td data-day="20" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="20">20</button></td><td data-day="21" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="21">21</button></td><td data-day="22" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="22">22</button></td><td data-day="23" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="23">23</button></td><td data-day="24" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="24">24</button></td><td data-day="25" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="25">25</button></td></tr><tr class="pika-row"><td data-day="26" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="26">26</button></td><td data-day="27" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="27">27</button></td><td data-day="28" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="28">28</button></td><td data-day="29" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="29">29</button></td><td data-day="30" class="" aria-selected="false"><button class="pika-button pika-day" type="button" data-pika-year="2017" data-pika-month="5" data-pika-day="30">30</button></td><td class="is-empty"></td><td class="is-empty"></td></tr></tbody></table></div></div>
 
<?php
    //CAMPO MODO RECEPCION
	if ($this->Form->isFieldError('RegistroSalida.modoEntrega'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('RegistroSalida.modoEntrega', array(
																	'label'=> 'Modo de envio:',
																	'type'=> 'select',
																	'required' => true,
																	'options' => array(	'Administración electrónica' => 'Administración electrónica',
																						'Correo Interno' => 'Correo Interno', 
																						'Correo Externo' => 'Correo Externo', 
																						'Correo Externo Certificado' => 'Correo Externo Certificado', 
																						'Email' => 'Email', 
																						'Mensajería' => 'Mensajería',
																						'En Mano' =>'En Mano', 
																						'Fax' => 'Fax'
																					),
																	'div'=>array('class'=>$clase)
															)
						);
    echo $this->Form->error('RegistroSalida.modoEntrega',null,array('class'=>'help-block','escape'=>false)); 
?>
<?php
	//CAMPO DESTINO
	if ($this->Form->isFieldError('RegistroSalida.destino'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('RegistroSalida.destino', array(
																'label'=> 'Destino:',
																'type'=> 'text',
																'required' => true,
																'placeholder' =>'Introduzca el destino...',
																'div'=>array('class'=>$clase)
														)
						);
    echo $this->Form->error('RegistroSalida.modoEntrega',null,array('class'=>'help-block','escape'=>false)); 
?>

<label for="RegistroSalidaModoEntrega">Tipo de documento:</label>
         
<?= $datosPlantilla['Plantilla']['clase_documento']; 
?>

<br><br>

<?= $this->Form->input('campo1', array('type' => 'hidden', 'value' => null));
    echo $this->Form->input('campo2', array('type' => 'hidden', 'value' => null));
    echo $this->Form->input('campo3', array('type' => 'hidden', 'value' => null));
    echo $this->Form->input('campo4', array('type' => 'hidden', 'value' => null));
	echo $this->Form->input('campo5', array('type' => 'hidden', 'value' => null));
?>
<?php
	for ($i = 1; $i <= $datosPlantilla['Plantilla']['num_campos']; $i++)
    {
		if ($this->Form->isFieldError('RegistroSalida.campo'.$i))
			$clase='form-group has-error';
        else 
		{
			$clase='form-group';
        }
        if ($datosPlantilla['Plantilla']['campo'.$i] == 'Contenido:')
			$tipo = 'textarea';
        else 
		{
            $tipo = 'text';
        }
		if ($datosPlantilla['Plantilla']['campo'.$i] == '. Descripción:')
			$tipo = 'textarea';
        else 
		{
            $tipo = 'text';
        }
        echo $this->Form->input('RegistroSalida.campo'.$i, array(
																	'label'=> $datosPlantilla['Plantilla']['campo'.$i],
																	'type'=> $tipo,
																	'required' => true,
																	'placeholder' =>'Introduzca el valor...',
																	'div'=>array('class'=>$clase)
																)
							);
    }
	//CAMPO DESTINATARIO
	if ($this->Form->isFieldError('RegistroSalida.usuarioReceptor'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('RegistroSalida.usuarioEmisor', array(
																	'label'=> 'Usuario Emisor:',
																	'type'=> 'select',
																	'options' => $options ,
																	'default' => AuthComponent::user('id'),
																	'div'=>array('class'=>$clase)
																)
						);
    echo $this->Form->error('RegistroSalida.usuarioReceptor',null,array('class'=>'help-block','escape'=>false)); 
?>
<?= $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('id_plantilla', array('type' => 'hidden', 'value' => $datosPlantilla['Plantilla']['id']));
    echo $this->Form->input('usuarioEjecutor', array('type' => 'hidden', 'value' => AuthComponent::user('id')));
    echo $this->Form->input('clase_documento', array('type' => 'hidden', 'value' => $datosPlantilla['Plantilla']['clase_documento'])); 
?>
    
</div>
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">

<?= $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						array(
								'action' => 'indexSalida',
								'admin' => false
							),
						array(	'class' => 'btn btn-danger',
								'escape' => false
							)
					); 
?>
    
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
</div>
</div>
</div>
</div>

<?= $this->Form->end(); 
?>

</div>
</div>