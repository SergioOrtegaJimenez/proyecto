</ul>
<ul class="logout">
<li>
      
<?= $this->Html->link(
						'<i class="fa fas fa-user fa-2x"></i><span class="nav-text text-left">Salir de la aplicación</span>',
						array(
								'controller' => 'usuarios',
								'action' => 'logout',
								'admin' => false
							),
						array(
								'class' => 'btn btn-link','nav-text','escape'=>false
							)
					);
?>
    
</li>
</ul>
</nav>
