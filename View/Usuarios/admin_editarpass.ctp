<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Editar contraseña del usuario</h3>
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
        //CAMPO CONTRASEÑA

        if ($this->Form->isFieldError('Usuario.password'))
          $clase='form-group has-error';
        else {
          $clase='form-group';
        }
        echo $this->Form->input('Usuario.password', array(
            'label'=> 'Contraseña:<span style="color:red">*</span>',
            'type'=> 'password',
            'placeholder' =>'Introduzca la contraseña...',
            'div'=>array('class'=>$clase),

        ));
        echo $this->Form->error('Usuario.password',null,array('class'=>'help-block','escape'=>false)); 
      ?>
      <?= $this->Form->input('id', array('type' => 'hidden')); ?>
    
	</div>
      <!-- PIE DEL CUADRO -->

      <div class="panel-footer" style="background-color:grey;">
        <div class="row">
          <div class="col-md-10 text-center">
            
			
			<?= $this->Html->link(
              '<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
              array(
                'controller' => 'menus',
                'action' => 'panel',
                'admin' => true
              ),
              array('class' => 'btn btn-danger','escape' => false)
            ); ?>
          
		  
			<button type="reset" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i>Dejar contraseña en blanco</button>
          
			<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar contraseña</button>
          </div>
		</div>
      </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
</div>
