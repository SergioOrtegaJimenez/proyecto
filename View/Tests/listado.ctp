<h1>Listado de tests</h1>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <br>
    <table class="table">
      <thead>
        <tr>
            <th>Nombre</th>
            <th>Numero de preguntas</th>
            <th></th>
        </tr>
      </thead>
      <?php $a=0;?>

        <?php foreach ($tests as $test): ?>
        <tbody>
        <?php  if ($a%2==0)
          $tabla='info';
          else {
            $tabla='';
          }?>
        <tr class="<?= $tabla?>">
            <td><?= $test['Test']['nombre']; ?></td>
            <td><?= $test['Test']['numPregunta']; ?></td>
            <td>
              <div class="text-right">
                  <?= $this->Html->Link(
                  'Realizar test',
                      array(
                        'controller' => 'tests',
                        'action' => 'generar', $test['Test']['id']),
                      array(
                        'class' => 'btn btn-primary','escape'=>false,
                      )); ?>
              </div>
            </td>

        </tr>
        </tbody>
        <?php $a=$a+1;?>
        <?php endforeach; ?>
        <?php unset($test); ?>
    </table>
  </div>
</div>
