<?php
session_start();
<<<<<<< ours
include '../connexion/connexionDB.php';
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

// Récupérer les données du formulaire
$id_commentaire = $_POST['id_commentaire'];
$utilisateur = $_SESSION['utilisateur']; // Assurez-vous que l'utilisateur est connecté
$reponse = $_POST['reponse'];
$date_reponse = date('Y-m-d H:i:s');

if (!isset($_POST['id_commentaire']) || !isset($_POST['utilisateur']) || !isset($_POST['reponse'])) {
    die("Erreur: Les données du formulaire sont incomplètes.");
}

// Insérer la réponse dans la base de données
$sql = "INSERT INTO reponses (id_commentaire, utilisateur, reponse, date_reponse) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $id_commentaire, $utilisateur, $reponse, $date_reponse);

if ($stmt->execute()) {
    // Rediriger vers la page des commentaires après l'ajout de la réponse
    header("Location: afficher_commentaires.php");
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>