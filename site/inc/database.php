<?php

require_once("config.php");

	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	mysqli_set_charset($conn, "utf8");
	if ($conn->connect_error) {
	die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
	}


function db_open() {
	
	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	mysqli_set_charset($conn, "utf8");
	if ($conn->connect_error) {
	die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
	}

    return $conn;

}


function db_open_trans(){
	
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	mysqli_set_charset($mysqli, "utf8");
	if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}	

	$mysqli->autocommit(false);
	
	return $mysqli;

}

function execQuery($query) {
    
	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	mysqli_set_charset($conn, "utf8");
	if ($conn->connect_error) {
	die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
	}
	
	$rs = mysqli_query($query, $conn); // or die (mysql_error());

    return $rs;
}

?>