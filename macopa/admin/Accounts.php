<?php
include('session.php');
include('connect.php');
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
                    <a class="nav-link" href="admin_dashboard.php"><i class="fa fa-tachometer-alt"></i> Analytics</a>
                </li>
                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Manage Users
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="Add purok.php">Add Purok</a>
    </div>
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
<!-- Residents Table -->
<div class="card mb-4">
    <div class="card-header bg-dark text-white">
        <h4>BARANGAY ADMINISTRATIVE LIST</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered" style="font-size: 15px; text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FULLNAME</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch the data from the security table
                $query = "SELECT * FROM security";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['idno'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td style='color: blue; font-style: italic;'>" . $row['email'] . "</td>";
                        echo "<td>
                                <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editUserModal'
                                    data-id='" . $row['idno'] . "'
                                    data-name='" . $row['name'] . "'
                                    data-username='" . $row['username'] . "'
                                    data-email='" . $row['email'] . "'>
                                    <i class='fas fa-edit'></i>
                                </button>
                                <button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteUserModal'
                                    data-id='" . $row['idno'] . "' data-name='" . $row['name'] . "'>
                                    <i class='fas fa-trash'></i>
                                </button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align: center;'>No users found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <!-- Add User Button -->
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUserModal">Add User</button>
    </div>
</div>

<!-- Floating Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="edituser.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="idno" id="edit-idno">
                    <div class="form-group">
                        <label for="edit-name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-username">Username</label>
                        <input type="text" class="form-control" name="username" id="edit-username" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" class="form-control" name="email" id="edit-email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Floating Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="userdelete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="idno" id="delete-idno">
                    <p>Are you sure you want to delete <strong id="delete-user-name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Floating Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add_user.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary bg-warning ">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to Populate Edit and Delete Modals with User Data -->
<script>
    $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var username = button.data('username');
        var email = button.data('email');
        
        var modal = $(this);
        modal.find('#edit-idno').val(id);
        modal.find('#edit-name').val(name);
        modal.find('#edit-username').val(username);
        modal.find('#edit-email').val(email);
    });

    $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        
        var modal = $(this);
        modal.find('#delete-idno').val(id);
        modal.find('#delete-user-name').text(name);
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

<!-- Include Bootstrap and jQuery (ensure these are included if not already) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    </div>  

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
