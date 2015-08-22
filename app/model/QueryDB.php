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
		 
		$select = "SELECT pracownik.imie, pracownik.nazwisko, stanowisko.nazwa_stanowiska, pracownik.image";
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
	
	/**
	 * Wstawienie nowego uzytkownika 
	 * na stronie admina
	 */
	public function addEmpl() {
	
	}
	
	/**
	 * Ususniecie uzytkownika prze admina
	 */
	public function delEmpl() {
	
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