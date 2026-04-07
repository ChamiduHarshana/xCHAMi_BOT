<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';

// bot_settings table එකෙන් ID 1 ඇති සියලුම දත්ත ලබා ගැනීම
$res = $conn->query("SELECT * FROM bot_settings WHERE id=1");
$settings = $res->fetch_assoc();

if ($settings) {
    echo json_encode($settings);
} else {
    echo json_encode(["status" => "error", "message" => "No settings found"]);
}

$conn->close();
?>