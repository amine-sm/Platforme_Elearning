<?php include_once 'header.php' ;?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<style>.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  
  .styled-table th,
  .styled-table td {
    border: 1px solid #e0e0e0;
    padding: 12px;
  }
  .styled-table td{
    color:rgba(0, 0, 0, 0.514);
  }
  
  .styled-table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #242424;
    text-align: left;
  }
  
  .styled-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  .styled-table tbody tr:hover {
    background-color: #e0e0e0;
  }</style>

<table class="styled-table">
  <thead>
  <tr>
      <th>Username</th>
      <th>Family Name</th>
      <th>First Name</th>
      <th>Email</th>
      <th>Specialite</th>   
      <th>Level</th>
    </tr>
  </thead>
    <?php $userResult = getUsers($connexion);
if ($userResult && mysqli_num_rows($userResult) > 0) {
    while ($row = mysqli_fetch_assoc($userResult)) {
echo'<tbody>
  <tr>
    <td>'.$row['username'].'</td>
    <td>'.$row['nom'].'</td>
    <td>'.$row['prenom'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['Specialite'].'</td>
    <td>'.$row['niveau'].'</td>
  </tr>'
;
    }
}
?>
</table>
</body>
</html> 
<?php
function getUsers($connexion) {
    $query = "SELECT * FROM users";
    return mysqli_query($connexion, $query);
}
?>
