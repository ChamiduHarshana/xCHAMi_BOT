<?php
$host = "sql201.infinityfree.com"; // vPanel එකේ තියෙන Hostname එක
$user = "if0_41598040";      // Username
$pass = "8YcIeaow39fyRxN";    // Password
$db   = "if0_41598040_My_Bot";   // Database Name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>