<?php
<<<<<<< ours
$username = "portfolio_db";
$password = "YF5r2Q!qfFe#g6L";
=======
$servername = "localhost";
$username = "root";
$password = "";
>>>>>>> theirs
$dbname = "portfolio_users";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);
<<<<<<< ours
    

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
=======
>>>>>>> theirs
?>