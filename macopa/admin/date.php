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
                    <a class="nav-link" href="dashboard.php"><i class="fa fa-tachometer-alt"></i> Accounts</a>
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .chart-container {
            margin-top: 30px;
            width: 100%; /* Ensure charts take full width of the container */
            max-height: 300px; /* Set a max height for the charts */
        }

        canvas {
            max-height: 300px; /* Limit height of the canvas elements */
        }

        .dashboard h1 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .charts-wrapper {
            display: flex; /* Use flexbox to align charts */
            justify-content: space-between; /* Space between charts */
        }
        .col-md-2 {
            flex: 1; /* Make sure columns take up equal space */
            padding: 0 5px; /* Smaller side padding */
        }

        .icon {
            font-size: 20px; /* Reduced icon size */
            margin-bottom: 5px; /* Reduced space under icon */
        }
    </style>
    <style>
        .container { max-width: 800px; margin: auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        .title { font-size: 20px; font-weight: bold; color: #4a90e2; margin-bottom: 10px; margin-top: 50px; text-align: left; }
        .chart-container { margin-top: 20px; }
        .form-group { margin-top: 10px; text-align: left; }
        .form-group label, .form-group select { font-size: 16px; color: #333; }
        button { padding: 10px 15px; font-size: 16px; border: none; border-radius: 5px; background-color: #4a90e2; color: white; cursor: pointer; }
        button:hover { background-color: #357ab8; }


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
                <button type="submit">Submit</button>
            </form>
            <h3 class="title">OVERALL RECORDS</h3>
        <!-- Charts wrapper with modified order -->
        <div class="charts-wrapper">
            <!-- Bar chart on the left -->
            <div class="chart-container" style="max-width: 600px;">
                <canvas id="vulnerabilityChart"></canvas>
            </div>
            <!-- Pie chart on the right -->
            <div class="chart-container" style="max-width: 600px;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('vulnerabilityChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, '#4a90e2');
        gradient.addColorStop(1, '#70c1b3');

        const chartData = {
            labels: ['Households','Residents','4Ps Members', 'Mortality', 'Senior Citizens', 'Solo Parents', 'PWDs', 'New Born'],
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
                backgroundColor: gradient,
                borderColor: '#357ab8',
                borderWidth: 1,
                hoverBackgroundColor: '#357ab8'
            }]
        };

        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (tooltipItem) => `${tooltipItem.raw} records`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#333', font: { size: 14 } }
                    },
                    x: {
                        ticks: { color: '#333', font: { size: 14 } }
                    }
                }
            }
        });
    </script>
    <script>
        // Add click event listener to each card
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', function() {
                // Add the 'clicked' class to trigger animation
                this.classList.add('clicked');
                
                // Remove the 'clicked' class after animation ends
                setTimeout(() => {
                    this.classList.remove('clicked');
                }, 500);
            });
        });
    </script>
    <script>
        // Get data from PHP variables
        const data = {
            households: <?php echo $total_households; ?>,
            members: <?php echo $total_members; ?>,
            fourPs: <?php echo $total_4ps; ?>,
            seniorCitizens: <?php echo $total_Senior_Citizen; ?>,
            pwds: <?php echo $total_PWDs; ?>,
            newBorn: <?php echo $total_New_Born; ?>,
            male: <?php echo $total_male; ?>,
            female: <?php echo $total_female; ?>,
            mortality: <?php echo $total_mortality; ?>,
            soloParents: <?php echo $total_solo_parents; ?>
        };
        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female', 'Senior Citizens', 'PWDs', '4Ps', 'New Born', 'Mortality', 'Solo Parents'],
                datasets: [{
                    data: [
                        
                        data.male,
                        data.female,
                        data.seniorCitizens,
                        data.pwds,
                        data.fourPs,
                        data.newBorn,
                        data.mortality,
                        data.soloParents
                    ],
                    backgroundColor: [
                        '#3f51b5', '#e91e63', '#ff5722', '#607d8b', '#ff9800','#9c27b0', '#009688', '#795548'
                    ]
                }]
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
