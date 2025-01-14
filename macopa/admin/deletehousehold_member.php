<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $member_id = intval($_POST['member_id']);
    
    // Get the household ID before deletion
    $query = mysqli_query($conn, "SELECT household_id FROM household_members WHERE member_id = $member_id");
    if ($query && mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        $household_id = $result['household_id'];

        // Delete the member
        $deleteQuery = mysqli_query($conn, "DELETE FROM household_members WHERE member_id = $member_id");
        
        if ($deleteQuery) {
            // Redirect back to the household view
            header("Location: viewmember.php?cid=$household_id");
            exit;
        } else {
            echo "Error deleting member: " . mysqli_error($conn);
        }
    } else {
        echo "Member not found.";
    }
}
?>
