<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quran_memorization";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
