<footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="images/Learning1.png" alt="learning">
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="ajouter_lesson.php">Add Courses</a></li>
                    <li><a href="ajouter_examen.php">Add Exams</a></li>
                    <li><a href="ajouter_td.php">Add TD</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <p> <strong> MY Informations:</strong></p>
              
                <ul>
                    <li> <strong> Email:</strong> <br><?php echo $email ; ?></li>
                    <li><strong> Full Name:</strong> <br><?php echo $nom ; ?> <br><?php echo $prenom ; ?></li>
                    <li><strong> Speciality:</strong> <br> <?php echo $specialite ; ?></li>
                </ul>
            </div>

            </div>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2024. All Rights reserved.</p>
          </div>
    </footer>
