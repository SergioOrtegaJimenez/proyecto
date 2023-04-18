<div class="row">
  <div class="col-md-6">
    <h1>Resultados simulación</h1>
    <table class="table">
      <thead>
        <tr>
            <th>Usuario</th>
            <th>Opciones</th>
            <th>Resultado</th>
            <th>Observaciones</th>
            <th>Fecha</th>
        </tr>
      </thead>
      <?php $a = 0;?>

        <?php foreach ($resultadosSimulacion as $resultado): ?>
        <tbody>
        <?php  if ($a % 2 == 0)
          $tabla='info';
          else {
            $tabla='';
          }?>
        <tr class="<?= $tabla?>">
            <td><?= $resultado['CasoUsuario']['usuario']; ?></td>
            <td><?= $resultado['CasoUsuario']['opciones']; ?></td>
            <td><?= $resultado['CasoUsuario']['resultado']; ?></td>
            <td><?= $resultado['CasoUsuario']['observaciones']; ?></td>
            <td><?= $resultado['CasoUsuario']['fecha']; ?></td>
        </tr>
      </tbody>
      <?php $a=$a+1;?>
      <?php endforeach; ?>
      <?php unset($resultado); ?>
    </table>
  </div>

  <div class="col-md-6">
    <h1>Resultados test</h1>
    <table class="table">
      <thead>
        <tr>
            <th>Usuario</th>
            <th>Test</th>
            <th>Resultado</th>
            <th>Aprobado</th>
            <th>Fecha</th>
        </tr>
      </thead>
      <?php $a = 0; ?>
        <?php foreach ($resultadosTest as $resultado): ?>
        <tbody>
        <?php  if ($a % 2 == 0)
          $tabla='info';
          else {
            $tabla='';
          }?>

        <?php  if ($resultado['TestUsuario']['aprobado'] == 0)
          $aprobado = 'No';
          else {
            $aprobado = 'Si';
          }?>
        <tr class="<?= $tabla?>">
            <td><?= $resultado['TestUsuario']['usuario']; ?></td>
            <td><?= $resultado['TestUsuario']['test']; ?></td>
            <td><?= $resultado['TestUsuario']['resultado']; ?></td>
            <td><?= $aprobado; ?></td>
            <td><?= $resultado['TestUsuario']['fecha']; ?></td>
        </tr>
      </tbody>
      <?php $a=$a+1;?>
      <?php endforeach; ?>
      <?php unset($resultado); ?>
    </table>
  </div>
</div>

<!--Boton volver-->

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
