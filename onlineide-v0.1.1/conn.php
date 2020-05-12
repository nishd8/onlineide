<?php
//error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
//Ednations@2017
//$dbname = "u942694520_1";

$dbname = "compiler";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("<center><h2>Database Connection Failure : " . $conn->connect_error . "</h2></center><hr>");
} 
?>