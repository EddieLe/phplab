<?php
class Config{
	
	private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbname = 'Shopping';
	
	function config($cmd = ''){
		
		$link = mysql_connect ( $this->dbhost, $this->dbuser, $this->dbpass ) or die ( mysql_error ());
	    $result = mysql_query ( "set names utf8", $link );
	    mysql_selectdb ( $this->dbname, $link );
	    $result = mysql_query($cmd, $link);
	    return $result;
	}
	function getdbhost(){
		return $this->dbhost;
	}
	function getdbuser(){
		return $this->dbuser;
	}
	function getdbpass(){
		return $this->dbpass;
	}
	function getdbname(){
		return $this->dbname;
	}
	
	function setdbhost($dbhost, $dbuser, $dbpass, $dbname){
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
		
	}
}

?>