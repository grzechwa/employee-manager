<?php
// zawiera start sesji
require_once $conf->root_path.'/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';


if(!isset($_SESSION))
	session_start();
/*
var_dump($_SESSION);
die();
*/
if($_SESSION['isLogged'] == null){
	header("Location: " . $conf->app_url);
} else {
	if($_SESSION['user']=='admin'){
		/*
		var_dump($conf->app_url.'/?action=empl');
		die();
		*/
		header("Location: " . $conf->app_url.'/?action=admin');
	}
}

// ... przygotuj dane ...

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();

// ... generuj widok ...

	// 1. tabela skrocona z buttonem szczegoy
	?>
	<div class="container text-center">
	
	<?php 
	// 2. link lub button z mozliwoscia wylogowania
		echo '<p class="text-right line-mega-small"><a href="?action=doLogout" >Wyloguj</a></p>'; 
	?> 
	<h1>Witaj na stronie pracowników</h1>
	</div>
	
	<div class="container">
	<table class="table table-bordered table-stripped table-hover text-center line">
    <thead >
      <tr>
        <th class="text-center lead">#</th>
        <th class="text-center lead">Imię</th>
        <th class="text-center lead">Nazwisko</th>
        <th class="text-center lead">Stanowisko</th>
        <th class="text-center lead">Zdjęcie</th>
        <th class="text-center lead">Opcje</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	foreach ($listEmpl as $empl) {
		
		// echo '<form action=" '. $conf->action_root . 'detailEmpl" method="post" >';
		echo '<form action=" '. $conf->action_root . 'detailEmpl " method="post" >';
		echo '<tr><input type="hidden" name="id" value="'.  $empl['id_pracownik']   .'"/>';
		foreach ($empl as $key => $value){

			if($key != 'image'){
				echo '<td >' . $value . '</td>';
			} else {
				echo '<td> <img src=" '.$conf->app_url .'/'. $value . '" alt="zdjecie pracownika" height="42" width="42"> </td>';
			}
		}
		echo '<td> <input type="submit" value="szczególy" /></td>';
		echo '</tr>';
		echo '</form>';
	}
?>
</tbody>
</table>
</div>
<?php 
include_once $conf->root_path.'/app/view/snip/footer.php';