<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
echo 'Witaj, na stronie pracownika <br />';
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
<th>Usun</th>
</tr>
</thead>
<tbody>
<?php 
	// 1. tabela skrocona z buttonem szczegoy + button usun
	foreach ($listEmplDet as $empl) {
		echo '<form action=" '. $conf->action_root . 'usun" method="post" >';
		echo '<tr><input type="hidden" name="id" value="'.  $empl['id_pracownik']   .'"/>';
		foreach ($empl as $key => $value){

			if($key != 'image'){
				echo '<td >' . $value . '</td>';
			} else {
				echo '<td> <img src=" '.$conf->app_url .'/'. $value . '" alt="zdjecie pracownika" height="42" width="42"> </td>';
			}
		}
		echo '<td><input type="submit" value="usun" /><br /></td>';
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
	echo '<br /><a href="" >Wyloguj</a>';