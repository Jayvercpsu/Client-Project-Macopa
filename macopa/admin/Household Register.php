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
        </style>
    </head>

    <body>
        <div class="dashboard">
            <!-- Form Section -->
            <div class="content p-2">
                <h2 class="text-center">Household Registration</h2><br>
                <form action="add.php" method="POST" style="">
                    <h4>Household Information:</h4><br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Household ID:</label>
                            <input type="text" name="household_id" class="form-control" style="height: 30px;" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label>First Name:</label>
                            <input type="text" name="hh_First_name" class="form-control" style="height: 30px;">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Middle Name:</label>
                            <input type="text" name="hh_Middle_name" class="form-control" style="height: 30px;">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Last Name:</label>
                            <input type="text" name="hh_Last_name" class="form-control" style="height: 30px;">
                        </div>
                        <?php
                        include('connect.php');
                        $sql = "SELECT id, purok, name FROM purok";
                        $result = $conn->query($sql);
                        ?>
                        <div class="form-group col-md-2">
                            <label>Purok:</label>
                            <select name="purok" class="form-control" style="height: 30px;" required>
                                <option value="">Select Purok</option>
                                <?php

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['purok'] . "'>" . $row['purok'] . "  " . $row['name'] . "</option>";
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
                        <br><br>
                        <h4>Household Member Details:</h4><br>
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
                                                <input type="text" name="Last_name[]" class="form-control col-md-14" style="width: 100px;" required>
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
                                            <div class="form-group col-md-14 d-flex flex-column align-items-start">
                                                <label class="mb-2">Action:</label>
                                                <button type="button" class="btn btn-success btn-sm add-family mb-2" data-toggle="modal" data-target="#addFamilyModal">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm remove-member">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" id="addMember" class="btn btn-success btn-sm ">Add Member</button><br><br>
                    </div>



                    <!-- Modal Content -->
                    <div class="modal fade" id="addFamilyModal" tabindex="-1" role="dialog" aria-labelledby="addFamilyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Removed the separate form tag -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addFamilyModalLabel">Add Family Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Modal Content -->
                                <div class="modal-body">
                                    <!-- Family Member Inputs -->
                                    <div class="form-group">
                                        <label for="memberFirstName">First Name</label>
                                        <input type="text" class="form-control" id="memberFirstName" name="family_first_name[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberMiddleName">Middle Name</label>
                                        <input type="text" class="form-control" id="memberMiddleName" name="family_middle_name[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="memberLastName">Last Name</label>
                                        <input type="text" class="form-control" id="memberLastName" name="family_last_name[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberGender">Gender</label>
                                        <select class="form-control" id="memberGender" name="family_gender[]" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberDOB">Date of Birth</label>
                                        <input type="date" class="form-control" id="memberDOB" name="family_dob[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberPOB">Place of Birth</label>
                                        <input type="text" class="form-control" id="memberPOB" name="family_pob[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="memberRelationship">Relationship</label>
                                        <input type="text" class="form-control" id="memberRelationship" name="family_relationship[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberMaritalStatus">Marital Status</label>
                                        <select class="form-control" id="memberMaritalStatus" name="family_marital_status[]" required>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberNationality">Nationality</label>
                                        <input type="text" class="form-control" id="memberNationality" name="family_nationality[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberOccupation">Occupation</label>
                                        <input type="text" class="form-control" id="memberOccupation" name="family_occupation[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="memberVulnerability">Vulnerability</label>
                                        <select class="form-control" id="memberVulnerability" name="family_vulnerability[]" required>
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
                                    <!-- Changed button type and added onclick function -->
                                    <button type="button" class="btn btn-primary" onclick="addFamilyToTable()">Add to Table</button>
                                </div>
                            </div>
                        </div>
                    </div>










                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>



        <script>
            // Save entered data when the modal is shown
            $('#addFamilyModal').on('show.bs.modal', function(event) {
                // Retrieve any saved data (if available) from sessionStorage
                document.getElementById('memberFirstName').value = sessionStorage.getItem('memberFirstName') || '';
                document.getElementById('memberMiddleName').value = sessionStorage.getItem('memberMiddleName') || '';
                document.getElementById('memberLastName').value = sessionStorage.getItem('memberLastName') || '';
                document.getElementById('memberGender').value = sessionStorage.getItem('memberGender') || 'Male'; // Default to Male
                document.getElementById('memberDOB').value = sessionStorage.getItem('memberDOB') || '';
                document.getElementById('memberPOB').value = sessionStorage.getItem('memberPOB') || '';
                document.getElementById('memberRelationship').value = sessionStorage.getItem('memberRelationship') || '';
                document.getElementById('memberMaritalStatus').value = sessionStorage.getItem('memberMaritalStatus') || 'Single'; // Default to Single
                document.getElementById('memberNationality').value = sessionStorage.getItem('memberNationality') || '';
                document.getElementById('memberOccupation').value = sessionStorage.getItem('memberOccupation') || '';
                document.getElementById('memberVulnerability').value = sessionStorage.getItem('memberVulnerability') || 'None'; // Default to None
            });

            // Save the form data in sessionStorage when "Add to Table" is clicked
            function addFamilyToTable() {
                // Collect data from the modal form fields
                var firstName = document.getElementById('memberFirstName').value;
                var middleName = document.getElementById('memberMiddleName').value;
                var lastName = document.getElementById('memberLastName').value;
                var gender = document.getElementById('memberGender').value;
                var dob = document.getElementById('memberDOB').value;
                var pob = document.getElementById('memberPOB').value;
                var relationship = document.getElementById('memberRelationship').value;
                var maritalStatus = document.getElementById('memberMaritalStatus').value;
                var nationality = document.getElementById('memberNationality').value;
                var occupation = document.getElementById('memberOccupation').value;
                var vulnerability = document.getElementById('memberVulnerability').value;

                // Save the entered data for the next time modal opens
                sessionStorage.setItem('memberFirstName', firstName);
                sessionStorage.setItem('memberMiddleName', middleName);
                sessionStorage.setItem('memberLastName', lastName);
                sessionStorage.setItem('memberGender', gender);
                sessionStorage.setItem('memberDOB', dob);
                sessionStorage.setItem('memberPOB', pob);
                sessionStorage.setItem('memberRelationship', relationship);
                sessionStorage.setItem('memberMaritalStatus', maritalStatus);
                sessionStorage.setItem('memberNationality', nationality);
                sessionStorage.setItem('memberOccupation', occupation);
                sessionStorage.setItem('memberVulnerability', vulnerability);

                // Check if required fields are filled
                if (firstName && lastName && gender && dob && relationship) {
                    // Add the data to the table in the main form
                    var newRow = `<tr>
                <td><input type="text" name="family_first_name[]" value="${firstName}" class="form-control" readonly></td>
                <td><input type="text" name="family_middle_name[]" value="${middleName}" class="form-control" readonly></td>
                <td><input type="text" name="family_last_name[]" value="${lastName}" class="form-control" readonly></td>
                <td><input type="text" name="family_gender[]" value="${gender}" class="form-control" readonly></td>
                <td><input type="date" name="family_dob[]" value="${dob}" class="form-control" readonly></td>
                <td><input type="text" name="family_pob[]" value="${pob}" class="form-control" readonly></td>
                <td><input type="text" name="family_relationship[]" value="${relationship}" class="form-control" readonly></td>
                <td><input type="text" name="family_marital_status[]" value="${maritalStatus}" class="form-control" readonly></td>
                <td><input type="text" name="family_nationality[]" value="${nationality}" class="form-control" readonly></td>
                <td><input type="text" name="family_occupation[]" value="${occupation}" class="form-control" readonly></td>
                <td><input type="text" name="family_vulnerability[]" value="${vulnerability}" class="form-control" readonly></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
            </tr>`;

                    document.getElementById('membersBody').insertAdjacentHTML('beforeend', newRow);
                    $('#addFamilyModal').modal('hide');
                } else {
                    alert('Please fill in all required fields.');
                }
            }

            // Function to remove row from the table
            function removeRow(button) {
                button.closest('tr').remove();
            }
        </script>






        <!-- <script>
            document.getElementById('saveFamilyButton').addEventListener('click', function(event) {
                event.preventDefault();
                var formData = {
                    first_name: document.getElementById('memberFirstName').value,
                    middle_name: document.getElementById('memberMiddleName').value,
                    last_name: document.getElementById('memberLastName').value,
                    gender: document.getElementById('memberGender').value,
                    dob: document.getElementById('memberDOB').value,
                    pob: document.getElementById('memberPOB').value,
                    relationship: document.getElementById('memberRelationship').value,
                    marital_status: document.getElementById('memberMaritalStatus').value,
                    nationality: document.getElementById('memberNationality').value,
                    occupation: document.getElementById('memberOccupation').value,
                    vulnerability: document.getElementById('memberVulnerability').value
                };

                localStorage.setItem('formData', JSON.stringify(formData));
                alert('Family member saved!');
                $('#addFamilyModal').modal('hide');
            });

            $('#addFamilyModal').on('show.bs.modal', function() {
                var formData = JSON.parse(localStorage.getItem('formData'));
                if (formData) {
                    document.getElementById('memberFirstName').value = formData.first_name;
                    document.getElementById('memberMiddleName').value = formData.middle_name;
                    document.getElementById('memberLastName').value = formData.last_name;
                    document.getElementById('memberGender').value = formData.gender;
                    document.getElementById('memberDOB').value = formData.dob;
                    document.getElementById('memberPOB').value = formData.pob;
                    document.getElementById('memberRelationship').value = formData.relationship;
                    document.getElementById('memberMaritalStatus').value = formData.marital_status;
                    document.getElementById('memberNationality').value = formData.nationality;
                    document.getElementById('memberOccupation').value = formData.occupation;
                    document.getElementById('memberVulnerability').value = formData.vulnerability;
                }
            });
        </script> -->




        <script>
            // Script to populate member ID in the modal
            document.querySelectorAll('.add-family').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const memberId = row.querySelector('input[name="First_name[]"]').value; // Assuming member ID comes from first name for simplicity
                    document.getElementById('memberId').value = memberId;
                });
            });
        </script>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <script>
            // Function to add new household member row
            document.getElementById('addMember').addEventListener('click', function() {
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
                                            <div class="form-group col-md-14 d-flex flex-column align-items-start">
                                                <label class="mb-2">Action:</label>
                                                <button type="button" class="btn btn-success btn-sm add-family mb-2" data-toggle="modal" data-target="#addFamilyModal">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm remove-member">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </div>
        `;
                membersBody.appendChild(newRow);

                // Add event listener to the remove button
                newRow.querySelector('.remove-member').addEventListener('click', function() {
                    newRow.remove();
                });
            });
        </script>
    </body>

    </html>
    <?
