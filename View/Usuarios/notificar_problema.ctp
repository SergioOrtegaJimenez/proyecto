<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Notificar problema</h3>
      </div>
      <div class="panel-body">
        <?php
        echo $this->Form->create('Problema', array(
            'inputDefaults' => array(
                'error' => false,
                'div' => array(
                  'class' => 'form-group'
                ),
                'class'=>'form-control',
              )));

              //CAMPO MENSAJE

              if ($this->Form->isFieldError('Problema.mensaje'))
                $clase='form-group has-error';
              else {
                $clase='form-group';
              }
              echo $this->Form->input('Problema.mensaje', array(
                  'label'=> 'Mensaje:',
                  'type'=> 'textarea',
                  'placeholder' =>'Describa el problema de la aplicación...',
                  'div'=>array('class'=>$clase),
              ));
              echo $this->Form->error('Problema.mensaje',null,array('class'=>'help-block','escape'=>false)); ?>

                      </div>

<!--PIE DEL CUADRO-->

<div class="panel-footer" style="background-color:grey;">
  <div class="row">
    <div class="col-md-6 text-right">

      <?= $this->Html->link(
        '<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
        array(
          'action' => 'perfil',
          'admin' => false
        ),
        array('class' => 'btn btn-danger','escape' => false)
      ); ?>
    </div>

    <div class="col-md-6 text-left">
      <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Enviar mensaje</button>
    </div>
  </div>
</div>
</div>
<?= $this->Form->end();
?>
</div>
</div>
