<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();
$count = $q->getCount()->fetch_row();


// ... generowanie widoku ....
?>
<div class="container text-center">
<h1>Poznajmy sie </h1><br /><br />
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Imię</th>
      <th>Nazwisko</th>
      <th>Stanowisko</th>
    </tr>
  </thead>
  <tbody>
<?php 
foreach ($listEmpl as $empl) {
	echo '<tr>';
	foreach ($empl as $value) {
		echo '<td>' . $value . '</td>';
	}
	
	echo '</tr>';
}
?>
 </tbody>
</table>
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
<?php 


echo "<p>W naszym zakladzie pracuje obecnie " . $count[0] . " pracownikow </p></div>";
?><div class="col-md-4 col-sm-6 col-xs-12"><?php 
echo "<p>Jesli jestes jednym z nich <a href=\"$conf->app_url?action=goLogin\" ><strong> zaloguj sie </strong></a> </p></div>";
?><div class="col-md-4 col-sm-6 col-xs-12"><?php
echo "<p>Jesli chcesz zostac jednym z nich skontaktuj sie pod nr telefonu</p></div>";


?>


</div> 
<?php 
include_once $conf->root_path.'/app/view/snip/footer.php';
