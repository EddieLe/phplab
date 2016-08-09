<?php

class Config
{
	private $dbHost = 'localhost';
	private $dbUser = 'root';
	private $dbPass = '';
	private $dbName = 'Payment';

	function getDbHost()
	{
		return $this->dbHost;
	}
	function getDbUser()
	{
		return $this->dbUser;
	}
	function getDbPass()
	{
		return $this->dbPass;
	}
	function getDbName()
	{
		return $this->dbName;
	}

	function setDbHost($dbHost, $dbUser, $dbPass, $dbName)
	{
		$this->dbHost = $dbHost;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;
		$this->dbName = $dbName;
	}
}
