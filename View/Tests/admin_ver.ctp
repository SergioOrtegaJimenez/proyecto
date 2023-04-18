<h1><?= $test['Test']['nombre'] ?></h1>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="text-center">
      <?= $this->Html->Link(
      'Nueva pregunta',
          array(
            'controller' => 'preguntas',
            'action' => 'crear', $test['Test']['id'] ),
          array(
            'class' => 'btn btn-primary','escape'=>false,
          ));?>
    </div>
    <br>


    <?php foreach ($test['Pregunta'] as $pregunta): ?>
      <ul class="list-group">
        <li class="list-group-item">

          <!-- Botón de configuración -->

          <div class="btn-group">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cog"></i>
            </button>
            <div class="dropdown-menu">
              <?= $this->Html->link(
                '<i class="fa fa-edit"></i> Editar',
                array(
                  'controller' => 'preguntas',
                  'action' => 'editar',
                  $pregunta['id'],
                ),
                array(
                  'class' => 'dropdown-item',
                  'escape' => false,
                )
              ); ?><br>
              <div class="dropdown-divider"></div>

              <?= $this->Form->postLink(
                '<i class="fa fa-remove"></i> Eliminar',
                array(
                  'controller' => 'preguntas',
                  'action' => 'eliminar',
                  $pregunta['id'], $pregunta['test'],
                ),
                array(
                  'class' => 'dropdown-item text-danger',
                  'confirm' => '¿Desea eliminar la pregunta seleccionada?',
                  'escape' => false,
                )
              ); ?>
            </div>
          </div>

          Pregunta <?php echo $pregunta['id'];?>
          <?php echo $pregunta['enunciado'];?>
          <span class="badge">  <?= $pregunta['tipo'] ?></span>&nbsp;
        </li>

        <!-- Impresión de las imágenes para las preguntas -->
        <?php if(!empty($pregunta['Imagen']))
        { ?>
          <li class="list-group-item">
            <?php foreach ($pregunta['Imagen'] as $imagen):
              echo $this->Html->image(
                  '../files/'.$imagen['fichero'],
                  array(
                    'alt'=> $imagen['titulo'],
                    'height'=> '100',
                  )
                );
              ?>
              <?= $this->Form->postLink(
                'Eliminar',
                array('controller' => 'imagenes', 'action' => 'eliminar', $imagen['id']),
                array('class' => 'btn btn-danger',
                'escape'=>false,
                'confirm' => '¿Estás seguro que quieres eliminar la imagen con nombre '.$imagen['nombre'].'?'));
              ?>
            <?php endforeach; ?>
            <?php unset($imagen); ?>
          </li>
        <?php }; ?>

        <ul>
          <?php foreach ($pregunta['Respuesta'] as $respuesta):
            if ($respuesta['correcta'] == 1) {
              $correcta = '<span class="label label-success">Correcta</span>';
            } else {
              $correcta = '<span class="label label-danger">Incorrecta</span>';
            }
            ?>
          <li class="list-group-item">

            <!-- Botón de configuración -->

            <div class="btn-group">
              <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
              </button>
              <div class="dropdown-menu">
                <?= $this->Html->link(
                  '<i class="fa fa-edit"></i> Editar',
                  array(
                    'controller' => 'respuestas',
                    'action' => 'editar',
                    $respuesta['id'], $pregunta['id'],
                  ),
                  array(
                    'class' => 'dropdown-item',
                    'escape' => false,
                  )
                ); ?><br>

                <div class="dropdown-divider"></div>

                <?= $this->Form->postLink(
                  '<i class="fa fa-remove"></i> Eliminar',
                  array(
                    'controller' => 'respuestas',
                    'action' => 'eliminar',
                    $respuesta['id'], $pregunta['test'],
                  ),
                  array(
                    'class' => 'dropdown-item text-danger',
                    'confirm' => '¿Desea eliminar la pregunta seleccionado?',
                    'escape' => false,
                  )
                ); ?>
              </div>
            </div>

            <!-- Respuestas -->


            <?= $respuesta['enunciado'] ?>
             <div class="pull-right btn-group btn-group-xs" >
               <?= $correcta ?>
            </div>
          </li>

          <!-- Impresión de las imágenes para las respuestas -->
          <?php if(!empty($respuesta['Imagen']))
          { ?>
            <li class="list-group-item">
              <?php foreach ($respuesta['Imagen'] as $imagen):
                echo $this->Html->image(
                    '../files/'.$imagen['fichero'],
                    array(
                      'alt'=> $imagen['titulo'],
                      'height'=> '100',
                    )
                  );
                ?>
                <?= $this->Form->postLink(
                  'Eliminar',
                  array('controller' => 'imagenes', 'action' => 'eliminar', $imagen['id']),
                  array('class' => 'btn btn-danger',
                  'escape'=>false,
                  'confirm' => '¿Estás seguro que quieres eliminar la imagen con nombre '.$imagen['nombre'].'?'));
                ?>
              <?php endforeach; ?>
              <?php unset($imagen); ?>
            </li>
          <?php  }
        endforeach; ?>
          <li class="list-group-item">
          <?= $this->Html->link(
              '',
              array(
                'controller' => 'respuestas',
                'action' => 'crear',
                $pregunta['id']),
              array('class' => 'fa fa-plus-circle'));
              ?></li></ul>

          <?php unset($respuesta); ?>
          </ul>
    <?php endforeach; ?>
    <?php unset($pregunta); ?>
  </div>
</div>
