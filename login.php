<?php
include 'config/dbconnection.php'; // Inclure le script de connexion à la base de données

// Initialiser les variables
$login_username = $login_password = "";
$signup_username = $signup_email = $signup_password = "";
$login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['login'])) {
        // Traitement de la connexion
        $login_username = $_POST["login_username"];
        $login_password = $_POST["login_password"];

        // Utiliser la fonction loginUser pour vérifier l'utilisateur
        $result = loginUser($connexion, $login_username, $login_password);

        if ($result === true) {
            // Authentification réussie, démarrer la session et rediriger l'utilisateur vers index.php
            session_start();
            $_SESSION["username"] = $login_username;
            header("Location: index.php");
            exit();
        } else {
            // Nom d'utilisateur ou mot de passe incorrect
            $login_err = "Nom d'utilisateur ou mot de passe incorrect.";
            echo $login_err;
        }
    } elseif(isset($_POST['signup'])) {
        // Traitement de l'inscription
        $signup_username = $_POST["signup_username"];
        $signup_email = $_POST["signup_email"];
        $signup_password = $_POST["signup_password"];
        // Nouveaux champs
        $signup_firstname = $_POST["signup_firstname"];
        $signup_lastname = $_POST["signup_lastname"];
        $signup_speciality = $_POST["signup_speciality"];
        $signup_level = $_POST["signup_level"];

        // Utiliser la fonction signupUser pour inscrire l'utilisateur
        if (signupUser($connexion, $signup_username, $signup_email, $signup_password, $signup_firstname, $signup_lastname, $signup_speciality, $signup_level)) {
            echo "Inscription réussie!";
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginSignup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Connexion</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
        <form action="" method="POST">
    <h1>Create an account</h1>
    <div class="mode">
        <p>Choose your mode:</p>
        <i class='bx bx-moon iconn'></i>
    </div>
    <span>use your email to register</span>
    <input type="text" name="signup_username" placeholder="User Name" required>
    <input type="email" name="signup_email" placeholder="Email" required>
    <input type="password" name="signup_password" placeholder="Password" required>
    <!-- Ajouter les nouveaux champs -->
    <input type="text" name="signup_firstname" placeholder="First Name" required>
    <input type="text" name="signup_lastname" placeholder="Last Name" required>
    <input type="text" name="signup_speciality" placeholder="Speciality" required>
    <input type="text" name="signup_level" list="levels" placeholder="Level" required oninput="checkOption(this)">
<datalist id="levels">
    <option value="Licence 1">
    <option value="Licence 2">
    <option value="Licence 3">
    <option value="Master 1">
    <option value="Master 2">
    <option value="Doctorat">
</datalist>



    <!-- Fin des nouveaux champs -->
    <button type="submit" name="signup">Sign Up</button>
</form>

        </div>
        <div class="form-container login">
            <form action="" method="POST">
                <h1>Log In</h1>
                <div class="mode">
                    <p>Choose your mode: </p>
                    <i class='bx bx-moon iconn'></i>
                </div>

                <span>use your email to register</span>
                <input type="text" name="login_username" placeholder="User name" required>
                <input type="password" name="login_password" placeholder="Password" required>
                <a href="#">Forgot your password!</a>
                <button type="submit" name="login">Log In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Happy to see you again!</h1>
                    <p>To use all our features please enter your information</p>
                    <button class="hidden" id="login">log in</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hi!</h1>
                    <p>To use all our features please enter your information</p>
                    <button class="hidden" id="register">sign up</button>
                </div>
            </div>
        </div>
    </div>
<script src="js/script2.js"></script>
<script>
function checkOption(input) {
    var validOptions = document.getElementById('levels').getElementsByTagName('option');
    var isValid = false;
    
    for (var i = 0; i < validOptions.length; i++) {
        if (input.value === validOptions[i].value) {
            isValid = true;
            break;
        }
    }

    if (!isValid) {
        input.value = ''; 
        alert('Please select a valid option from the list.');
    }
}
</script>
</body>
</html>