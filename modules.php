<?php
include_once 'header.php'; // Assurez-vous que header.php contient les informations nécessaires pour la connexion à la base de données.

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le champ 'module_name' n'est pas vide
    if (!empty($_POST['module_name'])) {
        // Récupère et nettoie la valeur du champ 'module_name'
        $module_name = mysqli_real_escape_string($connexion, $_POST['module_name']);
        
        // Vérifie si le champ 'level_id' est défini et n'est pas vide
        if (isset($_POST['level_id']) && !empty($_POST['level_id'])) {
            // Récupère et nettoie la valeur du champ 'level_id'
            $level_id = mysqli_real_escape_string($connexion, $_POST['level_id']);
            
            // Requête d'insertion dans la base de données
            $query = "INSERT INTO modules (module_name, level_id) VALUES ('$module_name', '$level_id')";

            // Exécute la requête
            if (mysqli_query($connexion, $query)) {
                echo "Le module a été ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du module : " . mysqli_error($connexion);
            }
        } else {
            echo "L'identifiant du niveau est requis.";
        }
    } else {
        echo "Le nom du module est requis.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Module</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="form-container">
    <form action="modules.php" method="post">
        <h3>Ajouter un Module</h3>
        <p>Nom du module</p>
        <input type="text" name="module_name" class="box" required>
        
        <p>Niveau</p>
        <select name="level_id" class="box" required>
            <option value="">Sélectionner un niveau</option>
            <?php
            // Récupérer les niveaux depuis la base de données
            $query = "SELECT * FROM levels";
            $result = mysqli_query($connexion, $query);
            
            // Afficher les options pour les niveaux
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['level_id'] . "'>" . $row['level_name'] . "</option>";
            }
            ?>
        </select>
        
        <input type="submit" value="Ajouter" class="btn">
    </form>
</section>
</body>
</html>
