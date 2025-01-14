<?php
include 'connect.php'; // Include your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['member_id'])) {
    $id = $_POST['member_id'];
    $deleteQuery = "DELETE FROM members WHERE household_id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("s", $member_id);
    if ($stmt->execute()) {
        header("Location: purok.php?message=Record+deleted+successfully");
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
