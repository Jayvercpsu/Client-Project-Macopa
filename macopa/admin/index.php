<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
            padding-right: 80px;
            padding-bottom: 50px;
        }

        .image-container h1 {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .image-container img {
            width: 700px;
            height: 420px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .login-container {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            height: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            /* Add zoom effect and box-shadow enhancement */
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            padding-bottom: 25px;
            color: #333;
            margin-bottom: 2px;
        }

        .login-container .error {
            background-color: #fef2f2;
            color: #dc2626;
            padding: 10px;
            border: 1px solid #fca5a5;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .login-container input {
            width: 90%;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
        }

        .login-container button {
            background-color: #1877f2;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            width: 40%;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-container button:hover {
            background-color: #165eab;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <div class="image-container">
        <h1>BARANGAY MACOPA RECORDS</h1>
        <img src="main bg" alt="Barangay Macopa">
    </div>

    <div class="login-container">
        <h2>ADMIN LOGIN FORM</h2>  
        <!-- PHP Error Handling -->
        <?php if (isset($_GET['error'])): ?>
            <div class="error">
                Wrong Credentials: Invalid username or password.
            </div>
        <?php endif; ?>

        <form action="admin_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
      

        </form>
    </div>
</body>
</html>
