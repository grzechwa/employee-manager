<?php
require_once $conf->root_path.'/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';



$q = new QueryDB();

$listEmpl = $q->getShortInfoAll();
$count = $q->getCount()->fetch_row();


// ... generowanie widoku ....
?>
<div class="container"> 

<h1 class="text-center">
<div class="line-small" >Panel logowania</div>
</h1>

</div>

<div class="container">

<div class="col-md-4 col-md-offset-4"> 
<div class="line-small ">
<form action="<?php echo $conf->action_root; ?>doLogin" method="post" role="form">
			<div class="form-group">
			<label for="login">Login: </label> 
			<input type="text" name="login" class="form-control" required > <br />		
			</div>
			<div class="form-group">
			<label for="password">Haslo: </label> 
			<input type="password" name="password" class="form-control" required > <br />
			</div>
    			
    			<!--  // 2. button z opcja zatwierdz  -->
			<input type="submit" value="Zatwierdz" class="btn btn-info btn-lg"/>   			
    		
</form>
</div>
</div>
</div>



