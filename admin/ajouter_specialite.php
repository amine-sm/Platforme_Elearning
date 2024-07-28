<?php
include_once '../page/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Assignment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Profile Information</h3>
       
      <p>Family name</p>
      <input type="email" value="<?php echo $nom ; ?> " class="box">
       
      <p>First Name</p>
      <input type="email" value="<?php echo $prenom ; ?> " class="box">
      <p>username</p>
      <input type="text" value ="<?php echo $username ; ?>"class="box">
      <p>email</p>
      <input type="email" value="<?php echo $email ; ?> " class="box">
      <p>Specialite</p>
      <input type="email" value="<?php echo $specialite ; ?> " class="box">
      <p>Level</p>
      <input type="email" value="<?php echo $niveau ; ?> " class="box">
      <input type="submit" value="update profile" name="submit" class="btn">
   </form>

</body>
</html>
