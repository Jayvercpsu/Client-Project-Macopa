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
    <title>REGISTRATION</title>

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
                    <img class="rounded-circle" src="user.jpg" alt="User" width="30" height="30"> <?php echo $_SESSION['name'];?>
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
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Form Section -->
    <div class="content p-2">
        <h2 class="text-center">Household Registration</h2><br>
        <form action="add.php" method="POST" style="text-transform: uppercase;">
            <h4>Household Information:</h4><br>
<div class="form-row">
    <div class="form-group col-md-2">
        <label>Household ID:</label>
        <input type="text" name="household_id" class="form-control" style="height: 30px; " required>
    </div>
    <div class="form-group col-md-2">
        <label>First Name:</label>
        <input type="text" name="First_name" class="form-control" style="height: 30px; " required>
    </div>
    <div class="form-group col-md-2">
        <label>Middle Name:</label>
        <input type="text" name="Middle_name" class="form-control" style="height: 30px; " required>
    </div>
    <div class="form-group col-md-2">
        <label>Last Name:</label>
        <input type="text" name="Last_name" class="form-control" style="height: 30px; " required>
    </div>
  
    <?php
  include('connect.php');
  $sql = "SELECT id, purok, name FROM purok";
  $result = $conn->query($sql);
  ?>
    <div class="form-group col-md-2">
        <label>Purok:</label>
        <select name="purok" class="form-control" style="height: 30px; text-transform: " required>
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
    
    <div class="form-group col-md-2">
        <label>Contact No:</label>
        <input type="Contact" name="phone" class="form-control" style="height: 30px;" required>
    </div>
</div>
<div class="form-group">
    <br><br><h4>Household Member Details:</h4><br>
    <table class="table table-bordered" id="membersTable">
        
        <tbody id="membersBody">
    <tr>
    <div class="form-row">
        <td style="font-size: 12px; padding: 10px;">
    <div class="form-group col-md-16">
        <label>First Name:</label>
        <input type="text" name="First_name[]" class="form-control col-md-14" style="width: 100px;" required>
    </div>
        </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Middle Name:</label>
            <input type="text" name="Middle_name[]" class="form-control col-md-14" style="width: 100px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Last Name:</label>
            <input type="text" name="Last_name[]" class="form-control col-md-14" style="width: 100px;"  required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
       <div class="form-group col-md-16">
        <label>Gender:</label>
        <select name="gender[]" class="form-control col-md-14" style="width: 80px;" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
    </td>


    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Date of Birth:</label>
            <input type="date" name="dob[]" class="form-control col-md-15" style="width: 128px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Place of Birth:</label>
            <input type="text" name="pob[]" class="form-control col-md-12" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>House Position:</label>
            <input type="text" name="relationship[]" class="form-control col-md-17" style="width: 110px;" required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Status:</label>
            <select name="marital_status[]" class="form-control col-md-12" style="width: 100px;" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Nationality:</label>  
            <input type="text" name="nationality[]" class="form-control col-md-14" style="width: 90px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Occupation:</label>
            <input type="text" name="occupation[]" class="form-control col-md-12" style="width: 95px;" required>
        </div>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Vulnerability:</label>
            <select name="vulnerability[]" class="form-control col-md-11" style="width: 90px;" required>
                <option value="4ps">4ps</option>
                <option value="PWDs">PWDs</option>
                <option value="Senior Citizen">Senior Citizen</option>
                <option value="Solo Parent">Solo Parent</option>
                <option value="New Born">New Born</option>
                <option value="Mortality">Mortality</option>
                <option value="None">None</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 15px;">
        <div class="form-group col-md-14">
            <label></label>
                <button type="button" class="btn btn-danger btn-sm remove-member">Remove</button>
        </div>
    </td>
</div>
</tr>
    </tbody>
    </table>
    <button type="button" id="addMember" class="btn btn-success btn-sm">Add Member</button><br><br>
</div>

<div class="form-group">
    <br><br><h4>Add Family:</h4><br>
    <table class="table table-bordered" id="newfamilyTable">
        
    <tbody id="newfamilyBody">
        <tr>
    <div class="form-row">
        <td style="font-size: 12px; padding: 10px;">
    <div class="form-group col-md-16">
        <label>First Name:</label>
        <input type="text" name="First_name[]" class="form-control col-md-14" style="width: 100px;" required>
    </div>
        </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Middle Name:</label>
            <input type="text" name="Middle_name[]" class="form-control col-md-14" style="width: 100px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Last Name:</label>
            <input type="text" name="Last_name[]" class="form-control col-md-14" style="width: 100px;"  required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
       <div class="form-group col-md-16">
        <label>Gender:</label>
        <select name="gender[]" class="form-control col-md-14" style="width: 80px;" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
    </td>


    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Date of Birth:</label>
            <input type="date" name="dob[]" class="form-control col-md-15" style="width: 128px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Place of Birth:</label>
            <input type="text" name="pob[]" class="form-control col-md-12" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>House Position:</label>
            <input type="text" name="relationship[]" class="form-control col-md-17" style="width: 110px;" required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Status:</label>
            <select name="marital_status[]" class="form-control col-md-12" style="width: 100px;" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Nationality:</label>  
            <input type="text" name="nationality[]" class="form-control col-md-14" style="width: 90px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Occupation:</label>
            <input type="text" name="occupation[]" class="form-control col-md-12" style="width: 95px;" required>
        </div>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Occupation:</label>
            <select name="vulnerability[]" class="form-control col-md-11" style="width: 90px;" required>
                <option value="4ps">4ps</option>
                <option value="PWDs">PWDs</option>
                <option value="Senior Citizen">Senior Citizen</option>
                <option value="Solo Parent">Solo Parent</option>
                <option value="New Born">New Born</option>
                <option value="Mortality">Mortality</option>
                <option value="None">None</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 15px;">
        <div class="form-group col-md-14">
            <label></label>
                <button type="button" class="btn btn-danger btn-sm remove-member">Remove</button>
        </div>
    </td>
</div>
</tr>

    </tbody>
    </table>
        <button type="button" id="addnewfamily" class="btn btn-success btn-sm">Add Member</button><br><br>
</div>

<div class="form-group ">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>
</div>
</div>
<!-- Modal for Adding New Purok -->
<div id="addPurokModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 1px solid #ccc; border-radius: 5px; z-index: 1000;">
    <h5>Add New Purok</h5>
    <input type="text" id="newPurokInput" class="form-control" placeholder="Enter new Purok name" style="text-transform: uppercase; margin-bottom: 10px;" />
    <button type="button" id="savePurokBtn" class="btn btn-success btn-sm">Save</button>
    <button type="button" id="cancelPurokBtn" class="btn btn-danger btn-sm">Cancel</button>
</div>
<!-- Overlay for Modal -->
<div id="modalOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;"></div>

<script>
    const purokSelect = document.getElementById("purokSelect");
    const addPurokBtn = document.getElementById("addPurokBtn");
    const addPurokModal = document.getElementById("addPurokModal");
    const modalOverlay = document.getElementById("modalOverlay");
    const newPurokInput = document.getElementById("newPurokInput");
    const savePurokBtn = document.getElementById("savePurokBtn");
    const cancelPurokBtn = document.getElementById("cancelPurokBtn");

    // Open modal
    addPurokBtn.addEventListener("click", () => {
        addPurokModal.style.display = "block";
        modalOverlay.style.display = "block";
        newPurokInput.value = ""; // Clear input field
    });

    // Close modal
    const closeModal = () => {
        addPurokModal.style.display = "none";
        modalOverlay.style.display = "none";
    };

    cancelPurokBtn.addEventListener("click", closeModal);
    modalOverlay.addEventListener("click", closeModal);

    // Save new Purok
    savePurokBtn.addEventListener("click", () => {
        const newPurokName = newPurokInput.value.trim().toUpperCase();
        if (newPurokName) {
            const newOption = document.createElement("option");
            newOption.value = newPurokName;
            newOption.textContent = newPurokName;
            purokSelect.appendChild(newOption); // Add new option to select
            closeModal(); // Close modal
        } else {
            alert("Please enter a valid Purok name.");
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Function to add new household member row
    document.getElementById('addMember').addEventListener('click', function () {
        const membersBody = document.getElementById('membersBody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td style="font-size: 12px; padding: 10px;">
    <div class="form-group col-md-16">
        <label>First Name:</label>
        <input type="text" name="First_name[]" class="form-control col-md-14" style="width: 100px;" required>
    </div>
        </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Middle Name:</label>
            <input type="text" name="Middle_name[]" class="form-control col-md-14" style="width: 100px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Last Name:</label>
            <input type="text" name="Last_name[]" class="form-control col-md-14" style="width: 100px;"  required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
       <div class="form-group col-md-16">
        <label>Gender:</label>
        <select name="gender[]" class="form-control col-md-14" style="width: 80px;" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
    </td>


    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Date of Birth:</label>
            <input type="date" name="dob[]" class="form-control col-md-15" style="width: 128px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Place of Birth:</label>
            <input type="text" name="pob[]" class="form-control col-md-12" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>House Position:</label>
            <input type="text" name="relationship[]" class="form-control col-md-17" style="width: 110px;" required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Status:</label>
            <select name="marital_status[]" class="form-control col-md-12" style="width: 100px;" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Nationality:</label>  
            <input type="text" name="nationality[]" class="form-control col-md-14" style="width: 90px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Occupation:</label>
            <input type="text" name="occupation[]" class="form-control col-md-12" style="width: 95px;" required>
        </div>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Occupation:</label>
            <select name="vulnerability[]" class="form-control col-md-11" style="width: 90px;" required>
                <option value="4ps">4ps</option>
                <option value="PWDs">PWDs</option>
                <option value="Senior Citizen">Senior Citizen</option>
                <option value="Solo Parent">Solo Parent</option>
                <option value="New Born">New Born</option>
                <option value="Mortality">Mortality</option>
                <option value="None">None</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 15px;">
        <div class="form-group col-md-14">
            <label></label>
                <button type="button" class="btn btn-danger btn-sm remove-member">Remove</button>
        </div>
    </td>
        `;
        membersBody.appendChild(newRow);

        // Add event listener to the remove button
        newRow.querySelector('.remove-member').addEventListener('click', function () {
            newRow.remove();
        });
    });

    // Function to add new family row
    document.getElementById('addnewfamily').addEventListener('click', function () {
        const newfamilyBody = document.getElementById('newfamilyBody'); // Corrected target table body
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td style="font-size: 12px; padding: 10px;">
    <div class="form-group col-md-16">
        <label>First Name:</label>
        <input type="text" name="First_name[]" class="form-control col-md-14" style="width: 100px;" required>
    </div>
        </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Middle Name:</label>
            <input type="text" name="Middle_name[]" class="form-control col-md-14" style="width: 100px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Last Name:</label>
            <input type="text" name="Last_name[]" class="form-control col-md-14" style="width: 100px;"  required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
       <div class="form-group col-md-16">
        <label>Gender:</label>
        <select name="gender[]" class="form-control col-md-14" style="width: 80px;" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
    </td>


    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Date of Birth:</label>
            <input type="date" name="dob[]" class="form-control col-md-15" style="width: 128px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Place of Birth:</label>
            <input type="text" name="pob[]" class="form-control col-md-12" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>House Position:</label>
            <input type="text" name="relationship[]" class="form-control col-md-17" style="width: 110px;" required>
        </div>
    </td>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-16">
            <label>Status:</label>
            <select name="marital_status[]" class="form-control col-md-12" style="width: 100px;" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Nationality:</label>  
            <input type="text" name="nationality[]" class="form-control col-md-14" style="width: 90px;" required>
        </div>
    </td>

    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Occupation:</label>
            <input type="text" name="occupation[]" class="form-control col-md-12" style="width: 95px;" required>
        </div>
    
    <td style="font-size: 12px; padding: 10px;">
        <div class="form-group col-md-14">
            <label>Occupation:</label>
            <select name="vulnerability[]" class="form-control col-md-11" style="width: 90px;" required>
                <option value="4ps">4ps</option>
                <option value="PWDs">PWDs</option>
                <option value="Senior Citizen">Senior Citizen</option>
                <option value="Solo Parent">Solo Parent</option>
                <option value="New Born">New Born</option>
                <option value="Mortality">Mortality</option>
                <option value="None">None</option>
            </select>
        </div>
    </td>

    <td style="font-size: 12px; padding: 15px;">
        <div class="form-group col-md-14">
            <label></label>
                <button type="button" class="btn btn-danger btn-sm remove-member">Remove</button>
        </div>
    </td>
        `;
        newfamilyBody.appendChild(newRow); // Corrected to append to the family table body

        // Add event listener to the remove button
        newRow.querySelector('.remove-member').addEventListener('click', function () {
            newRow.remove();
        });
    });

    // Add event listener for existing remove buttons
    document.querySelectorAll('.remove-member').forEach(function (button) {
        button.addEventListener('click', function () {
            this.closest('tr').remove();
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