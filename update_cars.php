<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("UPDATE cars SET year = :year WHERE id = :id");
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Car updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update car"]);
    }
}
?>