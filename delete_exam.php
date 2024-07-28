<?php
include_once 'config/dbconnection.php';

if (isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];

    $query = "DELETE FROM Exams WHERE exam_id = $exam_id";
    $result = mysqli_query($connexion, $query);

    if ($result) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting exam.";
    }
} else {
    header("Location: error_page.php");
    exit();
}
