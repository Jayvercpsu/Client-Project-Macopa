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
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addFamilyModalLabel">Add Family Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Family Member Inputs -->
                                    <div class="form-group">
                                        <input type="hidden" id="memberId" name="member_id[]">
                                    </div>
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
            // Initialize the highest member_id from the database
            let currentMemberId = 0;

            // Function to initialize the highest member_id
            function initializeMemberId(highestId) {
                currentMemberId = highestId;
            }

            // Function to generate a unique member_id
            function generateUniqueMemberId() {
                currentMemberId += 1;
                return currentMemberId;
            }

            // Function to add a family member to the table
            function addFamilyToTable() {
                // Generate a unique member_id
                const memberId = generateUniqueMemberId();

                // Get input values from the modal
                const firstName = document.getElementById("memberFirstName").value.trim();
                const middleName = document.getElementById("memberMiddleName").value.trim();
                const lastName = document.getElementById("memberLastName").value.trim();
                const gender = document.getElementById("memberGender").value;
                const dob = document.getElementById("memberDOB").value;
                const pob = document.getElementById("memberPOB").value.trim();
                const relationship = document.getElementById("memberRelationship").value.trim();
                const maritalStatus = document.getElementById("memberMaritalStatus").value;
                const nationality = document.getElementById("memberNationality").value.trim();
                const occupation = document.getElementById("memberOccupation").value.trim();
                const vulnerability = document.getElementById("memberVulnerability").value.trim();

                // Validate required fields
                if (!firstName || !lastName || !gender || !dob || !relationship) {
                    alert("Please fill in all required fields.");
                    return;
                }

                // Add a new row to the members table
                const tableBody = document.getElementById("membersBody");
                const newRow = `
        <tr>
            <td>${memberId}</td>
            <td><input type="hidden" name="member_id[]" value="${memberId}">${firstName}</td>
            <td>${middleName}</td>
            <td>${lastName}</td>
            <td>${gender}</td>
            <td>${dob}</td>
            <td>${pob}</td>
            <td>${relationship}</td>
            <td>${maritalStatus}</td>
            <td>${nationality}</td>
            <td>${occupation}</td>
            <td>${vulnerability}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-member">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    `;
                tableBody.insertAdjacentHTML("beforeend", newRow);

                // Close the modal
                $("#addFamilyModal").modal("hide");
            }

            // Event delegation to handle dynamic removal of rows
            document.getElementById("membersTable").addEventListener("click", function(e) {
                if (e.target.closest(".remove-member")) {
                    e.target.closest("tr").remove();
                }
            });

            // On page load, initialize the member_id with the highest value from the database
            window.onload = function() {
                // Replace with the highest member_id fetched from the server
                const highestMemberIdFromDb = 561; // Example value, replace with dynamic data
                initializeMemberId(highestMemberIdFromDb);
            };
        </script>









        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <script>
            // Function to add a new household member row
            document.getElementById('addMember').addEventListener('click', function() {
                const membersBody = document.getElementById('membersBody');

                // Create a new table row for the household member
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="First_name[]" class="form-control" style="width: 100px;" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Middle Name:</label>
                    <input type="text" name="Middle_name[]" class="form-control" style="width: 100px;" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="Last_name[]" class="form-control" style="width: 100px;" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Gender:</label>
                    <select name="gender[]" class="form-control" style="width: 80px;" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Date of Birth:</label>
                    <input type="date" name="dob[]" class="form-control" style="width: 128px;" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Place of Birth:</label>
                    <input type="text" name="pob[]" class="form-control" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>House Position:</label>
                    <input type="text" name="relationship[]" class="form-control" style="width: 110px;" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Status:</label>
                    <select name="marital_status[]" class="form-control" style="width: 100px;" required>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Nationality:</label>
                    <input type="text" name="nationality[]" class="form-control" style="width: 90px;" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Occupation:</label>
                    <input type="text" name="occupation[]" class="form-control" style="width: 95px;" required>
                </div>
            </td>
            <td style="font-size: 12px; padding: 10px;">
                <div class="form-group">
                    <label>Vulnerability:</label>
                    <select name="vulnerability[]" class="form-control" style="width: 90px;" required>
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
                <div class="d-inline-flex align-items-center">
                    <button type="button" class="btn btn-success btn-sm add-family mr-2" data-toggle="modal" data-target="#addFamilyModal">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm remove-member">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        `;

                // Append the new row to the table body
                membersBody.appendChild(newRow);

                // Add an event listener for the remove button to delete the row
                newRow.querySelector('.remove-member').addEventListener('click', function() {
                    newRow.remove();
                });
            });
        </script>


    </body>

    </html>
    <?
