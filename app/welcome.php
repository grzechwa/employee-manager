<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();
$count = $q->getCount()->fetch_row();


// ... generowanie widoku ....
?>
<div class="container text-center">
<div class="line-mega-small" ><h1>Simple Manager</h1><h5>Employee</h5></div><br /><br />
</div>
<div class="container">
	<div class="welcome_box" >
	<!-- img-responsive nie zmienia wysokosci -->
	 <img class="img" 
	 src="<?php echo $conf->app_url .'/'?>res/img/empl/banner5.jpg" alt="image_banner"> 
	</div>
<div class="col-md-6 col-sm-12 col-xs-12 line">
<?php 
echo "<h3>Nasza firma jest zdecydowanym liderem innowacyjności na rynku. Zatrudniamy obecnie 
		" . $count[0] . " pracowników itp. itd ...</h3></div>";
?>
<div class="col-md-6 col-sm-6 col-xs-12 line" >
<?php 
echo "<p class=\"text-right \">Jesli chcesz zostac jednym z nich zadzwoń pod 
<button class=\"btn btn-info btn-lg\">nr telefonu</button></p></div>
		<p class=\"test\" style=\"display: none\">666-666-666</p>";
?>
<div class="col-md-12 col-sm-6 col-xs-12">
<?php
echo "<p class=\"text-right \">Jesli jestes jednym z nich   
<a href=\"$conf->app_url?action=goLogin\" >
<span class=\"btn btn-info btn-lg\"> zaloguj się<spna></p></div>";


?>

</div>
<script>
$(document).ready(function(){
	 $("button").click(function(){
        $(".test").toggle(1000);
    });
});
</script>
<?php 
include_once $conf->root_path.'/app/view/snip/footer.php';
