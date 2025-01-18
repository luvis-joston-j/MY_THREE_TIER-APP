<?php
header("Content-Type: application/json");

// Database configuration
$host = "database-2.cl6iaesoalcr.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "jostonjos";
$dbname = "gamer_db";

// Read input data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['gamerId']) && isset($data['gameName'])) {
    $gamerId = $data['gamerId'];
    $gameName = $data['gameName'];

    try {
        // Connect to the database
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data
        $stmt = $conn->prepare("INSERT INTO gamers (gamer_id, game_name) VALUES (:gamer_id, :game_name)");
        $stmt->bindParam(':gamer_id', $gamerId);
        $stmt->bindParam(':game_name', $gameName);
        $stmt->execute();

        echo json_encode(["message" => "Data submitted successfully!"]);
    } catch (PDOException $e) {
        echo json_encode(["message" => "Error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["message" => "Invalid input data."]);
}
?>
