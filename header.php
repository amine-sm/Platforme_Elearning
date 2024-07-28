<?php
include 'config/dbconnection.php'; // Inclure le script de connexion à la base de données

// Vérifier si l'utilisateur est connecté
session_start();
if(!isset($_SESSION["username"])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupérer les informations de l'utilisateur
$username = $_SESSION["username"];
$userInfo = getUserInfo($connexion, $username);

if($userInfo && mysqli_num_rows($userInfo) == 1) {
    $row = mysqli_fetch_assoc($userInfo);
    $id=$row['user_id'];
    $email = $row["email"];
    $nom=$row['nom'];
    $prenom=$row['prenom'];
    $specialite=$row['Specialite'];
    $niveau=$row['niveau'];
    $role=$row['role'];
} else {
    // Gérer l'erreur si les informations de l'utilisateur ne peuvent pas être récupérées
    $email = "N/A";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="index.php" class="logo">E-Learning.</a>

      <form action="search.php" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/images.png" class="image" alt="">
         <h3 class="name"><?php echo $username ?></h3>
         <p class="role">student</p>
         <a href="logout.php" class="btn">Log out</a>
       
      </div>

   </section>

</header>   
<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/images.png" class="image" alt="">
      <h3 class="name"><?php echo $username ?></h3>
      <?php if($role== 0){
        echo'<p class="role">student</p>';
      }
        else 
        echo '<p class="role">Admin</p>';
      ?>
    
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="index.php"><i class="fas fa-home"></i><span>home</span></a>
      <?php if($role == 1){
        echo'<a href="users.php"><i class="fas fa-user"></i><span>users</span></a>
        <a href="levels.php"><i class="fa fa-level-up"></i><span>Levels</span></a>      
         <a href="modules.php"><i class="fas fa-chalkboard-user"></i><span>Modules</span></a>';
  
      }
      ?>
      <a href="ajouter_lesson.php"><i class="fas fa-graduation-cap"></i><span> Add Courses</span></a>
      <a href="ajouter_examen.php"><i class="fas fa-chalkboard-user"></i><span>Add Exams</span></a>
      <a href="ajouter_td.php"><i class="fa-solid fa-plus"></i><span>Add TD</span></a>

   </nav>
   <script src="js/script.js"></script>

</div>