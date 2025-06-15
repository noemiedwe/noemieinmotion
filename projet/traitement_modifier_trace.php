<?php
session_start();
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_trace = $_POST['id_trace'];
    $titre = $_POST['titre'];
    $annee_but = $_POST['annee_but'];
    $competence = $_POST['competence'];
    $argumentaire = $_POST['argumentaire'];

    // Correction de la requête SQL
    $sql = "UPDATE traces SET titre = ?, annee_but = ?, competence = ?, argumentaire = ? WHERE id_trace = ?";
    $stmt = $conn->prepare($sql);

    // Correction de l'utilisation de bind_param
    $stmt->bind_param("ssisi", $titre, $annee_but, $competence, $argumentaire, $id_trace);

    if ($stmt->execute()) {
        echo "Trace modifiée avec succès.";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: /code/portfolio/projet/portfolioacadémique.php");
exit;
?>