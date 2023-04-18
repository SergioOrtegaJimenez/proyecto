<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Crear usuario</h3>
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


          //CAMPO NOMBRE


          if ($this->Form->isFieldError('Usuario.nombre'))
            $clase='form-group has-error';
          else {
            $clase='form-group';
          }
          echo $this->Form->input('Usuario.nombre', array(
              'label'=> 'Nombre completo:<span style="color:red">*</span>',
              'type'=> 'text',
              'placeholder' =>'Introduzca el nombre...',
              'div'=>array('class'=>$clase),

          ));
          echo $this->Form->error('Usuario.nombre',null,array('class'=>'help-block','escape'=>false));

        //CAMPO USUARIO


        if ($this->Form->isFieldError('Usuario.usuario'))
          $clase='form-group has-error';
        else {
          $clase='form-group';
        }
        echo $this->Form->input('Usuario.usuario', array(
            'label'=> 'Usuario:<span style="color:red">*</span>',
            'type'=> 'text',
            'placeholder' =>'Introduzca el usuario...',
            'div'=>array('class'=>$clase),

        ));
        echo $this->Form->error('Usuario.usuario',null,array('class'=>'help-block','escape'=>false));


        //CAMPO CORREO


        if ($this->Form->isFieldError('Usuario.email'))
          $clase='form-group has-error';
        else {
          $clase='form-group';
        }
        echo $this->Form->input('Usuario.email', array(
            'label'=> 'Correo:<span style="color:red">*</span>',
            'type'=> 'text',
            'placeholder' =>'Introduzca el email...',
            'div'=>array('class'=>$clase),

        ));
        echo $this->Form->error('Usuario.email',null,array('class'=>'help-block','escape'=>false));


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
        echo $this->Form->error('Usuario.password',null,array('class'=>'help-block','escape'=>false)); ?>

		
		
		
		
		
		
		
		

		 <?php
      //CAMPO ESTADO

      echo $this->Form->input('Usuario.estado', array(
        'class' => 'form-control',
        'type' => 'select',
        'options' => array('Usuario Activo' => 'Usuario Activo','Usuario Inactivo' => 'Usuario Inactivo'),
        'label'=> 'Estado del usuario:<span style="color:red">*</span>',
        'required' => true,
        'error' => false
      ));
	  echo $this->Form->error('Estado.actividad',null,array('class'=>'help-block','escape'=>false));
      ?>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      <?php
      //CAMPO ROL

      echo $this->Form->input('rol', array(
        'class' => 'form-control',
        'type' => 'select',
        'options' => array('Otrero' => 'Otrero','Administrador' => 'Administrador','Registrador' => 'Registrador'),
        'default' => 'Alumno',
        'label'=> 'Rol:<span style="color:red">*</span>',
        'required' => true,
        'error' => false
      ));
      ?>
      <?= $this->Form->input('id', array('type' => 'hidden')); ?>
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
            ); ?>
          </div>
          <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar usuario</button>
          </div>
        </div>
      </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
</div>
