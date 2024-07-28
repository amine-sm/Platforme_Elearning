<?php
include_once 'header.php' ;
// Vérifier si l'ID du niveau est passé en paramètre
if (isset($_GET['level_id'])) {
    $level_id = $_GET['level_id'];

    // Récupérer les modules pour le niveau donné
    $modules = getModulesForLevel($connexion, $level_id);

    // Afficher les modules
    echo "<section class='playlist'>";
    echo "<h1 class='heading'>Modules disponibles pour ce niveau :</h1>";
    echo "<div class='box-container'>";
    if ($modules && mysqli_num_rows($modules) > 0) {
        while ($row = mysqli_fetch_assoc($modules)) {
            // Output HTML structure for each module
            echo '<a class="box" href="display_module_resources.php?module_id=' . $row['module_id'] . '">';
            echo '<h3>' . $row["module_name"] . '</h3>'; // Output module name
            echo '</a>'; // Close .box anchor
        }
    } else {
        echo "there is no module for this level.";
    }
    echo "</div>";
    echo "</section>"; // Close
} else {
    echo "ID module non recognized.";
}



// Fonction pour récupérer les modules pour un niveau donné
function getModulesForLevel($connexion, $level_id)
{
    $query = "SELECT * FROM Modules WHERE level_id = $level_id";
    return mysqli_query($connexion, $query);
}
?>
