<?php
require_once $conf->root_path . '/app/model/QueryDB.php';
include_once $conf->root_path.'/app/view/snip/header.php';


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


// var_dump($_SESSION);
// echo 'Witaj, na stronie pracownikow <br />';

// ... przygotuj dane ...
$q = new QueryDB ();
if($_REQUEST['action'] == 'add'){
	echo 'dodano uzytkownika';
} else {
	
}
$dep = new QueryDB();
$listDep = $dep->getDepartment();

$pos = new QueryDB();
$listPos = $pos->getWorkpositon();
// ... generuj widok ...
// 1. formularz z danym dla tabeli pracownik
// 1a. walidacja imagefile
?>
>
			
<div class="container"> 
	<?php 

	// 3. link lub button z mozliwoscia wylogowania
	echo '<div class="line-mega-small">
		<p class="text-right "><a href="?action=doLogout" >Wyloguj</a></p>
		</div>';
	?>
<h1 class="text-center">
<div class="line-small" >Dodaj użytkownika</div>
</h1>

</div>
<div class="container">
<div class="col-md-4 col-md-offset-4">

<div class="line-small ">
<form role="form" action="<?php echo $conf->action_root; ?>add" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label for="imie">Imie: </label> 
			<input type="text" name="imie" class="form-control" required > 
			</div>
			
			<div class="form-group">
			<label for="nazwisko">Nazwisko: </label> 
			<input type="text" class="form-control" name="nazwisko" />
			</div>
			
			<div class="form-group">
			<label for="dataur">Data ur.: </label> 
			<input type="text" class="form-control" name="dataur" /> 
			</div>
			
			<div class="form-group">
			<label for="datazatr">Data zatr: </label> 
			<input type="text" name="datazatr" class="form-control" />
			</div>
			
			<div class="form-group">
			<label for="login">Login: </label> 
			<input type="text" name="login" class="form-control" /> 
			</div>
			
			<div class="form-group">
			<label for="pass">Haslo: </label> 
			<input type="password" name="pass" class="form-control"/> 
			</div>


			
			
				
			<div class="form-group">
			<label for="dzial">Dzial: </label> 
			<select name="dzial" class="form-control">
			<?php
			foreach ($listDep as $dep){
				echo '<option value="'.$dep['id_dzial'].'">'.$dep['nazwa_dzialu'].'</option>';
			}
			?>
			</select> <br />
			</div>
			
			<div class="form-group">
			<label for="stanowisko">Stanowisko: </label> 
			<select name="stanowisko" class="form-control"> 
			<?php 
			foreach ($listPos as $pos){
				echo '<option value="'.$pos['id_stanowisko'].'">'.$pos['nazwa_stanowiska'].'</option>';
			}
			?>
			</select> <br />
			</div>
			
			<div class="form-group" class="form-control">
			<label for="img" >Wstaw zdjecie: </label>
    			<input type="file" name="fileToUpload" id="fileToUpload">
			</div>
    			
    			<!--  // 2. button z opcja zatwierdz  -->
			<input type="submit" value="Zatwierdz" class="btn btn-info" />   			
    		
</form>
</div>
</div>
</div>
<?php

?>