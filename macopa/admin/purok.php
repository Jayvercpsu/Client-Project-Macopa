<?php include('session.php'); ?>
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
                    <a class="nav-link" href="admin_dashboard.php"><i class="fa fa-tachometer-alt"></i> Analytics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Accounts.php"><i class="fa fa-tachometer-alt"></i> Manage Users</a>
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
        .card-custom {
            color: #fff;
            text-align: center;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            background-color: #9b59b6;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1); /* Enhanced shadow for 3D effect */
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Purok color styles */
        .purok-1 { background: linear-gradient(to bottom, #ff6a00, #ee0979); }
        .purok-2 { background: linear-gradient(to bottom, #ff6a00, #ee0979); }
        .purok-3 { background: linear-gradient(to bottom, #ff6a00, #ee0979); }
        .purok-4 { background: linear-gradient(to bottom, #ff6a00, #ee0979); }


        /* Hover effect - 3D effect on hover */
        .card-custom:hover {
            transform: translateY(-10px) scale(1.05); /* Slightly raise and scale up */
            background-color: #8e44ad; /* Change background color */
            box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2); /* Stronger shadow for hover effect */
        }

        /* Transition effect for clicked state */
        .card-custom.clicked {
            transform: scale(1.1); /* Slightly scale up the card */
            background-color: #8e44ad; /* Change background color */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row" id="purok-container">
        <!-- Purok 1 -->
        <div class="col-md-3">
            <div class="card-custom purok-1">
                <p>Purok 1</p>
                <p><strong>Total Households:</strong> <span id="purok-1-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-1-member-count">0</span></p>
                <a href="view_Purok1.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
        <!-- Purok 2 -->
        <div class="col-md-3">
            <div class="card-custom purok-2">
                <p>Purok 2</p>
                <p><strong>Total Households:</strong> <span id="purok-2-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-2-member-count">0</span></p>
                <a href="view_Purok2.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
        <!-- Purok 3 -->
        <div class="col-md-3">
            <div class="card-custom purok-3">
                <p>Purok 3</p>
                <p><strong>Total Households:</strong> <span id="purok-3-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-3-member-count">0</span></p>
                <a href="view_Purok3.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
        <!-- Purok 4 -->
        <div class="col-md-3">
            <div class="card-custom purok-4">
                <p>Purok 4</p>
                <p><strong>Total Households:</strong> <span id="purok-4-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-4-member-count">0</span></p>
                <a href="view_Purok4.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-custom purok-4">
                <p>Purok 5</p>
                <p><strong>Total Households:</strong> <span id="purok-5-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-5-member-count">0</span></p>
                <a href="view_Purok5.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-custom purok-4">
                <p>Purok 6</p>
                <p><strong>Total Households:</strong> <span id="purok-6-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-6-member-count">0</span></p>
                <a href="view_Purok6.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-custom purok-4">
                <p>Purok 7</p>
                <p><strong>Total Households:</strong> <span id="purok-7-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-7-member-count">0</span></p>
                <a href="view_Purok7.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-custom purok-4">
                <p>Purok 8</p>
                <p><strong>Total Households:</strong> <span id="purok-8-count">0</span></p>
                <p><strong>Total Members:</strong> <span id="purok-8-member-count">0</span></p>
                <a href="view_Purok8.php" class="text-white">View Purok &rarr;</a>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('.toggle-edit').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const formRow = document.getElementById(`edit-${id}`);
                formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
            });
        });
    </script>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    // Handle click on the card to apply transition effect
    $('.card-custom').click(function() {
        // Add the 'clicked' class for the transition effect
        $(this).toggleClass('clicked');
    });

    // Fetch the household totals for each Purok
    $.ajax({
        url: 'fetch_purok_totals.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update the HTML counts dynamically
            $('#purok-1-count').text(response['Purok 1'] || 0);
            $('#purok-2-count').text(response['Purok 2'] || 0);
            $('#purok-3-count').text(response['Purok 3'] || 0);
            $('#purok-4-count').text(response['Purok 4'] || 0);
            $('#purok-5-count').text(response['Purok 5'] || 0);
            $('#purok-6-count').text(response['Purok 6'] || 0);
            $('#purok-7-count').text(response['Purok 7'] || 0);
            $('#purok-8-count').text(response['Purok 8'] || 0);
            $('#purok-9-count').text(response['Purok 9'] || 0);
            $('#purok-10-count').text(response['Purok 10'] || 0);
        },
        error: function() {
            alert('Error fetching household totals. Please try again.');
        }
    });

    // Fetch the member and household totals for each Purok
    $.ajax({
        url: 'fetch_purok_member_counts.php', // Backend script
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update the member counts dynamically
            $('#purok-1-member-count').text(response['Purok 1'] || 0);
            $('#purok-2-member-count').text(response['Purok 2'] || 0);
            $('#purok-3-member-count').text(response['Purok 3'] || 0);
            $('#purok-4-member-count').text(response['Purok 4'] || 0);
            $('#purok-5-member-count').text(response['Purok 5'] || 0);
            $('#purok-6-member-count').text(response['Purok 6'] || 0);
            $('#purok-7-member-count').text(response['Purok 7'] || 0);
            $('#purok-8-member-count').text(response['Purok 8'] || 0);
        },
        error: function() {
            alert('Error fetching member totals. Please try again.');
        }
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

</body>
</html>

