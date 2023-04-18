<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">A&ntilde;adir IP</h3>
</div>
<div class="panel-body">
        
<?php
    echo $this->Form->create(	'Ip_permitida', array(
														'inputDefaults' => array(
																					'error' => false,
																					'div' => array(
																									'class' => 'form-group'
																								),
																					'class'=>'form-control'
																				)
													)
							);
	//CAMPO DIRECCION
	if ($this->Form->isFieldError('Ip_permitida.direccionIP'))
        $clase='form-group has-error';
    else 
	{
        $clase='form-group';
    }
    echo $this->Form->input(	'Ip_permitida.direccionIP', array(
																	'label'=> 'Direcci&oacute;n IP',
																	'type'=> 'text',
																	'placeholder' =>'Introduzca la direcc. IP...',
																	'div'=>array('class'=>$clase)
																)
						);
    echo $this->Form->error('Ip_permitida.direccionIP',null,array('class'=>'help-block','escape'=>false));
	echo $this->Form->input('id', array('type' => 'hidden')); 
?>
    
</div>
<!-- PIE DEL CUADRO -->
<div class="panel-footer" style="background-color:grey;">
<div class="row">
<div class="col-md-6 text-right">
            
<?= $this->Html->link(
						'<i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar',
						array(
								'controller' => 'menus',
								'action' => 'panel',
								'admin' => true
							),
						array('class' => 'btn btn-danger','escape' => false
							)
					); 
?>
          
</div>
<div class="col-md-6 text-left">
<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar IP</button>
</div>
</div>
</div>

<?= $this->Form->end(); 
?>
    
</div>
</div>
</div>