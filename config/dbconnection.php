<?php
function seConnecter($serveur, $utilisateur, $mot_de_passe, $base_de_donnees) {
    // Connexion à la base de données
    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    // Vérification de la connexion
    if (!$connexion) {
        // Afficher un message d'erreur et arrêter le script
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    // Retourner la connexion
    return $connexion;
}

function loginUser($connexion, $username, $password) {
    // Requête pour récupérer le mot de passe haché de l'utilisateur
    $query = "SELECT password FROM Users WHERE username = ?";
    $stmt = mysqli_prepare($connexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $hashed_password);
        mysqli_stmt_fetch($stmt);
        
        // Vérifier si le mot de passe correspond
        if (password_verify($password, $hashed_password)) {
            return true;
                         // Mot de passe correct
        } else {
            return false;
             echo"mot de passe incorrect"; // Mot de passe incorrect
        }
    } else {
        return false;
        echo"utilisateur n'existe pas"; // Utilisateur non trouvé
    }
}

function signupUser($connexion, $username, $email, $password, $firstname, $lastname, $speciality, $level) {
    // Hacher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Préparer et exécuter la requête d'insertion
    $query = "INSERT INTO Users (username, email, password, nom, prenom, Specialite, niveau) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connexion, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $hashed_password, $firstname, $lastname, $speciality, $level);
    
    if (mysqli_stmt_execute($stmt)) {
        return true; // Inscription réussie
    } else {
        return false; // Erreur lors de l'inscription
    }
}
// Fonction pour récupérer les informations de l'utilisateur à partir de la base de données
function getUserInfo($connexion, $username) {
    $query = "SELECT * FROM Users WHERE username = '$username'";
    $result = mysqli_query($connexion, $query);
    return $result;
}
function getSpecialties($connexion) {
    $query = "SELECT * FROM Specialties";
    return mysqli_query($connexion, $query);
}



// Utilisation de la fonction pour se connecter à la base de données
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$mot_de_passe = ""; // Mot de passe MySQL
$base_de_donnees = "platforme"; // Nom de la base de données MySQL

$connexion = seConnecter($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if($connexion){
    //echo "Connexion réussie à la base de données.";
} else {
    //echo "Échec de la connexion à la base de données.";
}


?>