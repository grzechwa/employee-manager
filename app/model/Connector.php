<?php
require_once $conf->root_path.'/config.php';

/**
 * 		Klasa zarzadzajaca polaczeniam z bd
 */
class Connector {
	private $url;
	private $name;
	private $username;
	private $password;
	
	private $conn;
	
	public function __construct() {
		$this->url = 'localhost';
		$this->name = 'employee';
		$this->username = 'root';
		$this->password = '';
		$this->conn = null;
	}
	
	/**
	 * Laczenie
	 * @return boolean
	 */
	public function connect () {
		$this->conn = new mysqli($this->url, $this->username, $this->password, $this->name);

		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
			$this->conn = null;
			return false;
		}

		$this->conn->set_charset("utf8");
		return true;
	}

	/**
	 * rozlaczanie
	 */
	public function disconnect () {
		if ($this->conn != null) {
			$this->conn->close();
		}
	}
	
	/**
	 * 
	 * @return mysqli object
	 */
	public function getConn() {
		return $this->conn;
	}
}