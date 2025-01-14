<?php 
include('session.php');
include('connect.php');

// Validate the action
if (isset($_POST['action'])) {
    $action = mysqli_real_escape_string($conn, $_POST['action']);
} else {
    die("Invalid action specified. Please try again.");
}

// Sanitize form inputs
$member_id = isset($_POST['member_id']) ? mysqli_real_escape_string($conn, $_POST['member_id']) : null;
$household_id = isset($_POST['household_id']) ? mysqli_real_escape_string($conn, $_POST['household_id']) : null;
$Fname = isset($_POST['Fname']) ? mysqli_real_escape_string($conn, $_POST['Fname']) : '';
$Middle_name = isset($_POST['Middle_name']) ? mysqli_real_escape_string($conn, $_POST['Middle_name']) : '';
$Last_name = isset($_POST['lastname']) ? mysqli_real_escape_string($conn, $_POST['lastname']) : '';
$gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
$dob = isset($_POST['dob']) ? mysqli_real_escape_string($conn, $_POST['dob']) : '';
$pob = isset($_POST['pob']) ? mysqli_real_escape_string($conn, $_POST['pob']) : '';
$relationship = isset($_POST['relationship']) ? mysqli_real_escape_string($conn, $_POST['relationship']) : '';
$marital_status = isset($_POST['marital']) ? mysqli_real_escape_string($conn, $_POST['marital']) : '';
$nationality = isset($_POST['nationality']) ? mysqli_real_escape_string($conn, $_POST['nationality']) : '';
$occupation = isset($_POST['occupation']) ? mysqli_real_escape_string($conn, $_POST['occupation']) : '';
$vulnerability = isset($_POST['vulnerability']) ? mysqli_real_escape_string($conn, $_POST['vulnerability']) : '';
$Date = isset($_POST['Date']) ? mysqli_real_escape_string($conn, $_POST['Date']) : null;
$purok = isset($_POST['purok']) ? mysqli_real_escape_string($conn, $_POST['purok']) : ''; // Added purok

if ($action === 'update') {
    // Update query
    $query = "
        UPDATE household_members 
        SET 
            First_name = '$Fname', 
            Middle_name = '$Middle_name', 
            Last_name = '$Last_name', 
            gender = '$gender', 
            dob = '$dob', 
            pob = '$pob', 
            relationship = '$relationship', 
            marital_status = '$marital_status', 
            nationality = '$nationality', 
            occupation = '$occupation', 
            vulnerability = '$vulnerability',
            `Date` = '$Date',
            purok = '$purok' -- Include purok in the update query
        WHERE member_id = '$member_id'
    ";

    if (mysqli_query($conn, $query)) {
        // Redirect with updated flag in the URL
        header("Location: viewmember.php?cid=$household_id&updated=1&message=Record updated successfully");
        exit(); // Ensure no further code execution after redirect
    } else {
        die("Error updating record: " . mysqli_error($conn));
    }
} elseif ($action === 'save_as_new') {
    // Insert query
    $query = "
        INSERT INTO household_members 
        (household_id, First_name, Middle_name, Last_name, gender, dob, pob, relationship, marital_status, nationality, occupation, vulnerability, `Date`, purok) 
        VALUES 
        ('$household_id', '$Fname', '$Middle_name', '$Last_name', '$gender', '$dob', '$pob', '$relationship', '$marital_status', '$nationality', '$occupation', '$vulnerability', '$Date', '$purok')
    ";

    if (mysqli_query($conn, $query)) {
        header('location:Households.php?message=New record added successfully');
    } else {
        die("Error inserting record: " . mysqli_error($conn));
    }
} else {
    die("Invalid action specified.");
}
?>
