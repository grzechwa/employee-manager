<?php
require_once $conf->root_path . '/app/model/QueryDB.php';

class AddForm {
	public $imie;
	public $nazwisko;
	public $dataur;
	public $datazatr;
	public $login;
	public $pass;
	public $dzial;
	public $stanowisko;
	public $img;
	
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
$file = array();
$form = $_REQUEST;
$file = $_FILES;

// TODO: dodac walidacje do rozszerznia
$filename = 'res/img/empl/' . $_FILES['imgempl']['name'];
$filetemp = $file['imgempl']['tmp_name'];

var_dump($form);
var_dump($file);
var_dump($filename);
// var_dump($file['imgempl']['tmp_name']);
var_dump($filetemp);


$addForm = new AddForm($form);

$q = new QueryDB();

if ($q->addEmpl($addForm, $filename)) {
		// uwaga na uprawnienia do uplodu
		move_uploaded_file($filetemp, $conf->root_path . '/' .$filename);
		include_once $conf->root_path.'/app/view/admin/addEmpl.php';
} else {
		include_once $conf->root_path.'/app/view/error.php';
}