<?php
include('session.php');
include('connect.php');

// Pagination setup
$limit = 10; // Number of rows to show per page
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit; // Offset for SQL query
// Search setup
$search_term = '';
if (isset($_GET['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_GET['search']);
}
// Modify query to filter based on search input
if ($search_term) {
    $query = mysqli_query($conn, "SELECT * FROM residents 
                                  WHERE household_id LIKE '%$search_term%' 
                                  OR purok LIKE '%$search_term%' 
                                  OR First_name LIKE '%$search_term%'
                                  OR Last_name LIKE '%$search_term%'                                  
                                  LIMIT $limit OFFSET $offset");
    
    $total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM residents 
                                        WHERE household_id LIKE '%$search_term%' 
                                        OR purok LIKE '%$search_term%' 
                                        OR hh_First_name LIKE '%$search_term%'
                                        OR hh_Last_name LIKE '%$search_term%' 
                                        ");
} else {
    $query = mysqli_query($conn, "SELECT * FROM residents LIMIT $limit OFFSET $offset");
    $total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM residents");
}

$total_result = mysqli_fetch_assoc($total_query);
$total_rows = $total_result['total'];
$total_pages = ceil($total_rows / $limit);
?>

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
    <title>HOUSEHOLDS</title>

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
           display: flex;
           justify-content: flex-end; /* Moves the search bar to the right */
           align-items: center;
           margin-bottom: 20px; /* Optional: Adds space between search bar and the table */
        }

        .search-bar input {
            background-color: lightgray;
            border: none;
            border-radius: 20px;
            padding: 5px 15px;
            width: 250px;
            outline-color: lightblue;
            color: black;

        }
        .search-bar button {
            border: none;
            background-color: #FFD700;
            border-radius: 20px;
            padding: 5px 15px;
            margin-left: 10px;
            color: white;
        }
        .search-bar button:hover { 
            background-color: #e5c600; 
        } 
        .content {
            padding: 20px;
            margin-top: 20px;
        }
        .navbar-nav .nav-item .nav-link.active {
            text-decoration: underline;
            color: #007bff; /* Optional: Change text color when active */
        }
    </style>
</head>
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
                    <a class="nav-link" href="Household Register.php"><i class="fa fa-address-card"></i> Register Households</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Households.php"><i class="fas fa-home"></i> Households</a>
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
    </style>
    <style>
    .btn-custom-purple {
        background-color: #a5d8ff; /* Light blue */
        color: #0056b3; /* Dark blue text */
        border: none;
    }

    .btn-custom-purple:hover {
         background-color: #91c9f8; /* Slightly darker light blue on hover */
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
        <!-- Search Bar -->
        <div class="search-bar">
            <form class="form-inline" method="GET" action="">
                <!-- I-pasa ang 'year' parameter kapag nag-search -->
                <input class="form-control" type="text" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" placeholder="Search">
                <input type="hidden" name="year" value="<?php echo isset($_GET['year']) ? $_GET['year'] : '2024'; ?>"> <!-- Hide the year in the search form -->
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <form class="form-inline" method="GET" action="">
                <label for="year" class="mr-2">Filter by Year:</label>
                <select class="form-control" name="year" onchange="this.form.submit()">
                    <?php
                        $currentYear = date('Y');
                        $selectedYear = isset($_GET['year']) ? $_GET['year'] : '2024'; // Default to 2024
                        for ($year = 2024; $year <= $currentYear + 10; $year++) {
                            $selected = ($selectedYear == $year) ? 'selected' : '';
                            echo "<option value='$year' $selected>$year</option>";
                        }
                    ?>
                </select>
            </form>
        </div>

        <!-- Residents Table -->
        <div class="content p-2">
            <div class="card mb-4">
                <div class="card-header bg-dark text-white text-center" >BARANGAY HOUSEHOLD LIST</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size: 15px; text-align: center;">ID</th>
                                <th style="font-size: 15px; text-align: center;">HOUSEHOLD ID</th>
                                <th style="font-size: 15px; text-align: center;">PUROK</th>
                                <th style="font-size: 15px; text-align: center;">FULLNAME</th>
                                <th style="font-size: 15px; text-align: center;">CONTACT NO</th>
                                <th style="font-size: 15px; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kumuha ng 'search' at 'year' mula sa URL
                            $search_term = isset($_GET['search']) ? $_GET['search'] : '';
                            $selectedYear = isset($_GET['year']) ? $_GET['year'] : '2024';

                            // SQL query na gumagamit ng 'year' at 'search' filters
                            $queryStr = "SELECT * FROM households WHERE YEAR(date) = '$selectedYear' 
                                         AND (household_id LIKE '%$search_term%' OR hh_First_name LIKE '%$search_term%' 
                                         OR hh_Last_name LIKE '%$search_term%' OR purok LIKE '%$search_term%')";
                            $query = mysqli_query($conn, $queryStr);

                            // I-display ang mga resulta ng query
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['household_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['purok']); ?></td>
                                    <td><?php echo htmlspecialchars($row['hh_First_name'] . ' ' . $row['hh_Middle_name'] . ' ' . $row['hh_Last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    <td style="text-align: center;">
                                        <a href="viewmember.php?cid=<?php echo $row['household_id']; ?>&date=<?php echo $row['date']; ?>" class="btn btn-custom-purple btn-sm"> <i class="fas fa-eye"></i></a>
                                        <button class="btn btn-warning btn-sm fas fa-edit toggle-edit" data-id="<?php echo htmlspecialchars($row['id']); ?>"></button>
                                    </td>
                                </tr>
                                <tr class="edit-form" id="edit-<?php echo htmlspecialchars($row['id']); ?>" style="display: none;">
                                <td colspan="11">
                                    <form action="edithousehold.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
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
                                                <label for="phone-<?php echo $row['household_id']; ?>">Phone</label>
                                                <input type="text" class="form-control" name="phone" id="phone-<?php echo $row['household_id']; ?>" value="<?php echo htmlspecialchars($row['phone']); ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="Date-<?php echo htmlspecialchars($row['household_id']); ?>">Date Registered</label>
                                                <input type="date" class="form-control" name="Date" id="Date-<?php echo htmlspecialchars($row['household_id']); ?>" 
                                                    value="<?php echo isset($row['date']) ? htmlspecialchars(date('Y-m-d', strtotime($row['date']))) : ''; ?>">
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

                    <!-- Pagination Links -->
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <?php if ($page < $total_pages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-edit').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const formRow = document.getElementById(`edit-${id}`);
                formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
            });
        });
    </script>
    <script>
        // JavaScript to add active class to the current page link
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        navLinks.forEach(function(link) {
            if (window.location.href.indexOf(link.href) !== -1) {
                link.classList.add('active');
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>




</html>