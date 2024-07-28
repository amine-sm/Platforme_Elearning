<?php

include_once 'header.php';

// Vérifier si l'ID du module est passé en paramètre
if (isset($_GET['module_id'])) {
    $module_id = $_GET['module_id'];

    // Récupérer les examens pour le module donné
    $exams = getExamsForModule($connexion, $module_id);

    // Récupérer les leçons pour le module donné
    $lessons = getLessonsForModule($connexion, $module_id);

    // Récupérer les travaux dirigés pour le module donné
    $assignments = getAssignmentsForModule($connexion, $module_id);

    // Afficher les ressources
    echo "<section class='playlist'>";
    echo "<h2>Ressources disponibles pour ce module :</h2>";

    // Afficher un bouton pour ajouter un nouvel examen
    echo '<a href="ajouter_examen.php?module_id=' . $module_id . '" class="btn">Add a New Exam</a><br><br>';

    // Afficher un bouton pour ajouter une nouvelle leçon
    echo '<a href="ajouter_lesson.php?module_id=' . $module_id . '" class="btn">Add a new Course</a><br><br>';

    // Afficher un bouton pour ajouter un nouveau travail dirigé
    echo '<a href="ajouter_td.php?module_id=' . $module_id . '" class="btn">Add a New TD</a><br><br>';

// Ouvrir la section des examens
echo "<div class='box-container'>";
echo "<div class='box'>";
echo "<h3>Exams :</h3>";

// Afficher les examens
if ($exams && mysqli_num_rows($exams) > 0) {
    while ($row = mysqli_fetch_assoc($exams)) {
        $exam_id = $row["exam_id"]; // Assuming 'exam_id' is the primary key in your Exams table
        $filePath = $row["fichier"];
        echo "<p><strong class='resource-title'>" . $row["exam_title"] . ":</strong> <a href='$filePath' class='pdf-link'>" . basename($filePath) . "</a> ";
        if($id == $row['user_id']){
            echo"<a href='delete_exam.php?exam_id=$exam_id' class='btn del'>Delete</a></p>";"";
        }
        echo"<br><br>";
    }
} else {
    echo "<p>there is no exams for this module.</p>";
}

// Fermer la boîte des examens
echo "</div>"; 
echo "</div>";


// Ouvrir la section des leçons
echo "<div class='box-container'>";
echo "<div class='box'>";
echo "<h3>Course :</h3>";

// Afficher les leçons
if ($lessons && mysqli_num_rows($lessons) > 0) {
    while ($row = mysqli_fetch_assoc($lessons)) {
        $lesson_id = $row["lesson_id"]; 
        $filePath = $row["fichier"];
        echo "<p><strong class='resource-title'>" . $row["lesson_title"] . ":</strong> <a href='$filePath' class='pdf-link'>" . basename($filePath) . "</a> ";
        if($id == $row['user_id']){
            echo"<a href='delete_exam.php?exam_id=$exam_id' class='btn del'>Delete</a></p>";"";
        }
        echo"<br><br>";
    }
} else {
    echo "<p>There is no course for ce module.</p>";
}

// Fermer la boîte des leçons
echo "</div>"; 
echo "</div>";


   // Ouvrir la section des travaux dirigés
echo "<div class='box-container'>";
echo "<div class='box'>";
echo "<h3>TD :</h3>";

// Afficher les travaux dirigés
if ($assignments && mysqli_num_rows($assignments) > 0) {
    while ($row = mysqli_fetch_assoc($assignments)) {
        $assignment_id = $row["assignment_id"]; // Assuming 'assignment_id' is the primary key in your Assignments table
        $filePath = $row["fichier"];
        echo "<p><strong class='resource-title'>" . $row["assignment_title"] . ":</strong> <a href='$filePath' class='pdf-link'>" . basename($filePath) . "</a>";
        if($id == $row['user_id']){
            echo"<a href='delete_exam.php?exam_id=$exam_id' class='btn del'>Delete</a></p>";"";
        }
        echo"<br><br>";
    }
} else {
    echo "<p>There is no td for this module.</p>";
}

// Fermer la boîte des travaux dirigés
echo "</div>";
echo "</div>"; 


    echo "</section>"; // Close
} else {
    echo "ID module non recognized.";
}



// Fonctions pour récupérer les ressources pour un module donné
function getExamsForModule($connexion, $module_id)
{
    $query = "SELECT * FROM Exams WHERE module_id = $module_id";
    return mysqli_query($connexion, $query);
}

function getLessonsForModule($connexion, $module_id)
{
    $query = "SELECT * FROM Lessons WHERE module_id = $module_id";
    return mysqli_query($connexion, $query);
}

function getAssignmentsForModule($connexion, $module_id)
{
    $query = "SELECT * FROM Assignments WHERE module_id = $module_id";
    return mysqli_query($connexion, $query);
}
?>
