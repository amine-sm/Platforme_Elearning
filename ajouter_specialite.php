<?php
include_once 'header.php';

// Définissez le chemin où vous souhaitez enregistrer les images téléchargées
$uploadDirectory = 'uploads/';
$defaultImage = 'default.jpg'; // Le nom de votre image par défaut

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['specialty_name'])) {
        $specialty_name = mysqli_real_escape_string($connexion, $_POST['specialty_name']);

        // Vérifie si un fichier a été téléchargé
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            // Déplacez le fichier téléchargé vers le répertoire de destination avec un nouveau nom si nécessaire
            $destination = $uploadDirectory . $imageName;
            if(move_uploaded_file($imageTmpName, $destination)) {
                // Requête d'insertion dans la base de données
                $query = "INSERT INTO specialties (specialty_name,image) VALUES ('$specialty_name', '$destination')";
                
                if (mysqli_query($connexion, $query)) {
                    echo "<h3>La spécialité a été ajoutée avec succès.";
                } else {
                    echo "<h3>Erreur lors de l'ajout de la spécialité : " . mysqli_error($connexion);
                }
            } else {
                echo "<h3>Erreur lors de l'upload de l'image.";
            }
        } else {
            // Si aucun fichier n'est téléchargé, utilisez l'image par défaut
            $destination = $uploadDirectory . $defaultImage;

            // Requête d'insertion dans la base de données
            $query = "INSERT INTO specialties (specialty_name,image) VALUES ('$specialty_name', '$destination')";
            
            if (mysqli_query($connexion, $query)) {
                echo "<h3>La spécialité a été ajoutée avec succès.";
            } else {
                echo "<h3>Erreur lors de l'ajout de la spécialité : " . mysqli_error($connexion);
            }
        }
    } else {
        echo "<h3>Le nom de la spécialité est requis.";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une spécialité</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="form-container">
    <form action="ajouter_specialite.php" method="post" enctype="multipart/form-data">
        <h3>Ajouter une Spécialité</h3>
        <p>Nom de la spécialité</p>
        <input type="text" name="specialty_name" class="box">
        <p>Image (facultatif)</p>
        <input type="file" name="image" class="box">
        <input type="submit" value="Ajouter" class="btn">
    </form>
</section>
</body>
</html>
