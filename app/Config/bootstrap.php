<?php

/*****************************************************
******************************************************
	___________             .__        
	\__    ___/______  ____ |__| ______
	  |    |  \_  __ \/  _ \|  |/  ___/
	  |    |   |  | \(  <_> )  |\___ \ 
	  |____|   |__|   \____/|__/____  >
	                                \/ 
******************************************************
******************************************************/

CakePlugin::load('Trois',array('bootstrap' => true, 'routes' => true));

Configure::write('Trois.backendMenu', array(
	
	'Taxes'			=>array(		
		'dropdown'			=>array(	
			
			'Taxes'						=> array('controller'=>'taxes','action'=>'index', 'plugin' => false),
			'Types de taxes'			=> array('controller'=>'taxetypes','action'=>'index', 'plugin' => false),
		)
	),
	
	'Salaries' => array(
		'dropdown' => array(
			'New Salary'			=> array('controller'=>'Salaries', 'action' => 'add', 'admin' => true, 'plugin' => false ),
			'List'				=> array('controller'=>'Salaries', 'action' => 'index', 'admin' => true, 'plugin' => false ),
		)
	),
	
	'Employees' => array(
		'dropdown' => array(
			'Employees'			=> array('controller'=>'Employees', 'action' => 'index', 'admin' => true, 'plugin' => false ),
			'Genders'				=> array('controller'=>'Genders', 'action' => 'index', 'admin' => true, 'plugin' => false ),
		)
	),
	
	'Users' => array(
		'dropdown' => array(
			'Utilisateurs'			=> array('controller'=>'Users', 'action' => 'index', 'admin' => true, 'plugin' => 'trois' ),
			'Groupes'				=> array('controller'=>'Groups', 'action' => 'index', 'admin' => true, 'plugin' => 'trois' ),
		)
	)
	
	
	
));

Cache::config('default', array('engine' => 'File'));


Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'FileLog',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'FileLog',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));
