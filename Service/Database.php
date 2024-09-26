<?php

$hostname = "localhost" ;
$username = "root" ;
$password = "";
$dbname = "monitoring";

$db = new mysqli($hostname, $username, $password, $dbname);
if ($db->connect_error) {
    echo"Koneksi Database Rusak";
    die("Error");
}
echo"Koneksi Berhasil!";

$sql = "";