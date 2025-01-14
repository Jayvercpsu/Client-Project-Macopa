<?php
// Start the session
session_start();

// Include the database connection file
include('connect.php');

// Check if form data has been submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and escape the input data to avoid SQL injection
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Fetch the user data and count the number of rows returned
    $get = mysqli_fetch_array($result);
    $rows = mysqli_num_rows($result);

    // If a matching user is found, start a session and redirect to the dashboard
    if ($rows == 1) {
        $_SESSION['name'] = $get['name']; // Store user name in session
        header('location:admin_dashboard.php');  // Redirect to admin_dashboard or homepage
        exit();
    } else {
        // Invalid credentials: display error message and remain on the login page
        header("Location: index.php?error=1");
        exit();
    }
}
?>
