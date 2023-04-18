<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Crear plantilla</h3>
</div>
<div class="panel-body">
        
<?php
    echo $this->Form->create(	'Plantilla', array(
													'inputDefaults' => array(
																				'error' => false,
																				'div' => array(
																								'class' => 'form-group'
																							),
																				'class'=>'form-control'
																			)
												)
							);
    $tipo = $this->request->params['pass'][0];
	//CAMPO CLASE DOCUMENTO
	if ($this->Form->isFieldError('Plantilla.clase_documento'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input(	'Plantilla.clase_documento', array(
																	'label'=> 'Clase de Documento',
																	'type'=> 'text',
																	'required' => true,
																	'placeholder' =>'Introduzca la clase del documento...',
																	'div'=>array('class'=>$clase)
																)
						);
    echo $this->Form->error('Plantilla.clase_documento',null,array('class'=>'help-block','escape'=>false)); 
?>

<label for="">Tipo de documento</label>
<select name="opcionEntrada" class="form-control" size="1" style="color:black;">
	<option class="yellow" value="yellow"> Amarillo </option>
    <option class="red" value="red"> Rojo </option>
    <option class="green" value="green"> Verde </option>
    <option class="lightgrey" value="lightgrey"> Gris </option>
    <option class="DeepSkyBlue" value="DeepSkyBlue"> DeepSkyBlue </option>
    <option class="violet" value="violet"> Violeta </option>
    <option class="brown" value="brown"> Marron </option>
    <option class="orange" value="orange"> Naranja </option>
    <option class="pink" value="pink"> Rosa </option>
    <option class="magenta" value="magenta"> Magenta </option>
    <option class="cyan" value="cyan"> Cyan </option>
    <option class="LemonChiffon" value="LemonChiffon"> Limon </option>
    <option class="PapayaWhip" value="PapayaWhip"> PapayaWhip </option>
    <option class="PeachPuff" value="PeachPuff"> PeachPuff </option>
    <option class="Khaki" value="Khaki"> Khaki </option>
    <option class="Orchid" value="Orchid"> Orchid </option>
    <option class="SlateBlue" value="SlateBlue"> SlateBlue </option>
    <option class="Coral" value="Coral"> Coral </option>
    <option class="GreenYellow" value="GreenYellow"> GreenYellow </option>
    <option class="MediumSpringGreen" value="MediumSpringGreen"> MediumSpringGreen </option>
    <option class="PaleTurquoise" value="PaleTurquoise"> PaleTurquoise </option>
    <option class="DarkTurquoise" value="DarkTurquoise"> DarkTurquoise </option>
    <option class="LightSkyBlue" value="LightSkyBlue"> LightSkyBlue </option>
    <option class="LightSteelBlue" value="LightSteelBlue"> LightSteelBlue </option>
    <option class="CadetBlue" value="CadetBlue"> CadetBlue </option>
    <option class="Bisque" value="Bisque"> Bisque </option>
    <option class="SandyBrown" value="SandyBrown"> SandyBrown </option>
    <option class="RosyBrown" value="RosyBrown"> RosyBrown </option>
    <option class="Goldenrod" value="Goldenrod"> Goldenrod </option>
    <option class="MintCream" value="MintCream"> MintCream </option>
    <option class="Beige" value="Beige"> Beige </option>
    <option class="AntiqueWhite" value="AntiqueWhite"> AntiqueWhite </option>
    <option class="MistyRose" value="MistyRose"> MistyRose </option>
    <option class="Gainsboro" value="Gainsboro"> Gainsboro </option>
</select>
<br>
<b>Rellena solo los campos que vayas a necesitar</b>
<br><br>

<?php
	//CAMPO CAMPO 1
	if ($this->Form->isFieldError('Plantilla.campo1'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input(	'Plantilla.campo1', array(
															'label'=> 'Campo1',
															'type'=> 'text',
															'required' => true,
															'placeholder' =>'Introduzca el texto para el campo...',
															'div'=>array('class'=>$clase
																		),
														)
						);
    echo $this->Form->error('Plantilla.campo1',null,array('class'=>'help-block','escape'=>false));
	//CAMPO CAMPO 2
	if ($this->Form->isFieldError('Plantilla.campo2'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Plantilla.campo2', array(
														'label'=> 'Campo2',
														'type'=> 'text',
														'placeholder' =>'Introduzca el texto para el campo...',
														'div'=>array('class'=>$clase)
													)
						);
    echo $this->Form->error('Plantilla.campo2',null,array('class'=>'help-block','escape'=>false));
	//CAMPO CAMPO 3
	if ($this->Form->isFieldError('Plantilla.campo3'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Plantilla.campo3', array(
														'label'=> 'Campo3',
														'type'=> 'text',
														'placeholder' =>'Introduzca el texto para el campo...',
														'div'=>array('class'=>$clase
																	)
													)
						);
    echo $this->Form->error('Plantilla.campo3',null,array('class'=>'help-block','escape'=>false));
    //CAMPO CAMPO 4
	if ($this->Form->isFieldError('Plantilla.campo4'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Plantilla.campo4', array(
														'label'=> 'Campo4',
														'type'=> 'text',
														'placeholder' =>'Introduzca el texto para el campo...',
														'div'=>array('class'=>$clase)
													)
						);
    echo $this->Form->error('Plantilla.campo4',null,array('class'=>'help-block','escape'=>false));
	//CAMPO CAMPO 5 (solo para la plantilla de Factura de Gest. Econ.)
	if ($this->Form->isFieldError('Plantilla.campo5'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input('Plantilla.campo5', array(
														'label'=> 'Campo5',
														'type'=> 'text',
														'placeholder' =>'Introduzca el texto para el campo...',
														'div'=>array('class'=>$clase)
													)
						);
    echo $this->Form->error('Plantilla.campo5',null,array('class'=>'help-block','escape'=>false));
	echo $this->Form->input('id', array('type' => 'hidden')); 
?>
    
</div>
<!-- PIE DEL CUADRO -->
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">
            
<?= $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						array(
								'controller' => 'menus',
								'action' => 'panel',
								'admin' => true
							),
						array('class' => 'btn btn-danger','escape' => false)
					); 
?>
          
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar plantilla</button>
</div>
</div>
</div>
      
<?= $this->Form->end(); 
?>

</div>
</div>
</div>