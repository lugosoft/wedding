<?php
	include("adodb5/adodb-exceptions.inc.php");
	include("adodb5/adodb.inc.php");
	
	$db = ADONewConnection('mysql'); 
	
	function conectarDB()
	{
		global $db;
		//Code for connection on Arvixe
		$myServer = "localhost"; // mysql3001.databasemart.net:1091
		$myUser = "root"; // root2
		$myPass = "1234"; // 12345
		$myDB = "weddingdb";
		
		if(!$db->IsConnected())
        {
			/*$db =& ADONewConnection('odbc_mssql');
			$dsn = "Driver={SQL Server};Server=$myServer;Database=$myDB;";
			$db->Connect($dsn,$myUser,$myPass);*/
			
			$db = ADONewConnection('mysql');
			$db->Connect($myServer, $myUser, $myPass, $myDB);

			// echo("Id de Conexion: ".$db->_connectionID."<br>");	
		}
		return $db;
	}

	function desconectarDB($c)
	{
		//No se desconectara de la base de datos, se reutilizara la misma conexion
		// La base de datos se encarga de cerrar la conexion despues de tener tiempo sin usarse
		
		//$c->Close();
		//$c = null;
	}
	
	function desconectarFinDB()
	{
		global $db;
		$db->Close();
	}

?>