<?php
session_start();
<<<<<<< ours
include '../connexion/connexionDB.php';
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];

<<<<<<< ours
    $stmt = $conn->prepare("SELECT id_utilisateur, mot_de_passe, role FROM utilisateurs WHERE nom_utilisateur = ?");
=======
    $stmt = $conn->prepare("SELECT id_utilisateur, mot_de_passe, role FROM Utilisateurs WHERE nom_utilisateur = ?");
>>>>>>> theirs
    $stmt->bind_param("s", $nom_utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $row['mot_de_passe']) && $row['role'] == $role) {
            session_start();
            $_SESSION['id_utilisateur'] = $row['id_utilisateur'];
            $_SESSION['nom_utilisateur'] = $nom_utilisateur;
            $_SESSION['role'] = $role;
<<<<<<< ours
            header("Location: ../projet/portfolioacadémique.php");
=======
            header("Location: \code\portfolio\projet\portfolioacadémique.php");
>>>>>>> theirs
        } else {
            echo "Email, mot de passe ou rôle incorrect.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
    
    

    $stmt->close();
}
$conn->close();
?>