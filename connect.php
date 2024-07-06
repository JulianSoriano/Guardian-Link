<?php

//This is the name of the Server.
$dbServername = "localhost";

//This is the Default User Name.
$dbUsername = 'root';

//This is the Default Password.
$dbPassword = '';

//name of the database
$dbName = 'guardianlink2';

//This is the line of code that connects to the MySQL Database using the above variables.
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//Error handling
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//The point of this file is to establish the connection to the database.