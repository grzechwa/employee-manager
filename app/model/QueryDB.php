<?php
require_once $conf->root_path.'/app/model/Connector.php';

/**
 * 		Wykorzystuje klase Connector
 * 		i przechowuje zapytania
 */
class QueryDB {
	private $db;
	
	public function __construct() {
		$this->db = new Connector();
	}
	
	// ... amin methods ....
	
	/**
	 * Pobranie wszystki danych z 
	 * tabeli pracownik
	 * @return msyqli object
	 */
	public function getAll() {
		$this->db->connect();
	
		$select = "SELECT *";
		$from 	= " FROM pracownik";
	
		$sql = $select.$from;
	
		$conn = $this->db->getConn();
		$result = mysqli_query($conn,$sql);
		$this->db->disconnect();
	
		return $result;
	}

	/**
	 * Skrocony wykaz pracownikow
	 * na strone powitalna
	 * @return mysqli object
	 */
	public function getShortInfoAll() {
		$this->db->connect();
		 
		$select = "SELECT pracownik.id_pracownik, pracownik.imie, pracownik.nazwisko, stanowisko.nazwa_stanowiska, pracownik.image";
		$from 	= " FROM pracownik";
		$join	= " LEFT JOIN stanowisko";
		$on		= " ON pracownik.id_stanowisko = stanowisko.id_stanowisko";
	
		$sql = $select.$from.$join.$on;
	
		$conn = $this->db->getConn();
		$result = mysqli_query($conn,$sql);
		$this->db->disconnect();
	
		return $result;
	
	}
	
	/**
	 * Pelny wykaz danych o pracownikach
	 * dla uzytkownika zalogowanego
	 * po wybraniu opcji -> szczegoly
	 */
	public function getFullInfoAll() {

	}
	
	public function getLogin($login, $haslo) {
		$this->db->connect();
		
		$select = "SELECT pracownik.id_pracownik, pracownik.login, pracownik.password, pracownik.id_stanowisko";
		$from = " FROM pracownik";
		$join = null;
		$where = " WHERE login like '$login' AND password like '$haslo'";
		$orderBy = null;
		
		$sql = $select.$from.$join.$where.$orderBy;
		
		$conn = $this->db->getConn();
		$result = mysqli_query($conn,$sql);
		$this->db->disconnect();
		return $result;
	}
	
	
	/**
	 * Pobiera szczegolowy opis wskazanego pracownika
	 * przez parametr id
	 */
	public function getFullInfoId($id) {
		$this->db->connect();
		
		$select = "SELECT pracownik.id_pracownik, pracownik.imie, pracownik.nazwisko, stanowisko.nazwa_stanowiska, pracownik.image";
		$from 	= " FROM pracownik";
		$join	= " LEFT JOIN stanowisko";
		$on		= " ON pracownik.id_stanowisko = stanowisko.id_stanowisko";
		$where	= " WHERE pracownik.id_pracownik = '" . $id . "' ";
		
		$sql = $select.$from.$join.$on.$where;
		
		$conn = $this->db->getConn();
		$result = mysqli_query($conn,$sql);
		$this->db->disconnect();
		
		return $result;
	}
	
	/**
	 * Wstawienie nowego uzytkownika 
	 * na stronie admina
	 */
	public function addEmpl($form) {

		$this->db->connect();
		//  VALUES (null ,0000-00-00,'aa','bb',null,'login','pass',1,2,null)
		$insert = "INSERT INTO `pracownik`(`id_pracownik`, `data_urodzin`, `imie`, `nazwisko`, `data_pracy`, `login`, `password`, `id_dzial`, `id_stanowisko`, `image`)";
		$values	= " VALUES (null ,'" . $form->dataur . "', '" . $form->imie . "', '" . $form->nazwisko . "', '" . $form->datazatr . "', '" . $form->login ."', '" . $form->pass . "', '" . $form->dzial . "' , '" . $form->stanowisko . "',null)";
		echo $values . '<br />';	
		$sql = $insert.$values;
		
		$conn = $this->db->getConn();
		$result = mysqli_query($conn,$sql);
		$this->db->disconnect();
		
		return $result;
	}
	
	/**
	 * Ususniecie uzytkownika prze admina
	 */
	public function delEmpl($id) {
		$this->db->connect();

		$delete = "DELETE FROM";
		$from = " pracownik";
		$where = " WHERE id_pracownik = '" . $id ."' ";
		
		$sql = $delete.$from.$where;
		
		$conn = $this->db->getConn();
		$result = mysqli_query($conn,$sql);
		$this->db->disconnect();
		
		return $result;
	}
	
	
	// ... other methods ...
	
	/**
	 * Zwraca objetct z liczba pracownikow
	 * @return mysql object
	 */
	public function getCount() {
		$this->db->connect();
	
		$select = "SELECT COUNT(*) ";
		$from 	= " FROM pracownik";
	
		$sql = $select.$from;
	
		$conn = $this->db->getConn();
		$result = mysqli_query($conn,$sql);
		$this->db->disconnect();
	
		return $result;
	}


}