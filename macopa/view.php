<?php
// Database connection
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your DB username
$password = "";            // Replace with your DB password
$dbname = "macopa_db";     // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Household Information
    $household_id = $_POST['household_id'];
    $head_of_household = $_POST['head_of_household'];
    $head_age = $_POST['head_age'];
    $head_sex = $_POST['head_sex'];
    $head_contact = $_POST['head_contact'];
    $head_education = $_POST['head_education'];
    $head_employment = $_POST['head_employment'];
    $purok = $_POST['purok'];
    $number_of_family_members = $_POST['number_of_family_members'];
   
    // Insert household data into the 'household' table
    $sql_household = "INSERT INTO household (household_id, head_of_household, head_age, head_sex, head_contact, head_education, head_employment, purok, number_of_family_members)
                      VALUES ('$household_id', '$head_of_household', '$head_age', '$head_sex', '$head_contact', '$head_education', '$head_employment', '$purok', '$number_of_family_members')";
    
    if ($conn->query($sql_household) === TRUE) {
        echo "Household information inserted successfully.<br>";
    } else {
        echo "Error: " . $sql_household . "<br>" . $conn->error;
    }

    // Household Members Information
    if (!empty($_POST['full_name'])) {
        foreach ($_POST['full_name'] as $index => $full_name) {
            $gender = $_POST['gender'][$index];
            $dob = $_POST['dob'][$index];
            $pob = $_POST['pob'][$index];
            $relationship = $_POST['relationship'][$index];
            $marital_status = $_POST['marital_status'][$index];
            $nationality = $_POST['nationality'][$index];
            $occupation = $_POST['occupation'][$index];
            $vulnerability = $_POST['vulnerability'][$index];

            // Insert each member's data into the 'members' table
            $sql_member = "INSERT INTO members (household_id, full_name, gender, dob, pob, relationship, marital_status, nationality, occupation, vulnerability)
                           VALUES ('$household_id', '$full_name', '$gender', '$dob', '$pob', '$relationship', '$marital_status', '$nationality', '$occupation', '$vulnerability')";
            
            if ($conn->query($sql_member) === TRUE) {
                echo "Member data inserted successfully: " . $full_name . "<br>";
            } else {
                echo "Error: " . $sql_member . "<br>" . $conn->error;
            }
        }
    }

    // Close the connection
    $conn->close();

    // Redirect to the "Household Register" page after submission
    echo "<script>window.location.href='Household Register.php';</script>";
}
?>
