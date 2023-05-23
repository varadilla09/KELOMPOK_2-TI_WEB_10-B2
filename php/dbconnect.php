<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "tiket";
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Database tidak terhubung");
}
// echo "database connected";
