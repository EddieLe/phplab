<?php
class Config{
	function config($cmd = ''){
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'Shopping';
		
		$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error ());
	    $result = mysql_query ( "set names utf8", $link );
	    mysql_selectdb ( $dbname, $link );
	    $result = mysql_query($cmd, $link);
	    return $result;
	}
}

?>