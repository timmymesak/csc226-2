<?php
include 'db.php';

$stmt = $conn->query("SELECT * FROM cars");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cars);
?>