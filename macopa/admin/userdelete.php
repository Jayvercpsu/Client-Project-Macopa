<?php
// Include the database connection file
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idno'])) {
    $idno = mysqli_real_escape_string($conn, $_POST['idno']);
    $deleteQuery = "DELETE FROM security WHERE idno='$idno'";

    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: Accounts.php?status=success&message=User+deleted+successfully");
        exit;
    } else {
        header("Location: your_table_page.php?status=error&message=Failed+to+delete+user");
        exit;
    }
}

$conn->close();
?>
