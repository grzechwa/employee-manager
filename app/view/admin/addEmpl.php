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
// ... generuj widok ...
// 1. formularz z danym dla tabeli pracownik
// 1a. walidacja imagefile
?>
<div class="container">

<div class="col-md-4 col-md-offset-4">


<form action="<?php echo $conf->action_root; ?>add" method="post" enctype="multipart/form-data">
			<label for="imie">Imie: </label> 
			<input type="text" name="imie" required > <br />
			
			<label for="nazwisko">Nazwisko: </label> 
			<input type="text" name="nazwisko" /> <br />

			<label for="dataur">Data ur.: </label> 
			<input type="text" name="dataur" /> <br /> 
			
			<label for="datazatr">Data zatr: </label> 
			<input type="text" name="datazatr" /> <br />
			
			<label for="login">Login: </label> 
			<input type="text" name="login" /> <br /> 
			
			<label for="pass">Haslo: </label> 
			<input type="text" name="pass" /> <br /> 
			
			<label for="dzial">Dzial: </label> 
			<select name="dzial"> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
			</select> <br />
			
			<label for="stanowisko">Stanowisko: </label> 
			<select name="stanowisko"> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
			</select> <br />
			
			<label for="img" >Wstaw zdjecie: </label>
    			<input type="file" name="fileToUpload" id="fileToUpload">

    			
    			<!--  // 2. button z opcja zatwierdz  -->
			<input type="submit" value="Zatwierdz" />   			
    		
</form>
</div>
</div>
<?php

// 3. link lub button z mozliwoscia powrotu do strony listy pracownikow
echo '<br /><a href="?action=admin" >Powrot</a>';

// 4. link lub button z mozliwoscia wylogowania
echo '<br /><a href="?action=doLogout" >Wyloguj</a>';
?>