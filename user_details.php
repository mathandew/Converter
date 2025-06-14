<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pers_number = $_POST['pers_number'];

    $query = "SELECT * FROM users WHERE pers_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $pers_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        echo json_encode(["status" => "success", "user" => $user]);
    } else {
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }
    exit;
}

?>