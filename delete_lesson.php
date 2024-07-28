<?php
include_once 'config/dbconnection.php';
if (isset($_GET['lesson_id'])) {
    $lesson_id = $_GET['lesson_id'];

    $query = "DELETE FROM Lessons WHERE lesson_id = $lesson_id";
    $result = mysqli_query($connexion, $query);

    if ($result) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting lesson.";
    }
} else {
    header("Location: error_page.php");
    exit();
}
?>
