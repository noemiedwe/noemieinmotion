<?php
session_start();
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'] ?? 'Concepteur';

    $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO Utilisateurs (nom, prenom, email, nom_utilisateur, mot_de_passe, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nom, $prenom, $email, $nom_utilisateur, $mot_de_passe_hache, $role);

    if ($stmt->execute()) {
        header("Location: \code\portfolio\projet\portfolioacadémique.php");
        exit;
    } else {
        echo "❌ Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>