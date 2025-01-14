<?php
include('session.php');
include('connect.php');

// I-handle ang update or save request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $household_id = $_POST['household_id'] ?? '';
    $purok = $_POST['purok'] ?? '';
    $Fname = $_POST['Fname'] ?? '';
    $Middle_name = $_POST['Middle_name'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['Date'] ?? '';

    // SQL injection prevention
    $id = mysqli_real_escape_string($conn, $id);
    $household_id = mysqli_real_escape_string($conn, $household_id);
    $purok = mysqli_real_escape_string($conn, $purok);
    $Fname = mysqli_real_escape_string($conn, $Fname);
    $Middle_name = mysqli_real_escape_string($conn, $Middle_name);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $phone = mysqli_real_escape_string($conn, $phone);
    $date = mysqli_real_escape_string($conn, $date);

    if ($_POST['action'] === 'update') {
        // Update existing record
        $query = "UPDATE households SET 
                    purok = '$purok',
                    First_name = '$Fname',
                    Middle_name = '$Middle_name',
                    Last_name = '$lastname',
                    phone = '$phone',
                    date = '$date'
                  WHERE id = '$id'";
    } elseif ($_POST['action'] === 'save_as_new') {
        // Insert a new record
        $query = "INSERT INTO households (household_id, purok, First_name, Middle_name, Last_name, phone, date)
                  VALUES ('$household_id', '$purok', '$Fname', '$Middle_name', '$lastname', '$phone', '$date')";
    }

    if (mysqli_query($conn, $query)) {
        header('Location: households.php'); // Redirect after successful update/insert
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// I-handle ang edit display (READ specific record)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($conn, $id);

    $query = "SELECT * FROM households WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $household = mysqli_fetch_assoc($result);
    } else {
        echo "No record found.";
        exit;
    }
}
?>