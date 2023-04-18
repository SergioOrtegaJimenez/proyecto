<h1>Test</h1>
<div class="row">
  <div class="col-md-8 col-md-offset-2">

    <?php
      echo $this->Form->create('Respuesta', array(
        'inputDefaults' => array(
            'error' => false,
            'div' => array(
              'class' => 'form-group'
            ),
            'class'=>'form-control',
        )));
      $numPregunta = 1;
      $numRespuesta = 1;
      $resultado = 0; ?>


    <?php foreach ($preguntas as $pregunta): ?>


          <!-- Preguntas -->

          <strong>Pregunta <?php echo $numPregunta;?>
          <?php echo $pregunta['Pregunta']['enunciado'];?>
          </strong>
          <br>

        <div class="row">
        <div class="col-md-11 col-md-offset-1">
          <table>
          <?php foreach ($pregunta['Respuesta'] as $respuesta):
            ?>

            <!-- Respuestas -->

            <tr>
              <td>
              <span class='checkbox'>
                <label>
                <?= $this->Form->checkbox('Respuesta.'.$numPregunta.$numRespuesta,array('label' => false,'div' => false,'class' => false,'default' => false));?>
                </label>
              </span>
            </td>
            <td>
              <?= $respuesta['enunciado'] ?>
            </td>
          </tr>
          <?php if ($respuesta['correcta'] == 1)
            $resultado = 1;
                else
                $resultado = 0; ?>
          <?= $this->Form->input('RespuestaCorrecta.'.$numPregunta.$numRespuesta, array('type' => 'hidden','default' => $resultado)); ?>

          <?php
              $numRespuesta += 1;
            endforeach; ?>
      </table>
      </div>
    </div>
    <br>

          <?php unset($respuesta); ?>
          <?php $numPregunta += 1;
          $numRespuesta = 1; ?>

    <?php endforeach; ?>
    <?php unset($pregunta); ?>
    <?= $this->Form->input('id', array('type' => 'hidden','default' => $idTest)); ?>

                  <center><button type="submit" class="btn btn-success">Finalizar</button></center>
  </div>
</div>
