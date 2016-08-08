<?php
class Config
{
	private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbname = 'Payment';
	//外部使用連線 singleton
	function getdbhost()
	{
		return $this->dbhost;
	}
	function getdbuser()
	{
		return $this->dbuser;
	}
	function getdbpass()
	{
		return $this->dbpass;
	}
	function getdbname()
	{
		return $this->dbname;
	}
	
	//外部更改連線
	function setdbhost($dbhost, $dbuser, $dbpass, $dbname)
	{
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
	}
}
?>