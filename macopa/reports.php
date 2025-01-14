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
   
    $search_conditions[] = "vulnerability LIKE '%$search_term%'";
    $search_conditions[] = "purok LIKE '%$search_term%'";
    $search_conditions[] = "First_name LIKE '%$search_term%'";
    $search_conditions[] = "Middle_name LIKE '%$search_term%'";
    $search_conditions[] = "Last_name LIKE '%$search_term%'";
    $search_conditions[] = "marital_status LIKE '%$search_term%'";

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
    <title>REPORTS</title>

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
                <a class="nav-link" href="dashboard.php"><i class="fa fa-tachometer-alt"></i> Analytics</a>
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
     
        .card {
            flex: 1;
            padding: 20px;
            margin-right: 10px;
            text-align: center;
        }
        .card:last-child {
            margin-right: 0;
        }
        @media print {
            /* Styles to hide elements not needed for printing */
            .navbar, .search-bar, .pagination, .btn {
                display: none;
        }
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

    <div class="filter-bar">
        <form class="form-inline" method="GET" action="">
            <!-- Year Filter -->
            <label for="year" class="mr-2">Filter by Year:</label>
            <select class="form-control mr-3" name="year" onchange="this.form.submit()">
                <?php
                    // Simulan sa 2024, tapos dagdagan ang mga susunod na taon
                    $currentYear = date('Y');
                    $selectedYear = isset($_GET['year']) ? $_GET['year'] : '2024'; // Default ay 2024
                    for ($year = 2024; $year <= $currentYear + 10; $year++) { // Dagdag ng mga taon sa hinaharap
                        $selected = ($selectedYear == $year) ? 'selected' : '';
                        echo "<option value='$year' $selected>$year</option>";
                    }
                ?>
            </select>

            <!-- Vulnerability Filter -->
            <label for="vulnerability" class="mr-2">Vulnerability Group:</label>
            <select class="form-control" name="vulnerability" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="4Ps" <?php echo (isset($_GET['vulnerability']) && $_GET['vulnerability'] == '4Ps') ? 'selected' : ''; ?>>4Ps</option>
                <option value="Senior Citizen" <?php echo (isset($_GET['vulnerability']) && $_GET['vulnerability'] == 'Senior Citizen') ? 'selected' : ''; ?>>Senior Citizen</option>
                <option value="Solo Parent" <?php echo (isset($_GET['vulnerability']) && $_GET['vulnerability'] == 'Solo Parent') ? 'selected' : ''; ?>>Solo Parent</option>
                <option value="PWDs" <?php echo (isset($_GET['vulnerability']) && $_GET['vulnerability'] == 'PWDs') ? 'selected' : ''; ?>>PWDs</option>
                <option value="New Born" <?php echo (isset($_GET['vulnerability']) && $_GET['vulnerability'] == 'New Born') ? 'selected' : ''; ?>>New Born</option>
            <option value="Mortality" <?php echo (isset($_GET['vulnerability']) && $_GET['vulnerability'] == 'Mortality') ? 'selected' : ''; ?>>Mortality</option>
        </form>
            </select>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" onclick="printTable()">Print List</button>
    </div>

    <!-- Residents Table -->
    <div class="content p-2">
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">BARANGAY REPORTS LIST</div>
            <div class="card-body">
                <table class="table table-bordered" id="residentsTable">
                    <thead>
                        <tr>
                            <th style="font-size: 15px; text-align: center;">PUROK</th>
                            <th style="font-size: 15px; text-align: center;">FULLNAME</th>
                            <th style="font-size: 15px; text-align: center;">GENDER</th>
                            <th style="font-size: 15px; text-align: center;">VULNERABILITY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get filter values
                        $selectedVulnerability = isset($_GET['vulnerability']) ? $_GET['vulnerability'] : '';
                        
                        // Build the SQL query
                        $queryStr = "SELECT * FROM household_members WHERE YEAR(date) = '$selectedYear'";
                        if (!empty($selectedVulnerability)) {
                            $queryStr .= " AND vulnerability = '$selectedVulnerability'";
                        }
                        $query = mysqli_query($conn, $queryStr);

                        // Fetch and display data
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['purok']; ?></td>
                            <td><?php echo $row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']; ?></td>
                            <td><?php echo $row['gender']; ?></td> 
                            <td><?php echo $row['vulnerability']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    function printTable() {
        // Prepare print content with a logo and table
        var printContents = `
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="macopa logo.jpg" alt="Logo" style="width: 100px; height: 100px;">
                <h3 style="margin: 10px 0;">BHR MACOPA</h3>
            </div>
            <div>
                ${document.getElementById('residentsTable').outerHTML}
            </div>
        `;
        // Open a new window for printing
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print Table</title></head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>


<script>
function filterTable() {
    var purokFilter = document.getElementById("purokFilter").value.toLowerCase();
    var genderFilter = document.getElementById("genderFilter").value.toLowerCase();
    var vulnerabilityFilter = document.getElementById("vulnerabilityFilter").value.toLowerCase();

    var table = document.getElementById("residentsTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) { // Start at 1 to skip the header row
        var tdPurok = tr[i].getElementsByTagName("td")[0]; // Purok is the first column
        var tdGender = tr[i].getElementsByTagName("td")[2]; // Gender is the third column
        var tdVulnerability = tr[i].getElementsByTagName("td")[3]; // Vulnerability is the fourth column

        var showRow = true; // Flag to determine if the row should be shown

        if (tdPurok) {
            showRow = showRow && (purokFilter === "" || tdPurok.textContent.toLowerCase().includes(purokFilter));
        }

        if (tdGender) {
            showRow = showRow && (genderFilter === "" || tdGender.textContent.toLowerCase() === genderFilter);
        }

        if (tdVulnerability) {
            showRow = showRow && (vulnerabilityFilter === "" || tdVulnerability.textContent.toLowerCase() === vulnerabilityFilter);
        }

        tr[i].style.display = showRow ? "" : "none"; // Show or hide the row
    }
}
</script>

        <script>
        function printTable() {
            var printContents = document.getElementById('residentsTable').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload(); // Reload the page to restore original content
        }

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
    <script>
        function profileToggle() {
            $('#ProfileDropDown').toggleClass('show');
        }
    </script>

</body>
</html>
