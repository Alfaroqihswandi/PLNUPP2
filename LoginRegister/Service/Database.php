<?php
// File: Service/Database.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monitoring"; // Ganti dengan nama database yang digunakan

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>