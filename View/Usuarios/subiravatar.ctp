<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Subir avatar</h3>
      </div>
      <div class="panel-body">
        <?php
          echo $this->Form->create('Usuario', array(
            'type' => 'file',
            'inputDefaults' => array(
            'error' => false,
            'div' => array(
                          'class' => 'form-group'
                        ),
                        'class'=>'form-control',
                      )));
                      echo $this->Form->file('Usuario.avatar', array(
                  'label'=> 'Avatar: *',
                  'required' => false,
                  'placeholder' =>'Seleccione un avatar...',
                  'style' => 'display:inline'
              ));
      echo $this->Form->input('id', array('type' => 'hidden')); ?>
      <?= $this->Form->input('usuario', array('type' => 'hidden')); ?>
    </div>



      <!-- PIE DEL CUADRO -->

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
        <?php
            echo $this->Form->submit(
            'Aceptar', array(
                'name'=>'subiravatar',
                'div' => false,
                'class' => 'btn btn-success'));
            echo $this->Form->end(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
