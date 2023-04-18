<nav class="main-menu">
<ul>
<li>
<?= $this->Html->link(
						'<i class="fa fas fa-home fa-2x"></i> <span class="nav-text text-left">Inicio</span>',
						array(
								'controller' => 'usuarios',
								'action' => 'perfil',
								'admin' => false
							),
						array(
								'class' => 'btn btn-link','nav-text','escape'=>false
							)
					)
?>
                
</li>
<li>

<?= $this->Html->link(
						'<i class="fa fas fa-laptop fa-2x"></i> <span class="nav-text text-left">Caso pŕactico</span>',
						array(
								'controller' => 'casos',
								'action' => 'index',
								'admin' => false
							),
						array(
								'class' => 'btn btn-link','nav-text','escape'=>false
							)
					)
?>
                
</li>
<li class="has-subnav">
									
<?= $this->Html->link(
						'<i class="fa fas fa-steam fa-2x"></i> <span class="nav-text text-left">Simulación</span>',
						array(
								'controller' => 'estados',
								'action' => 'ver',
								'admin' => false,1
							),
							array(
									'class' => 'btn btn-link','nav-text','escape'=>false
								)
					)
?>
								
</li>
<li class="has-subnav">
                  
<?= $this->Html->link(
						'<i class="fa fas fa-stack-overflow fa-2x"></i> <span class="nav-text text-left">Test</span>',
						array(
								'controller' => 'tests',
								'action' => 'listado',
								'admin' => false
							),
						array(
								'class' => 'btn btn-link','nav-text','escape'=>false
							)
					)
?>
                
</li>