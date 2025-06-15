<?php
session_start();
<<<<<<< ours
include '../connexion/connexionDB.php';
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

if (!isset($_GET['id'])) {
    die("ID de l'utilisateur non spécifié.");
}

$id_utilisateur = $_GET['id'];

// Supprimer l'utilisateur
<<<<<<< ours
$sql = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
=======
$sql = "DELETE FROM Utilisateurs WHERE id_utilisateur = ?";
>>>>>>> theirs
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utilisateur);

if ($stmt->execute()) {
    echo "Utilisateur supprimé avec succès.";
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: role.php");
exit;
?>
