<?php
require_once $conf->root_path . '/app/model/QueryDB.php';
if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];
$q = new QueryDB();


if ($q->delEmpl($id)) {
	include_once $conf->root_path.'/app/view/admin/admin.php';
} else {
	include_once $conf->root_path.'/app/view/error.php';
}
} else {
	include_once $conf->root_path.'/app/view/error.php';
}