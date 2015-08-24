<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';
?>
<link href="../res/css/bootstrap.min.css" rel="stylesheet">
<link href="../res/css/main.css" rel="stylesheet">
<?php

if(!isset($_SESSION))
	session_start();


if($_SESSION['isLogged'] == null){
	header("Location: " . $conf->app_url);
} else {
	if($_SESSION['user']=='user'){
		/*
		 var_dump($conf->app_url.'/?action=empl');
		 die();
		 */
		header("Location: " . $conf->app_url.'/?action=empl');
	}
}
// ... przygotuj dane ...
$q = new QueryDB();

$id = $_REQUEST['id'];
$listEmplDet = $q->getFullInfoId($id);
$daneEmpl = array();    // dane danego pracownika do
						// wygodniejszego wyswietlenia poza tabel
// ... generuj widok ...
?>
<div class="container text-center">
	<h1>Witaj na stronie administratora</h1>
	</div>
	<div class="container">
<table class="table table-bordered line">
    <tbody>
<?php 
	// 1. tabela skrocona z buttonem szczegoy + button usun
	foreach ($listEmplDet as $empl) {
		echo '<form action=" '. $conf->action_root . 'usun" method="post" >';
		echo '<tr><input type="hidden" name="id" value="'.  $empl['id_pracownik']   .'"/>';
		foreach ($empl as $key => $value){
			$daneEmpl[] = $value;
			if($key != 'image'){
				// echo '<td >' . $value . '</td>';
			} else {
				// echo '<td> <img src=" '.$conf->app_url .'/'. $value . '" alt="zdjecie pracownika" height="42" width="42"> </td>';
			}
		}
		echo '<td><input type="submit" value="usun" /><br /></td>';
		echo '</tr>';
		echo '</form>';
	}
?>
</tbody>
</table>
</div>

<div class="container">
	<div class="image_box" >
		<img src=" <?php echo $conf->app_url .'/'. $daneEmpl[4]; ?> " alt="zdjecie pracownika" height="auto" width="auto">;
	</div>
	<div class="detail_box" >
	<div class="col-md-4 col-sm-12 col-xs-12">
	Imię:
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12">
	<?php echo $daneEmpl[1];?>
	</div>

	<div class="col-md-4 col-sm-12 col-xs-12">
	Nazwisko:
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12">
	<?php echo $daneEmpl[2];?>
	</div>

	<div class="col-md-4 col-sm-12 col-xs-12">
	Stanowisko:
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12">
	<?php echo $daneEmpl[3];?>
	</div>
	
	<div class="col-md-4 col-sm-12 col-xs-12">
	Dzial:
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12">
	<?php echo $daneEmpl[3];?>
	</div>
	
	<div class="col-md-4 col-sm-12 col-xs-12">
	Data urodzenia:
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12">
	<?php echo $daneEmpl[3];?>
	</div>

	<div class="col-md-4 col-sm-12 col-xs-12">
	Zainteresowania
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12">
	<?php echo $daneEmpl[3];?>
	</div>
	
	<div class="col-md-4 col-sm-12 col-xs-12">
	Opis pracownika:
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12">
	<?php echo $daneEmpl[3];?>
	</div>
	
	
	</div>
	</div>
</div>

<?php 
	// 2. link lub button z opcja dodaj
	echo '<br /><a href="?action=addEmpl" >Dodaj pracownika</a>';
	

	// 3. link lub button z mozliwoscia powrotu do strony listy pracownikow
	echo '<br /><a href=" '. $_SERVER['HTTP_REFERER'] .'" >Powrot</a>';

	// 4. link lub button z mozliwoscia wylogowania
	echo '<br /><a href="?action=doLogout" >Wyloguj</a>'; 