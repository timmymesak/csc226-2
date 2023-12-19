<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("INSERT INTO cars (brand, model, year) VALUES (:brand, :model, :year)");
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':year', $year);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Car created successfully"]);
    } else {
        echo json_encode(["error" => "Failed to create car"]);
    }
}
?>