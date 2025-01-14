<?php
include('session.php');
include('connect.php');
// Database connection
$conn = mysqli_connect("localhost", "root", "", "macopa_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $purok = $_POST['purok'];
    $purok_name = $_POST['name'];

    // Insert into database
    $sql = "INSERT INTO purok (purok, name) VALUES ('$purok', '$purok_name')";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>New Purok added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Purok</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            text-align: center;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="number"], input[type="text"] {
            width: 60%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        button {
            width: 30%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Purok</h2>
        <form action="" method="post">
            <label for="purok">Purok:</label>
            <input type="text" name="purok" id="purok" required><br>
            <label for="name">Purok Name:</label>
            <input type="text" name="name" id="name"><br>
            <button type="submit">Add Purok</button>
        </form>
    </div>
</body>
</html>
