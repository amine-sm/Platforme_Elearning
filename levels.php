<?php
include_once 'header.php'; // Assurez-vous que header.php contient les informations nécessaires pour la connexion à la base de données.

// Récupérer les spécialités depuis la base de données
$sql = "SELECT * FROM specialties";
$result = mysqli_query($connexion, $sql);

$specialties = array(); // Tableau pour stocker les spécialités

// Vérifier s'il y a des données
if (mysqli_num_rows($result) > 0) {
    // Parcourir les résultats et stocker les spécialités dans le tableau
    while ($row = mysqli_fetch_assoc($result)) {
        $specialties[] = $row;
    }
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $level_name = $_POST['level_name'];
 $specialtyid=$_POST['specialty_id'];
    // Insérez les données dans la base de données
    $sql = "INSERT INTO levels (level_name,specialty_id) VALUES ('$level_name','$specialtyid')";

    if (mysqli_query($connexion, $sql)) {
        echo "Le niveau a été ajouté avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($connexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Niveau</title>
</head>
<body>
<section class="form-container">

    <form action="levels.php" method="post">
    <h3>Add Level</h3>
        <p>Nom du niveau :</p>
        <input type="text" name="level_name" class="box" required>
        
        <p>Spécialité :</p>
        <select name="specialty_id" class="box" required>
            <option value="">Sélectionner une spécialité</option>
            <?php foreach ($specialties as $specialty): ?>
                <option value="<?php echo $specialty['specialty_id']; ?>"><?php echo $specialty['specialty_name']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <input type="submit" value="Ajouter Niveau" class="btn">
    </form>
</section>
</body>
</html>
