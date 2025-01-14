
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "macopa_db";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
// Retrieve household data from POST request

$household_id = $_POST['household_id'];
$purok = $_POST['purok'];

// Use only the first name for the main household insertion
$First_name = $_POST['First_name'][0];  // First element if array
$Middle_name = $_POST['Middle_name'][0];
$Last_name = $_POST['Last_name'][0];
$phone = $_POST['phone'];

// Check if household_id already exists
$check_sql = "SELECT household_id FROM households WHERE household_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $household_id);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    // Household ID already exists, show error message
    echo "<script>alert('Error: Household ID already exists. Please use a unique ID.');</script>";
    echo "<script>window.history.back();</script>"; // Redirect back to the form
} else {
    // Proceed with the insertion since household_id is unique
    $sql = "INSERT INTO households 
            (household_id, purok, First_name, Middle_name, Last_name, phone)
            VALUES 
            (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $household_id, $purok, $First_name, $Middle_name, $Last_name, $phone);

    if ($stmt->execute() === TRUE) {
        $new_household_id = $conn->insert_id;

        // Retrieve household members data from POST request
        $First_names = $_POST['First_name'];  // These are arrays
        $Middle_names = $_POST['Middle_name'];
        $Last_names = $_POST['Last_name'];
        $genders = $_POST['gender'];
        $dobs = $_POST['dob'];
        $pobs = $_POST['pob'];
        $relationships = $_POST['relationship'];
        $marital_statuses = $_POST['marital_status'];
        $nationalities = $_POST['nationality'];
        $occupations = $_POST['occupation'];
        $vulnerabilities = $_POST['vulnerability'];

        // Insert household members data into household_members table
        for ($i = 0; $i < count($First_names); $i++) {
            $First_name = $First_names[$i];
            $Middle_name = $Middle_names[$i];
            $Last_name = $Last_names[$i];
            $gender = $genders[$i];
            $dob = $dobs[$i];
            $pob = $pobs[$i];
            $relationship = $relationships[$i];
            $marital_status = $marital_statuses[$i];
            $nationality = $nationalities[$i];
            $occupation = $occupations[$i];
            $vulnerability = $vulnerabilities[$i];

            $sql_member = "INSERT INTO household_members 
                           (household_id, purok, First_name, Middle_name, Last_name, gender, dob, pob, relationship, marital_status, nationality, occupation, vulnerability) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_member = $conn->prepare($sql_member);
            $stmt_member->bind_param("sssssssssssss", $household_id, $purok, $First_name, $Middle_name, $Last_name, $gender, $dob, $pob, $relationship, $marital_status, $nationality, $occupation, $vulnerability);
            $stmt_member->execute();

            $sql_member = "INSERT INTO members 
                           (household_id, purok, First_name, Middle_name, Last_name) 
                           VALUES (?, ?, ?, ?, ?)";
            $stmt_member = $conn->prepare($sql_member);
            $stmt_member->bind_param("sssss", $household_id, $purok, $First_name, $Middle_name, $Last_name);
            $stmt_member->execute();
        }


        // Insert into residents table
        $sql_resident = "INSERT INTO residents 
                         (household_id, purok, First_name, Middle_name, Last_name, phone) 
                         VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_resident = $conn->prepare($sql_resident);
        $stmt_resident->bind_param("ssssss", $household_id, $purok, $First_names[0], $Middle_names[0], $Last_names[0], $phone);  // Use first values
        $stmt_resident->execute();

        echo "<script>alert('Household registered successfully!');</script>";
        echo "<script>window.location.href='Household Register.php';</script>";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
