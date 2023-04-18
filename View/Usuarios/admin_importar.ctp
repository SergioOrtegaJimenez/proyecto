<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Importar alumnos desde archivo Excel</h3>
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
          )
        ));

          //CAMPO FICHERO
          ?>
          <div class="text-center">
            <? tam= 1024*1024*7;?>
            <input type="hidden" name="MAX_FILE_SIZE" value="tam">
            <?php
            echo $this->Form->file('Usuario.fichero', array(
                'label'=> 'Usuario: *',
                'required' => true,
                'placeholder' =>'Seleccione el documento Excel a importar...'
            ));
            ?>
          </div>

          <div class="text-center">
            <?php
            //CAMPO BORRAR
            ?>
            <div class="checkbox">
              <label>
                <?= $this->Form->checkbox('Usuario.borrar',array('label' => false,'div' => false,'class' => false));?>
                Eliminar los alumnos existentes en la aplicación
              </label>
            </div>
          </div>
      </div>

      <!-- PIE DEL CUADRO -->

      <div class="panel-footer" style="background-color:grey;">
        <div class="row">
          <div class="col-md-6 text-right">

            <?= $this->Html->link(
              'Cancelar',
              array(
                'controller' => 'usuarios',
                'action' => 'index',
              ),
              array('class' => 'btn btn-danger')
            ); ?>
          </div>

          <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-success">Importar usuarios</button>
          </div>
        </div>
      </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
</div>
