<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
<div class="panel-heading text-center">ADMINISTRACIÓN</div>
<div class="panel-body">
<br>
<div class="col-md-4 col-md-offset-4">
        
<?= $this->Html->link(
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
?>
</div>
</div>
</div>
</div>
</div>
