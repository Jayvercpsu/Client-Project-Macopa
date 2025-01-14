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

// Retrieve household head data from POST request
$household_id = $_POST['household_id'];
$purok = $_POST['purok'];
$hh_First_name = $_POST['hh_First_name'];
$hh_Middle_name = $_POST['hh_Middle_name'];
$hh_Last_name = $_POST['hh_Last_name'];
$phone = $_POST['phone'];

// Check if household_id already exists
$check_sql = "SELECT household_id FROM households WHERE household_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $household_id);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "<script>alert('Error: Household ID already exists. Please use a unique ID.');</script>";
    echo "<script>window.history.back();</script>";
    $check_stmt->close();
    $conn->close();
    exit();
}

// Insert into households table
$sql = "INSERT INTO households 
        (household_id, purok, hh_First_name, hh_Middle_name, hh_Last_name, phone)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $household_id, $purok, $hh_First_name, $hh_Middle_name, $hh_Last_name, $phone);

if ($stmt->execute()) {
    // Household members insertion
    $First_names = $_POST['First_name'];
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

    for ($i = 0; $i < count($First_names); $i++) {
        // Check if household member already exists
        $check_member_sql = "SELECT member_id FROM household_members WHERE First_name = ? AND Middle_name = ? AND Last_name = ? AND dob = ?";
        $check_member_stmt = $conn->prepare($check_member_sql);
        $check_member_stmt->bind_param("ssss", $First_names[$i], $Middle_names[$i], $Last_names[$i], $dobs[$i]);
        $check_member_stmt->execute();
        $check_member_stmt->store_result();

        if ($check_member_stmt->num_rows == 0) {
            // Insert new household member
            $sql_member = "INSERT INTO household_members 
                        (household_id, purok, First_name, Middle_name, Last_name, gender, dob, pob, relationship, marital_status, nationality, occupation, vulnerability) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_member = $conn->prepare($sql_member);
            $stmt_member->bind_param("sssssssssssss", 
                $household_id, $purok, $First_names[$i], $Middle_names[$i], $Last_names[$i], 
                $genders[$i], $dobs[$i], $pobs[$i], $relationships[$i], $marital_statuses[$i], 
                $nationalities[$i], $occupations[$i], $vulnerabilities[$i]);

            if ($stmt_member->execute()) {
                // Retrieve the member_id of the newly inserted household member
                $member_id = $stmt_member->insert_id;

                // Family members from modal
                if (isset($_POST['family_first_name']) && is_array($_POST['family_first_name'])) {
                    $family_first_names = $_POST['family_first_name'];
                    $family_middle_names = $_POST['family_middle_name'];
                    $family_last_names = $_POST['family_last_name'];
                    $family_genders = $_POST['family_gender'];
                    $family_dobs = $_POST['family_dob'];
                    $family_pobs = $_POST['family_pob'];
                    $family_relationships = $_POST['family_relationship'];
                    $family_marital_statuses = $_POST['family_marital_status'];
                    $family_nationalities = $_POST['family_nationality'];
                    $family_occupations = $_POST['family_occupation'];
                    $family_vulnerabilities = $_POST['family_vulnerability'];

                    // Loop through family members
                    for ($j = 0; $j < count($family_first_names); $j++) {
                        // Insert each family member and associate with the household member (partner)
                        $sql_family = "INSERT INTO family_members 
                                    (household_id, member_id, first_name, middle_name, last_name, gender, dob, pob, relationship, marital_status, nationality, occupation, vulnerability) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt_family = $conn->prepare($sql_family);
                        $stmt_family->bind_param("sssssssssssss", 
                            $household_id, $member_id, $family_first_names[$j], $family_middle_names[$j], 
                            $family_last_names[$j], $family_genders[$j], $family_dobs[$j], 
                            $family_pobs[$j], $family_relationships[$j], $family_marital_statuses[$j], 
                            $family_nationalities[$j], $family_occupations[$j], $family_vulnerabilities[$j]);

                        if ($stmt_family->execute()) {
                            // Family member successfully added
                        } else {
                            // Handle error
                            echo "<script>alert('Error occurred while adding family member.');</script>";
                        }
                        $stmt_family->close();
                    }
                }
            } else {
                echo "<script>alert('Error occurred while adding household member.');</script>";
            }
            $stmt_member->close();
        }
        $check_member_stmt->close();
    }

    // Insert into residents table
    $sql_resident = "INSERT INTO residents 
                    (household_id, purok, First_name, Middle_name, Last_name, phone) 
                    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_resident = $conn->prepare($sql_resident);
    $stmt_resident->bind_param("ssssss", $household_id, $purok, $hh_First_name, $hh_Middle_name, $hh_Last_name, $phone);
    $stmt_resident->execute();
    $stmt_resident->close();

    echo "<script>alert('Household registered successfully!'); window.location.href = 'Household Register.php';</script>";
} else {
    echo "<script>alert('Error occurred while registering household.'); window.history.back();</script>";
}

// Close statements and connection
$stmt->close();
$check_stmt->close();
$conn->close();
?>
