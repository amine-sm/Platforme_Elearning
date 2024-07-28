<?php
include_once 'config/dbconnection.php';
if (isset($_GET['assignment_id'])) {
    $assignment_id = $_GET['assignment_id'];
    $query = "DELETE FROM Assignments WHERE assignment_id = $assignment_id";
    $result = mysqli_query($connexion, $query);
    if ($result) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting assignment.";
    }
} else {
    header("Location: error_page.php");
    exit();
}
?>
