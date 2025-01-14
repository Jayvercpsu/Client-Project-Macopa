<?php
header('Content-Type: application/json');

// Database Configuration
$host = 'localhost';
$user = 'root'; // Replace if the DB user is different
$pass = '';     // Replace if the DB password is set
$db   = 'macopa_db'; // Replace with the correct database name

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]));
}

// Set the current year dynamically
$current_year = 2024;

// SQL query to fetch members data for Purok 2 in the specified year
$sql = "SELECT purok, COUNT(*) as total_members 
        FROM household_members 
        WHERE purok IN ('Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6', 'Purok 7', 'Purok 8')  AND YEAR(Date) = ? 
        GROUP BY purok";

// Prepare and bind the statement
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(['error' => 'Statement preparation failed: ' . $conn->error]));
}
$stmt->bind_param("i", $current_year);
$stmt->execute();
$result = $stmt->get_result();

$purok_counts = [];

// Process the result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $purok = $row['purok'];
        $purok_counts[$purok] = $row['total_members'];
    }
    echo json_encode($purok_counts);
} else {
    echo json_encode(['message' => 'No records found.']);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
