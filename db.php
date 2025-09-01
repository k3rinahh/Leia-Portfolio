<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portfolio_db"; // buat database ini di phpMyAdmin

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
