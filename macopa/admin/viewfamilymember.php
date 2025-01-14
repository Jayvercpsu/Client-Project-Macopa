<?php
include('connect.php');

// Validate `id` from GET
$family_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch family member details from the family_members table
$sql = "SELECT * FROM family_members WHERE member_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $family_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if data is found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<script>alert('No family member found with that ID.');</script>";
    echo "<script>window.history.back();</script>";
    exit();
}
?>

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
        }
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

            .table td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            .table tr:nth-child(even) {
                background-color: #dddddd;
            }

            /* Highlight effect with transition for table rows */
            table tbody tr {
                transition: background-color 0.3s ease;
                /* Smooth transition */
            }

            table tbody tr:hover {
                background-color: #5a3d5c;
                /* Darker plum purple */
                color: #fff;
                /* White text for better contrast */
            }
        </style>
    </head>


<body>
    
<div class="container mt-5 pb-5">
    <h2 class="text-center mb-4 text-dark">Family Member Details</h2>
    <table class="table table-dark table-striped table-hover text-center">
        <?php
        $fields = [
            'First Name' => $row['first_name'],
            'Middle Name' => $row['middle_name'],
            'Last Name' => $row['last_name'],
            'Gender' => $row['gender'],
            'Date of Birth' => $row['dob'],
            'Place of Birth' => $row['pob'],
            'Relationship' => $row['relationship'],
            'Marital Status' => $row['marital_status'],
            'Nationality' => $row['nationality'],
            'Occupation' => $row['occupation'],
            'Vulnerability' => $row['vulnerability']
        ];
        foreach ($fields as $label => $value) {
            echo "<tr><th>$label</th><td>" . htmlspecialchars($value) . "</td></tr>";
        }
        ?>
    </table>
    <div class="text-center mt-4">
        <a href="viewmember.php?cid=<?php echo htmlspecialchars($row['household_id']); ?>" class="btn btn-primary">Back to Household</a>
    </div>
</div>

<style>
  
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.bundle.min.js"></script>


<?php
$stmt->close();
$conn->close();
?>
