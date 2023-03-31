<?php
$servername = "localhost";
$username = "id20538655_owenb";
$password = "EO8AUWVo0-CIM9TB";
$database = "id20538655_bared";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
