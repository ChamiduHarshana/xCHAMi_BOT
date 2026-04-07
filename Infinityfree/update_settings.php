<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php'; 

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "no_data"]);
    exit();
}

$action = $data['action'];
$value = isset($data['value']) ? $conn->real_escape_string($data['value']) : null;

$sql = "";
if ($action == 'update_status') {
    $sql = "UPDATE bot_settings SET bot_status='$value' WHERE id=1";
} elseif ($action == 'update_prompt') {
    $sql = "UPDATE bot_settings SET system_prompt='$value' WHERE id=1";
} elseif ($action == 'update_model') {
    $sql = "UPDATE bot_settings SET ai_model='$value' WHERE id=1";
} elseif ($action == 'increment_msg') {
    // බොට් මැසේජ් එකක් යවන සෑම විටම Dashboard එකේ ගණන 1කින් වැඩි කරයි
    $sql = "UPDATE bot_settings SET total_messages = total_messages + 1 WHERE id=1";
}

if ($sql != "" && $conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "error" => $conn->error]);
}
$conn->close();
?>