<?php
include_once 'header.php';
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

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Profile Information</h3>
       
      <p>Family name </p>
      <input type="email"readonly value="<?php echo $nom ; ?> " class="box">
       
      <p>Last Name </p>
      <input type="email" readonly value="<?php echo $prenom ; ?> " class="box">
      <p>username</p>
      <input type="text" value ="<?php echo $username ; ?>"class="box">
      <p>email</p>
      <input type="email" value="<?php echo $email ; ?> " class="box">
      <p>Speciality</p>
      <input type="text" value="<?php echo $specialite ; ?> " class="box">
      <p>Level</p>
      <input type="text" value="<?php echo $niveau ; ?> " class="box">

      
   </form>

</body>
</html>
