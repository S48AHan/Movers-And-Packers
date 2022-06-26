<?php

$dbhost= "localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "moversandpackers";

// Create connection 
$conn = mysqli_connect($Servername, $Username, $Password, $Databasename); 
// Check connection 
if(!$conn) 
{ 
    die("Connection failed: " . mysqli_connect_error()); 
} 