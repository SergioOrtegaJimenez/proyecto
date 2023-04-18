<?= $this->Html->css(array(
  'login'));
  ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3 text-center">
    <br>
    <img src="../img/logo1.png" alt="logo_otri" width="250"/>
    <br>
    <?= $this->Session->flash('peligro', array('element' => 'auth')); ?>
    <?php
    echo $this->Form->create('Usuario', array(
          'inputDefaults' => array(
              'error' => false,
              'div' => array(
                'class' => 'form-group'
              ),
              'class'=>'form-control',
          )));
    ?>
    <br><br>
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <div class="panel panel-primary">
          <div class="camposLogin">
          <div class="panel-body">
            <?= $this->Form->input('Usuario.usuario', array(
                'label'=> '<p style="font-size: 20px; color:black">Usuario:</p>',
                'type'=> 'text',
                'placeholder' =>'Introduzca el usuario...',
            ));
            ?>
            <br>

            <?= $this->Form->input('Usuario.password', array(
                'label'=> '<p style="font-size: 20px; color:black">Contraseña:</p>',
                'type'=> 'password',
                'placeholder' =>'Introduzca la contraseña...',
            ));
            ?>

          </div>
        </div>
        <div class="panel-footer" style="background-color:grey;">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <button type="submit" class="btn btn-success">Login</button>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
