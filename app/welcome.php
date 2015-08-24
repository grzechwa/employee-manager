<?php
require_once $conf->root_path.'/app/model/QueryDB.php';

echo 'Hello, Welcome! <br /><br />';

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();
$count = $q->getCount()->fetch_row();


// ... generowanie widoku ....

echo "Poznajmy sie <br /><br />";

foreach ($listEmpl as $empl) {
	foreach ($empl as $value) {
		echo $value . ' ';
	}
	
	echo '<br />';
}


echo "<br />W naszym zakladzie pracuje obecnie " . $count[0] . " pracownikow";
echo "<br />Jesli jestes jednym z nich <a href=\"$conf->app_url?action=goLogin\" > zaloguj sie </a> <br />";
echo "<br />Jesli chcesz zostac jednym z nich skontaktuj sie pod nr telefonu";
