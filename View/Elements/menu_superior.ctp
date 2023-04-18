<nav class="navbar navbar-inverse">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
      
<?php
    echo $this->Html->image(
								'../img/icono.gif',
								array(
										'alt'=> "logo_uco",
										'height'=> '40',
										'class' => 'pull-left'
									)
						);
?>

<span class="navbar-text">
        
<?= $this->Html->link(
                        'OFICINA DE TRANSFERENCIA DE RESULTADOS DE INVESTIGACIÓN',
                        array(
								'controller' => 'menus',
								'action' => 'index',
								'admin' => false
                            ),
                        array(
								'escape' => false,
								'style' => 'color:white'
							)
					);
?>

</span>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<li class="navbar-text">
<strong>
    Bienvenido
          
<?= $this->Html->link(	AuthComponent::user('usuario'),
						array(
								'controller' => 'usuarios',
								'action' => 'perfil',
								'admin' => false
							),
						array(
								'escape' => false
							)
					);
?>
          
</strong>
</li>
<li>
          
<?= $this->Html->link(
						'<i class="glyphicon glyphicon-user"></i> Salir',
						array(
								'controller' => 'usuarios',
								'action' => 'logout',
								'admin' => false
							),
						array(
								'class' => 'btn btn-link','escape'=>false
							)
					);
?>
        
</li>
</ul>
</div>
</div>
</nav>