<?php
include 'db.php';

$apiUrl = 'https://api.example.com/data'; // Replace with your API endpoint

// Initialize cURL session
$curl = curl_init($apiUrl);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and get the API response
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);

// Check if the request was successful
if ($response === false) {
    echo "Error accessing the API: " . curl_error($curl);
} else {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Store the API data in the MySQL database
    $apiName = 'example_api'; // Replace with the name of the API
    $stmt = $conn->prepare("INSERT INTO apidata (api_name, data) VALUES (:api_name, :data)");
    $stmt->bindParam(':api_name', $apiName);
    $stmt->bindParam(':data', json_encode($data));

    if ($stmt->execute()) {
        echo "Data stored successfully in the MySQL database!";
    } else {
        echo "Error storing data in the MySQL database.";
    }
}
?><?php
