<?php
$servername = "database-2.cl6iaesoalcr.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "jostonjos";
$dbname = "gamer-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gamerid = $_POST['gamerid'];
    $games = $_POST['games'];

    $sql = "INSERT INTO gamers (gamerid, games) VALUES ('$gamerid', '$games')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
