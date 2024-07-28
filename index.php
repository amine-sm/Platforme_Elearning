
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

    <title>Acceuil</title>
</head>
<body>
<?php include_once 'header.php' ;?>
<section class="courses">

   <h1 class="heading">our specialties</h1>
   <div class="box-container">
   <?php 
$specialties = getSpecialties($connexion);
if ($specialties && mysqli_num_rows($specialties) > 0) {
    while ($row = mysqli_fetch_assoc($specialties)) {
        echo '<div class="box">';
        echo '<div class="thumb">';
        echo '<img src="' . $row["image"] . '" alt="">';
        echo '<div class="info">';
        echo '<h3>' . $row["specialty_name"] . '</h3>';
        // Insérez ici le code pour afficher d'autres détails comme la date ou le nombre de vidéos
        echo '</div>';
        echo '</div>';
        // Insérez ici le code pour afficher le titre du tutoriel et le lien vers la playlist
        echo '<h3 class="title"> ' . $row["specialty_name"] . ' Courses</h3>';
        echo '<a href="display_levels.php?specialty_id=' . $row['specialty_id'] . '" class="inline-btn">View</a>';
        echo '</div>'; // Fermeture de la div .box
    }
    if ($role == 1) {
        echo '<a href="ajouter_specialite.php" class="btn">Ajouter une spécialité</a>';
    }
} else {
    echo "Aucune spécialité disponible pour le moment.";
}

?>

   </div>

</section>
<?php include_once 'footer.php'; ?>

</body>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>