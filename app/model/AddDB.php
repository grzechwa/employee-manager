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

$filename = 'res/img/empl/' . $_FILES['imgempl']['name'];
$filetemp = $file['imgempl']['tmp_name'];


// TODO: poprawic kod walidacji image
// przeniesc kod html do widoku
$result = @exif_imagetype($filetemp);
	switch($result) {
		case IMAGETYPE_GIF:
		case IMAGETYPE_JPEG:
		case IMAGETYPE_PNG:
		break;
	default:
}


$addForm = new AddForm($form);
$q = new QueryDB();

if ($q->addEmpl($addForm, $filename)) {
		// uwaga na uprawnienia do uplodu
		if(move_uploaded_file($filetemp, $conf->root_path . '/' .$filename)){
			echo '<div><div class="text-center" style="padding-top: 5%">
				<button class="btn btn-success :active"> 
				<h4 >Dodano uzytkownika
				</button>
				<h4>
				</div>';
		} else {
			echo '<div><div class="text-center" style="padding-top: 5%">
				<button class="btn btn-danger :active"> 
				<h4 >Nie Dodano uzytkownika
				</button>
				<h4>
				</div>';
		}
		include_once $conf->root_path.'/app/view/admin/addEmpl.php';
} else {
		include_once $conf->root_path.'/app/view/error.php';
}