<?php
$host = "localhost"; // your database host
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "test"; // your database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
