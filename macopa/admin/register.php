<?php 
include('connect.php'); 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prefinal Project</title>
    <meta name="description" content="Updated Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom Styling -->
    <style>
        body { 
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url('main bg.png') center center fixed;
    background-size: 99.9% 99.9%; /* Adjust this as needed */
    font-family: 'Open Sans', sans-serif;
}

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container .login-logo img {
            max-width: 120px;
            margin-bottom: 1rem;
        }

        .login-container .form-group input {
            font-size: 1rem;
            padding: 0.75rem;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .register-link p {
            margin-top: 1rem;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-logo">
            <a href="index.php">
                <img onclick="profileToggle()" class="rounded-circle" src="sign up.png" alt="User" width="30" height="30">
            </a>
        </div>
        <form method="POST" action="securityreg.php" class="user">                      
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="terms">
                <label class="form-check-label" for="terms">Agree to the terms and policy</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Register Account</button>
            
            <div class="register-link mt-3">
                <p>Already have an account? <a href="index.php">Sign in</a></p>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
