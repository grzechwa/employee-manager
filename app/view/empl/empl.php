<?php
require_once $conf->root_path.'/app/model/QueryDB.php';

echo 'Witaj, na stronie pracownikow <br />';

// ... przygotuj dane ...

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();

// ... generuj widok ...

	// 1. tabela skrocona z buttonem szczegoy
	foreach ($listEmpl as $empl) {
		foreach ($empl as $key => $value){
			if($key != 'image'){
				echo $value . ' ';
			} else {
				echo ' <img src=" '. $value . '" alt="zdjecie pracownika" height="42" width="42"> ';
			}
		}
		echo '<input type="submit" value="szczegoly" /> <br />';
	}	


	// 2. link lub button z mozliwoscia wylogowania
	echo '<br /><a href="" >Wyloguj</a>'; 