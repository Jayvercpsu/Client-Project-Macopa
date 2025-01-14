<?php
include('session.php');
include('connect.php'); // Assume you have a separate file for DB connection

// Fetch counts from the database for household members (existing code)
$query_members = "
    SELECT 
        SUM(gender = 'Male') AS total_male,
        SUM(gender = 'Female') AS total_female,
        SUM(vulnerability = 'Senior Citizen') AS total_Senior_Citizen,
        SUM(vulnerability = '4ps') AS total_4ps,
        SUM(vulnerability = 'PWDs') AS total_PWDs,
        SUM(vulnerability = 'New Born') AS total_New_Born,
        SUM(vulnerability = 'Mortality') AS total_mortality,
        SUM(vulnerability = 'Solo Parent') AS total_solo_parents
    FROM household_members";
    
$result_members = mysqli_query($conn, $query_members);
$data_members = mysqli_fetch_assoc($result_members);

// Set default values for household members if the query returns null
$total_male = $data_members['total_male'] ?? 0;
$total_female = $data_members['total_female'] ?? 0;
$total_Senior_Citizen = $data_members['total_Senior_Citizen'] ?? 0;
$total_4ps = $data_members['total_4ps'] ?? 0;
$total_PWDs = $data_members['total_PWDs'] ?? 0;
$total_New_Born = $data_members['total_New_Born'] ?? 0;
$total_mortality = $data_members['total_mortality'] ?? 0;
$total_solo_parents = $data_members['total_solo_parents'] ?? 0;

// Calculate the total number of household members
$total_members = $total_male + $total_female;

// Fetch the total number of households (new query)
$query_households = "SELECT COUNT(*) AS total_households FROM households";
$result_households = mysqli_query($conn, $query_households);
$data_households = mysqli_fetch_assoc($result_households);

// Set default value for total households if the query returns null
$total_households = $data_households['total_households'] ?? 0;
?>
<?php
// Database configuration
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

// Get the year parameter from the URL or set a default value
$year = isset($_GET['year']) ? intval($_GET['year']) : 2024;

// Prepare SQL query to count household members with various vulnerabilities
$sql_members = "
SELECT
  COUNT(member_id) AS count_residents,
  SUM(vulnerability = '4ps') AS count_4ps,
  SUM(vulnerability = 'mortality') AS count_mortality,
  SUM(vulnerability = 'Senior Citizen') AS count_senior_citizen,
  SUM(vulnerability = 'Solo Parent') AS count_solo_parent,
  SUM(vulnerability = 'PWDs') AS count_pwds,
  SUM(vulnerability = 'New Born') AS count_new_born
FROM household_members
WHERE YEAR(Date) = ?";

// Prepare and execute the statement for household members
$stmt_members = $conn->prepare($sql_members);
$stmt_members->bind_param("i", $year);
$stmt_members->execute();
$result_members = $stmt_members->get_result();
$data_members = $result_members->fetch_assoc();

// Prepare SQL query to count households by year
$sql_households = "
SELECT
  COUNT(DISTINCT household_id) AS count_households
FROM households
WHERE YEAR(date) = ?";

// Prepare and execute the statement for households
$stmt_households = $conn->prepare($sql_households);
$stmt_households->bind_param("i", $year);
$stmt_households->execute();
$result_households = $stmt_households->get_result();
$data_households = $result_households->fetch_assoc();

// Combine results into a single array
$data = array_merge($data_members, $data_households);

// Close the connection
$conn->close();
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>User Dashboard</title>

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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="bootstrap, admin template, dashboard, responsive, free template, example">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>DASHBOARD</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .dashboard h1 {
            margin-bottom: 25px;
            color: #2c3e50;
            text-align: center;
            font-weight: bold;
        }

        .chart-container {
            margin-top: 30px;
        }

        canvas {
            max-height: 450px;
        }

        .form-group {
            margin-top: 20px;
            text-align: left;
        }

        .form-group label, .form-group select {
            font-size: 16px;
            color: #555;
        }

        button {
            padding: 4px 8px;
            font-size: 14px;
            border: none;
            border-radius: 20px;
            background-color:#FFA500;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        .dashboard .title {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            text-align: left;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>BARANGAY MACOPA HOUSEHOLDS REGISTRATION</h1>
        <form method="get" class="form-group">
            <h3 class="title">REPORT OF THE YEAR <?php echo $year; ?></h3>
            <label for="year">Select Year:</label>
            <select name="year" id="year">
                <?php for ($i = 2024; $i <= 2030; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo $i == $year ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <div class="chart-container">
            <canvas id="vulnerabilityChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('vulnerabilityChart').getContext('2d');

        const chartData = {
            labels: ['Households', 'Residents', '4Ps Members', 'Mortality', 'Senior Citizens', 'Solo Parents', 'PWDs', 'New Born'],
            datasets: [{
                label: 'Counts',
                data: [
                    <?php echo $data['count_households'] ?: 0; ?>,
                    <?php echo $data['count_residents'] ?: 0; ?>,
                    <?php echo $data['count_4ps'] ?: 0; ?>,
                    <?php echo $data['count_mortality'] ?: 0; ?>,
                    <?php echo $data['count_senior_citizen'] ?: 0; ?>,
                    <?php echo $data['count_solo_parent'] ?: 0; ?>,
                    <?php echo $data['count_pwds'] ?: 0; ?>,
                    <?php echo $data['count_new_born'] ?: 0; ?>
                ],
                backgroundColor: [
                    '#E74C3C', // Households - Soft Red
                    '#3498DB', // Residents - Light Blue
                    '#2ECC71', // 4Ps Members - Green
                    '#F1C40F', // Mortality - Yellow
                    '#9B59B6', // Senior Citizens - Purple
                    '#E67E22', // Solo Parents - Orange
                    '#1ABC9C', // PWDs - Aqua
                    '#F39C12'  // New Born - Gold
                ],
                borderColor: '#34495E',
                borderWidth: 1.5,
                hoverBackgroundColor: '#2C3E50',
                borderRadius: 8
            }]
        };

        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: {
                        callbacks: {
                            label: (tooltipItem) => `${tooltipItem.raw} records`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#D5D8DC' },
                        ticks: { color: '#555', font: { size: 14 } }
                    },
                    x: {
                        grid: { color: '#D5D8DC' },
                        ticks: { color: '#555', font: { size: 14 } }
                    }
                }
            }
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
</body>

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
