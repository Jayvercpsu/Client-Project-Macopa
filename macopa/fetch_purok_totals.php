    <?php 
    header('Content-Type: application/json');

    // Database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "macopa_db";

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die(json_encode(["error" => "Database connection failed."]));
    }

    // Query to count households per Purok
    $sql = "SELECT purok, COUNT(DISTINCT household_id) AS total_households
            FROM households
            GROUP BY purok";

    $result = $conn->query($sql);

    // Fetch results
    $purok_totals = [];
    while ($row = $result->fetch_assoc()) {
        $purok_totals[$row['purok']] = $row['total_households'];
    }

    // Return as JSON
    echo json_encode($purok_totals);
    $conn->close();
    
    ?>
