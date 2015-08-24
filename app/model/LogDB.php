<?php
require_once $conf->root_path . '/app/model/QueryDB.php';


if((isset($_REQUEST['login'])&&(isset($_REQUEST['password'])))){
	$login = $_REQUEST['login'];
	$haslo = $_REQUEST['password'];
	
	echo $login . ' ' . $haslo;
	$q = new QueryDB();

	$validate = $q->getLogin($login, $haslo);
	
	if ($validate) {
		session_start();
		$_SESSION['isLogged'] = true;
		foreach ($validate as $key => $value){	
			if($value['id_stanowisko']==1) { 
				$_SESSION['user'] = 'admin';
				var_dump($conf->root_path.'/app/view/admin/admin.php');
				var_dump($conf->server_url.$conf->action_root .'admin');
				var_dump($conf->server_url.'/app/view/admin/admin.php');
			
               
				header("Location: " . $conf->server_url.$conf->app_root.'/?action=admin');
			} else { 
				$_SESSION['user'] = 'user';
                header("Location: " . $conf->server_url.$conf->app_root.'/?action=empl');
			}
		}
	} else {
		include_once $conf->root_path.'/app/view/error.php';
	}
} else {
	include_once $conf->root_path.'/app/view/error.php';
}
