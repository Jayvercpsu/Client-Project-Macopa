<?php
include('connect.php');
include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="bootstrap, admin template, dashboard, responsive, free template, example">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>HOUSEHOLD MEMBER</title>

    <style>
        body {
            background: center center fixed;
            background-size: cover;
            background-color: #f4f4f4;
        }

        /* Navbar styling */
        .navbar-custom {
            background-color: #333;
            color: white;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: white;
            font-size: 24px;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .navbar-nav .nav-item .nav-link {
            color: white;
            font-size: 18px;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #444;
        }

        .custom-color {
            color: #FFD700;
        }

        .ml-auto {
            display: flex;
            align-items: center;
        }

        .navbar .ml-auto img {
            margin-right: 10px;
        }

        .dropdown-menu {
            background-color: #444;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: #555;
        }

        .content {
            padding: 20px;
            margin-top: 20px;
        }

          /* Styling for the search bar */
        .search-bar {
            margin-left: 20px;
        }
        .content {
            padding: 20px;
            margin-top: 20px;
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <a class="navbar-brand" href="#">
            <img onclick="profileToggle()" class="rounded-circle" src="macopa logo.jpg" alt="Logo" width="80" height="80">
            BHR MACOPA
        </a>
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.php"><i class="fa fa-tachometer-alt"></i> Analytics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Accounts.php"><i class="fa fa-tachometer-alt"></i>Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Household Register.php"><i class="fa fa-address-card"></i> Register Households</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Households.php"><i class="fa fa-users"></i> Households</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="residents.php"><i class="fa fa-users"></i> Residents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php"><i class="fa fa-file-alt"></i> Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="purok.php"><i class="fa fa-map-signs"></i> Puroks</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" onclick="profileToggle()" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img class="rounded-circle" src="user.jpg" alt="User" width="30" height="30"> <?php echo $_SESSION['name']; ?>
                    </a>
                    <div id="ProfileDropDown" class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">My account</a>
                        <a class="dropdown-item" href="#">Notifications</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="bootstrap, admin template, dashboard, responsive, free template, example">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>DASHBOARD</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            max-width: 1650px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .dashboard h1 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }    
        .table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .table tr:nth-child(even) {
            background-color: #dddddd;
        }
        /* Highlight effect with transition for table rows */
        table tbody tr {
            transition: background-color 0.3s ease; /* Smooth transition */
        }
        table tbody tr:hover {
            background-color: #5a3d5c; /* Darker plum purple */
            color: #fff; /* White text for better contrast */
        }

    </style>
</head>
<body>

    <div class="dashboard">
    <!-- Form Section -->   
    <div class="content p-2">
        <div class="card-header bg-skyblue text-dark" style="text-transform: uppercase;">
            <h3>Household Information</h3>
        </div>
        <?php 
        include('connect.php');

        // Validate `cid` from GET
        $id = isset($_GET['cid']) ? intval($_GET['cid']) : 0;

        // Fetch household details
        $householdDetailsQuery = mysqli_query($conn, "SELECT * FROM households WHERE household_id = $id");
        $householdDetails = mysqli_fetch_assoc($householdDetailsQuery);

        if (!$householdDetails) {
            echo "<div class='alert alert-danger'>Household not found or invalid ID.</div>";
            exit;
        }
        ?>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Household Incharge</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Household ID:</strong> <?php echo htmlspecialchars($householdDetails['household_id']); ?></p>
                        <p><strong>Purok:</strong> <?php echo htmlspecialchars($householdDetails['purok']); ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Head of Household:</strong> <?php echo htmlspecialchars($householdDetails['hh_First_name'] . ' ' . $householdDetails['hh_Middle_name'] . ' ' . $householdDetails['hh_Last_name']); ?></p>
                        <p><strong>Contact No:</strong> <?php echo htmlspecialchars($householdDetails['phone']); ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Date Registered:</strong> <?php echo htmlspecialchars(date('F d, Y', strtotime($householdDetails['date']))); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" style="background-color: white; font-family: arial, sans-serif; border-collapse: collapse; width: 100%; border-radius: 15px;">
                <thead>
                    <tr>
                        <th>MEMBER ID</th>
                        <th>HOUSEHOLD ID</th>
                        <th>FULLNAME</th>
                        <th>GENDER</th>
                        <th>DOB</th>
                        <th>POB</th>
                        <th>HOUSE POSITION</th>
                        <th>MARITAL STATUS</th>
                        <th>NATIONALITY</th>
                        <th>OCCUPATION</th>
                        <th>VULNERABLE GROUP</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
include('connect.php');


// Validate `cid` from GET
$id = isset($_GET['cid']) ? intval($_GET['cid']) : 0;

// Get the year of the selected household
$householdQuery = mysqli_query($conn, "SELECT YEAR(date) as year_registered FROM households WHERE household_id = $id");

// Check if query was successful and returned data
if ($householdQuery && mysqli_num_rows($householdQuery) > 0) {
    $householdData = mysqli_fetch_assoc($householdQuery);
    $yearRegistered = $householdData['year_registered'];
} else {
    $yearRegistered = null; // Default or error handling
}


// Fetch household members registered in the same year
$query = mysqli_query($conn, "
    SELECT * 
    FROM household_members 
    WHERE household_id = $id 
      AND YEAR(date) = '$yearRegistered'
");

// Check query success
if (!$query) {
    die("Error: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['member_id']); ?></td>
        <td><?php echo htmlspecialchars($row['household_id']); ?></td>
        <td><?php echo htmlspecialchars($row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']); ?></td>
        <td><?php echo htmlspecialchars($row['gender']); ?></td>
        <td><?php echo htmlspecialchars($row['dob']); ?></td>
        <td><?php echo htmlspecialchars($row['pob']); ?></td>
        <td><?php echo htmlspecialchars($row['relationship']); ?></td>
        <td><?php echo htmlspecialchars($row['marital_status']); ?></td>
        <td><?php echo htmlspecialchars($row['nationality']); ?></td>
        <td><?php echo htmlspecialchars($row['occupation']); ?></td>
        <td><?php echo htmlspecialchars($row['vulnerability']); ?></td>
        <td>
            <button class="class='btn btn-warning btn-sm fas fa-edit toggle-edit" data-id="<?php echo htmlspecialchars($row['member_id']); ?>"></button>
            <form action="deletehousehold_member.php" method="POST" style="display:inline;">
        <input type="hidden" name="member_id" value="<?php echo htmlspecialchars($row['member_id']); ?>">
        <button type="submit" class="btn btn-danger btn-sm fas fa-trash" onclick="return confirm('Are you sure you want to delete this member?');"></button>
    </form>
        </td>   
    </tr>

    <tr class="edit-form" id="edit-<?php echo htmlspecialchars($row['member_id']); ?>" style="display: none;">
        <td colspan="11">
            <form action="edithousehold_member.php" method="POST">
                <input type="hidden" name="member_id" value="<?php echo htmlspecialchars($row['member_id']); ?>">
                <input type="hidden" name="household_id" value="<?php echo htmlspecialchars($row['household_id']); ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="purok-<?php echo $row['household_id']; ?>">Purok</label>
                                            <input type="text" class="form-control" name="purok" id="purok-<?php echo $row['household_id']; ?>" value="<?php echo htmlspecialchars($row['purok']); ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="edit-name">First Name</label>
                                            <input type="text" class="form-control" name="Fname" id="Fname-<?php echo $row['household_id']; ?>" value="<?php echo $row['First_name']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="middlename-<?php echo $row['household_id']; ?>">Middle Name</label>
                                            <input type="text" class="form-control" name="Middle_name" id="Middle_name-<?php echo $row['household_id']; ?>" value="<?php echo $row['Middle_name']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="lastname-<?php echo $row['household_id']; ?>">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname-<?php echo $row['household_id']; ?>" value="<?php echo $row['Last_name']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="gender-<?php echo $row['household_id']; ?>">Gender</label>
                                            <select class="form-control" name="gender" id="gender-<?php echo $row['household_id']; ?>">
                                                <option value="Male" <?php if ($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                                                <option value="Female" <?php if ($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="dob-<?php echo $row['household_id']; ?>">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob" id="dob-<?php echo $row['household_id']; ?>" value="<?php echo $row['dob']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pob-<?php echo $row['household_id']; ?>">Place of Birth</label>
                                            <input type="text" class="form-control" name="pob" id="pob-<?php echo $row['household_id']; ?>" value="<?php echo $row['pob']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="relationship-<?php echo $row['household_id']; ?>">House Position</label>
                                            <input type="text" class="form-control" name="relationship" id="relationship-<?php echo $row['household_id']; ?>" value="<?php echo $row['relationship']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="marital-<?php echo $row['household_id']; ?>">Marital Status</label>
                                            <select class="form-control" name="marital" id="marital-<?php echo $row['household_id']; ?>">
                                                <option value="Single" <?php if ($row['marital_status'] == "Single") echo "selected"; ?>>Single</option>
                                                <option value="Married" <?php if ($row['marital_status'] == "Married") echo "selected"; ?>>Married</option>
                                                <option value="Widowed" <?php if ($row['marital_status'] == "Widowed") echo "selected"; ?>>Widowed</option>
                                                <option value="Divorced" <?php if ($row['marital_status'] == "Divorced") echo "selected"; ?>>Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="nationality-<?php echo $row['household_id']; ?>">Nationality</label>
                                            <input type="text" class="form-control" name="nationality" id="nationality-<?php echo $row['household_id']; ?>" value="<?php echo $row['nationality']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="occupation-<?php echo $row['household_id']; ?>">Occupation</label>
                                            <input type="text" class="form-control" name="occupation" id="occupation-<?php echo $row['household_id']; ?>" value="<?php echo $row['occupation']; ?>">
                                        </div>
            <div class="form-group col-md-3">
                <label for="vulnerability-<?php echo $row['household_id']; ?>">Vulnerable Group</label>
                    <select class="form-control" name="vulnerability" id="vulnerability-<?php echo $row['household_id']; ?>">
                        <option value="4ps" <?php if ($row['vulnerability'] == "4ps") echo "selected"; ?>>4ps</option>
                        <option value="PWDs" <?php if ($row['vulnerability'] == "PWDs") echo "selected"; ?>>PWDs</option>
                        <option value="Senior Citizen" <?php if ($row['vulnerability'] == "Senior Citizen") echo "selected"; ?>>Senior Citizen</option>
                        <option value="Solo parent" <?php if ($row['vulnerability'] == "Solo parent") echo "selected"; ?>>Solo parent</option>
                        <option value="New Born" <?php if ($row['vulnerability'] == "New Born") echo "selected"; ?>>New Born</option>
                        <option value="Mortality" <?php if ($row['vulnerability'] == "Mortality") echo "selected"; ?>>Mortality</option>
                        <option value="None" <?php if ($row['vulnerability'] == "None") echo "selected"; ?>>None</option>
                    </select>
            </div>
            <div class="form-group col-md-3">
    <label for="Date-<?php echo $row['household_id']; ?>">Date</label>
    <input type="Date-" class="form-control" name="Date" id="Date-<?php echo $row['household_id']; ?>" 
           value="<?php echo isset($row['Date']) ? htmlspecialchars($row['Date']) : ''; ?>">
</div>

                                    </div>
    <button type="submit" name="action" value="update" class="btn btn-success">Save</button>
    <button type="submit" name="action" value="save_as_new" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button class="btn" style="background-color: #28a745; color: white;" data-toggle="modal" data-target="#addMemberModal">Add New Member</button>
        </div>
    </div>
<?php
include('connect.php');

// Validate `cid` from GET
$id = isset($_GET['cid']) ? intval($_GET['cid']) : 0;

// Get the household_id for the form
$household_id = $id;
?>
    <div class="content p-2">
        <div class="card-body">
               <div class="card-header bg-skyblue text-dark" style="text-transform: uppercase;">
            <h4>FAMILY 2</h4>
        </div>
        <!-- Place the form for updating a family member (new household) here -->
       <!-- <div class="update-form">
            <h5>Update Family Member (New Household)</h5>
            <form action="update_family_member.php" method="POST">
                <div class="form-row">
                   
                    <input type="hidden" name="household_id" value="<?php echo $household_id; ?>">

                    <div class="form-group col-md-3">
                        <label for="new_fname">First Name</label>
                        <input type="text" class="form-control" name="new_fname" id="new_fname" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_lname">Last Name</label>
                        <input type="text" class="form-control" name="new_lname" id="new_lname" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_gender">Gender</label>
                        <select class="form-control" name="new_gender" id="new_gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_dob">Date of Birth</label>
                        <input type="date" class="form-control" name="new_dob" id="new_dob" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_pob">Place of Birth</label>
                        <input type="text" class="form-control" name="new_pob" id="new_pob">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_marital">Marital Status</label>
                        <select class="form-control" name="new_marital" id="new_marital">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_nationality">Nationality</label>
                        <input type="text" class="form-control" name="new_nationality" id="new_nationality">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_occupation">Occupation</label>
                        <input type="text" class="form-control" name="new_occupation" id="new_occupation">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_vulnerability">Vulnerable Group</label>
                        <select class="form-control" name="new_vulnerability" id="new_vulnerability">
                            <option value="4ps">4ps</option>
                            <option value="PWDs">PWDs</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="Solo parent">Solo parent</option>
                            <option value="New Born">New Born</option>
                            <option value="Mortality">Mortality</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="new_household_date">Date of Joining Household</label>
                        <input type="date" class="form-control" name="new_household_date" id="new_household_date">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update Family Member</button>
            </form>
        </div>-->
            <table class="table table-bordered" style="background-color: white; font-family: arial, sans-serif; border-collapse: collapse; width: 100%; border-radius: 15px;">
                <thead>
                    <tr>
                        <th>MEMBER ID</th>
                        <th>HOUSEHOLD ID</th>
                        <th>FULLNAME</th>
                        <th>GENDER</th>
                        <th>DOB</th>
                        <th>POB</th>
                        <th>HOUSE POSITION</th>
                        <th>MARITAL STATUS</th>
                        <th>NATIONALITY</th>
                        <th>OCCUPATION</th>
                        <th>VULNERABLE GROUP</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
include('connect.php');


// Validate `cid` from GET
$id = isset($_GET['cid']) ? intval($_GET['cid']) : 0;

// Get the year of the selected household
$householdQuery = mysqli_query($conn, "SELECT YEAR(date) as year_registered FROM households WHERE household_id = $id");

// Check if query was successful and returned data
if ($householdQuery && mysqli_num_rows($householdQuery) > 0) {
    $householdData = mysqli_fetch_assoc($householdQuery);
    $yearRegistered = $householdData['year_registered'];
} else {
    $yearRegistered = null; // Default or error handling
}


// Fetch household members registered in the same year
$query = mysqli_query($conn, "
    SELECT * 
    FROM household_members 
    WHERE household_id = $id 
      AND YEAR(date) = '$yearRegistered'
      AND second_family = '1'
");

// Check query success
if (!$query) {
    die("Error: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?php echo isset($row['member_id']) ? htmlspecialchars($row['member_id']) : ''; ?></td>
<td><?php echo isset($row['household_id']) ? htmlspecialchars($row['household_id']) : ''; ?></td>
<td><?php echo isset($row['First_name']) && isset($row['Last_name']) ? htmlspecialchars($row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']) : ''; ?></td>
<td><?php echo isset($row['gender']) ? htmlspecialchars($row['gender']) : ''; ?></td>
<td><?php echo isset($row['dob']) ? htmlspecialchars($row['dob']) : ''; ?></td>
<td><?php echo isset($row['pob']) ? htmlspecialchars($row['pob']) : ''; ?></td>
<td><?php echo isset($row['relationship']) ? htmlspecialchars($row['relationship']) : ''; ?></td>
<td><?php echo isset($row['marital_status']) ? htmlspecialchars($row['marital_status']) : ''; ?></td>
<td><?php echo isset($row['nationality']) ? htmlspecialchars($row['nationality']) : ''; ?></td>
<td><?php echo isset($row['occupation']) ? htmlspecialchars($row['occupation']) : ''; ?></td>
<td><?php echo isset($row['vulnerability']) ? htmlspecialchars($row['vulnerability']) : ''; ?></td>
<td>
    <button class="btn btn-warning btn-sm fas fa-edit toggle-edit" data-id="<?php echo isset($row['member_id']) ? htmlspecialchars($row['member_id']) : ''; ?>"></button>
    <form action="deletehousehold_member.php" method="POST" style="display:inline;">
        <input type="hidden" name="member_id" value="<?php echo isset($row['member_id']) ? htmlspecialchars($row['member_id']) : ''; ?>">
        <button type="submit" class="btn btn-danger btn-sm fas fa-trash" onclick="return confirm('Are you sure you want to delete this member?');"></button>
    </form>
</td>
    </tr>

    <tr class="edit-form" id="edit-<?php echo htmlspecialchars($row['member_id']); ?>" style="display: none;">
        <td colspan="11">
            <form action="edithousehold_member.php" method="POST">
                <input type="hidden" name="member_id" value="<?php echo htmlspecialchars($row['member_id']); ?>">
                <input type="hidden" name="household_id" value="<?php echo htmlspecialchars($row['household_id']); ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="purok-<?php echo $row['household_id']; ?>">Purok</label>
                                            <input type="text" class="form-control" name="purok" id="purok-<?php echo $row['household_id']; ?>" value="<?php echo htmlspecialchars($row['purok']); ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="edit-name">First Name</label>
                                            <input type="text" class="form-control" name="Fname" id="Fname-<?php echo $row['household_id']; ?>" value="<?php echo $row['First_name']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="middlename-<?php echo $row['household_id']; ?>">Middle Name</label>
                                            <input type="text" class="form-control" name="Middle_name" id="Middle_name-<?php echo $row['household_id']; ?>" value="<?php echo $row['Middle_name']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="lastname-<?php echo $row['household_id']; ?>">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname-<?php echo $row['household_id']; ?>" value="<?php echo $row['Last_name']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="gender-<?php echo $row['household_id']; ?>">Gender</label>
                                            <select class="form-control" name="gender" id="gender-<?php echo $row['household_id']; ?>">
                                                <option value="Male" <?php if ($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                                                <option value="Female" <?php if ($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="dob-<?php echo $row['household_id']; ?>">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob" id="dob-<?php echo $row['household_id']; ?>" value="<?php echo $row['dob']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pob-<?php echo $row['household_id']; ?>">Place of Birth</label>
                                            <input type="text" class="form-control" name="pob" id="pob-<?php echo $row['household_id']; ?>" value="<?php echo $row['pob']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="relationship-<?php echo $row['household_id']; ?>">House Position</label>
                                            <input type="text" class="form-control" name="relationship" id="relationship-<?php echo $row['household_id']; ?>" value="<?php echo $row['relationship']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="marital-<?php echo $row['household_id']; ?>">Marital Status</label>
                                            <select class="form-control" name="marital" id="marital-<?php echo $row['household_id']; ?>">
                                                <option value="Single" <?php if ($row['marital_status'] == "Single") echo "selected"; ?>>Single</option>
                                                <option value="Married" <?php if ($row['marital_status'] == "Married") echo "selected"; ?>>Married</option>
                                                <option value="Widowed" <?php if ($row['marital_status'] == "Widowed") echo "selected"; ?>>Widowed</option>
                                                <option value="Divorced" <?php if ($row['marital_status'] == "Divorced") echo "selected"; ?>>Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="nationality-<?php echo $row['household_id']; ?>">Nationality</label>
                                            <input type="text" class="form-control" name="nationality" id="nationality-<?php echo $row['household_id']; ?>" value="<?php echo $row['nationality']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="occupation-<?php echo $row['household_id']; ?>">Occupation</label>
                                            <input type="text" class="form-control" name="occupation" id="occupation-<?php echo $row['household_id']; ?>" value="<?php echo $row['occupation']; ?>">
                                        </div>
            <div class="form-group col-md-3">
                <label for="vulnerability-<?php echo $row['household_id']; ?>">Vulnerable Group</label>
                    <select class="form-control" name="vulnerability" id="vulnerability-<?php echo $row['household_id']; ?>">
                        <option value="4ps" <?php if ($row['vulnerability'] == "4ps") echo "selected"; ?>>4ps</option>
                        <option value="PWDs" <?php if ($row['vulnerability'] == "PWDs") echo "selected"; ?>>PWDs</option>
                        <option value="Senior Citizen" <?php if ($row['vulnerability'] == "Senior Citizen") echo "selected"; ?>>Senior Citizen</option>
                        <option value="Solo parent" <?php if ($row['vulnerability'] == "Solo parent") echo "selected"; ?>>Solo parent</option>
                        <option value="New Born" <?php if ($row['vulnerability'] == "New Born") echo "selected"; ?>>New Born</option>
                        <option value="Mortality" <?php if ($row['vulnerability'] == "Mortality") echo "selected"; ?>>Mortality</option>
                        <option value="None" <?php if ($row['vulnerability'] == "None") echo "selected"; ?>>None</option>
                    </select>
            </div>
            <div class="form-group col-md-3">
    <label for="Date-<?php echo $row['household_id']; ?>">Date</label>
    <input type="Date-" class="form-control" name="Date" id="Date-<?php echo $row['household_id']; ?>" 
           value="<?php echo isset($row['Date']) ? htmlspecialchars($row['Date']) : ''; ?>">
</div>

                                    </div>
    <button type="submit" name="action" value="update" class="btn btn-success">Save</button>
    <button type="submit" name="action" value="save_as_new" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button class="btn" style="background-color: #28a745; color: white;" data-toggle="modal" data-target="#addSecondFamModal">Add New Member</button>
            <a href="Households.php" class="btn btn-info btn-sm fas fa-arrow-right float-right">Go Back</a>
        </div>
    </div>
</div>


<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="add_household_member.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberModalLabel">Add New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="household_id" value="<?php echo $id; ?>">
                    <!-- Purok -->
                    <?php
  include('connect.php');
  $sql = "SELECT id, purok, name FROM purok";
  $result = $conn->query($sql);
  ?>
    <div class="form-group">
        <label>Purok:</label>
        <select name="purok" class="form-control"  required>
            <option value="">Select Purok</option>
            <?php

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='". $row['purok'] . "'>" . $row['purok']. "  " . $row['name'] . "</option>";
                }
            }
            ?>
        </select>
    </div>
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <!-- Middle Name -->
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <!-- Gender -->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <!-- Date of Birth -->
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" required>
                    </div>
                    <!-- Place of Birth -->
                    <div class="form-group">
                        <label for="pob">Place of Birth</label>
                        <input type="text" class="form-control" name="pob" required>
                    </div>
                    <!-- House Position -->
                    <div class="form-group">
                        <label for="relationship">House Position</label>
                        <input type="text" class="form-control" name="relationship" required>
                    </div>
                    <!-- Marital Status -->
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <select class="form-control" name="marital_status" required>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                    <!-- Nationality -->
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" name="nationality" required>
                    </div>
                    <!-- Occupation -->
                    <div class="form-group">
                        <label for="occupation">Occupation</label>
                        <input type="text" class="form-control" name="occupation" required>
                    </div>
                    <!-- Vulnerable Group -->
                    <div class="form-group">
            <label for="vulnerability">Vulnerability:</label>
            <select name="vulnerability" class="form-control" required>
                <option value="4ps">4ps</option>
                <option value="PWDs">PWDs</option>
                <option value="Senior Citizen">Senior Citizen</option>
                <option value="Solo Parent">Solo Parent</option>
                <option value="New Born">New Born</option>
                <option value="Mortality">Mortality</option>
                <option value="None">None</option>
            </select>
        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addSecondFamModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="add_household_family.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberModalLabel">Add New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="household_id" value="<?php echo $id; ?>">
                <div class="form-group col-md-14">
                            <label>Second Family Member:</label>
                            <input type="checkbox" name="second_family_checkbox[]" value="1">
                        </div>
                    <!-- Purok -->
                    <?php
                        include('connect.php');
                        $sql = "SELECT id, purok, name FROM purok";
                        $result = $conn->query($sql);
                    ?>
    <div class="form-group">
        <label>Purok:</label>
        <select name="purok" class="form-control"  required>
            <option value="">Select Purok</option>
            <?php

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='". $row['purok'] . "'>" . $row['purok']. "  " . $row['name'] . "</option>";
                }
            }
            ?>
        </select>
    </div>
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <!-- Middle Name -->
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <!-- Gender -->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <!-- Date of Birth -->
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" required>
                    </div>
                    <!-- Place of Birth -->
                    <div class="form-group">
                        <label for="pob">Place of Birth</label>
                        <input type="text" class="form-control" name="pob" required>
                    </div>
                    <!-- House Position -->
                    <div class="form-group">
                        <label for="relationship">House Position</label>
                        <input type="text" class="form-control" name="relationship" required>
                    </div>
                    <!-- Marital Status -->
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <select class="form-control" name="marital_status" required>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                    <!-- Nationality -->
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" name="nationality" required>
                    </div>
                    <!-- Occupation -->
                    <div class="form-group">
                        <label for="occupation">Occupation</label>
                        <input type="text" class="form-control" name="occupation" required>
                    </div>
                    <!-- Vulnerable Group -->
                    <div class="form-group">
            <label for="vulnerability">Vulnerability:</label>
            <select name="vulnerability" class="form-control" required>
                <option value="4ps">4ps</option>
                <option value="PWDs">PWDs</option>
                <option value="Senior Citizen">Senior Citizen</option>
                <option value="Solo Parent">Solo Parent</option>
                <option value="New Born">New Born</option>
                <option value="Mortality">Mortality</option>
                <option value="None">None</option>
            </select>
        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to Toggle Edit Form -->
<script>
    document.querySelectorAll('.toggle-edit').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const formRow = document.getElementById(`edit-${id}`);
            formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
        });
    });
</script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function profileToggle() {
            $('#ProfileDropDown').toggleClass('show');
        }
    </script>

</body>

</html>