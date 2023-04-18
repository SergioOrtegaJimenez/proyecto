<h1>Bienvenido <?= $usuario['Usuario']['usuario']; ?></h1>

<div class="row">
  <div class="col-md-8 col-md-offset-1">
    <?= $this->Html->image(
       '../img/scai.jpg',
       array(
         'alt'=> "perfil",
         'height'=> '500',
         'class' => 'pull-left'
       )
     );?>
  </div>

  <div class="col-md-3">

    <div class="list-group">
      <?= $this->Html->link(
        '<i class="fa fa-user-secret fa-fw"></i>&nbsp; Cambiar contraseña',
        array(
          'controller' => 'usuarios',
          'action' => 'contrasena',
          'admin' => false),
          array(
           'class' => 'list-group-item','nav-text','escape'=>false,
           )
      )?>
      <?= $this->Html->link(
        '<i class="fa fa-user-secret fa-fw"></i>&nbsp; Cambiar avatar',
        array(
          'controller' => 'usuarios',
          'action' => 'subiravatar',
          'admin' => false),
          array(
           'class' => 'list-group-item','nav-text','escape'=>false,
           )
      )?>

      <?= $this->Html->link(
      '<i class="fa fa-wikipedia-w fa-fw"></i>&nbsp; Ayuda',
      array(
        'action' => false,
        'admin' => false),
        array(
         'class' => 'list-group-item disabled','nav-text','escape'=>false,
         )
      )?>

      <?= $this->Html->link(
        '<i class="fa fa-edge fa-fw"></i>&nbsp; Informar problema',
        array(
          'controller' => 'usuarios',
          'action' => 'notificarProblema',
          'admin' => false),
          array(
           'class' => 'list-group-item','nav-text','escape'=>false,
           )
      )?>
    </div>
  </div>
</div>
