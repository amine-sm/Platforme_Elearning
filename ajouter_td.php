<?php
include_once 'header.php';

// Fonction pour télécharger un fichier
function uploadFile($file, $uploadDirectory) {
    $target_dir = "uploads/";
    global $target_dir; // Ajout de la variable globale $target_dir

    // Vérifier si le fichier a été téléchargé correctement
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return "An error occurred while uploading the file.";
    }

    // Vérifier si le dossier de téléchargement existe et a les permissions nécessaires
    if (!is_dir($uploadDirectory) || !is_writable($uploadDirectory)) {
        return "The upload directory is not writable.";
    }

    // Récupérer le nom du fichier et son chemin temporaire
    $fileName = basename($file['name']);
    $fileTmp = $file['tmp_name'];

    // Définir le chemin de destination pour le fichier téléchargé
    $uploadPath = $uploadDirectory . '/' . $fileName;

    // Déplacer le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($fileTmp, $uploadPath)) {
        return $uploadPath; // Retourner le chemin du fichier téléchargé
    } else {
        return "An error occurred while moving the file.";
    }
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si toutes les données nécessaires sont fournies
    if (isset($_POST['assignment_title'], $_POST['assignment_details'], $_FILES['file'], $_POST['module_name'],$_POST['user_id'])) {
        // Récupérer les données du formulaire
        $assignment_title = mysqli_real_escape_string($connexion, $_POST['assignment_title']);
        $assignment_details = mysqli_real_escape_string($connexion, $_POST['assignment_details']);
        $module_name = $_POST['module_name'];
        $target_dir = "uploads/";
        $user=$_POST['user_id'];

        // Rechercher l'ID du module en fonction du nom du module
        $query = "SELECT module_id FROM Modules WHERE module_name = '$module_name'";
        $result = mysqli_query($connexion, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $module_id = $row['module_id'];

            // Vérifier si un fichier a été téléchargé
            if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileResult = uploadFile($_FILES['file'], $target_dir); // Utilisation de $target_dir
                if (is_string($fileResult)) {
                    // Si le fichier a été téléchargé avec succès, insérer les informations du travail dirigé dans la base de données
                    $file_dest = mysqli_real_escape_string($connexion, $fileResult);
                    $query_insert = "INSERT INTO Assignments (assignment_title, assignment_details, module_id, fichier,user_id) VALUES ('$assignment_title', '$assignment_details', '$module_id', '$file_dest','$user')";
                    $result_insert = mysqli_query($connexion, $query_insert);

                    if ($result_insert) {
                        echo '<div style="font-size: 30px; color: ##ee3a55;">New assignment added successfully.';
                    } else {
                        echo '<div style="font-size: 30px; color: ##ee3a55;">Error adding assignment: ' . mysqli_error($connexion);
                    }
                } else {
                    // Si une erreur s'est produite lors du téléchargement du fichier, afficher le message d'erreur
                    echo $fileResult;
                }
            } else {
                // Gérer les erreurs de téléchargement ici, si nécessaire
                echo '<div style="font-size: 30px; color: ##ee3a55;">An error occurred while uploading the file.';
            }
        } else {
            echo '<div style="font-size: 30px; color: ##ee3a55;">Module not found.(please check the name)';
            // Arrêter le traitement ou afficher un message d'erreur
        }
    } else {
        echo '<div style="font-size: 30px; color: ##ee3a55;">Please provide all necessary information to add a new assignment.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Assignment</title>
</head>
<body>
<section class="form-container">
    <form action="ajouter_td.php" method="POST" enctype="multipart/form-data">
    <h3>Add Assignment</h3>
    <label for="assignment_title">Assignment Title:</label><br>
        <input type="text" id="assignment_title" name="assignment_title"  class="box" required><br>
        <label for="assignment_details">Assignment Details:</label><br>
        <textarea id="assignment_details" name="assignment_details" class="box" required></textarea><br>
        <label for="module_name">Module Name:</label><br>
        <input type="text" id="module_name" name="module_name" class="box" required><br>
        <label for="file">Select a file (PDF or Word or image):</label><br>
        <input type="file" id="file" name="file"  class="box" accept=".pdf, .doc, .docx,.jpg,.png,.jpeg"><br>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">




        <button type="submit" class="btn">Add Assignment</button>
    </form>
</section>
</body>
</html>
