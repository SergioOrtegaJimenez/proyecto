<?php

App::uses('Controller', 'Controller');


class AppController extends Controller 
{
	public $components = array(
								'Session',
								'Auth' => array(
												'loginRedirect' => array(                   //Página establecida a redirigir una vez validado el login
																			'controller' => 'menus',
																			'action' => 'index'
																		),
												'logoutRedirect' => array(                  //Página establecida para el logout
																			'controller' => 'usuarios',
																			'action' => 'login'
																		),
												'loginAction' => array(                     //Define la acción que controla el login
																		'controller' => 'usuarios',
																		'action' => 'login'
																	),
												'authenticate' => array(                    //Establece como se hará la autenticación
																		'Idep.Idep' => array(
																								'userModel' => 'Usuario',
																								'passwordHasher' => 'Idep.Idep',//Módulo que encripta la contraseña
																								'fields'=>array(
																													'username'=>'usuario'
																											)
																							)
																	),
												'authorize' => array('Controller')
											)
							);






	public function isAuthorized($user) 
	{
		if (isset($this->request->params['admin'])) 
		{  													//Comprueba si el usuario que solicita la página tiene rol de Administrador
			return (bool)($user['rol'] == 'Administrador');
		}

		if (isset($this->request->params['regis'])) 
		{  													//Comprueba si el usuario que solicita la página tiene rol de Administrador o Registrador
			return (bool)($user['rol'] == 'Administrador' || $user['rol'] == 'Registrador');
		}

		if ($user != null && $user['id']) 
		{           										//Comprueba si el usuario que solicita la página está logueado
			return true;
		}

		return false;
	}

}