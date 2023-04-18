<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Editar unidad</h3>
      </div>
      <div class="panel-body">
        <?php
        echo $this->Form->create('unidad_gasto', array(
            'inputDefaults' => array(
                'error' => false,
                'div' => array(
                  'class' => 'form-group'
                ),
                'class'=>'form-control',
              )));


        //CAMPO NUM_UNIDAD

        if ($this->Form->isFieldError('unidad_gasto.num_unidad'))
          $clase='form-group has-error';
        else {
          $clase='form-group';
        }
        echo $this->Form->input('unidad_gasto.num_unidad', array(
            'label'=> 'Password:<span style="color:red">*</span>',
            'type'=> 'password',
            'placeholder' =>'Introduzca la unicad de gasto...',
            'div'=>array('class'=>$clase),

        ));
        echo $this->Form->error('unidad_gasto.num_unidad',null,array('class'=>'help-block','escape'=>false)); ?>
      </div>
      <?= $this->Form->input('id_unidadgasto', array('type' => 'hidden')); ?>
      <?= $this->Form->input('descripcion', array('type' => 'hidden')); ?>



      <!-- PIE DEL CUADRO -->

      <div class="panel-footer" style="background-color:grey;">
        <div class="row">
          <div class="col-md-6 text-right">

            <?= $this->Html->link(
              'Cancelar',
              array(
                'action' => 'perfil',
                'admin' => false
              ),
              array('class' => 'btn btn-danger')
            ); ?>
          </div>

          <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-success">Cambiar unidad</button>
          </div>
        </div>
      </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
</div>
