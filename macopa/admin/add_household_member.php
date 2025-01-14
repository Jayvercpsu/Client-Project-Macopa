<?php
// Include database connection
include('connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input
    $household_id = mysqli_real_escape_string($conn, $_POST['household_id']);
    $purok = mysqli_real_escape_string($conn, $_POST['purok']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $pob = mysqli_real_escape_string($conn, $_POST['pob']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    $vulnerability = mysqli_real_escape_string($conn, $_POST['vulnerability']);

    // Insert query
    $query = "INSERT INTO household_members (
                household_id, purok, First_name, Middle_name, Last_name, 
                gender, dob, pob, relationship, marital_status, nationality, 
                occupation, vulnerability
              ) VALUES (
                '$household_id', '$purok', '$first_name', '$middle_name', '$last_name', 
                '$gender', '$dob', '$pob', '$relationship', '$marital_status', 
                '$nationality', '$occupation', '$vulnerability'
              )";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Redirect with a success message
        header("Location: viewmember.php?cid=$household_id&success=Member added successfully");
        exit();
    } else {
        // Redirect with an error message
        header("Location: HouseholdDetails.php?cid=$household_id&error=Failed to add member: " . mysqli_error($conn));
        exit();
    }
} else {
    // Redirect if the request method is not POST
    header("Location: Households.php");
    exit();
}
?>
