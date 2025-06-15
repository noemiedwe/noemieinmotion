<?php
<<<<<<< ours
include '../connexion/connexionDB.php';
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');

// Récupérer les données du formulaire
<<<<<<< ours
$id_utilisateur = $conn->real_escape_string($_POST['id_utilisateur']);
=======
$utilisateur = $conn->real_escape_string($_POST['utilisateur']);
>>>>>>> theirs
$commentaire = $conn->real_escape_string($_POST['commentaire']);
$id_trace = $conn->real_escape_string($_POST['id_trace']);
$date_commentaire = date('Y-m-d H:i:s');

// Insérer le commentaire dans la base de données
<<<<<<< ours
$sql = "INSERT INTO commentaires (id_trace, id_utilisateur, commentaire, date_commentaire) VALUES ('$id_trace', '$id_utilisateur', '$commentaire', '$date_commentaire')";

session_start(); 
$_SESSION['id_trace']=$id_trace;

if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit; // Redirige vers la page précédente
=======
$sql = "INSERT INTO commentaires (id_trace, utilisateur, commentaire, date_commentaire) VALUES ('$id_trace', '$utilisateur', '$commentaire', '$date_commentaire')";

if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER['HTTP_REFERER']); // Redirige vers la page précédente
>>>>>>> theirs
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
