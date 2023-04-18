<h1>Listado de usuarios</h1>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="text-center">
      <?= $this->Html->Link(
      '<i class="fa fa-user-plus"> Nuevo usuario</i>',
          array(
            'controller' => 'usuarios',
            'action' => 'admin_crear',
            'admin' => true),
          array(
            'class' => 'btn btn-primary','escape'=>false,
          )); ?>

      <?= $this->Html->Link(
      '<i class="fa fa-file-text"> Importar usuarios desde Excel</i>',
          array(
            'controller' => 'usuarios',
            'action' => 'importar'),
          array(
            'class' => 'btn btn-primary','escape'=>false,
          )); ?>
    </div>
    <br>
    <table class="table">
      <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th></th>
        </tr>
      </thead>
      <?php $a=0;?>

        <?php foreach ($usuarios as $usuario): ?>
        <tbody>
        <?php  if ($a%2==0)
          $tabla='info';
          else {
            $tabla='';
          }?>
        <tr class="<?= $tabla?>">
            <td><?= $usuario['Usuario']['id']; ?></td>
            <td><?= $usuario['Usuario']['usuario']; ?></td>
            <td><?= $usuario['Usuario']['rol']; ?></td>
            <td>
              <div class="text-right">
                <div class="btn-group btn-group-sm" >
                  <?php echo $this->Html->link('Editar',
                  array('controller' => 'usuarios', 'action' => 'editar', $usuario['Usuario']['id']),
                  array(
                    'class' => 'btn btn-warning','escape'=>false,
                  )); ?>
                  <?php if ($usuario['Usuario']['rol'] == 'Alumno')
                  {
                   echo $this->Form->postLink(
                    'Eliminar',
                    array('controller' => 'usuarios', 'action' => 'eliminar', $usuario['Usuario']['id']),
                    array('class' => 'btn btn-danger',
                    'escape'=>false,
                    'confirm' => '¿Estás seguro que quieres eliminar el usuario con nombre '.$usuario['Usuario']['usuario'].'?'));
                  }  ?>
                </div>
              </div>
            </td>

        </tr>
        </tbody>
        <?php $a=$a+1;?>
        <?php endforeach; ?>
        <?php unset($usuario); ?>
    </table>

  </div>
</div>
