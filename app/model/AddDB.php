<?php
require_once $conf->root_path . '/app/model/QueryDB.php';

class AddForm {
	public $imie;
	public $nazwisko;
	public $dataur;
	public  $datazatr;
	public  $login;
	public  $pass;
	public  $dzial;
	public $stanowisko;
	
	public function __construct($form) {
		$this->imie = $form['imie'];
		$this->nazwisko = $form['nazwisko'];
		$this->dataur = $form['dataur'];
		$this->datazatr = $form['datazatr'];
		$this->login = $form['login'];
		$this->pass = $form['pass'];
		$this->dzial = $form['dzial'];
		$this->stanowisko = $form['stanowisko'];
	}

}

$form = array();
$form = $_REQUEST;

$addForm = new AddForm($form);

$q = new QueryDB();

if ($q->addEmpl($addForm)) {
		include_once $conf->root_path.'/app/view/admin/addEmpl.php';
} else {
		include_once $conf->root_path.'/app/view/error.php';
}