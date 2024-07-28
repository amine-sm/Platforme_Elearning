<?php
include_once 'header.php' ;

// Vérifier si l'ID de la spécialité est passé en paramètre
if(isset($_GET['specialty_id'])) {
    $specialty_id = $_GET['specialty_id'];
    
    // Récupérer les niveaux pour la spécialité donnée
    $levels = getLevelsForSpecialty($connexion, $specialty_id);
    
    // Afficher les niveaux
    echo "<section class='playlist'>";
    echo "<h1 class='heading'>Levels</h1>";
    echo" <div class='box-container'>";
    if($levels && mysqli_num_rows($levels) > 0) {
        while($row = mysqli_fetch_assoc($levels)) {
            // Output HTML structure for each level
            echo '<a class="box" href="display_modules.php?level_id=' . $row['level_id'] . '">';
            echo '<h3>' . $row["level_name"] . '</h3>'; // Output level name
            echo '</a>'; // Close .box anchor
        }
    } else {
        echo "Aucun niveau disponible pour cette spécialité.";
    }
    echo "</div>";
    echo "</section>"; // Close
} else {
    echo "ID de spécialité non spécifié.";
}

// Fonction pour récupérer les niveaux pour une spécialité donnée
function getLevelsForSpecialty($connexion, $specialty_id) {
    $query = "SELECT * FROM Levels WHERE specialty_id = $specialty_id";
    return mysqli_query($connexion, $query);
}
?>
