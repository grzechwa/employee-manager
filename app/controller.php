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
//header("Location: " . $conf->app_url . '/app/welcome.php');
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
	case 'usun' :
        include_once $conf->root_path . '/app/model/DelDB.php';
		break;
	case 'detailAdmin' :
		include_once $conf->root_path . '/app/view/admin/detailAdmin.php';
	break;
	case 'detailEmpl' :
		include_once $conf->root_path . '/app/view/empl/detailEmpl.php';
		break;
	case 'goLogin' :
		include_once $conf->root_path . '/app/view/security/login.php';
	break;
	case 'doLogin' :
		include_once $conf->root_path . '/app/model/LogDB.php';
	break;
	case 'doLogout' :
		session_start();
		$_SESSION['isLogged'] = null;
		session_destroy();
		header("Location: " . $conf->app_url);
	break;
}