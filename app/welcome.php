<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();
$count = $q->getCount()->fetch_row();


// ... generowanie widoku ....
?>
<div class="container text-center">
<h1>Simple Manager v1 </h1><br /><br />
</div>
<div class="container">
	<div class="welcome_box" >
	imagebanner
	</div>
<div class="col-md-6 col-sm-12 col-xs-12 line">
<?php 
echo "<h3>Nasza firma zatrudnia obecnie " . $count[0] . " pracownikow i jest zdecydowanym liderem innowacyjnosci itp. itd ...</h3></div>";
?>
<div class="col-md-6 col-sm-6 col-xs-12 line" >
<?php 
echo "<p class=\"text-right lead\">Jesli chcesz zostac jednym z nich skontaktuj sie pod <strong  class=\"btn btn-primary\">nr tel</strong></p></div>";
?>
<div class="col-md-12 col-sm-6 col-xs-12">
<?php
echo "<p class=\"text-right lead\">Jesli jestes jednym z nich <a href=\"$conf->app_url?action=goLogin\" ><strong  class=\"btn btn-primary\"> zaloguj sie </strong></a> </p></div>";


?>


</div> 
<?php 
include_once $conf->root_path.'/app/view/snip/footer.php';
