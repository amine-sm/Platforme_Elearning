<?php
include_once 'header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search_box'])) {
        $search_query = mysqli_real_escape_string($connexion, $_POST['search_box']);
        $query = "SELECT * FROM Modules WHERE module_name LIKE '%$search_query%'";
        $result = mysqli_query($connexion, $query);
        
        // Afficher les résultats de la recherche
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<h2 style='font-size: 30px; color: ##ee3a55;'>Results Of Your Search</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>";
                echo "<h3><a class='btn'  href='display_module_resources.php?module_id=" . $row['module_id'] . "'>" . $row['module_name'] . "</a></h3>";
                echo "</div>";
            }
        } else {
            echo "<p style='font-size: 30px; color: ##ee3a55;'>There Is No Module(s) Contains This Name.</p>";
        }
    } else {
        echo "<p style='font-size: 30px; color: ##ee3a55;'>Please Write The Search Term.</p>";
    }
} else {
    header("Location: search-form.php");
    exit();
}
?>