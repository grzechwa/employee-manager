<?php
require_once $conf->root_path.'/app/model/QueryDB.php';

echo 'Hello, Welcome! <br /><br />';

$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();
$count = $q->getCount()->fetch_row();


// ... generowanie widoku ....

echo "Panel logowania";

?>
<form action="<?php echo $conf->action_root; ?>doLogin" method="post" >
			<label for="login">Login: </label> 
			<input type="text" name="login" required > <br />		

			<label for="password">Haslo: </label> 
			<input type="text" name="password" required > <br />

    			
    			<!--  // 2. button z opcja zatwierdz  -->
			<input type="submit" value="Zatwierdz" />   			
    		
</form>




