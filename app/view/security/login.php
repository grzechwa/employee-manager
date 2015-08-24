<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';



$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();
$count = $q->getCount()->fetch_row();


// ... generowanie widoku ....
?>
<div class="container"> <h1 class="text-center">
<?php 
echo "Panel logowania";
?>
</h1></div><div class="container">

<div class="col-md-4 col-md-offset-4"> 
<form action="<?php echo $conf->action_root; ?>doLogin" method="post" >
			<label for="login">Login: </label> 
			<input type="text" name="login" required > <br />		

			<label for="password">Haslo: </label> 
			<input type="text" name="password" required > <br />

    			
    			<!--  // 2. button z opcja zatwierdz  -->
			<input type="submit" value="Zatwierdz" />   			
    		
</form>
</div>
</div>



