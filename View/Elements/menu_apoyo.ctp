<div class="menu-apoyo">
<ul>
<li id="iniciomenu">
    
<?= $this->Html->link(
						'Inicio',
						array(
								'controller' => 'menus',
								'action' => 'index',
								'admin' => false
							),
						array(
								'escape' => false,	
							)
					);
?>
			  
</li>
<li class="bajarmenu">
<a href="#" id="menu1" class="menu-desplegable">Registro de entrada</a>
<div class="bajarmenu-content">
        
<?= $this->Html->link(
						'Nueva entrada',
						array(
								'controller' => 'registros',
								'action' => 'crear',
								'admin' => false
							),
						array(
								'escape' => false
							)
					);			
?>
		
				  
						
				  

        <?= $this->Html->link(
                    'Ver este mes',
                    array(
                      'controller' => 'registros',
                      'action' => 'verMes',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Buscar',
                    array(
                      'controller' => 'registros',
                      'action' => 'buscar',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
		
      </div>
	  
	  
	</li>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu2" class="menu-desplegable">Registro de salida</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Nueva salida',
                    array(
                      'controller' => 'registros',
                      'action' => 'crearSalida',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Ver este mes',
                    array(
                      'controller' => 'registros',
                      'action' => 'verMesSalida',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Buscar',
                    array(
                      'controller' => 'registros',
                      'action' => 'buscarSalida',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu3" class="menu-desplegable">Unidad de gasto</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Listado',
                    array(
                      'controller' => 'UnidadGastos',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Añadir Unidad de Gasto',
                    array(
                      'controller' => 'UnidadGastos',
                      'action' => 'addunidad',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu4" class="menu-desplegable">Servicios</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Listado',
                    array(
                      'controller' => 'Servicios',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Añadir Servicio',
                    array(
                      'controller' => 'Servicios',
                      'action' => 'addServicio',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu5" class="menu-desplegable">Proveedores</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Listado',
                    array(
                      'controller' => 'Proveedores',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
                  <?= $this->Html->link(
                              'Añadir Proveedor',
                              array(
                                'controller' => 'Proveedores',
                                'action' => 'addproveedor',
                                'admin' => false
                                ),
                              array(
                                'escape' => false,
                              ));
                            ?>
        <?= $this->Html->link(
        '<i class="fa fa-download" aria-hidden="true"></i> Listado Pdf</i>',
            array(
              'controller' => 'proveedores',
              'action' => 'pdf',
               1,
              'ext' => 'pdf'),
            array(
              'escape'=>false,
            )); ?>

      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu6" class="menu-desplegable">Pedidos</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Listado',
                    array(
                      'controller' => 'pedidos',
                      'action' => 'iniciopedido',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Añadir Pedido',
                    array(
                      'controller' => 'pedidos',
                      'action' => 'addpedido',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu7" class="menu-desplegable">Materiales</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Listado',
                    array(
                      'controller' => 'Materiales',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Añadir Material',
                    array(
                      'controller' => 'Materiales',
                      'action' => 'addmaterial',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
	    <li class="bajarmenu">
      <a href="#" id="menu8" class="menu-desplegable">Empresas</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Listado',
                    array(
                      'controller' => 'Empresas',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu9" class="menu-desplegable">Documentación</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Listado',
                    array(
                      'controller' => 'Documentaciones',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Añadir Documentación',
                    array(
                      'controller' => 'Documentaciones',
                      'action' => 'adddoc',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Añadir Archivo',
                    array(
                      'controller' => 'Documentaciones',
                      'action' => 'archivo',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
        '<i class="fa fa-download" aria-hidden="true"></i> Listado Actuales</i>',
            array(
              'controller' => 'documentaciones',
              'action' => 'pdf',
               1,
              'ext' => 'pdf'),
            array(
              'escape'=>false,
            )); ?>
      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu10" class="menu-desplegable">Calidad</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Reclamaciones',
                    array(
                      'controller' => 'Reclamaciones',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'No conformidad',
                    array(
                      'controller' => 'reclamaciones',
                      'action' => 'indexrnc',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Acción C/P',
                    array(
                      'controller' => 'acciones',
                      'action' => 'index',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
    <li class="bajarmenu">
      <a href="#" id="menu11" class="menu-desplegable">Doc. adicional</a>
      <div class="bajarmenu-content">
        <?= $this->Html->link(
                    'Ficha eventos/cursos',
                    array(
                      'controller' => 'docadicionales',
                      'action' => 'eventos',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Ficha trabajador',
                    array(
                      'controller' => 'docadicionales',
                      'action' => 'trabajador',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
        <?= $this->Html->link(
                    'Ficha actas',
                    array(
                      'controller' => 'docadicionales',
                      'action' => 'actas',
                      'admin' => false
                      ),
                    array(
                      'escape' => false,
                    ));
                  ?>
      </div>
    </li>
  </ul>
</div>
<br><br>

