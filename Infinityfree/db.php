<?php
$host = "xxxxx.infinityfree.com"; // vPanel එකේ තියෙන Hostname එක
$user = "xxxxxxxx";      // Username
$pass = "xxxxx";    // Password
$db   = "xxxx_My_Bot";   // Database Name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>
