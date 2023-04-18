<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title">Modificar caso</h3>
      </div>
      <div class="panel-body">

        <?php
        echo $this->Form->create('CasoUsuario', array(
          'inputDefaults' => array(
              'error' => false,
              'div' => array(
                'class' => 'form-group'
              ),
              'class'=>'form-control',
          )));
        ?>
        <table class="table">
          <thead>
            <tr>
                <th>Usuario</th>
                <th>Opciones</th>
                <th>Resultado</th>
                <th>Fecha</th>
                <th></th>
            </tr>
          </thead>
            <tbody>
            <tr>
                <td><?= $resultado['CasoUsuario']['usuario']; ?></td>
                <td><?= $resultado['CasoUsuario']['opciones']; ?></td>
                <td><?= $resultado['CasoUsuario']['resultado']; ?></td>
                <td><?= $resultado['CasoUsuario']['fecha']; ?></td>
            </tr>
          </tbody>
        </table>

				<?php
				//CAMPO OBSERVACIONES

				if ($this->Form->isFieldError('CasoUsuario.observaciones')) {
					$clase = 'form-group has-error';
				} else {
					$clase = 'form-group';
				}
				echo $this->Form->input('CasoUsuario.observaciones', array(
				'label' => 'Observaciones:',
				'type' => 'textarea',
				'div' => array('class' => $clase),
				'id' => 'descripcion'
				));
				echo $this->Form->error('CasoUsuario.observaciones',null,array('class' => 'help-block','escape' => false));
				?>

      	<?= $this->Form->input('id', array('type' => 'hidden', 'default' => $resultado['CasoUsuario']['id'])); ?>
      </div>

      <!-- PIE DEL CUADRO -->

      <div class="panel-footer" style="background-color:grey;">
        <div class="row">
          <div class="col-md-6 text-right">

            <?= $this->Html->link(
              'Cancelar',
              array(
                'controller' => 'usuarios',
                'action' => 'resultados',
                'admin' => true
              ),
              array('class' => 'btn btn-danger')
            ); ?>
          </div>

          <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-success">Guardar cambios</button>
          </div>
        </div>
      </div>
      <?= $this->Form->end(); ?>
    </div>
  </div>
</div>
<?= $this->Html->script(array('Idep.ckeditor/ckeditor' , 'editor.descripcion'), array('inline' => false))?>
