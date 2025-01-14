<?php
include('session.php');
include('connect.php');

// Handle the update or save request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $household_id = $_POST['household_id'] ?? '';
    $purok = $_POST['purok'] ?? '';
    $Fname = $_POST['hh_First_name'] ?? '';
    $Middle_name = $_POST['hh_Middle_name'] ?? '';
    $lastname = $_POST['hh_lastname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['Date'] ?? '';

    // Prepare and validate data
    $stmt = null;
    if ($_POST['action'] === 'update') {
        // Update existing record
        $stmt = $conn->prepare("UPDATE households SET purok=?, hh_First_name=?, hh_Middle_name=?, hh_Last_name=?, phone=?, date=? WHERE id=?");
        $stmt->bind_param("ssssssi", $purok, $Fname, $Middle_name, $lastname, $phone, $date, $id);
    } elseif ($_POST['action'] === 'save_as_new') {
        // Insert a new record
        $stmt = $conn->prepare("INSERT INTO households (household_id, purok, hh_First_name, hh_Middle_name, hh_Last_name, phone, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $household_id, $purok, $Fname, $Middle_name, $lastname, $phone, $date);
    }

    // Execute statement and handle errors
    if ($stmt && $stmt->execute()) {
        header('Location: households.php'); // Redirect after success
        exit;
    } else {
        error_log("Database Error: " . $conn->error);
        echo "An error occurred. Please try again.";
    }
}

// Handle the edit display (READ specific record)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use a prepared statement to fetch the record
    $stmt = $conn->prepare("SELECT * FROM households WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $household = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit;
    }
}
?>