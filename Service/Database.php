<?php

$hostname = "localhost" ;
$username = "root" ;
$password = "";
$dbname = "monitoring";

$db = new mysqli($hostname, username: $username, password: $password, database: $dbname);
if ($db->connect_error) {
    echo"Koneksi Database Rusak";
    die("Error");
}
echo"Koneksi Berhasil!";

$sql = "";