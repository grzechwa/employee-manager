<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
if(!isset($_SESSION))
	session_start();

var_dump($_SESSION);
/*
echo $conf->app_url;
echo '<br />';
echo $conf->app_url.'/?action=empl';
die();
*/	
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
var_dump($_SESSION);
echo 'Witaj, na stronie admina <br />';

// ... przygotuj dane ...

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();

// ... generuj widok ...
?>
<table >
<caption>Pracownicy<caption>
<thead>
<tr>
<th>id</th>
<th>Imie</th>
<th>Nazwisko</th>
<th>Stanowisko</th>
<th>Zdjecie</th>
<th>Szczegoly</th>
<th>Usun</th>
</tr>
</thead>
<tbody>
<?php 
	// 1. tabela skrocona z buttonem szczegoy + button usun
	foreach ($listEmpl as $empl) {
		echo '<form action=" '. $conf->action_root . 'detailAdmin" method="post" >';
		echo '<tr><input type="hidden" name="id" value="'.  $empl['id_pracownik']   .'"/>';
		foreach ($empl as $key => $value){

			if($key != 'image'){
				echo '<td >' . $value . '</td>';
			} else {
				echo '<td> <img src=" '.$conf->app_url .'/'. $value . '" alt="zdjecie pracownika" height="42" width="42"> </td>';
			}
		}
		echo '<td> <input type="submit" value="szczegoly" /></td>';
		echo '</tr>';
		echo '</form>';
	}
?>
</tbody>
</table>
<?php 
	// 2. link lub button z opcja dodaj
	echo '<br /><a href="?action=addEmpl" >Dodaj pracownika</a>';

	// 3. link lub button z mozliwoscia wylogowania
	echo '<br /><a href="?action=doLogout" >Wyloguj</a>';