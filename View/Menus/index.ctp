<?= $this->Html->css(array(
							'responsive-calendar'
						)
					);
?>
<?= $this->Html->script(array (
								'//code.jquery.com/jquery-2.2.4.min.js',
								'//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')); 
?>
<?= $this->Html->script(array (
								'responsive-calendar'
							)
					); 
?>
<?php 
	echo $this->fetch('script'); 
?>

<div class="container">
<div class="row">
<!-- Primer panel -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading text-center">Últimas Entradas</div>
<div class="table-responsive">
<table class="table table-hover">
              
<?php 
	$a=0;
?>
<?php 
	foreach ($entrada as $en):
?>
<?php
    if ($en['Registro_entrada']['clase_documento'] == 'Cheque (art. 83)')
        $tabla='pink';
    elseif ($en['Registro_entrada']['clase_documento'] == 'Comunicación de transferencia') 
	{
        $tabla='yellow';
    }
	elseif ($en['Registro_entrada']['clase_documento'] == 'Contrato (art. 83)') 
	{
        $tabla='orange';
    }
	elseif ($en['Registro_entrada']['clase_documento'] == 'Convenio (art. 83)') 
	{
        $tabla='darkturquoise';
    }
	elseif ($en['Registro_entrada']['clase_documento'] == 'Factura (art. 83) Devuelta') 
	{
        $tabla='beige';
    }elseif ($en['Registro_entrada']['clase_documento'] == 'Factura a Pagar') 
	{
        $tabla='deepskyblue';
    }
	elseif ($en['Registro_entrada']['clase_documento'] == 'Plan Propio Galileo') 
	{
        $tabla='Goldenrod';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'Genérico') 
	{
        $tabla='yellow';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'Genérico Documentos (art. 83)') 
	{
        $tabla='paleturquoise';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'Invitación') 
	{
        $tabla='green';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'Prórroga (art. 83)') 
	{
        $tabla='violet';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'SAC Profesor (art. 83)') 
	{
        $tabla='green';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'SAC Rector (art. 83)') 
	{
        $tabla='red';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'SEF (art. 83)') 
	{
        $tabla='lightgrey';
	}
	elseif ($en['Registro_entrada']['clase_documento'] == 'Solict. Informe') 
	{
        $tabla='magenta';
    }
	else
	{
        $tabla='Goldenrod';
    } 
?>
              
<tbody>
<tr style="background-color:<?= $tabla ?>">
<td><?= $en['Registro_entrada']['fecha']; ?></td>
<td><div style="height: 55px; overflow:hidden;"><?= $en['Registro_entrada']['remitente']; ?></div></td>
</tr>
</tbody>
            
<?php
    $a=$a+1;
    endforeach;
    unset($en); 
?>
              
</table>
</div>
</div>
</div>
<!-- Segundo panel -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading text-center">Últimas Salidas</div>
<div class="table-responsive">
<table class="table table-hover">
              
<?php 
	$a=0;
?>
<?php 
	foreach ($salida as $sl):
?>
<?php
    if ($sl['Registro_salida']['clase_documento'] == 'Cheque (art. 83)')
		$tabla='deepskyblue';
    elseif ($sl['Registro_salida']['clase_documento'] == 'Dietas Gestión Económica') 
	{
        $tabla='khaki';
    }
	elseif ($sl['Registro_salida']['clase_documento'] == 'Factura (art. 83)') 
	{
        $tabla='lightgrey';
    }
	elseif ($sl['Registro_salida']['clase_documento'] == 'Factura Gestión Económica') 
	{
        $tabla='mistyrose';
	}
	elseif ($sl['Registro_salida']['clase_documento'] == 'Plan Propio Galileo') 
	{
		$tabla='Goldenrod';
    }
	elseif ($sl['Registro_salida']['clase_documento'] == 'Genérico') 
	{
        $tabla='yellow';
    }
	elseif ($sl['Registro_salida']['clase_documento'] == 'Genérico Documentos (art. 83') 
	{
        $tabla='paleturquoise';
    }
	elseif ($sl['Registro_salida']['clase_documento'] == 'Informe (art. 83)') 
	{
        $tabla='greenyellow';
	}
	elseif ($sl['Registro_salida']['clase_documento'] == 'Prórroga (art. 83)') 
	{
        $tabla='bisque';
    }
	elseif ($sl['Registro_salida']['clase_documento'] == 'SAC Profesor (art. 83)') 
	{
        $tabla='green';
	}
	elseif ($sl['Registro_salida']['clase_documento'] == 'SAC Rector (art. 83)') 
	{
        $tabla='red';			
    }
	else
	{
        $tabla='white';
    }
?>

<tbody>
<tr style="background-color:<?= $tabla ?>">
<td><?= $sl['Registro_salida']['fecha']; ?></td>
<td><div style="height: 55px; overflow:hidden;"><?= $sl['Registro_salida']['destino']; ?></div></td>
</tr>
</tbody>
            
<?php
    $a=$a+1;
    endforeach;
    unset($sl); 
?>
              
</table>
</div>
</div>
</div> 
</div>
<div class="row">
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading text-center">Últimos pedidos (en espera)</div>
<div class="table-responsive">
<table class="table table-hover">
              
<?php 
	$a=0;
?>
<?php 
	foreach ($list as $ls):
?>
              
<tbody>
                
<?php  
	if ($a%2==0)
    $tabla='info';
    else 
	{
        $tabla='';
    } 
?>
                
<tr class="<?= $tabla?>">
<td><?= $ls['Pedido']['fecha_solicitud']; ?></td>
<td><div style="height: 55px; overflow:hidden;"><?= $nombre[$ls['Pedido']['id_proveedor']]; ?></div></td>
</tr>
</tbody>
            
<?php
    $a=$a+1;
    endforeach;
    unset($ls); 
?>
           		  
</table>
</div>
</div>
</div>  
<div class="col-md-2">
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading text-center">Agenda</div>
<div class="row" style="margin-top:40px; margin-bottom:40px;">
<div class="col-md-12 text-center indice">
		
<?php
    echo $this->Html->link(
							'<i class="fa fa-id-badge" aria-hidden="true"></i> Nueva Fecha',
							array(
									'controller' => 'eventos',
									'action' => 'add'
								),
							array(
									'class' => 'btn btn-default', 'escape' => false
								)
						);
?>
                
</div>
</div>
</div>
</div>
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading text-center">Administración</div>
<div class="row" style="margin-top:40px; margin-bottom:40px;">
<div class="col-md-12 text-center indice">
		
<?php 
	if (AuthComponent::user('rol') == 'Administrador')
	{
		echo $this->Html->link(
								'<i class="fa fa-id-badge" aria-hidden="true"></i> Administrar',
								array(
										'controller' => 'menus',
										'action' => 'panel',
										'admin' => true
									),
								array(
										'class' => 'btn btn-default', 'escape' => false
									)
							);
	}
	else 
	{
		echo $this->Html->link(
								'<i class="fa fa-id-badge" aria-hidden="true"></i> Administrar perfil',
								array(
										'controller' => 'usuarios',
										'action' => 'perfil'
									),
								array(
										'class' => 'btn btn-default', 'escape' => false
									)
							);
	}
?>
                
</div>
</div>
</div>
</div>
</div>
<!-- Responsive calendar - START -->
<div class="col-md-4">
<div class="panel panel-primary">
<div class="page">
<!-- Responsive calendar - START -->
<div class="responsive-calendar">
<div class="controls">
<a class="pull-left" data-go="prev"><div class="btn"><i class="fa fa-chevron-left"></i></div></a>
<h4><span data-head-year></span> <span data-head-month></span></h4>
<a class="pull-right" data-go="next"><div class="btn"><i class="fa fa-chevron-right"></i></div></a>
</div><hr></hr>
<div class="day-headers">
<div class="day header">Lun</div>
<div class="day header">Mar</div>
<div class="day header">Mie</div>
<div class="day header">Jue</div>
<div class="day header">Vie</div>
<div class="day header">Sáb</div>
<div class="day header">Dom</div>
</div>
<div class="days" data-group="days">
<!-- the place where days will be generated -->
</div>
</div>
<!-- Responsive calendar - END -->
<!-- Placeholder -->
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h6 class="modal-title" id="myModalLabel">Evento: </h6>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
<!-- 
<?php 
	if (AuthComponent::user('rol') == 'Administrador')
	{
		echo $this->element('menu_admin');
	}
?> 
-->
</div>
<script>
    eventos = {}
    num_eventos = {};

    <?php foreach ($events as $ev):?>
    <?php foreach ($numeventos as $ne): ?>
    fecha = "<?= $ev['Evento']['fecha']; ?>";
    descripcion = "<?= $ev['Evento']['descripcion']; ?>";
    descripcion2 = "<?= $ne['Evento']['descripcion']; ?>";
    tipo = "<?= $ev['Evento']['tipo']; ?>";
    tipo2 = "<?= $ne['Evento']['tipo']; ?>";
    id = "<?= $ev['Evento']['id_tipo']; ?>";
    id2 = "<?= $ne['Evento']['id_tipo']; ?>";
    fecha2 = "<?= $ne['Evento']['fecha']; ?>";
    num_eventos = "<?= $ne[0]['count']; ?>";
    if(fecha == fecha2)
    {
      eventos[fecha] = {
      "number": num_eventos,
      "badgeClass": "badge-warning",
      "dayEvents": [{"title":tipo,"status":descripcion,"id":id}]
    };
      if(descripcion != descripcion2){
      eventos[fecha].dayEvents.push({"title":tipo2,"status":descripcion2,"id":id2});
      }
    }
    <?php endforeach; ?>
    <?php endforeach; ?>

(function($) {
  /**
   *  Fade Out Modal
   */
  function fadeOutModalBox(num) {
    setTimeout(function(){ $(".responsive-calendar-modal").fadeOut(); }, num);
  }
  /**
   *  Helper Function
   */
  function zero(num) {
    if (num < 10) { return "0" + num; }
    else { return "" + num; }
  }
  /**
   *    Remove Modal
   */
  function removeModalBox() { $(".responsive-calendar-modal").remove(); }
  /**
   *  Calender
   */
  $(document).ready(function() {

    var $cal = $('.responsive-calendar');
    $cal.responsiveCalendar({
      events : eventos, /* end events */
      onActiveDayClick: function(events) {
        var $today, $dayEvents, $i, $isHoveredOver, $placeholder, $output;
        $i = $(this).data('year')+'-'+zero($(this).data('month'))+'-'+zero($(this).data('day'));
        $isHoveredOver = $(this).is(":hover");
        $placeholder = $(".modal-body");
        $today= events[$i];
        $dayEvents = $today.dayEvents;
        $output = '<div class="responsive-calendar-modal">';
        $.each($dayEvents, function() {
          $.each( $(this), function( key ){
            $output += '<h2>Evento: '+$(this)[key].title+'</h2>' + '<h4>Descripción: '+$(this)[key].status+'<br />'+'Número: '+$(this)[key].id+'</h4>';
          });
        });
        $output + '</div>';

        if ( $isHoveredOver ) {
          $placeholder.html($output);
          $('#modal2').modal({
            show: true,
            backdrop: false
        })
        }
        else {
          fadeOutModalBox(500);
          //  removeModalBox();
        }

        },
    }); /* end $cal */
  }); /* end $document */
}(window.jQuery || window.$));
</script>