<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Cambiar contraseña</h3>
      </div>
      <div class="panel-body">
        <?php
        echo $this->Form->create('Usuario', array(
            'inputDefaults' => array(
                'error' => false,
                'div' => array(
                  'class' => 'form-group'
                ),
                'class'=>'form-control',
              )));

        echo '<strong>Usuario:</strong> '.$this->request->data['Usuario']['usuario'];
		?>
		</div>
		<div class="panel-body">
		<?php
        //CAMPO CONTRASEÑA
        if ($this->Form->isFieldError('Usuario.password'))
          $clase='form-group has-error';
        else {
          $clase='form-group';
        }
        echo $this->Form->input('Usuario.password', array(
            'label'=> 'Password:<span style="color:red">*</span>',
            'type'=> 'password',
            'placeholder' =>'Introduzca la contraseña...',
            'div'=>array('class'=>$clase),

        ));
        echo $this->Form->error('Usuario.password',null,array('class'=>'help-block','escape'=>false)); ?>
      </div>
      <?= $this->Form->input('id', array('type' => 'hidden')); ?>
      <?= $this->Form->input('usuario', array('type' => 'hidden')); ?>


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
            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Cambiar contraseña</button>
          </div>
        </div>
      </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
</div>
