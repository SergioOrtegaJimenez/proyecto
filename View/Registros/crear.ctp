<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Generar plantilla</h3>
      </div>
      <div class="panel-body">
<?= $this->Html->css(array(
  'mystyle')); ?>
<?php
echo $this->Form->create('RegistroEntrada', array(
    'inputDefaults' => array(
        'error' => false,
        'div' => array(
          'class' => 'form-group'
        ),
        'class'=>'form-control',
      )));
	  
	  
?>
<label for="">Tipo de documento</label>
<select name="opcionEntrada" class="form-control" size="1" style="color:black;">
  <option value="0">Selecciona una Plantilla</option>
  <option style="font-size: 1.4em; background-color:pink;"          value="10">Cheque (art. 83)</option>
  <option style="font-size: 1.4em; background-color:yellow;"        value="32">Comunicación de transferencia</option>
  <option style="font-size: 1.4em; background-color:orange;"        value="9">Contrato (art. 83)</option>
  <option style="font-size: 1.4em; background-color:darkturquoise;" value="26">Convenio (art. 83)</option>
  <option style="font-size: 1.4em; background-color:beige;"         value="25">Factura (art. 83) Devuelta</option>
  <option style="font-size: 1.4em; background-color:deepskyblue;"   value="7">Factura a Pagar</option>
  <option style="font-size: 1.4em; background-color:Goldenrod;"     value="31">Plan Propio Galileo</option>
  <option style="font-size: 1.4em; background-color:yellow;"        value="1">Genérico</option>
  <option style="font-size: 1.4em; background-color:paleturquoise;" value="28">Genérico Documentos (art. 83)</option>
  <option style="font-size: 1.4em; background-color:green;"         value="5">Invitación</option>
  <option style="font-size: 1.4em; background-color:violet;"        value="8">Prórroga (art. 83)</option>
  <option style="font-size: 1.4em; background-color:green;"         value="4">SAC Profesor (art. 83)</option>
  <option style="font-size: 1.4em; background-color:red;"           value="3">SAC Rector (art. 83)</option>
  <option style="font-size: 1.4em; background-color:lightgrey;"     value="6">SEF (art. 83)</option>
  <option style="font-size: 1.4em; background-color:magenta;"       value="11">Solict. Informe</option>
</select>
</div>
<!-- PIE DEL CUADRO -->

<div class="panel-footer" style="background-color:grey;">
  <div class="row">
    <div class="col-md-6 text-right">

      <?= $this->Html->link(
        'Cancelar',
        array(
          'action' => 'index',
          'admin' => false
        ),
        array('class' => 'btn btn-danger')
      ); ?>
    </div>

    <div class="col-md-6 text-left">
      <button type="submit" class="btn btn-success">Seleccionar plantilla</button>
    </div>
  </div>
</div>
<?= $this->Form->end(); ?>
</div>
</div>
</div>
