<?php
// controller do obslugi akcji i przekierowań
require_once dirname (__FILE__).'/../config.php';

/**
 * 		1. pobranie akcji
 */
if(isset($_REQUEST['action'])){
	$action = $_REQUEST['action'];
} else {
	$action='';
}

/**
 * 		2. przekierowanie akcji
 */
switch ($action) {
	default : 
		include_once $conf->root_path.'/app/welcome.php';
		break;
	case 'empl' :
		include_once $conf->root_path.'/app/view/empl/empl.php';
		break;
	case 'admin' :
		include_once $conf->root_path.'/app/view/admin/admin.php';
		break;
	case 'addEmpl' :
		include_once $conf->root_path.'/app/view/admin/addEmpl.php';
		break;
	case 'add' :
        include_once $conf->root_path . '/app/model/AddDB.php';
        break;
}