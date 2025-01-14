<?php
include 'connect.php'; // Assumes a separate file for database connection

$selectedYear = date('Y'); // Default to the current year
$currentYear = date('Y');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for updates
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id = $_POST['id'];
        $household_id = $_POST['household_id']; // Retain the original household ID
        $purok = $_POST['purok'];
        $hh_First_name = $_POST['hh_First_name'];
        $hh_Middle_name = $_POST['hh_Middle_name'];
        $hh_Last_name = $_POST['hh_Last_name'];
        $phone = $_POST['phone'];
        $date = $_POST['date']; // New date (if provided)

        // Insert the updated record as a new entry
        $insertQuery = "INSERT INTO households (household_id, purok, hh_First_name, hh_Middle_name, hh_Last_name, phone, date) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param('sssssss', $household_id, $purok, $hh_First_name, $hh_Middle_name, $hh_Last_name, $phone, $date);

        if ($stmt->execute()) {
            echo "<script>alert('Household record inserted successfully!'); window.location.href = 'Update_household.php';</script>";
        } else {
            echo "<script>alert('Failed to insert the new household record.');</script>";
        }
        $stmt->close();
    }
}

?>
