<div class="row">
  <div class="col-md-10 col-md-offset-1 text-center">

    <?= $this->Html->image(
       '../img/'.$imagen,
       array(
         'alt'=> $imagen,
         'height'=> '400'
       )
     ) ?>
     <br>
    <h1> <?= $resultado ?> </h1>
    <?= $mensaje ?>
  </div>
</div>

<br><br><br>

<div class="text-center">
  <?= $this->Form->postLink(
    '<i class="glyphicon glyphicon-arrow-left"></i> Volver',
    array(
      'controller' => 'usuarios',
      'action' => 'perfil',
      'admin' => false
      ),
    array(
      'class' => 'btn btn-danger', 'escape' => false,
    ));
  ?>
</div>
