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
        // Construct the search conditions
        $search_conditions = [];
        
        $search_conditions[] = "household_id LIKE '%$search_term%'";
        $search_conditions[] = "First_name LIKE '%$search_term%'";
        $search_conditions[] = "Middle_name LIKE '%$search_term%'";
        $search_conditions[] = "Last_name LIKE '%$search_term%'";
        $search_conditions[] = "vulnerability LIKE '%$search_term%'";
        $search_conditions[] = "marital_status LIKE '%$search_term%'";
        $search_conditions[] = "purok LIKE '%$search_term%'";

        // Add exact match condition for gender
        if (strtolower($search_term) == 'male' || strtolower($search_term) == 'female') {
            $search_conditions[] = "gender = '$search_term'";
        } else {
            $search_conditions[] = "gender LIKE '%$search_term%'";
        }

        // Combine all conditions using OR
        $where_clause = implode(' OR ', $search_conditions);

        $query = mysqli_query($conn, "SELECT * FROM household_members 
                                      WHERE $where_clause
                                      LIMIT $limit OFFSET $offset");
        
        $total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM household_members 
                                            WHERE $where_clause");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM household_members LIMIT $limit OFFSET $offset");
        $total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM household_members");
    }

    $total_result = mysqli_fetch_assoc($total_query);
    $total_rows = $total_result['total'];
    $total_pages = ceil($total_rows / $limit);

    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="bootstrap, admin template, dashboard, responsive, free template, example">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <title>RESIDENTS</title>

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
            .custom-back-btn {
    background-color: #8e44ad; /* Purple */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    transition: transform 0.3s ease, background-color 0.3s ease, border-radius 0.3s ease;
}

.custom-back-btn:hover {
    background-color: #9b59b6; /* Lighter purple */
    transform: scale(1.1); /* Slightly enlarges the button */
    border-radius: 25px; /* More rounded corners */
}
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
                    $selectedYear = isset($_GET['year']) ? $_GET['year'] : '2024'; // Default year
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
            <div class="card-header bg-dark text-white text-center">PUROK 2 RESIDENTS LIST</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="font-size: 15px; text-align: center;">HOUSEHOLD ID</th>
                            <th style="font-size: 15px; text-align: center;">PUROK</th>
                            <th style="font-size: 15px; text-align: center;">FULLNAME</th>
                            <th style="font-size: 15px; text-align: center;">GENDER</th>
                            <th style="font-size: 15px; text-align: center;">DOB</th>
                            <th style="font-size: 15px; text-align: center;">POB</th>
                            <th style="font-size: 15px; text-align: center;">VULNERABILITY</th>
                            <th style="font-size: 15px; text-align: center;">MARITAL STATUS</th>
                            <th style="font-size: 15px; text-align: center;">NATIONALITY</th>
                            <th style="font-size: 15px; text-align: center;">OCCUPATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Initialize the totalHouseholds array
                        $totalHouseholds = array();

                        // Retrieve 'search' and 'year' values
                        $search_term = isset($_GET['search']) ? $_GET['search'] : '';
                        $selectedYear = isset($_GET['year']) ? $_GET['year'] : '2024';

                        // Query for Purok 1 residents
                        $queryStr = "SELECT * FROM household_members WHERE purok = 'Purok 6' 
                            AND YEAR(date) = '$selectedYear' AND (household_id LIKE '%$search_term%' 
                                OR First_name LIKE '%$search_term%' OR Last_name LIKE '%$search_term%' 
                                OR purok LIKE '%$search_term%')";
                        $query = mysqli_query($conn, $queryStr);

                        if ($query->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                // Add household ID to the list of unique households
                                if (!in_array($row['household_id'], $totalHouseholds)) {
                                    $totalHouseholds[] = $row['household_id'];
                                }
                                echo "<tr>
                                    <td>{$row['household_id']}</td>
                                    <td>{$row['purok']}</td>
                                    <td>{$row['First_name']} {$row['Middle_name']} {$row['Last_name']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>{$row['dob']}</td>
                                    <td>{$row['pob']}</td>
                                    <td>{$row['vulnerability']}</td>
                                    <td>{$row['marital_status']}</td>
                                    <td>{$row['nationality']}</td>
                                    <td>{$row['occupation']}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10' class='text-center'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="text-center mt-3">
    <a href="purok.php" class="btn custom-back-btn">Back</a>
</div>
</div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function viewDetails(memberName) {
                // You can replace this with actual data fetching logic
                document.getElementById('memberDetails').textContent = 'Details for ' + memberName;
                $('#detailsModal').modal('show');
            }
        </script>
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