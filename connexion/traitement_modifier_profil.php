<?php
session_start();
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez si l'utilisateur est un concepteur
    if ($_SESSION['role'] !== 'Concepteur') {
        header("Location: /code/portfolio/accueil/accueil.html");
        exit();
    }

    // Récupérez les données du formulaire
    $id_utilisateur = $_POST['id_utilisateur'];
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $role = $_POST['role'];
    // Récupérez d'autres champs du formulaire si nécessaire

    // Préparez la requête SQL pour mettre à jour les informations de l'utilisateur
    $sql = "UPDATE utilisateurs SET nom_utilisateur = ?, role = ? WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($sql);

    // Liez les paramètres et exécutez la requête
    $stmt->bind_param("ssi", $nom_utilisateur, $role, $id_utilisateur);

    if ($stmt->execute()) {
        echo "Profil modifié avec succès.";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: role.php");
exit;
?>
