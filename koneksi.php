<?php
$server         = "localhost";
$user           = "root";
$password       = "";
$nama_database  = "sig";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db) {
    die("Database Unreachable" . mysqli_connect_error());
} //else echo "Terkoneksi";

// Memeriksa koneksi
if ($db->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
