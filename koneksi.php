<?php
$serverName = 'localhost:8111';
$userName = 'root';
$password = '';
$dbName = 'Websitepaketwisata';
$conn = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$conn) {
    die("koneksi gagal:" . mysqli_connect_error());
}
