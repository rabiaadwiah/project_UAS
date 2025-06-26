<?php
$servername = "localhost";
$database = "pesona_db";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("koneksi gagal : ". mysql_connect_error());
} else {
    echo "koneksi berhasil";
}