<?php

class Database {

	private $_host;
	private $_username;
	private $_password;
	public $_dbname;

	// get the database connection
	protected function connect() {

		$this->_host = 'localhost';
		$this->_user = 'root';
		$this->_password = '';
		$this->_dbname = 'cedhosting';

		return (new mysqli($this->_host, $this->_user, $this->_password, $this->_dbname));
	}
}

?>