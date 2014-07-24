<?php

return array(

	/**
	 * The path that will contain our modules
	 * This can also be an array with multiple paths
	 */
    'path' => array(
        'app/modules/frontend',
        'app/modules/backend',
    ),

	/**
	 * If set to 'auto', the modules path will be scanned for modules
	 */
	'mode' => 'auto',

	/**
	 * In case the auto detect mode is disabled, these modules will be loaded
	 * If the mode is set to 'auto', this setting will be discarded
	 */
	'modules' => array(
		'auth'    => array('enabled' => true),
		'content' => array('enabled' => true),
	),

	/**
	 * Default files that are included automatically for each module
	 */
	'include' => array(
		'helpers.php',
		'bindings.php',
		'observers.php',
		'filters.php',
		'composers.php',
		'routes.php',
	),

	/**
	 * Debug mode
	 */
	'debug' => true,

);
