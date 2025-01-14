<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bhr_db";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve household data from POST request
$household_id = $_POST['household_id'];
$Purok = $_POST['Purok'];
$head_of_household = $_POST['head_of_household'];

// Insert household data into households table
$sql = "INSERT INTO households (household_id, Purok, head_of_household) VALUES ('$a', '$b', '$c')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $household_id, $Purok, $head_of_household);
$stmt->execute();

// Retrieve household members data from POST request
$full_names = $_POST['full_name'];
$genders = $_POST['gender'];
$dobs = $_POST['dob'];
$pobs = $_POST['pob'];
$relationships = $_POST['relationship'];
$marital_statuses = $_POST['marital_status'];
$nationalities = $_POST['nationality'];
$occupations = $_POST['occupation'];

// Insert household members data into household_members table
for ($i = 0; $i < count($full_names); $i++) {
    $full_name = $full_names[$i];
    $gender = $genders[$i];
    $dob = $dobs[$i];
    $pob = $pobs[$i];
    $relationship = $relationships[$i];
    $marital_status = $marital_statuses[$i];
    $nationality = $nationalities[$i];
    $occupation = $occupations[$i];

    $sql = "INSERT INTO household_members (household_id, full_name, gender, dob, pob, relationship, marital_status, nationality, occupation) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $household_id, $full_name, $gender, $dob, $pob, $relationship, $marital_status, $nationality, $occupation);
    $stmt->execute();
}

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect or show success message
echo "Household and members added successfully!";
?>
