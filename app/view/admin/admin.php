<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
echo 'Witaj, na stronie admina <br />';

// ... przygotuj dane ...

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();

// ... generuj widok ...

	// 1. tabela skrocona z buttonem szczegoy + button usun
	foreach ($listEmpl as $empl) {
		foreach ($empl as $key => $value){
			if($key != 'image'){
				echo $value . ' ';
			} else {
				echo ' <img src=" '. $value . '" alt="zdjecie pracownika" height="42" width="42"> ';
			}
		}
		echo '<input type="submit" value="szczegoly" /> <input type="submit" value="usun" /><br />';
	}
	// 2. link lub button z opcja dodaj
	echo '<br /><a href="?action=addEmpl" >Dodaj pracownika</a>';

	// 3. link lub button z mozliwoscia wylogowania
	echo '<br /><a href="" >Wyloguj</a>';